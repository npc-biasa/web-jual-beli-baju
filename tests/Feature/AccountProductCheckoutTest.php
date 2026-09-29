<?php

use App\Models\Baju;
use App\Models\User;
use Illuminate\Http\UploadedFile;

function createCheckoutProduct(array $attributes = []): Baju
{
    return Baju::query()->create(array_merge([
        'nama_baju' => 'Cotton Shirt',
        'deskripsi' => 'Kemeja katun lembut',
        'harga' => 150000,
        'stok' => 5,
        'kategori' => 'Shirt',
        'ukuran' => 'S,M,L',
        'warna' => 'Black,White',
    ], $attributes));
}

test('guest checkout requires a customer account and registration signs in', function () {
    $product = createCheckoutProduct();
    $this->withSession(['cart' => [
        '1:M:Black' => ['id' => $product->id_baju, 'name' => $product->nama_baju, 'price' => 150000, 'image' => null, 'size' => 'M', 'color' => 'Black', 'quantity' => 1],
    ]]);

    $this->get('/checkout')->assertRedirect('/login');
    $this->post('/register', [
        'name' => 'Test Customer',
        'email' => 'customer@example.com',
        'password' => 'correct-horse-battery',
        'password_confirmation' => 'correct-horse-battery',
    ])->assertRedirect('/checkout');

    $this->assertAuthenticated();
});

test('admin can create a product with description variants and photo', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $imageUpload = UploadedFile::fake()->createWithContent(
        'jacket.png',
        base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=')
    );

    $this->actingAs($admin)->post('/admin/products', [
        'nama_baju' => 'Canvas Jacket',
        'deskripsi' => 'Jaket kanvas tahan lama.',
        'kategori' => 'Jacket',
        'harga' => 275000,
        'stok' => 8,
        'ukuran' => 'M, L, XL',
        'warna' => 'Olive, Black',
        'gambar' => $imageUpload,
    ])->assertRedirect('/admin/products');

    $product = Baju::query()->where('nama_baju', 'Canvas Jacket')->firstOrFail();
    expect($product->deskripsi)->toBe('Jaket kanvas tahan lama.')
        ->and($product->ukuran)->toBe('M, L, XL')
        ->and($product->warna)->toBe('Olive, Black')
        ->and($product->gambar)->toBeNull()
        ->and($product->gambar_data)->not->toBeEmpty()
        ->and($product->gambar_mime)->toBe('image/png')
        ->and(base64_decode($product->gambar_data))->toBe($imageUpload->getContent());
});

test('customers cannot access product administration', function () {
    $this->actingAs(User::factory()->create(['role' => 'customer']))
        ->get('/admin/products/create')
        ->assertForbidden();
});

test('admin login opens the dashboard at /dashboard', function () {
    $admin = User::factory()->create([
        'email' => 'admin@example.com',
        'password' => 'test-password',
        'role' => 'admin',
    ]);

    $this->post('/login', [
        'email' => $admin->email,
        'password' => 'test-password',
    ])->assertRedirect('/dashboard');

    $this->get('/dashboard')->assertSuccessful();
    $this->get('/admin/dashboard')->assertRedirect('/dashboard');
});

test('authenticated checkout stores order items payment and decrements stock', function () {
    $user = User::factory()->create();
    $product = createCheckoutProduct();
    $this->actingAs($user)->withSession(['cart' => [
        '1:M:Black' => ['id' => $product->id_baju, 'name' => $product->nama_baju, 'price' => 150000, 'image' => null, 'size' => 'M', 'color' => 'Black', 'quantity' => 2],
    ]]);

    $this->post('/checkout', [
        'recipient_name' => 'Order Recipient',
        'recipient_phone' => '081234567890',
        'address' => 'Jl. Merdeka No. 1',
        'payment_method' => 'BCA',
    ])->assertRedirect('/');

    $this->assertDatabaseHas('pesanans', [
        'id_user' => $user->id_user,
        'recipient_name' => 'Order Recipient',
        'delivery_address' => 'Jl. Merdeka No. 1',
        'total_harga' => 330000,
    ]);
    $this->assertDatabaseHas('detail_pesanans', [
        'id_baju' => $product->id_baju,
        'kuantitas' => 2,
        'ukuran' => 'M',
        'warna' => 'Black',
    ]);
    $this->assertDatabaseHas('pembayarans', ['metode_pembayaran' => 'BCA']);
    expect($product->fresh()->stok)->toBe(3);
});
