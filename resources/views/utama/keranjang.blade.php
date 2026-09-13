@extends('utama.layout')

@section('title', 'FTH | Keranjang')

@section('content')
    <div class="bg-[#f3f1ef] px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
        <div class="mx-auto max-w-6xl">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-[0.26em] text-neutral-500">Your bag</p>
                    <h1 class="mt-2 text-3xl font-light tracking-[-0.06em] text-neutral-900">Cart</h1>
                </div>
                <a href="{{ url('/') }}" class="text-[10px] font-semibold uppercase tracking-[0.2em] text-neutral-600 transition hover:text-neutral-900">
                    Continue shopping
                </a>
            </div>

            <div class="overflow-hidden rounded-[28px] border border-neutral-200 bg-[#f8f7f5] shadow-[0_18px_60px_rgba(0,0,0,0.04)]">
                <div class="grid gap-0 lg:grid-cols-[1.35fr_0.65fr]">
                    <div class="p-5 sm:p-8 lg:p-10">
                        <div class="flex flex-col gap-8 md:flex-row md:items-center">
                            <div class="w-full max-w-[320px] overflow-hidden rounded-[18px] bg-[#efefef] p-3">
                                <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=900&q=80" alt="Classic Crew Tee" class="h-[360px] w-full object-cover object-center grayscale-[8%]">
                            </div>

                            <div class="flex-1">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-neutral-500">Faith Industry</p>
                                        <h2 class="mt-2 text-2xl font-semibold tracking-[-0.06em] text-neutral-900">Classic Crew Tee</h2>
                                    </div>
                                    <span class="text-xl font-bold tracking-[-0.05em] text-neutral-900">Rp 420.000</span>
                                </div>

                                <div class="mt-8 grid gap-6 text-sm text-neutral-700 sm:grid-cols-2">
                                    <div>
                                        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-neutral-500">Color</p>
                                        <div class="mt-2 flex items-center gap-3">
                                            <button type="button" data-color-option="Stone" data-color-hex="#d9d6d0" class="color-option h-6 w-6 rounded-full border-2 border-neutral-300 bg-[#d9d6d0] shadow-inner transition duration-200 hover:scale-105 ring-offset-2 ring-offset-[#f8f7f5] ring-2 ring-neutral-900" aria-label="Pilih warna Stone"></button>
                                            <button type="button" data-color-option="Black" data-color-hex="#111111" class="color-option h-6 w-6 rounded-full border-2 border-neutral-300 bg-[#111111] shadow-inner transition duration-200 hover:scale-105 ring-offset-2 ring-offset-[#f8f7f5]" aria-label="Pilih warna Black"></button>
                                            <button type="button" data-color-option="Cream" data-color-hex="#efe4d0" class="color-option h-6 w-6 rounded-full border-2 border-neutral-300 bg-[#efe4d0] shadow-inner transition duration-200 hover:scale-105 ring-offset-2 ring-offset-[#f8f7f5]" aria-label="Pilih warna Cream"></button>
                                        </div>
                                        <p class="mt-3 text-sm font-medium text-neutral-800" data-selected-color>Stone</p>
                                    </div>

                                    <div>
                                        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-neutral-500">Size</p>
                                        <div class="mt-2 flex items-center gap-2">
                                            @foreach(['S', 'M', 'L', 'XL'] as $size)
                                                <button type="button" data-size-option="{{ $size }}" class="size-option inline-flex h-9 min-w-9 items-center justify-center rounded-full border border-neutral-300 bg-white px-2 text-xs font-semibold text-neutral-700 transition duration-200 hover:border-neutral-500 hover:text-neutral-900 {{ $size === 'M' ? 'border-neutral-500 bg-neutral-500 text-white shadow-sm' : '' }}">
                                                    {{ $size }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8 flex flex-col gap-4 border-t border-neutral-200 pt-6 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-neutral-500">Quantity</p>
                                        <div class="mt-2 inline-flex items-center border border-neutral-300 bg-white shadow-sm">
                                            <button type="button" data-qty-minus class="h-10 w-10 text-lg text-neutral-700 transition hover:bg-neutral-100 hover:text-neutral-900">−</button>
                                            <span data-qty-display class="w-12 text-center text-sm font-medium text-neutral-900">1</span>
                                            <button type="button" data-qty-plus class="h-10 w-10 text-lg text-neutral-700 transition hover:bg-neutral-100 hover:text-neutral-900">+</button>
                                        </div>
                                    </div>

                                    <button type="button" class="text-[10px] font-semibold uppercase tracking-[0.2em] text-neutral-500 transition hover:text-red-500">
                                        Remove item
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <aside class="border-t border-neutral-200 bg-[#f1f0ee] p-5 sm:p-8 lg:border-l lg:border-t-0 lg:p-10">
                        <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-neutral-500">Order summary</p>

                        <div class="mt-6 space-y-4 text-sm text-neutral-700">
                            <div class="flex items-center justify-between">
                                <span>Subtotal</span>
                                <span data-subtotal>Rp 420.000</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Shipping</span>
                                <span>Rp 25.000</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Tax</span>
                                <span>Rp 45.000</span>
                            </div>
                        </div>

                        <div class="mt-6 border-t border-neutral-300 pt-5">
                            <div class="flex items-center justify-between text-lg font-semibold tracking-[-0.04em] text-neutral-900">
                                <span>Total</span>
                                <span data-total>Rp 490.000</span>
                            </div>
                        </div>

                        <a href="{{ url('/checkout') }}" class="mt-8 inline-flex w-full items-center justify-center rounded-full bg-neutral-900 px-5 py-3 text-[10px] font-semibold uppercase tracking-[0.22em] text-white transition hover:bg-neutral-700">
                            Checkout
                        </a>

                        <div class="mt-6 rounded-2xl border border-neutral-200 bg-white/60 p-4 text-xs leading-relaxed text-neutral-600">
                            <p class="font-semibold uppercase tracking-[0.18em] text-neutral-700">Shipping info</p>
                            <p class="mt-2">Estimated delivery 2–4 business days.</p>
                            <p class="mt-1">Free returns within 7 days.</p>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <script>
        const colorButtons = document.querySelectorAll('[data-color-option]');
        const sizeButtons = document.querySelectorAll('[data-size-option]');
        const selectedColor = document.querySelector('[data-selected-color]');
        const qtyDisplay = document.querySelector('[data-qty-display]');
        const subtotalEl = document.querySelector('[data-subtotal]');
        const totalEl = document.querySelector('[data-total]');
        const minusButton = document.querySelector('[data-qty-minus]');
        const plusButton = document.querySelector('[data-qty-plus]');

        const basePrice = 420000;
        const shipping = 25000;
        const tax = 45000;

        let quantity = 1;

        const formatRupiah = (value) => new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(value).replace('Rp', 'Rp ');

        const updateSummary = () => {
            if (!subtotalEl || !totalEl) return;

            const subtotal = basePrice * quantity;
            const total = subtotal + shipping + tax;

            subtotalEl.textContent = formatRupiah(subtotal);
            totalEl.textContent = formatRupiah(total);
        };

        colorButtons.forEach((button) => {
            button.addEventListener('click', () => {
                colorButtons.forEach((item) => {
                    item.classList.remove('ring-2', 'ring-neutral-900', 'ring-offset-2', 'ring-offset-[#f8f7f5]');
                    item.classList.remove('border-neutral-900');
                    item.classList.add('border-neutral-300');
                });

                button.classList.add('ring-2', 'ring-neutral-900', 'ring-offset-2', 'ring-offset-[#f8f7f5]');
                button.classList.remove('border-neutral-300');
                button.classList.add('border-neutral-900');

                if (selectedColor) {
                    selectedColor.textContent = button.dataset.colorOption;
                }
            });
        });

        sizeButtons.forEach((button) => {
            button.addEventListener('click', () => {
                sizeButtons.forEach((item) => {
                    item.classList.remove('border-neutral-500', 'bg-neutral-500', 'text-white');
                    item.classList.add('border-neutral-300', 'bg-white', 'text-neutral-700');
                });

                button.classList.remove('border-neutral-300', 'bg-white', 'text-neutral-700');
                button.classList.add('border-neutral-500', 'bg-neutral-500', 'text-white');
            });
        });

        if (minusButton) {
            minusButton.addEventListener('click', () => {
                quantity = Math.max(1, quantity - 1);
                if (qtyDisplay) qtyDisplay.textContent = quantity;
                updateSummary();
            });
        }

        if (plusButton) {
            plusButton.addEventListener('click', () => {
                quantity += 1;
                if (qtyDisplay) qtyDisplay.textContent = quantity;
                updateSummary();
            });
        }

        updateSummary();
    </script>
@endsection
