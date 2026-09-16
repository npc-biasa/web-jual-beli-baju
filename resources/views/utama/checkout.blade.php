<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTH | Checkout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white text-neutral-950 antialiased">
    <header class="relative flex h-10 items-center border-b border-neutral-400 px-5 sm:px-10">
        <a href="{{ url('/keranjang') }}" aria-label="Kembali ke keranjang" class="inline-flex h-6 w-6 items-center justify-center text-lg leading-none transition hover:opacity-50">←</a>
        <a href="{{ url('/') }}" class="absolute left-1/2 -translate-x-1/2 text-[17px] font-black italic leading-none tracking-[-0.18em]">FTH.</a>
    </header>

    <main class="mx-auto grid max-w-[1120px] gap-12 px-6 py-12 sm:px-10 lg:grid-cols-[1fr_0.92fr] lg:gap-20 lg:px-12 lg:py-16">
        <section>
            <h1 class="text-[13px] font-semibold text-neutral-950">Address Details</h1>
            <form id="checkout-form" action="#" method="POST" class="mt-4">
                @csrf
                <div class="space-y-3">
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" name="email" type="email" required placeholder="Email" class="h-8 w-full border border-neutral-500 bg-white px-2 text-[10px] text-neutral-900 outline-none placeholder:text-neutral-700 focus:border-black">
                        <p class="mt-1 text-[8px] text-neutral-500">We will send your order details to your email</p>
                    </div>
                    <div>
                        <label for="recipient-name" class="sr-only">Recipient Full Name</label>
                        <input id="recipient-name" name="recipient_name" type="text" required placeholder="Recipient Full Name" class="h-8 w-full border border-neutral-500 bg-white px-2 text-[10px] text-neutral-900 outline-none placeholder:text-neutral-700 focus:border-black">
                    </div>
                    <div>
                        <label for="recipient-phone" class="sr-only">Recipient Phone number</label>
                        <input id="recipient-phone" name="recipient_phone" type="tel" required placeholder="Recipient Phone number" class="h-8 w-full border border-neutral-500 bg-white px-2 text-[10px] text-neutral-900 outline-none placeholder:text-neutral-700 focus:border-black">
                    </div>
                </div>

                <h2 class="mt-7 text-[13px] font-semibold text-neutral-950">Payment Method</h2>
                <button type="button" data-payment-toggle aria-expanded="false" class="mt-4 flex h-9 w-full items-center justify-between border border-neutral-500 bg-white px-2 text-[10px] transition hover:border-black">
                    <span class="flex items-center gap-2">
                        <span data-payment-icon class="inline-flex h-5 w-5 items-center justify-center bg-[#102b68] text-[7px] font-bold text-white">M</span>
                    </span>
                    <span data-payment-label class="font-semibold">MANDIRI</span>
                    <span class="text-base leading-none">›</span>
                </button>
                <div data-payment-options class="mt-2 hidden border border-neutral-300 bg-white">
                    <button type="button" data-payment="MANDIRI" data-payment-icon-value="M" class="flex w-full items-center gap-3 border-b border-neutral-200 px-2 py-2 text-left text-[10px] hover:bg-neutral-50">
                        <span class="inline-flex h-5 w-5 items-center justify-center bg-[#102b68] text-[7px] font-bold text-white">M</span> MANDIRI
                    </button>
                    <button type="button" data-payment="BCA" data-payment-icon-value="B" class="flex w-full items-center gap-3 border-b border-neutral-200 px-2 py-2 text-left text-[10px] hover:bg-neutral-50">
                        <span class="inline-flex h-5 w-5 items-center justify-center bg-[#0b4ea2] text-[7px] font-bold text-white">B</span> BCA
                    </button>
                    <button type="button" data-payment="BNI" data-payment-icon-value="B" class="flex w-full items-center gap-3 border-b border-neutral-200 px-2 py-2 text-left text-[10px] hover:bg-neutral-50">
                        <span class="inline-flex h-5 w-5 items-center justify-center bg-[#f58220] text-[7px] font-bold text-white">B</span> BNI
                    </button>
                    <button type="button" data-payment="COD" data-payment-icon-value="C" class="flex w-full items-center gap-3 px-2 py-2 text-left text-[10px] hover:bg-neutral-50">
                        <span class="inline-flex h-5 w-5 items-center justify-center bg-neutral-900 text-[7px] font-bold text-white">C</span> CASH ON DELIVERY
                    </button>
                </div>
            </form>
        </section>

        <aside>
            <div class="border border-neutral-500 p-3 sm:p-4">
                <div class="flex gap-3">
                    <div class="h-14 w-14 shrink-0 overflow-hidden bg-neutral-100">
                        <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=180&q=80" alt="Faith Industry The King is Here Grey Cropped Sleeve T-Shirt" class="h-full w-full object-cover grayscale">
                    </div>
                    <div class="min-w-0 flex-1 text-[8px] leading-tight text-neutral-800">
                        <div class="flex justify-between gap-3">
                            <p>Faith Industries "The King is Here" Grey Cropped Sleeve T-Shirt</p>
                            <span class="shrink-0 text-neutral-400">Rp100.000</span>
                        </div>
                        <p class="mt-1 text-[7px] text-neutral-400">QUANTITY: 1</p>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-3 border-t border-neutral-200 pt-3">
                    <div>
                        <p class="text-[8px] font-semibold uppercase tracking-[0.12em] text-neutral-500">Size</p>
                        <p class="mt-2 inline-flex h-7 min-w-8 items-center justify-center border border-black bg-white px-2 text-[9px] font-semibold text-black">M</p>
                    </div>
                    <div>
                        <p class="text-[8px] font-semibold uppercase tracking-[0.12em] text-neutral-500">Color</p>
                        <div class="mt-2 flex items-center gap-2">
                            <span aria-label="Warna Grey" class="h-6 w-6 rounded-full border-2 border-black bg-neutral-500 ring-1 ring-neutral-500 ring-offset-1"></span>
                            <span class="text-[8px] font-semibold text-neutral-900">Grey</span>
                        </div>
                    </div>
                </div>

                <button type="button" class="mt-5 flex h-7 w-full items-center justify-between border border-neutral-500 px-2 text-[8px] text-neutral-400 transition hover:border-black hover:text-neutral-700">
                    <span>Leave a message for delivery (Optional)</span>
                    <span class="text-sm text-neutral-700">›</span>
                </button>
                <button type="button" class="mt-3 flex h-7 w-full items-center justify-between border border-neutral-500 px-2 text-[8px] text-neutral-400 transition hover:border-black hover:text-neutral-700">
                    <span class="flex items-center gap-2"><span class="text-sm">♢</span> VOUCHER</span>
                    <span class="text-sm text-neutral-700">›</span>
                </button>
                <label class="mt-2 flex items-center justify-between text-[8px] text-neutral-400">
                    <span>USE LOYALTY POINT (0)</span>
                    <input type="checkbox" class="h-3 w-3 rounded-none border-neutral-500 accent-black">
                </label>
            </div>

            <div class="mt-3 space-y-2 px-8 text-[9px] text-neutral-800">
                <div class="flex justify-between"><span>Subtotal · 1 items</span><span>Rp100.000</span></div>
                <div class="flex justify-between"><span>Shipping</span><span>Rp30.000</span></div>
            </div>
            <div class="mt-3 flex justify-between border-t border-neutral-400 px-8 pt-3 text-[10px] font-semibold">
                <span>Total Payment</span>
                <span>Rp130.000</span>
            </div>
            <button type="submit" form="checkout-form" class="mt-6 h-9 w-full border border-black bg-black text-[10px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-neutral-700">Order Now</button>
        </aside>
    </main>

    <script>
        const paymentToggle = document.querySelector('[data-payment-toggle]');
        const paymentOptions = document.querySelector('[data-payment-options]');
        const paymentLabel = document.querySelector('[data-payment-label]');
        const paymentIcon = document.querySelector('[data-payment-icon]');

        paymentToggle?.addEventListener('click', () => {
            const isOpen = !paymentOptions.classList.contains('hidden');
            paymentOptions.classList.toggle('hidden', isOpen);
            paymentToggle.setAttribute('aria-expanded', String(!isOpen));
        });

        paymentOptions?.querySelectorAll('[data-payment]').forEach((option) => {
            option.addEventListener('click', () => {
                paymentLabel.textContent = option.dataset.payment;
                paymentIcon.textContent = option.dataset.paymentIconValue;
                paymentIcon.className = 'inline-flex h-5 w-5 items-center justify-center bg-neutral-900 text-[7px] font-bold text-white';
                paymentOptions.classList.add('hidden');
                paymentToggle.setAttribute('aria-expanded', 'false');
            });
        });

    </script>
</body>
</html>
