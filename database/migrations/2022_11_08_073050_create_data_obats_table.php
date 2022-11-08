<?php

use App\Models\JenisObat;
use App\Models\KemasanObat;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('stok_obat')->default(0);
            $table->string('jenis_obat_id');
            $table->foreign('jenis_obat_id')->nullable()->references('kode_jenis')->on('jenis_obats')->onDelete('cascade');
            $table->string('merk_obat')->nullable();
            $table->string('kemasan_obat_id');
            $table->foreign('kemasan_obat_id')->nullable()->references('kode_kemasan')->on('kemasan_obats')->onDelete('cascade');
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
