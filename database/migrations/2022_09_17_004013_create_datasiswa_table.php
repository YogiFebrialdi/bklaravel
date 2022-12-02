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
<<<<<<< HEAD
            $table->string('kelas')->nullable();
=======
            $table->bigInteger('kelas_id');
>>>>>>> df2a529e8ba7cc112d0aa55b865966d5c9b8b95c
            $table->enum('jk', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->date('ttl')->nullable();
            $table->string('alamat')->nullable();
            $table->string('walimurid')->nullable();
            $table->string('telepon')->nullable();
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
