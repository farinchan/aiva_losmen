<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class KonfirmasiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'konfirmasi_pembayaran';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }

    public function getBuktiTransfer()
    {
        return Storage::url($this->bukti_transfer);
    }
}
