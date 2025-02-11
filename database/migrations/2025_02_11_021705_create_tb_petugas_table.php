<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_petugas', function (Blueprint $table) {
            $table->increments('id_petugas');
            $table->string('nama_petugas', 100);
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->unsignedInteger('id_level');
            $table->foreign('id_level')->references('id_level')->on('tb_level');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_petugas');
    }
};
