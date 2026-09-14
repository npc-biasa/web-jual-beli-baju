@extends('utama.layout')

@section('title', 'FTH | Keranjang')

@php
    $subtotal = collect($cartItems)->sum(fn ($item) => $item['price'] * $item['quantity']);
    $shipping = count($cartItems) > 0 ? 30000 : 0;
    $total = $subtotal + $shipping;
@endphp

@section('content')
    <main class="min-h-screen bg-[#f5f5f5] px-4 py-8 sm:px-6 lg:px-8 lg:py-10">
        <div class="mx-auto max-w-7xl">
            @if (session('status'))
                <div class="mb-5 border border-neutral-900 bg-neutral-950 px-4 py-3 text-xs text-white">{{ session('status') }}</div>
            @endif

            <div class="mb-7 flex items-end justify-between gap-4">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.26em] text-neutral-500">Shopping cart</p>
                    <h1 class="mt-2 text-3xl font-semibold tracking-[-0.06em] text-neutral-900">Keranjang Saya</h1>
                </div>
                <a href="{{ url('/') }}" class="text-xs font-semibold text-neutral-500 transition hover:text-neutral-900">Lanjut belanja</a>
            </div>

            @if (count($cartItems) === 0)
                <div class="border border-neutral-200 bg-white px-6 py-20 text-center">
                    <p class="text-sm font-semibold text-neutral-900">Keranjang masih kosong</p>
                    <p class="mt-2 text-xs text-neutral-500">Pilih produk dan masukkan ke keranjang dari halaman detail.</p>
                    <a href="{{ url('/') }}" class="mt-6 inline-flex bg-neutral-950 px-6 py-3 text-xs font-bold uppercase tracking-[0.14em] text-white">Mulai belanja</a>
                </div>
            @else
                <div class="grid items-start gap-5 lg:grid-cols-[minmax(0,1fr)_340px]">
                    <div class="space-y-4">
                        <div class="flex items-center gap-3 border border-neutral-200 bg-white px-4 py-4 sm:px-6">
                            <span class="text-sm text-neutral-700">{{ count($cartItems) }} produk di keranjang</span>
                            <a href="{{ url('/') }}" class="ml-auto text-xs font-medium text-neutral-500 hover:text-neutral-900">Tambah produk</a>
                        </div>

                        <section class="divide-y divide-neutral-100 border border-neutral-200 bg-white">
                            @foreach ($cartItems as $item)
                                <div class="grid gap-4 px-4 py-5 sm:grid-cols-[104px_minmax(0,1fr)_120px_100px] sm:items-center sm:px-6">
                                    <div class="h-28 w-28 overflow-hidden bg-neutral-100 sm:h-24 sm:w-24">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="h-full w-full object-cover grayscale-[8%]">
                                    </div>
                                    <div class="min-w-0">
                                        <h2 class="text-sm font-medium text-neutral-900">{{ $item['name'] }}</h2>
                                        <p class="mt-1 text-xs text-neutral-500">Size: <span class="font-semibold text-neutral-900">{{ $item['size'] }}</span> <span class="mx-1">|</span> Color: <span class="font-semibold text-neutral-900">{{ $item['color'] }}</span></p>
                                        <p class="mt-3 text-xs text-neutral-500">Quantity: {{ $item['quantity'] }}</p>
                                        <a href="{{ route('produk.detail', $item['id']) }}" class="mt-3 inline-block text-[10px] font-semibold uppercase tracking-[0.14em] text-neutral-500 underline underline-offset-4 hover:text-neutral-900">Ubah pilihan di detail produk</a>
                                    </div>
                                    <div class="text-left sm:text-right">
                                        <p class="text-sm font-semibold text-neutral-900">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                                        <p class="mt-1 text-xs text-neutral-400">{{ $item['quantity'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                    </div>
                                    <span class="text-xs text-neutral-400 sm:text-right">Tersimpan</span>
                                </div>
                            @endforeach
                        </section>
                    </div>

                    <aside class="border border-neutral-200 bg-white p-5 sm:p-6 lg:sticky lg:top-5">
                        <div class="flex items-center justify-between border-b border-neutral-100 pb-5">
                            <p class="text-sm font-semibold text-neutral-900">Ringkasan belanja</p>
                            <span class="text-xs text-neutral-400">{{ count($cartItems) }} produk</span>
                        </div>
                        <div class="mt-5 space-y-4 text-sm text-neutral-600">
                            <div class="flex justify-between gap-4"><span>Total harga</span><span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span></div>
                            <div class="flex justify-between gap-4"><span>Ongkos kirim</span><span>Rp {{ number_format($shipping, 0, ',', '.') }}</span></div>
                        </div>
                        <div class="mt-6 flex items-end justify-between border-t border-neutral-100 pt-5">
                            <span class="text-sm font-semibold text-neutral-900">Total pembayaran</span>
                            <span class="text-xl font-bold text-neutral-900">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ url('/checkout') }}" class="mt-6 inline-flex w-full items-center justify-center bg-neutral-900 px-5 py-3.5 text-xs font-bold uppercase tracking-[0.14em] text-white transition hover:bg-neutral-700">Checkout ({{ count($cartItems) }})</a>
                    </aside>
                </div>
            @endif
        </div>
    </main>
@endsection
