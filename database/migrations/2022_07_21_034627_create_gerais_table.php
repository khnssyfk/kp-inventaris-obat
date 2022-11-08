<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('gerais', function (Blueprint $table) {
            $table->id();
            $table->string('tempat');
            $table->string('alamat');
            $table->integer('status');
            $table->string('foto_gerai');
            $table->string('link');
            $table->date('tanggal_tutup');
            $table->integer('closed')->default(0);
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
        Schema::dropIfExists('gerais');
    }
};
