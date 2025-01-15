<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produk extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [
        'id',
    ];

    public function jenis()
    {
        return $this->belongsTo(JenisRoti::class, 'jenis_id');
    }
}
