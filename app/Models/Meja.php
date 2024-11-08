<?php
// app/Models/Meja.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $fillable = ['nomor_meja', 'kapasitas', 'status'];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}

