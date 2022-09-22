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
        Schema::create('data_obats', function (Blueprint $table) {
            // $table->id();
            $table->string('kode_obat')->primary();
            $table->string('nama_obat');
            $table->integer('jumlah')->default(0);
            $table->string('satuan_obat_id');
            $table->string('jenis_obat_id');
            $table->string('kemasan_obat_id');
            $table->string('berat_obat')->default(0);
            $table->string('satuan_berat_obat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_obats');
    }
};
