<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = "pengirimans";

    protected $fillable = ['id_checkout', 'resi', 'link_resi'];
}
