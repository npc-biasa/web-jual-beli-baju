@extends('utama.layout')

@section('title', 'Register | FTH')

@section('content')
    <main class="min-h-[70vh] px-5 py-12 sm:py-16">
        <section class="mx-auto max-w-md">
            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-neutral-500">Join FTH</p>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight">Buat akun</h1>
            @if ($errors->any())
                <div class="mt-5 border border-red-300 bg-red-50 px-4 py-3 text-xs text-red-800">{{ $errors->first() }}</div>
            @endif
            <form action="{{ route('register') }}" method="POST" class="mt-7 space-y-5">
                @csrf
                <div>
                    <label for="name" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Name</label>
                    <input id="name" name="name" value="{{ old('name') }}" autocomplete="name" required maxlength="255" class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
                <div>
                    <label for="email" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
                <div>
                    <label for="password" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required minlength="8" class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
                <div>
                    <label for="password_confirmation" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Confirm password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required minlength="8" class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
                <button type="submit" class="w-full bg-neutral-950 px-5 py-3.5 text-[10px] font-semibold uppercase tracking-[0.14em] text-white hover:bg-neutral-700">Create account</button>
            </form>
            <p class="mt-6 text-center text-xs text-neutral-600">Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-neutral-950 underline underline-offset-4">Login</a></p>
        </section>
    </main>
@endsection