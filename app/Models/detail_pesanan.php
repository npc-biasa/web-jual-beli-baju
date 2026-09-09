<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_pesanan extends Model
{
    protected $table = 'detail_pesanans';

    protected $primaryKey = 'id_detail';

    public function baju(): BelongsTo
    {
        return $this->belongsTo(baju::class, 'id_baju', 'id_baju');
    }

    public function pesanans(): BelongsTo
    {
        return $this->belongsTo(pesanan::class, 'id_pesanan', 'id_pesanan');
    }

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
