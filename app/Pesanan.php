<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = "pesanans";

    protected $fillable = ['id_pemesan', 'id_barang', 'nama_barang', 'foto', 'warna', 'penggunaan', 'harga_satuan', 'jumlah_barang', 'total_harga'];
}
