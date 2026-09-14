@extends('utama.layout')

@section('title', 'FTH | ' . $product['name'])

@section('content')
    <main class="bg-white px-5 py-10 sm:px-10 lg:px-16 lg:py-14">
        <div class="mx-auto max-w-6xl">
            @if (session('status'))
                <div class="mb-6 border border-neutral-900 bg-neutral-950 px-4 py-3 text-xs text-white">
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid gap-10 lg:grid-cols-[1.05fr_0.95fr] lg:gap-16">
                <section>
                    <div class="aspect-[4/5] overflow-hidden bg-neutral-100">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="h-full w-full object-cover grayscale-[8%]">
                    </div>
                </section>

                <section class="lg:pt-2">
                    <p class="text-[10px] font-semibold uppercase tracking-[0.24em] text-neutral-500">FTH New Arrivals</p>
                    <h1 class="mt-3 max-w-lg text-3xl font-semibold leading-tight tracking-[-0.06em] text-neutral-950 sm:text-4xl">{{ $product['name'] }}</h1>
                    <p class="mt-4 text-lg font-semibold text-neutral-950">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                    <p class="mt-6 max-w-lg text-sm leading-7 text-neutral-600">{{ $product['description'] }}</p>

                    <form action="{{ route('produk.keranjang', $product['id']) }}" method="POST" class="mt-8 border-t border-neutral-200 pt-7">
                        @csrf
                        <fieldset>
                            <legend class="text-xs font-semibold uppercase tracking-[0.16em] text-neutral-900">Size</legend>
                            <div class="mt-3 flex flex-wrap gap-2">
                                @foreach (['S', 'M', 'L', 'XL'] as $size)
                                    <label>
                                        <input type="radio" name="size" value="{{ $size }}" class="peer sr-only" {{ $size === 'M' ? 'checked' : '' }}>
                                        <span class="inline-flex h-10 min-w-10 cursor-pointer items-center justify-center border border-neutral-300 px-3 text-xs font-semibold text-neutral-700 transition peer-checked:border-neutral-950 peer-checked:bg-neutral-950 peer-checked:text-white">{{ $size }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>

                        <fieldset class="mt-7">
                            <legend class="text-xs font-semibold uppercase tracking-[0.16em] text-neutral-900">Color: <span data-color-label class="font-normal text-neutral-500">Grey</span></legend>
                            <div class="mt-3 flex items-center gap-4">
                                @foreach ([['Grey', '#8b8b8b'], ['Black', '#111111'], ['White', '#ffffff']] as [$color, $hex])
                                    <label>
                                        <input type="radio" name="color" value="{{ $color }}" class="peer sr-only" {{ $color === 'Grey' ? 'checked' : '' }}>
                                        <span data-color-option="{{ $color }}" class="block h-7 w-7 cursor-pointer rounded-full border border-neutral-300 bg-[{{ $hex }}] ring-offset-2 transition peer-checked:border-neutral-950 peer-checked:ring-2 peer-checked:ring-neutral-950"></span>
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>

                        <div class="mt-7 flex items-center gap-3">
                            <label for="quantity" class="text-xs font-semibold uppercase tracking-[0.16em] text-neutral-900">Quantity</label>
                            <input id="quantity" name="quantity" type="number" min="1" max="10" value="1" class="h-10 w-16 border border-neutral-300 px-2 text-center text-sm outline-none focus:border-neutral-950">
                        </div>

                        <button type="submit" class="mt-8 inline-flex h-12 w-full items-center justify-center bg-neutral-950 px-6 text-xs font-bold uppercase tracking-[0.16em] text-white transition hover:bg-neutral-700">
                            Add to cart
                        </button>
                    </form>

                    <div class="mt-8 border-t border-neutral-200 pt-6 text-xs leading-6 text-neutral-500">
                        <p>Free delivery for orders over Rp 500.000.</p>
                        <p>Easy returns within 7 days.</p>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script>
        const colorLabel = document.querySelector('[data-color-label]');

        document.querySelectorAll('[name="color"]').forEach((color) => {
            color.addEventListener('change', () => {
                colorLabel.textContent = color.value;
            });
        });
    </script>
@endsection
