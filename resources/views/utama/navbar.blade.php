<header class="relative z-10 flex h-14 items-center justify-between border-b border-neutral-100 bg-white px-5 sm:px-8 lg:px-10">
    <a href="{{ url('/') }}" class="text-[22px] font-black italic leading-none tracking-[-0.18em]">FTH</a>

    <nav class="absolute left-1/2 hidden -translate-x-1/2 items-center gap-8 text-[9px] font-semibold uppercase tracking-[0.08em] md:flex">
        <a href="{{ url('/') }}#new-arrivals" class="transition hover:text-neutral-500">New Arrivals</a>
        <a href="{{ url('/') }}#collections" class="transition hover:text-neutral-500">Collections <span class="ml-1 text-[8px]">⌄</span></a>
        <a href="{{ url('/') }}#trending" class="transition hover:text-neutral-500">Trending</a>
        <a href="{{ url('/') }}#filters" class="transition hover:text-neutral-500">Filters</a>
    </nav>

    <div class="flex items-center gap-4">
        <button type="button" aria-label="Search" class="transition hover:text-neutral-500">
            <svg aria-hidden="true" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4 4"/></svg>
        </button>
        <a href="#account" aria-label="Account" class="transition hover:text-neutral-500">
            <svg aria-hidden="true" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="8" r="3"/><path d="M5.5 20a6.5 6.5 0 0 1 13 0"/></svg>
        </a>
        <a href="#cart" aria-label="Shopping bag" class="relative transition hover:text-neutral-500">
            <svg aria-hidden="true" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M5 8.5h14l-1 11H6l-1-11Z"/><path d="M9 9V6a3 3 0 0 1 6 0v3"/></svg>
            <span class="absolute -right-2 -top-2 text-[8px]">0</span>
        </a>
    </div>
</header>