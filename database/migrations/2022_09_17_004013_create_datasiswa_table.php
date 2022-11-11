<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasiswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nis')->unique();
            $table->string('nama')->NULL;
            $table->string('kelas')->NULL;
            $table->enum('jk', ['Laki-Laki', 'Perempuan'])->NULL;
            $table->date('ttl')->NULL;
            $table->string('alamat')->NULL;
            $table->string('walimurid')->NULL;
            $table->string('telepon')->NULL;
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
        Schema::dropIfExists('datasiswa');
    }
};
