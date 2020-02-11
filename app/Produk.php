<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produks";

    protected $fillable = ['merek', 'tipe', 'gambar', 'harga', 'warna1', 'warna2','warna3', 'penggunaan', 'keterangan'];
}
