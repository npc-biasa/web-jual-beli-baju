@extends('utama.layout')

@section('title', 'FTH | New Arrivals')

@php
	// Contoh: ['name' => 'Nama Baju', 'price' => 'Rp 150.000', 'image' => asset('images/nama-baju.jpg')],
	$products = [
		['name' => 'Faith Industry "Poptart" Family Jersey', 'price' => 'Rp 700.000', 'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=500&q=85'],
		['name' => 'Norem ipsum dolor', 'price' => 'Rp 120.000', 'image' => 'https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?auto=format&fit=crop&w=500&q=85'],
		['name' => 'Norem ipsum dolor', 'price' => 'Rp 100.000', 'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?auto=format&fit=crop&w=500&q=85'],
		['name' => 'Norem ipsum dolor', 'price' => 'Rp 100.000', 'image' => 'https://images.unsplash.com/photo-1548883354-7622d03aca27?auto=format&fit=crop&w=500&q=85'],
		['name' => 'Norem ipsum dolor', 'price' => 'Rp 100.000', 'image' => 'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=500&q=85'],
	];
@endphp

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

		<section id="collections" class="relative mx-auto max-w-[1440px] px-9 py-6 sm:px-16 sm:py-8">
			<div class="relative">
				<button type="button" data-carousel-prev aria-label="Previous products" class="absolute -left-8 top-1/2 z-10 -translate-y-1/2 p-2 transition hover:scale-110 sm:-left-12">
					<svg aria-hidden="true" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.4"><path d="m15 18-6-6 6-6"/></svg>
				</button>
				<div data-carousel class="grid grid-cols-2 overflow-hidden sm:grid-cols-3 lg:grid-cols-5">
					@foreach ($products as $product)
						<a href="#product" class="group border-r border-neutral-200 px-3 py-2 first:border-l sm:px-4 sm:py-3">
							<div class="aspect-[4/5] overflow-hidden bg-neutral-100">
								<img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="h-full w-full object-cover grayscale-[15%] transition duration-500 group-hover:scale-105">
							</div>
							<p class="mt-2 line-clamp-2 min-h-7 text-[8px] leading-tight text-neutral-800 sm:text-[9px]">{{ $product['name'] }}</p>
							<p class="mt-1 text-[8px] text-neutral-500 sm:text-[9px]">{{ $product['price'] }}</p>
						</a>
					@endforeach
				</div>
				<button type="button" data-carousel-next aria-label="Next products" class="absolute -right-8 top-1/2 z-10 -translate-y-1/2 p-2 transition hover:scale-110 sm:-right-12">
					<svg aria-hidden="true" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.4"><path d="m9 18 6-6-6-6"/></svg>
				</button>
			</div>
		</section>

		<section id="trending" class="border-t border-neutral-100 px-6 py-16 text-center sm:py-24">
			<p class="text-[9px] uppercase tracking-[0.22em] text-neutral-500">FTH essentials</p>
			<h2 class="mt-3 text-3xl font-light tracking-tight sm:text-5xl">Wear your point of view.</h2>
		</section>
	<script>
		const carousel = document.querySelector('[data-carousel]');
		const products = [...carousel.children];
		let offset = 0;

		function moveCarousel(direction) {
			const visible = window.innerWidth >= 1024 ? 5 : window.innerWidth >= 640 ? 3 : 2;
			offset = Math.max(0, Math.min(offset + direction, products.length - visible));
			products.forEach((product, index) => {
				product.style.display = index >= offset && index < offset + visible ? '' : 'none';
			});
		}

		document.querySelector('[data-carousel-prev]').addEventListener('click', () => moveCarousel(-1));
		document.querySelector('[data-carousel-next]').addEventListener('click', () => moveCarousel(1));
		window.addEventListener('resize', () => moveCarousel(0));
	</script>
@endsection
