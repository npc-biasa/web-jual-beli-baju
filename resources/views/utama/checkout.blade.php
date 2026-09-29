@extends('utama.layout')

@section('title', 'Checkout | FTH')

@section('content')
    <main class="mx-auto grid max-w-6xl gap-10 px-5 py-10 sm:px-8 lg:grid-cols-[minmax(0,1fr)_380px] lg:gap-16 lg:py-14">
        <section>
            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-neutral-500">Account checkout</p>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight">Delivery details</h1>
            <p class="mt-2 text-sm text-neutral-600">Pesanan akan dikaitkan dengan akun {{ $user->email }}.</p>

            @if ($errors->any())
                <div class="mt-5 border border-red-300 bg-red-50 px-4 py-3 text-xs text-red-800">
                    <p class="font-semibold">Tidak dapat memproses checkout.</p>
                    <ul class="mt-2 list-inside list-disc">
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form id="checkout-form" action="{{ route('checkout.process') }}" method="POST" class="mt-7">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="recipient_name" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Recipient name</label>
                        <input id="recipient_name" name="recipient_name" value="{{ old('recipient_name', $user->name) }}" autocomplete="name" required maxlength="255" class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                    </div>
                    <div>
                        <label for="recipient_phone" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Phone number</label>
                        <input id="recipient_phone" name="recipient_phone" type="tel" value="{{ old('recipient_phone', $user->phone) }}" autocomplete="tel" required maxlength="30" class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                    </div>
                    <div>
                        <label for="address" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Delivery address</label>
                        <textarea id="address" name="address" rows="4" autocomplete="street-address" required maxlength="2000" class="w-full border border-neutral-300 px-3 py-3 text-sm leading-6 outline-none focus:border-neutral-950">{{ old('address', $user->address) }}</textarea>
                    </div>
                </div>

                <fieldset class="mt-8">
                    <legend class="text-xs font-semibold uppercase tracking-[0.14em]">Payment method</legend>
                    <div class="mt-3 grid grid-cols-2 gap-2 sm:grid-cols-4">
                        @foreach (['MANDIRI', 'BCA', 'BNI', 'COD'] as $method)
                            <label>
                                <input type="radio" name="payment_method" value="{{ $method }}" class="peer sr-only" {{ old('payment_method', 'MANDIRI') === $method ? 'checked' : '' }}>
                                <span class="flex min-h-11 cursor-pointer items-center justify-center border border-neutral-300 px-3 text-[10px] font-semibold peer-checked:border-neutral-950 peer-checked:bg-neutral-950 peer-checked:text-white">{{ $method }}</span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>
            </form>
        </section>

        <aside class="h-fit border border-neutral-300 p-4 sm:p-6 lg:sticky lg:top-6">
            <h2 class="border-b border-neutral-200 pb-4 text-sm font-semibold">Order summary ({{ count($cartItems) }})</h2>
            <div class="divide-y divide-neutral-200">
                @foreach ($cartItems as $item)
                    <article class="flex gap-3 py-4">
                        <div class="flex h-16 w-14 shrink-0 items-center justify-center overflow-hidden bg-neutral-100">
                            @if ($item['image'])
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="h-full w-full object-cover">
                            @else
                                <span class="text-lg text-neutral-400">{{ mb_substr($item['name'], 0, 1) }}</span>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1 text-xs">
                            <h3 class="font-medium">{{ $item['name'] }}</h3>
                            <p class="mt-1 text-[10px] text-neutral-500">Size {{ $item['size'] }} · {{ $item['color'] }} · Qty {{ $item['quantity'] }}</p>
                            <p class="mt-2 font-semibold">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="space-y-3 border-t border-neutral-200 pt-4 text-xs">
                <div class="flex justify-between"><span>Subtotal</span><span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span></div>
                <div class="flex justify-between"><span>Shipping</span><span>Rp {{ number_format($shipping, 0, ',', '.') }}</span></div>
                <div class="flex justify-between border-t border-neutral-200 pt-4 text-sm font-semibold"><span>Total</span><span>Rp {{ number_format($total, 0, ',', '.') }}</span></div>
            </div>
            <button type="submit" form="checkout-form" class="mt-5 w-full bg-neutral-950 px-5 py-4 text-[10px] font-semibold uppercase tracking-[0.14em] text-white transition hover:bg-neutral-700">Place order</button>
            <a href="{{ route('keranjang') }}" class="mt-4 block text-center text-[10px] font-semibold uppercase tracking-[0.12em] text-neutral-500 underline underline-offset-4">Back to cart</a>
        </aside>
    </main>
@endsection
