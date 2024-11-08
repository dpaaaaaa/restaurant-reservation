<?php

// app/Models/Reservasi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = ['pelanggan_id', 'meja_id', 'tanggal_reservasi', 'jumlah_orang', 'status'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
}

