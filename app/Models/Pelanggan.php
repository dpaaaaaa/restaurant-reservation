<?php
// app/Models/Pelanggan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'telepon'];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}

