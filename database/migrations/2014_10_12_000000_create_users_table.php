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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('name');
            $table->string('level');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
=======
            $table->date('tglbim')->nullable();
             $table->string('name');
             $table->string('kelas')->nullable();
             $table->text('bimbingan')->nullable();
             $table->text('tanggapan')->nullable();
             $table->text('keterangan')->nullable();
             $table->string('level');
             $table->string('email')->unique();
             $table->timestamp('email_verified_at')->nullable();
             $table->string('password');
             $table->rememberToken();
             $table->timestamps();
         });
>>>>>>> df2a529e8ba7cc112d0aa55b865966d5c9b8b95c
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
