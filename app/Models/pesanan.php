<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table = 'pesanans';

    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
        'id_pesanan',
        'id_user',
        'tanggal_chekout',
        'ongkos_kirim',
        'total_harga',
        'status_pesanan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_chekout' => 'datetime',
            'ongkos_kirim' => 'integer',
            'total_harga' => 'integer',
        ];
    }


}
