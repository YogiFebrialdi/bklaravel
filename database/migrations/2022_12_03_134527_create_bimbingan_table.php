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
        Schema::create('bimbingan', function (Blueprint $table) {
            $table->id();
            $table->integer("siswa_id");
            $table->text("bimbingan");
            $table->text("tanggapan")->nullable();
            $table->tinyInteger("status");
            $table->date("tanggal_bimbingan");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bimbingan');
    }
};
