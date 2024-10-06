<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';
    protected $guarded = ['id'];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id', 'id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id_pelanggan');
    }
}
