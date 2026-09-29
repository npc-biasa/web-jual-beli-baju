@extends('utama.layout')

@section('title', 'Login | FTH')

@section('content')
    <main class="min-h-[70vh] px-5 py-12 sm:py-16">
        <section class="mx-auto max-w-md">
            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-neutral-500">Your account</p>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight">Login</h1>
            <p class="mt-2 text-sm text-neutral-600">Login untuk melanjutkan checkout dan melihat pesananmu.</p>
            @if ($errors->any())
                <p class="mt-5 border border-red-300 bg-red-50 px-4 py-3 text-xs text-red-800">{{ $errors->first() }}</p>
            @endif
            <form action="{{ route('login') }}" method="POST" class="mt-7 space-y-5">
                @csrf
                <div>
                    <label for="email" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
                <div>
                    <label for="password" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
                <label class="flex items-center gap-2 text-xs text-neutral-600"><input type="checkbox" name="remember" value="1" class="accent-black"> Remember me</label>
                <button type="submit" class="w-full bg-neutral-950 px-5 py-3.5 text-[10px] font-semibold uppercase tracking-[0.14em] text-white hover:bg-neutral-700">Login</button>
            </form>
            <p class="mt-6 text-center text-xs text-neutral-600">Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-neutral-950 underline underline-offset-4">Daftar</a></p>
        </section>
    </main>
@endsection