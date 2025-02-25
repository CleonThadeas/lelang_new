<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_history_lelang', function (Blueprint $table) {
            $table->increments('id_history');
            $table->unsignedInteger('id_lelang');
            $table->unsignedInteger('id_user');
            $table->decimal('penawaran_harga', 15, 2);
            $table->timestamps();
            // foreign
            $table->foreign('id_lelang')->references('id_lelang')->on('tb_lelang');
            $table->foreign('id_user')->references('id_user')->on('tb_masyarakat');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_history_lelang');
    }
};
