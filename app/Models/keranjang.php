<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $table = 'keranjangs';

    protected $primaryKey = 'id_keranjang';

    protected $fillable = [
        'id_keranjang',
        'id_user',
        'id_baju',
        'kuantitas',
    ];

    protected function casts(): array
    {
        return [
            'kuantitas' => 'integer',
        ];
    }
}
