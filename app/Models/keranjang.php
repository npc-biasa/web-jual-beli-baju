<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class keranjang extends Model
{
    protected $table = 'keranjangs';

    protected $primaryKey = 'id_keranjang';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function baju(): BelongsTo
    {
        return $this->belongsTo(Baju::class, 'id_baju', 'id_baju');
    }

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
