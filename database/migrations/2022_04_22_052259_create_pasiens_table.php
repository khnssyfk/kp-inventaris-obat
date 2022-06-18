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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->string('no_rekam_medis')->nullable()->primary();
            $table->string('nama')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->foreignId('role_id')->default(3);
            $table->string('pekerjaan')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('no_hp')->unique()->nullable();
            $table->string('email')->unique()->nullable();
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
        Schema::dropIfExists('pasiens');
    }
};
