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
        Schema::create('obat_masuk_temps', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->date('tgl_masuk');
            $table->string('data_obat_id');
            $table->foreign('data_obat_id')->nullable()->references('kode_obat')->on('data_obats')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('total');
            $table->integer('harga');
            $table->string('supplier_obat_id');
            $table->foreign('supplier_obat_id')->nullable()->references('kode_supplier')->on('supplier_obats')->onDelete('cascade');
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
        Schema::dropIfExists('obat_masuk_temps');
    }
};
