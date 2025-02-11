<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tb_level', function (Blueprint $table) {
            $table->increments('id_level');
            $table->string('nama_level', 50);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_level');
    }
};
