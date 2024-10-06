<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $guarded = ['id'];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class, 'tipe_id', 'id');
    }

    public function fasilitasKamar()
    {
        return $this->hasMany(FasilitasKamar::class, 'kamar_id', 'id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'kamar_id', 'id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'kamar_id', 'id');
    }
}
