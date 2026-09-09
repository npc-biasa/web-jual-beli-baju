<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pesanan extends Model
{
    protected $table = 'pesanans';

    protected $primaryKey = 'id_pesanan';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function detail_pesanans(): HasMany
    {
        return $this->hasMany(detail_pesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function pembayarans(): HasOne
    {
        return $this->hasOne(pembayarans::class, 'id_pesanan', 'id_pesanan');
    }

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
