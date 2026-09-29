<aside class="w-full shrink-0 border-b border-neutral-200 bg-neutral-50 md:w-56 md:border-b-0 md:border-r md:border-neutral-200">
    <nav aria-label="Admin navigation" class="flex gap-1 overflow-x-auto p-3 md:flex-col md:gap-2 md:p-4">
        <a href="{{ route('admin.dashboard') }}" class="whitespace-nowrap px-3 py-2 text-[11px] transition hover:bg-neutral-200 hover:text-neutral-950 focus:outline-none focus:ring-2 focus:ring-neutral-950 {{ request()->routeIs('admin.dashboard') ? 'border border-neutral-950 bg-white font-semibold text-neutral-950' : 'text-neutral-600' }}">Dashboard Overview</a>
        <a href="{{ route('admin.manage-orders') }}" class="whitespace-nowrap px-3 py-2 text-[11px] transition hover:bg-neutral-200 hover:text-neutral-950 focus:outline-none focus:ring-2 focus:ring-neutral-950 {{ request()->routeIs('admin.manage-orders') ? 'border border-neutral-950 bg-white font-semibold text-neutral-950' : 'text-neutral-600' }}">Manage Orders</a>
        <a href="{{ route('admin.products.index') }}" class="whitespace-nowrap px-3 py-2 text-[11px] transition hover:bg-neutral-200 hover:text-neutral-950 focus:outline-none focus:ring-2 focus:ring-neutral-950 {{ request()->routeIs('admin.products.*') ? 'border border-neutral-950 bg-white font-semibold text-neutral-950' : 'text-neutral-600' }}">Products Catalog</a>
    </nav>
</aside>
