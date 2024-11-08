<?php

// app/Models/Pembayaran.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['pesanan_id', 'total_bayar', 'tanggal_bayar', 'metode_pembayaran'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}

