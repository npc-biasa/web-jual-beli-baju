<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | FTH</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white font-sans text-neutral-950">
    <div class="flex min-h-screen w-full flex-col overflow-hidden bg-white">
        <header class="flex h-14 shrink-0 items-center justify-between border-b border-neutral-200 px-4 sm:px-6">
            <button type="button" onclick="history.back()" aria-label="Go back" class="flex h-8 w-8 items-center justify-center text-lg transition hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-950">
                <span aria-hidden="true">&#8592;</span>
            </button>
            <a href="{{ url('/') }}" class="text-xl font-black italic tracking-[-0.16em]">FTH</a>
            <span class="h-8 w-8" aria-hidden="true"></span>
        </header>

        <div class="flex min-h-0 flex-1 flex-col md:flex-row">
            @include('admin.sidebar')
            <main class="min-w-0 flex-1 px-4 py-7 sm:px-8 sm:py-9 lg:px-12">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>