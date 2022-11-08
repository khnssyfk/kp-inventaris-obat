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
        Schema::create('obat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('no_resep');
            $table->date('tgl_keluar');
            $table->string('data_obat_id');
            $table->foreign('data_obat_id')->nullable()->references('kode_obat')->on('data_obats')->onDelete('cascade');
            // $table->string('pasien_id');
            $table->foreignId('pasien_id')->nullable()->references('id')->on('pasiens')->onDelete('cascade');
            $table->integer('jumlah_keluar');
            // $table->longText('dosis');
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
        Schema::dropIfExists('obat_keluars');
    }
};
