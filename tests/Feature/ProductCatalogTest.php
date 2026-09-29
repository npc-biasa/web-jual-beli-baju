<?php

use App\Models\Baju;

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
