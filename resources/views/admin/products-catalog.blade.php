@extends('admin.layout')

@section('title', 'Products Catalog')

@section('content')
                <div class="mx-auto max-w-6xl">
                    <div class="mb-6 flex items-center justify-between gap-4">
                        <div>
                            <p class="mb-1 text-[10px] uppercase tracking-[0.2em] text-neutral-500">Catalog</p>
                            <h1 class="text-xl font-semibold tracking-tight sm:text-2xl">Products Catalog</h1>
                        </div>
                        <button type="button" class="inline-flex items-center gap-2 border border-neutral-950 bg-neutral-950 px-3 py-2 text-[10px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-white hover:text-neutral-950 focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2">
                            <span class="text-base leading-none">+</span>
                            Add New Product
                        </button>
                    </div>

                    <section aria-label="Products catalog table" class="overflow-x-auto border border-neutral-400 bg-white">
                        <table class="w-full min-w-[760px] border-collapse text-left text-[11px]">
                            <thead class="border-b border-neutral-400 bg-neutral-50 text-[9px] font-semibold uppercase tracking-wide">
                                <tr>
                                    <th scope="col" class="px-3 py-3">Product</th>
                                    <th scope="col" class="px-3 py-3">SKU</th>
                                    <th scope="col" class="px-3 py-3">Price</th>
                                    <th scope="col" class="px-3 py-3">Stock</th>
                                    <th scope="col" class="px-3 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                <tr class="transition hover:bg-neutral-50">
                                    <td class="px-3 py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-md border border-neutral-200 bg-[#f1f1f1]">
                                                <div class="h-5 w-5 rounded-sm bg-red-500"></div>
                                            </div>
                                            <div class="font-medium text-neutral-900">Grey Cropped Sleeve T-Shirt</div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3 text-neutral-600">FTH-TS-001</td>
                                    <td class="px-3 py-3 whitespace-nowrap">Rp 100.000</td>
                                    <td class="px-3 py-3">
                                        <span class="inline-flex min-w-[80px] justify-center border border-neutral-300 px-2 py-1 text-neutral-700">120 Pcs</span>
                                    </td>
                                    <td class="px-3 py-3">
                                        <button type="button" class="border border-neutral-400 px-4 py-1 text-[10px] transition hover:border-neutral-950 hover:bg-neutral-950 hover:text-white focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2">
                                            Edit
                                        </button>
                                    </td>
                                </tr>

                                <tr class="transition hover:bg-neutral-50">
                                    <td class="px-3 py-3">
                                        <div class="flex items-center gap-3">
                                            <div class="flex h-10 w-10 items-center justify-center overflow-hidden rounded-md border border-neutral-200 bg-[#f1f1f1]">
                                                <div class="h-5 w-5 rounded-sm bg-neutral-950"></div>
                                            </div>
                                            <div>
                                                <div class="font-medium text-neutral-900">Black Oversized Hoodie</div>
                                                <div class="text-[10px] text-neutral-500">Black</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3 text-neutral-600">FTH-HD-002</td>
                                    <td class="px-3 py-3 whitespace-nowrap">Rp 100.000</td>
                                    <td class="px-3 py-3">
                                        <span class="inline-flex min-w-[80px] justify-center border border-red-300 bg-red-50 px-2 py-1 text-[10px] font-medium text-red-600">3 Pcs (Low)</span>
                                    </td>
                                    <td class="px-3 py-3">
                                        <button type="button" class="border border-neutral-400 px-4 py-1 text-[10px] transition hover:border-neutral-950 hover:bg-neutral-950 hover:text-white focus:outline-none focus:ring-2 focus:ring-neutral-950 focus:ring-offset-2">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>
                </div>
@endsection
