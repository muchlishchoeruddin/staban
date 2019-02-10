<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->increments('id_pemesanan');
            $table->string('kode_pemesanan',150)->unique();
            $table->date('tgl_pemesanan');
            $table->integer('id_user');
            $table->string('kode_kursi');
            $table->integer('id_rute');
            $table->string('tujuan');
            $table->date('tgl_berangkat');
            $table->time('jam_berangkat');
            $table->integer('total_bayar');
            $table->enum('status',['y,n']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
