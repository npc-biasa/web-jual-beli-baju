@extends('utama.layout')

@section('title', 'New Arrivals | FTH')

@php
	$products = [
		['name' => 'Faith Industries "Poptart" Family Jersey', 'price' => 'Rp 100.000,00', 'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=600&q=85'],
		['name' => 'Faith Industries "The Black Swordman Saga" Grey washed boxy double zip hoodie', 'price' => 'Rp 100.000,00', 'image' => 'https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?auto=format&fit=crop&w=600&q=85'],
		['name' => 'Faith Industries "The King Is Here" Cropped Sweatshirt T-Shirt', 'price' => 'Rp 100.000,00', 'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?auto=format&fit=crop&w=600&q=85'],
		['name' => 'Faith Industries "The Coat of a Dream" Black Washed Boxy Double Zip Hoodie', 'price' => 'Rp 100.000,00', 'image' => 'https://images.unsplash.com/photo-1548883354-7622d03aca27?auto=format&fit=crop&w=600&q=85'],
		['name' => 'Faith Industries "The Coat of a Dream" Black Washed Boxy Double Zip Hoodie', 'price' => 'Rp 100.000,00', 'image' => 'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=600&q=85'],
	];
@endphp

@section('content')
	<div class="flex min-h-[calc(100vh-3.5rem)] flex-col md:flex-row">
		<aside data-filter class="w-full shrink-0 border-b border-neutral-200 bg-neutral-50 text-[8px] uppercase tracking-[0.08em] md:min-h-[calc(100vh-3.5rem)] md:w-56 md:border-b-0 md:border-r">
			<div class="p-4">
				<h1 class="mb-5 text-[12px] font-medium uppercase tracking-[0.12em]">New</h1>
				<div class="border-b border-neutral-300 p-3">
					<label class="flex items-center gap-2 border border-neutral-300 px-2 py-2 text-[7px] text-neutral-500">
						<svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="11" cy="11" r="6"/><path d="m16 16 4 4"/></svg>
						<input type="search" placeholder="Search" class="w-full border-0 p-0 text-[8px] uppercase outline-none placeholder:text-neutral-400">
					</label>
				</div>

				@foreach ([
					['title' => 'Categories', 'items' => ['New', 'T-Shirt', 'Shirt', 'Hoodie']],
					['title' => 'Availability', 'items' => ['Available', 'Out of stock']],
					['title' => 'Size', 'items' => ['M', 'L', 'XL', 'XXL']],
				] as $filter)
					<fieldset class="border-b border-neutral-300 p-3 last:border-b-0">
						<legend class="mb-3 text-[7px] font-semibold">{{ $filter['title'] }}</legend>
						<div class="space-y-2">
							@foreach ($filter['items'] as $item)
								<label class="flex items-center gap-2 normal-case tracking-normal text-neutral-700">
									<input type="checkbox" class="h-3 w-3 rounded-none border-neutral-400 accent-black">
									{{ $item }}
								</label>
							@endforeach
						</div>
					</fieldset>
				@endforeach
			</div>
		</aside>

		<section aria-label="New arrival products" class="min-w-0 flex-1 px-4 py-8 sm:px-8 lg:px-12">
			<div class="mx-auto max-w-6xl">
				<div class="mb-6 flex items-center justify-between">
					<p class="text-[9px] uppercase tracking-[0.18em] text-neutral-500">Latest collection</p>
					<button type="button" class="text-[9px] uppercase tracking-[0.12em] text-neutral-500 transition hover:text-neutral-950">Sort by</button>
				</div>
				<div class="grid grid-cols-2 gap-x-5 gap-y-10 sm:grid-cols-3">
					@foreach ($products as $product)
						<a href="#product" class="group min-w-0">
							<div class="aspect-[4/5] w-full overflow-hidden bg-neutral-100">
								<img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="h-full w-full object-cover grayscale-[10%] transition duration-500 group-hover:scale-105">
							</div>
							<h2 class="mt-3 line-clamp-2 min-h-7 text-[8px] leading-[1.25] text-neutral-800">{{ $product['name'] }}</h2>
							<p class="mt-1 text-[8px] text-neutral-500">{{ $product['price'] }}</p>
						</a>
					@endforeach
				</div>
			</div>
		</section>
		</div>
	</div>
@endsection
