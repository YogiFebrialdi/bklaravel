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
            $table->string('nama')->nullable();
            $table->string('kelas')->nullable();
            $table->enum('jk', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->date('ttl')->nullable();
            $table->string('alamat')->nullable();
            $table->string('walimurid')->nullable();
            $table->string('telepon')->nullable();
            $table->string('bentuk pelanggaran')->nullable();
            $table->string('bobot')->nullable();
            $table->string('oleh')->nullable();
            $table->date('tgl')->nullable();
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
