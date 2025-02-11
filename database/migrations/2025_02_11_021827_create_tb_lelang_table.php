<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_lelang', function (Blueprint $table) {
            $table->increments('id_lelang');
            $table->unsignedInteger('id_barang');
            $table->date('tgl_lelang');
            $table->decimal('harga_akhir', 15, 2)->nullable();
            $table->unsignedInteger('id_user')->nullable();
            $table->unsignedInteger('id_petugas');
            $table->enum('status', ['dibuka','ditutup']);
            // foreign
            $table->foreign('id_barang')->references('id_barang')->on('tb_barang');
            $table->foreign('id_user')->references('id_user')->on('tb_masyarakat');
            $table->foreign('id_petugas')->references('id_petugas')->on('tb_petugas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_lelang');
    }
};
