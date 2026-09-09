@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
                <div id="overview" class="mx-auto max-w-6xl">
                    <div class="mb-6 flex items-end justify-between gap-4">
                        <div>
                            <p class="mb-1 text-[10px] uppercase tracking-[0.2em] text-neutral-500">Overview</p>
                            <h1 class="text-xl font-semibold tracking-tight sm:text-2xl">Store Analytics</h1>
                        </div>
                        <p class="hidden text-right text-[11px] text-neutral-500 sm:block">Thursday, 27 August 2026</p>
                    </div>

                    <section aria-label="Store metrics" class="mb-9 grid gap-3 sm:grid-cols-3">
                        <article class="border border-neutral-400 p-4 transition hover:border-neutral-950 hover:shadow-[3px_3px_0_#171717]">
                            <p class="text-[10px] text-neutral-500">Total Revenue</p>
                            <p class="mt-1 text-lg font-bold tracking-tight">Rp 15.420.000</p>
                        </article>
                        <article class="border border-neutral-400 p-4 transition hover:border-neutral-950 hover:shadow-[3px_3px_0_#171717]">
                            <p class="text-[10px] text-neutral-500">New Orders</p>
                            <p class="mt-1 text-lg font-bold tracking-tight">24 Items</p>
                        </article>
                        <article class="border border-neutral-400 p-4 transition hover:border-neutral-950 hover:shadow-[3px_3px_0_#171717]">
                            <p class="text-[10px] text-neutral-500">Low Stock Alerts</p>
                            <p class="mt-1 text-lg font-bold tracking-tight">3 Products</p>
                        </article>
                    </section>

                    <section id="orders" aria-labelledby="transactions-heading">
                        <div class="mb-3 flex items-center justify-between gap-4">
                            <h2 id="transactions-heading" class="text-sm font-semibold">Recent Transactions</h2>
                            <a href="#orders" class="text-[11px] text-neutral-500 underline underline-offset-4 transition hover:text-neutral-950">View all</a>
                        </div>
                        <div class="overflow-x-auto border border-neutral-400">
                            <table class="w-full min-w-[680px] border-collapse text-left text-[11px]">
                                <thead class="border-b border-neutral-400 bg-neutral-50 text-[9px] font-semibold uppercase tracking-wide">
                                    <tr>
                                        <th scope="col" class="px-3 py-3">Order ID</th>
                                        <th scope="col" class="px-3 py-3">Customer Name</th>
                                        <th scope="col" class="px-3 py-3">Items</th>
                                        <th scope="col" class="px-3 py-3">Total Payment</th>
                                        <th scope="col" class="px-3 py-3">Status</th>
                                        <th scope="col" class="px-3 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-neutral-200">
                                    <tr class="transition hover:bg-neutral-50">
                                        <td class="whitespace-nowrap px-3 py-3 text-neutral-600">#FTH-0912</td>
                                        <td class="px-3 py-3">Andi Saputra</td>
                                        <td class="px-3 py-3">Grey Cropped Sleeve T-Shirt</td>
                                        <td class="whitespace-nowrap px-3 py-3">Rp 150.000</td>
                                        <td class="px-3 py-3"><span class="font-bold uppercase">Paid</span></td>
                                        <td class="px-3 py-3"><button type="button" class="border border-neutral-950 bg-neutral-950 px-4 py-1 text-[10px] text-white transition hover:bg-white hover:text-neutral-950 focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2">Process</button></td>
                                    </tr>
                                    <tr class="transition hover:bg-neutral-50">
                                        <td class="whitespace-nowrap px-3 py-3 text-neutral-600">#FTH-0911</td>
                                        <td class="px-3 py-3">Budi Santoso</td>
                                        <td class="px-3 py-3">Black Oversized Hoodie</td>
                                        <td class="whitespace-nowrap px-3 py-3">Rp 350.000</td>
                                        <td class="px-3 py-3"><span class="font-bold uppercase text-neutral-500">Pending</span></td>
                                        <td class="px-3 py-3"><button type="button" class="border border-neutral-400 px-4 py-1 text-[10px] transition hover:border-neutral-950 hover:bg-neutral-950 hover:text-white focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2">View</button></td>
                                    </tr>
                                    <tr class="transition hover:bg-neutral-50">
                                        <td class="whitespace-nowrap px-3 py-3 text-neutral-600">#FTH-0910</td>
                                        <td class="px-3 py-3">Siti Aminah</td>
                                        <td class="px-3 py-3">Vintage Denim Jacket</td>
                                        <td class="whitespace-nowrap px-3 py-3">Rp 420.000</td>
                                        <td class="px-3 py-3"><span class="font-bold uppercase text-neutral-500">Shipped</span></td>
                                        <td class="px-3 py-3"><button type="button" class="border border-neutral-400 px-4 py-1 text-[10px] transition hover:border-neutral-950 hover:bg-neutral-950 hover:text-white focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2">Track</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section id="products" class="sr-only" aria-label="Products catalog">Products Catalog</section>
                </div>
            @endsection
      