@extends('admin.layout')

@section('title', 'Add Product')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-7">
            <a href="{{ route('admin.products.index') }}" class="text-[10px] font-semibold uppercase tracking-[0.12em] text-neutral-500 underline underline-offset-4">Back to catalog</a>
            <h1 class="mt-3 text-2xl font-semibold tracking-tight">New Product</h1>
        </div>

        @if ($errors->any())
            <div class="mb-5 border border-red-300 bg-red-50 px-4 py-3 text-xs text-red-800">
                <p class="font-semibold">Periksa kembali data produk.</p>
                <ul class="mt-2 list-inside list-disc">
                    @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 border border-neutral-300 bg-white p-5 sm:p-7">
            @csrf
            <div>
                <label for="nama_baju" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Product name</label>
                <input id="nama_baju" name="nama_baju" value="{{ old('nama_baju') }}" required maxlength="255" class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
            </div>
            <div>
                <label for="deskripsi" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Description</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" required maxlength="5000" class="w-full border border-neutral-300 px-3 py-3 text-sm leading-6 outline-none focus:border-neutral-950">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="kategori" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Category</label>
                    <input id="kategori" name="kategori" value="{{ old('kategori') }}" required maxlength="100" placeholder="T-Shirt" class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
                <div>
                    <label for="harga" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Price (Rp)</label>
                    <input id="harga" name="harga" type="number" min="0" step="1" value="{{ old('harga') }}" required class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
                <div>
                    <label for="stok" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Stock</label>
                    <input id="stok" name="stok" type="number" min="0" step="1" value="{{ old('stok', 0) }}" required class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
                <div>
                    <label for="ukuran" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Sizes</label>
                    <input id="ukuran" name="ukuran" value="{{ old('ukuran') }}" required placeholder="S, M, L, XL" class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
                <div class="sm:col-span-2">
                    <label for="warna" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Colors</label>
                    <input id="warna" name="warna" value="{{ old('warna') }}" required placeholder="Black, White" class="w-full border border-neutral-300 px-3 py-3 text-sm outline-none focus:border-neutral-950">
                </div>
            </div>
            <div>
                <label for="gambar" class="mb-2 block text-[10px] font-semibold uppercase tracking-[0.12em]">Product photo</label>
                <input id="gambar" name="gambar" type="file" accept="image/jpeg,image/png,image/webp" class="block w-full border border-neutral-300 bg-white px-3 py-3 text-xs file:mr-4 file:border-0 file:bg-neutral-950 file:px-3 file:py-2 file:text-[10px] file:font-semibold file:uppercase file:text-white">
                <p class="mt-2 text-[10px] text-neutral-500">JPG, PNG, atau WebP. Maksimal 4 MB.</p>
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-neutral-200 pt-5 sm:flex-row sm:justify-end">
                <a href="{{ route('admin.products.index') }}" class="border border-neutral-300 px-5 py-3 text-center text-[10px] font-semibold uppercase tracking-[0.12em]">Cancel</a>
                <button type="submit" class="bg-neutral-950 px-5 py-3 text-[10px] font-semibold uppercase tracking-[0.12em] text-white hover:bg-neutral-700">Save product</button>
            </div>
        </form>
    </div>
@endsection