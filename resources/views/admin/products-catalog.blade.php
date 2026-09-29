@extends('admin.layout')

@section('title', 'Products Catalog')

@section('content')
                <div class="mx-auto max-w-6xl">
                    <div class="mb-6 flex items-center justify-between gap-4">
                        <div>
                            <p class="mb-1 text-[10px] uppercase tracking-[0.2em] text-neutral-500">Catalog</p>
                            <h1 class="text-xl font-semibold tracking-tight sm:text-2xl">Products Catalog</h1>
                        </div>
                        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 border border-neutral-950 bg-neutral-950 px-3 py-2 text-[10px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-white hover:text-neutral-950 focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2">
                            <span class="text-base leading-none">+</span>
                            Add New Product
                        </a>
                    </div>

                    @if (session('status'))
                        <p class="mb-4 border border-green-700 bg-green-50 px-4 py-3 text-xs text-green-900">{{ session('status') }}</p>
                    @endif

                    <section aria-label="Products catalog table" class="overflow-x-auto border border-neutral-400 bg-white">
                        <table class="w-full min-w-[760px] border-collapse text-left text-[11px]">
                            <thead class="border-b border-neutral-400 bg-neutral-50 text-[9px] font-semibold uppercase tracking-wide">
                                <tr>
                                    <th scope="col" class="px-3 py-3">Product</th>
                                    <th scope="col" class="px-3 py-3">Category</th>
                                    <th scope="col" class="px-3 py-3">Price</th>
                                    <th scope="col" class="px-3 py-3">Stock</th>
                                    <th scope="col" class="px-3 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                @forelse ($products as $product)
                                <tr class="transition hover:bg-neutral-50">
                                    <td class="px-3 py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-12 w-10 items-center justify-center overflow-hidden border border-neutral-200 bg-neutral-100">
                                                @if ($product->gambar_url)
                                                    <img src="{{ $product->gambar_url }}" alt="" class="h-full w-full object-cover">
                                                @else
                                                    <span class="text-sm text-neutral-400">{{ mb_substr($product->nama_baju, 0, 1) }}</span>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="font-medium text-neutral-900">{{ $product->nama_baju }}</div>
                                                <div class="max-w-sm truncate text-[10px] text-neutral-500">{{ $product->deskripsi }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3 text-neutral-600">{{ $product->kategori }}</td>
                                    <td class="px-3 py-3 whitespace-nowrap">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td class="px-3 py-3">
                                        <span class="inline-flex min-w-[80px] justify-center border border-neutral-300 px-2 py-1 text-neutral-700">{{ $product->stok }} pcs</span>
                                    </td>
                                    <td class="px-3 py-3 text-neutral-500">{{ $product->ukuran }} / {{ $product->warna }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="px-4 py-12 text-center text-neutral-500">Belum ada produk di katalog.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </section>
                    <div class="mt-5">{{ $products->links() }}</div>
                </div>
                </div>
@endsection
