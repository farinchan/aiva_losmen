<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';

    protected $guarded = ['id_pelanggan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'pelanggan_id', 'id_pelanggan');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'pelanggan_id', 'id_pelanggan');
    }

    public function getFoto()
    {
        return $this->foto ? Storage::url($this->foto) : 'https://ui-avatars.com/api/?background=000C32&color=fff&name=' . urlencode($this->nama);
    }
}
