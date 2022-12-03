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
        Schema::create('historypelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string("siswa_id");
            $table->string('kelas');
            $table->bigInteger('benpel_id');
            $table->bigInteger('guru_id');
            $table->date('tgl');
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
        Schema::dropIfExists('historypelanggaran');
    }
};
