<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class JenisRoti extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [
        'id',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'jenis_id');
    }
}
