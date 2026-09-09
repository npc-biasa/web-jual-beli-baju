@extends('admin.layout')

@section('title', 'Manage Orders')

@section('content')
                <div class="mx-auto max-w-6xl">
                    <div class="mb-6 flex items-center justify-between gap-4">
                        <div>
                            <p class="mb-1 text-[10px] uppercase tracking-[0.2em] text-neutral-500">Orders</p>
                            <h1 class="text-xl font-semibold tracking-tight sm:text-2xl">Manage Orders</h1>
                        </div>
                        <p class="hidden text-right text-[11px] text-neutral-500 sm:block">Thursday, 27 August 2026</p>
                    </div>

                    <div class="mb-5 flex items-center justify-between gap-4">
                        <div class="w-full max-w-[320px]">
                            <input
                                type="search"
                                placeholder="Search by Order ID or Name..."
                                class="h-10 w-full border border-neutral-400 bg-white px-3 text-[11px] text-neutral-700 placeholder:text-neutral-500 focus:border-neutral-950 focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2"
                            >
                        </div>
                    </div>

                    <section aria-label="Orders table" class="overflow-x-auto border border-neutral-400 bg-white">
                        <table class="w-full min-w-[760px] border-collapse text-left text-[11px]">
                            <thead class="border-b border-neutral-400 bg-neutral-50 text-[9px] font-semibold uppercase tracking-wide">
                                <tr>
                                    <th scope="col" class="px-3 py-3">Date</th>
                                    <th scope="col" class="px-3 py-3">Order ID</th>
                                    <th scope="col" class="px-3 py-3">Customer</th>
                                    <th scope="col" class="px-3 py-3">Total Payment</th>
                                    <th scope="col" class="px-3 py-3">Status</th>
                                    <th scope="col" class="px-3 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                <tr class="transition hover:bg-neutral-50">
                                    <td class="px-3 py-3 text-neutral-600">12 Aug 2026</td>
                                    <td class="px-3 py-3 text-neutral-600">#FTH-0915</td>
                                    <td class="px-3 py-3">Rizky Pratama</td>
                                    <td class="px-3 py-3 whitespace-nowrap">Rp 250.000</td>
                                    <td class="px-3 py-3">
                                        <span class="inline-flex items-center border border-neutral-300 bg-[#f4e6e6] px-2 py-1 text-[9px] font-bold uppercase tracking-[0.12em] text-neutral-700">
                                            Pending
                                        </span>
                                    </td>
                                    <td class="px-3 py-3">
                                        <button type="button" class="border border-neutral-400 px-4 py-1 text-[10px] transition hover:border-neutral-950 hover:bg-neutral-950 hover:text-white focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2">
                                            Review
                                        </button>
                                    </td>
                                </tr>

                                <tr class="transition hover:bg-neutral-50">
                                    <td class="px-3 py-3 text-neutral-600">12 Aug 2026</td>
                                    <td class="px-3 py-3 text-neutral-600">#FTH-0914</td>
                                    <td class="px-3 py-3">Andi Supriyadi</td>
                                    <td class="px-3 py-3 whitespace-nowrap">Rp 150.000</td>
                                    <td class="px-3 py-3">
                                        <span class="inline-flex items-center bg-neutral-950 px-2 py-1 text-[9px] font-bold uppercase tracking-[0.12em] text-white">
                                            Paid
                                        </span>
                                    </td>
                                    <td class="px-3 py-3">
                                        <button type="button" class="border border-neutral-950 bg-neutral-950 px-4 py-1 text-[10px] text-white transition hover:bg-white hover:text-neutral-950 focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2">
                                            Ship Order
                                        </button>
                                    </td>
                                </tr>

                                <tr class="transition hover:bg-neutral-50">
                                    <td class="px-3 py-3 text-neutral-600">11 Aug 2026</td>
                                    <td class="px-3 py-3 text-neutral-600">#FTH-0913</td>
                                    <td class="px-3 py-3">Siti Aminah</td>
                                    <td class="px-3 py-3 whitespace-nowrap">Rp 420.000</td>
                                    <td class="px-3 py-3">
                                        <span class="inline-flex items-center border border-neutral-300 bg-neutral-100 px-2 py-1 text-[9px] font-bold uppercase tracking-[0.12em] text-neutral-700">
                                            Shipped
                                        </span>
                                    </td>
                                    <td class="px-3 py-3">
                                        <button type="button" class="border border-neutral-400 px-4 py-1 text-[10px] transition hover:border-neutral-950 hover:bg-neutral-950 hover:text-white focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2">
                                            Track
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
                </div>
@endsection
