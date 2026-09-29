<?php

use App\Models\Baju;
use App\Models\User;
use Illuminate\Http\UploadedFile;

function createCatalogProduct(array $attributes = []): Baju
{
    return Baju::query()->create(array_merge([
        'nama_baju' => 'Basic Cotton Tee',
        'deskripsi' => 'Kaos katun harian',
        'harga' => 125000,
        'stok' => 10,
        'kategori' => 'T-Shirt',
        'ukuran' => 'S,M,L',
        'warna' => 'Black,White',
    ], $attributes));
}

test('storefront and product detail use products from the database', function () {
    $product = createCatalogProduct();

    $this->get('/')
        ->assertSuccessful()
        ->assertSee('Basic Cotton Tee');

    $this->get('/produk/'.$product->id_baju)
        ->assertSuccessful()
        ->assertSee('Kaos katun harian');
});

test('catalog search filters database products and pagination keeps the query', function () {
    foreach (range(1, 13) as $number) {
        createCatalogProduct(['nama_baju' => "Cotton Tee {$number}"]);
    }
    createCatalogProduct(['nama_baju' => 'Denim Jacket']);

    $this->get('/new?q=Cotton')
        ->assertSuccessful()
        ->assertSee('Cotton Tee 1')
        ->assertDontSee('Denim Jacket')
        ->assertViewHas('products', fn ($products) => $products->total() === 13);

    $this->get('/new?q=Cotton&page=2')
        ->assertSuccessful()
        ->assertSee('value="Cotton"', false)
        ->assertViewHas('products', fn ($products) => $products->currentPage() === 2);
});

test('admin product uploads are stored in the database', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $imageUpload = UploadedFile::fake()->createWithContent(
        'tee.png',
        base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=')
    );

    $this->actingAs($admin)
        ->post(route('admin.products.store'), [
            'nama_baju' => 'Image Tee',
            'deskripsi' => 'Kaos dengan gambar',
            'kategori' => 'T-Shirt',
            'harga' => 125000,
            'stok' => 5,
            'ukuran' => 'M',
            'warna' => 'Black',
            'gambar' => $imageUpload,
        ])
        ->assertRedirect(route('admin.products.index'));

    $product = Baju::query()->where('nama_baju', 'Image Tee')->firstOrFail();

    expect($product->gambar_data)->not->toBeEmpty()
        ->and($product->gambar_mime)->toStartWith('image/')
        ->and(base64_decode($product->gambar_data))->toBe($imageUpload->getContent())
        ->and($product->gambar_url)->toStartWith('data:image/');
});
