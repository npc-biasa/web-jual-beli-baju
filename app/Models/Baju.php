<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baju extends Model
{
    protected $table = 'baju';

    protected $primaryKey = 'id_baju';

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
