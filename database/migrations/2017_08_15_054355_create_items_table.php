<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_transaksi')->signed()->on('transaksi')->onDelete('cascade');
            $table->integer('aqua')->signed();
            $table->integer('gula_pasir')->signed();
            $table->integer('kopi')->signed();
            $table->integer('teh')->signed();
            $table->string('type_aqua');
            $table->string('type_gula_pasir');
            $table->string('type_kopi');
            $table->string('type_teh');
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
        Schema::dropIfExists('items');
    }
}
