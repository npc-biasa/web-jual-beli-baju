<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use App\Models\detail_pesanan;
use App\Models\pesanan;
use App\Models\pembayaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function show(Request $request): View|RedirectResponse
    {
        $cartItems = array_values($request->session()->get('cart', []));

        if ($cartItems === []) {
            return redirect()->route('keranjang')->with('status', 'Keranjang masih kosong.');
        }

        $subtotal = collect($cartItems)->sum(fn (array $item) => $item['price'] * $item['quantity']);
        $shipping = 30000;

        return view('utama.checkout', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $subtotal + $shipping,
            'user' => $request->user(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'recipient_name' => ['required', 'string', 'max:255'],
            'recipient_phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:2000'],
            'payment_method' => ['required', 'in:MANDIRI,BCA,BNI,COD'],
        ]);
        $cart = $request->session()->get('cart', []);

        if ($cart === []) {
            return redirect()->route('keranjang')->with('status', 'Keranjang masih kosong.');
        }

        $order = DB::transaction(function () use ($cart, $request, $validated) {
            $products = Baju::query()
                ->whereIn('id_baju', array_unique(array_column($cart, 'id')))
                ->lockForUpdate()
                ->get()
                ->keyBy('id_baju');
            $subtotal = 0;
            $quantitiesByProduct = [];

            foreach ($cart as $item) {
                $quantitiesByProduct[$item['id']] = ($quantitiesByProduct[$item['id']] ?? 0) + $item['quantity'];
            }

            foreach ($quantitiesByProduct as $productId => $quantity) {
                abort_unless($products->has($productId) && $products->get($productId)->stok >= $quantity, 422, 'Stok produk tidak mencukupi.');
            }

            foreach ($cart as $item) {
                $product = $products->get($item['id']);
                $subtotal += (float) $product->harga * $item['quantity'];
            }

            $shipping = 30000;
            $order = pesanan::query()->create([
                'id_user' => $request->user()->getKey(),
                'tanggal_chekout' => now(),
                'ongkos_kirim' => $shipping,
                'total_harga' => (int) round($subtotal + $shipping),
                'status_pesanan' => 'pending',
                'recipient_name' => $validated['recipient_name'],
                'recipient_phone' => $validated['recipient_phone'],
                'delivery_address' => $validated['address'],
            ]);

            foreach ($cart as $item) {
                $product = $products->get($item['id']);
                detail_pesanan::query()->create([
                    'id_pesanan' => $order->id_pesanan,
                    'id_baju' => $product->id_baju,
                    'kuantitas' => $item['quantity'],
                    'harga_satuan' => (int) round($product->harga),
                    'ukuran' => $item['size'],
                    'warna' => $item['color'],
                ]);
                $product->decrement('stok', $item['quantity']);
            }

            pembayaran::query()->create([
                'id_pesanan' => $order->id_pesanan,
                'metode_pembayaran' => $validated['payment_method'],
                'status_pembayaran' => 'pending',
                'tanggal_pembayaran' => now(),
            ]);

            $request->user()->update([
                'name' => $validated['recipient_name'],
                'phone' => $validated['recipient_phone'],
                'address' => $validated['address'],
            ]);

            return $order;
        });

        $request->session()->forget('cart');

        return redirect()->route('home')->with('status', 'Pesanan #'.$order->id_pesanan.' berhasil dibuat.');
    }
}