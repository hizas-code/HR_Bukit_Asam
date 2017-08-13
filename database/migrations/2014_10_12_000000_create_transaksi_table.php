<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_struk')->unique();
            $table->string('nama_pengambil');
            $table->string('nama_peminta');
            $table->string('satuan_kerja');
            $table->string('barang');
            $table->string('satuan');
            $table->integer('jumlah')->unsigned();
            $table->string('keterangan');
            //$table->foreign('id_permintaan')->references('id')->on('permintaan');
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
        Schema::dropIfExists('transaksi');
    }
}
