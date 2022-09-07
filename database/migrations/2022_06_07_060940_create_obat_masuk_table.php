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
        Schema::create('obat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->date('tgl_masuk');
            $table->string('data_obat_id')->unsigned;
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('nama_apotek');
            $table->date('expired');
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
        Schema::dropIfExists('_obat_masuk');
    }
};
