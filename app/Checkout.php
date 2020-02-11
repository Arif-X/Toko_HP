<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = "checkouts";

    protected $fillable = ['id_pembeli', 'jenis_pembayaran', 'detail_id', 'detail', 'nama', 'alamat', 'email_or_rek', 'bukti', 'kode_pos', 'no_hp', 'jumlah_dibayar', 'status'];
}
