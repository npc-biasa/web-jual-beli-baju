<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(string $product): View
    {
        return view('utama.detail-produk', [
            'product' => $this->findProduct($product),
        ]);
    }

    public function addToCart(Request $request, string $product): RedirectResponse
    {
        $productData = $this->findProduct($product);
        $validated = $request->validate([
            'size' => ['required', 'string', 'in:S,M,L,XL'],
            'color' => ['required', 'string', 'in:Grey,Black,White'],
            'quantity' => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        $cart = $request->session()->get('cart', []);
        $cartKey = implode(':', [$productData['id'], $validated['size'], $validated['color']]);

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] = min(10, $cart[$cartKey]['quantity'] + $validated['quantity']);
        } else {
            $cart[$cartKey] = [
                ...Arr::only($productData, ['id', 'name', 'price', 'image']),
                'size' => $validated['size'],
                'color' => $validated['color'],
                'quantity' => $validated['quantity'],
            ];
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('keranjang')->with('status', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function cart(Request $request): View
    {
        return view('utama.keranjang', [
            'cartItems' => array_values($request->session()->get('cart', [])),
        ]);
    }

    private function findProduct(string $product): array
    {
        $products = [
            'poptart-jersey' => [
                'id' => 'poptart-jersey',
                'name' => 'Faith Industry "Poptart" Family Jersey',
                'price' => 700000,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=900&q=85',
                'description' => 'Jersey relaxed fit dengan detail sporty dan material ringan untuk aktivitas harian.',
            ],
            'classic-tee' => [
                'id' => 'classic-tee',
                'name' => 'Classic Crew Tee',
                'price' => 120000,
                'image' => 'https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?auto=format&fit=crop&w=900&q=85',
                'description' => 'T-shirt klasik dengan potongan clean dan material nyaman untuk dipakai setiap hari.',
            ],
            'essential-shirt' => [
                'id' => 'essential-shirt',
                'name' => 'Essential Overshirt',
                'price' => 100000,
                'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?auto=format&fit=crop&w=900&q=85',
                'description' => 'Overshirt versatile dengan siluet relaxed untuk layering yang mudah.',
            ],
            'daily-jacket' => [
                'id' => 'daily-jacket',
                'name' => 'Daily Utility Jacket',
                'price' => 100000,
                'image' => 'https://images.unsplash.com/photo-1548883354-7622d03aca27?auto=format&fit=crop&w=900&q=85',
                'description' => 'Jaket utility dengan potongan boxy dan detail fungsional untuk aktivitas harian.',
            ],
            'studio-top' => [
                'id' => 'studio-top',
                'name' => 'Studio Knit Top',
                'price' => 100000,
                'image' => 'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=900&q=85',
                'description' => 'Knit top minimal dengan tekstur lembut dan siluet yang mudah dipadukan.',
            ],
        ];

        abort_unless(isset($products[$product]), 404);

        return $products[$product];
    }
}
