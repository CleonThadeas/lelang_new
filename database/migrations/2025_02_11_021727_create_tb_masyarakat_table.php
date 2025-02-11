<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_masyarakat', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nama_lengkap', 100);
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->string('telp', 15);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_masyarakat');
    }
};
