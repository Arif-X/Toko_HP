<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_pemesan');
            $table->string('id_barang');
            $table->string('nama_barang');
            $table->string('foto');
            $table->string('warna');
            $table->string('penggunaan');
            $table->string('harga_satuan');
            $table->string('jumlah_barang');                        
            $table->string('total_harga');
            $table->string('status')->default('Belum Terbayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
