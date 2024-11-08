<?php

// app/Models/Pesanan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['pelanggan_id', 'menu_id', 'jumlah', 'total_harga'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

