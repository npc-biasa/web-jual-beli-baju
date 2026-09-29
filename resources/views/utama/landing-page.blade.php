@extends('utama.layout')

@section('title', 'FTH | New Arrivals')

@section('content')
		<section id="new-arrivals" class="relative h-[min(58vw,560px)] min-h-[280px] overflow-hidden bg-neutral-200">
			<img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&w=2200&q=90" alt="FTH latest collection" class="h-full w-full object-cover object-center">
			<div class="absolute inset-0 bg-black/10"></div>
			<div class="absolute bottom-7 left-6 text-white drop-shadow sm:bottom-10 sm:left-10">
				<p class="mb-2 text-[9px] font-semibold uppercase tracking-[0.22em]">Autumn / Winter 2026</p>
				<h1 class="max-w-[260px] text-3xl font-light leading-[0.95] tracking-tight sm:text-5xl">Built for the bold.</h1>
				<a href="#collections" class="mt-5 inline-flex border-b border-white pb-1 text-[10px] font-semibold uppercase tracking-[0.16em]">Shop collection</a>
			</div>
		</section>

		<section id="collections" class="mx-auto max-w-[1440px] px-6 py-8 sm:px-10 sm:py-10">
			<div class="mb-5 flex items-end justify-between gap-4">
				<h2 class="text-xs font-semibold uppercase tracking-[0.18em]">Latest products</h2>
				<a href="{{ route('new') }}" class="text-[9px] font-semibold uppercase tracking-[0.12em] underline underline-offset-4">View all</a>
			</div>
			<div class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 lg:grid-cols-4">
				@forelse ($products as $product)
					<a href="{{ route('produk.detail', $product) }}" class="group min-w-0">
						<div class="flex aspect-[4/5] items-center justify-center overflow-hidden bg-neutral-100">
							@if ($product->gambar_url)
								<img src="{{ $product->gambar_url }}" alt="{{ $product->nama_baju }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
							@else
								<span class="text-4xl font-light text-neutral-400">{{ mb_substr($product->nama_baju, 0, 1) }}</span>
							@endif
						</div>
						<p class="mt-2 line-clamp-2 min-h-7 text-[9px] leading-tight text-neutral-800">{{ $product->nama_baju }}</p>
						<p class="mt-1 text-[9px] text-neutral-500">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
					</a>
				@empty
					<p class="col-span-full py-12 text-center text-xs text-neutral-500">Produk belum tersedia.</p>
				@endforelse
			</div>
		</section>
@endsection
