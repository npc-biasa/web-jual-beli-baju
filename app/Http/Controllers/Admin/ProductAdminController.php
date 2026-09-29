<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Baju;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductAdminController extends Controller
{
    public function index(): View
    {
        return view('admin.products-catalog', [
            'products' => Baju::query()->latest()->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.products-create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_baju' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:5000000'],
            'kategori' => ['required', 'string', 'max:100'],
            'harga' => ['required', 'numeric', 'min:0', 'max:9999999999'],
            'stok' => ['required', 'integer', 'min:0'],
            'ukuran' => ['required', 'string', 'max:255'],
            'warna' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $validated['gambar_data'] = base64_encode($image->getContent());
            $validated['gambar_mime'] = $image->getMimeType();
        }

        Baju::query()->create($validated);

        return redirect()->route('admin.products.index')->with('status', 'Produk berhasil ditambahkan.');
    }
}
