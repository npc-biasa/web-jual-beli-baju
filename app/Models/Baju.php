<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Baju extends Model
{
    protected $table = 'baju';

    protected $primaryKey = 'id_baju';

    public function keranjangs(): HasMany
    {
        return $this->hasMany(keranjang::class, 'id_baju', 'id_baju');
    }

    public function detail_pesanans(): HasMany
    {
        return $this->hasMany(detail_pesanan::class, 'id_baju', 'id_baju');
    }

    protected $fillable = [
        'nama_baju',
        'deskripsi',
        'harga',
        'stok',
        'kategori',
        'ukuran',
        'warna',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'decimal:2',
            'stok' => 'integer',
        ];
    }
}
