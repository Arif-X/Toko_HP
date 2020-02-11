<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_pembeli');
            $table->string('jenis_pembayaran');
            $table->string('nama');
            $table->string('alamat');
            $table->string('email_or_rek');
            $table->string('bukti');
            $table->string('kode_pos');
            $table->string('no_hp');
            $table->string('jumlah_dibayar');
            $table->string('status');
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
        Schema::dropIfExists('checkouts');
    }
}
