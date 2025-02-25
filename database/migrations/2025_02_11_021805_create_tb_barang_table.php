<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->string('nama_barang', 100);
            $table->date('tgl');
            $table->decimal('harga_awal', 15, 2);
            $table->text('deskripsi_barang')->nullable();
            $table->string('foto')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_barang');
    }
};
