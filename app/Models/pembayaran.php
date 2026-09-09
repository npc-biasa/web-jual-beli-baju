<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $primaryKey = 'id_pembayaran';

    public function pesanans(): BelongsTo
    {
        return $this->belongsTo(pesanans::class, 'id_pesanan', 'id_pesanan');
    }

    protected $fillable = [
        'id_pembayaran',
        'id_pesanan',
        'metode_pembayaran',
        'status_pembayaran',
        'tanggal_pembayaran',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_pembayaran' => 'datetime',
        ];
    }
}
