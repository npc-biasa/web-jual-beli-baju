<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function home(): View
    {
        return view('utama.landing-page', [
            'products' => Baju::query()->latest()->limit(5)->get(),
        ]);
    }

    public function index(Request $request): View
    {
        $validated = $request->validate(['q' => ['nullable', 'string', 'max:100']]);
        $search = trim($validated['q'] ?? '');
        $products = Baju::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('nama_baju', 'like', "%{$search}%")
                        ->orWhere('deskripsi', 'like', "%{$search}%")
                        ->orWhere('kategori', 'like', "%{$search}%")
                        ->orWhere('ukuran', 'like', "%{$search}%")
                        ->orWhere('warna', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('utama.new', compact('products', 'search'));
    }

    public function show(Baju $product): View
    {
        return view('utama.detail-produk', [
            'product' => $product,
            'sizes' => $this->options($product->ukuran, ['S', 'M', 'L', 'XL']),
            'colors' => $this->options($product->warna, ['Grey', 'Black', 'White']),
        ]);
    }

    public function addToCart(Request $request, Baju $product): RedirectResponse
    {
        $validated = $request->validate([
            'size' => ['required', 'string', Rule::in($this->options($product->ukuran, ['S', 'M', 'L', 'XL']))],
            'color' => ['required', 'string', Rule::in($this->options($product->warna, ['Grey', 'Black', 'White']))],
            'quantity' => ['required', 'integer', 'min:1', 'max:10'],
        ]);
        $cart = $request->session()->get('cart', []);
        $productData = [
            'id' => $product->getRouteKey(),
            'name' => $product->nama_baju,
            'price' => (float) $product->harga,
            'image' => $product->gambar_url,
        ];
        $cartKey = implode(':', [$productData['id'], $validated['size'], $validated['color']]);

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] = min(10, $cart[$cartKey]['quantity'] + $validated['quantity']);
        } else {
            $cart[$cartKey] = [
                ...$productData,
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

    public function placeOrder(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'recipient_name' => ['required', 'string', 'max:255'],
            'recipient_phone' => ['required', 'string', 'max:30'],
        ]);

        abort_if(empty($request->session()->get('cart', [])), 400, 'Keranjang masih kosong.');

        $request->session()->forget('cart');

        return redirect()->route('home')->with('status', 'Pesanan berhasil dibuat.');
    }

    private function options(?string $value, array $fallback): array
    {
        $options = array_filter(array_map('trim', preg_split('/[,;|\/]+/', $value ?? '') ?: []));

        return $options === [] ? $fallback : array_values(array_unique($options));
    }
}
