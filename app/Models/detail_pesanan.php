<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_pesanan extends Model
{
    protected $table = 'detail_pesanans';

    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_detail',
        'id_pesanan',
        'id_baju',
        'kuantitas',
        'harga_satuan',
    ];

    protected function casts(): array
    {
        return [
            'kuantitas' => 'integer',
            'harga_satuan' => 'integer',
        ];
    }
}
