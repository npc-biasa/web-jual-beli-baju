@extends('utama.layout')

@section('title', 'New Arrivals | FTH')

@section('content')
	<div class="flex min-h-[calc(100vh-3.5rem)] flex-col md:flex-row">
		<aside class="w-full shrink-0 border-b border-neutral-200 bg-neutral-50 md:w-64 md:border-b-0 md:border-r">
			<div class="p-5">
				<h1 class="mb-5 text-xs font-medium uppercase tracking-[0.12em]">New arrivals</h1>
				<form action="{{ route('new') }}" method="GET" role="search">
					<label for="product-search" class="mb-2 block text-[9px] font-semibold uppercase tracking-[0.12em]">Search products</label>
					<div class="flex border border-neutral-300 bg-white focus-within:border-neutral-900">
						<input id="product-search" name="q" type="search" value="{{ $search }}" placeholder="Name, category, size..." class="min-w-0 flex-1 border-0 bg-transparent px-3 py-2.5 text-xs outline-none placeholder:text-neutral-400">
						<button type="submit" aria-label="Search products" class="px-3 text-neutral-700 transition hover:text-neutral-950">
							<svg aria-hidden="true" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4 4"/></svg>
						</button>
					</div>
				</form>
				@if ($search !== '')
					<a href="{{ route('new') }}" class="mt-3 inline-block text-[9px] uppercase tracking-[0.1em] text-neutral-500 underline underline-offset-4">Clear search</a>
				@endif
			</div>
		</aside>

		<section aria-label="New arrival products" class="min-w-0 flex-1 px-4 py-8 sm:px-8 lg:px-12">
			<div class="mx-auto max-w-6xl">
				<div class="mb-6 flex items-center justify-between gap-4">
					<p class="text-[9px] uppercase tracking-[0.18em] text-neutral-500">
						{{ $products->total() }} {{ $products->total() === 1 ? 'product' : 'products' }}
						@if ($search !== '') <span class="normal-case tracking-normal">for "{{ $search }}"</span> @endif
					</p>
				</div>
				<div class="grid grid-cols-2 gap-x-5 gap-y-10 sm:grid-cols-3">
					@forelse ($products as $product)
						<a href="{{ route('produk.detail', $product) }}" class="group min-w-0">
							<div class="flex aspect-[4/5] w-full items-center justify-center overflow-hidden bg-neutral-100">
								@if ($product->gambar_url)
									<img src="{{ $product->gambar_url }}" alt="{{ $product->nama_baju }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
								@else
									<span class="text-4xl font-light text-neutral-400">{{ mb_substr($product->nama_baju, 0, 1) }}</span>
								@endif
							</div>
							<h2 class="mt-3 line-clamp-2 min-h-7 text-[8px] leading-[1.25] text-neutral-800">{{ $product->nama_baju }}</h2>
							<p class="mt-1 text-[8px] text-neutral-500">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
						</a>
					@empty
						<p class="col-span-full border-y border-neutral-200 py-16 text-center text-xs text-neutral-500">Tidak ada produk yang cocok dengan pencarian ini.</p>
					@endforelse
				</div>
				<div class="mt-10">{{ $products->links() }}</div>
			</div>
		</section>
	</div>
@endsection
