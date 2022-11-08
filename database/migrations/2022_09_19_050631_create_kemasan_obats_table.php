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
        Schema::create('kemasan_obats', function (Blueprint $table) {
            $table->string('kode_kemasan')->primary();
            $table->string('keterangan');
            $table->string('bentuk_obat_id');
            $table->foreign('bentuk_obat_id')->nullable()->references('kode_bentuk')->on('bentuk_obats')->onDelete('cascade');
            $table->integer('jumlah')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kemasan_obats');
    }
};
