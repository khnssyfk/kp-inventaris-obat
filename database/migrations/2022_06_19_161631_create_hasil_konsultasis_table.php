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
        Schema::create('hasil_konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('tingkat_kegawatan')->nullable();
            $table->string('jenis_pelayanan')->nullable();
            $table->string('alasan_datang')->nullable();
            $table->string('cara_masuk')->nullable();
            $table->string('tingkat_kesadaran')->nullable();
            $table->string('keadaan_umum')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('skala_nyeri')->nullable();
            $table->string('gcs')->nullable();
            $table->string('tensi_darah')->nullable();
            $table->string('nadi')->nullable();
            $table->string('pernapasan')->nullable();
            $table->string('suhu')->nullable();
            $table->string('spo2')->nullable();
            $table->text('keluhan_utama')->nullable();
            $table->text('anamnesa')->nullable();
            $table->text('riwayat_alergi')->nullable();
            $table->text('riwayat_penyakit_dulu')->nullable();
            $table->text('riwayat_pengobatan')->nullable();
            $table->string('kepala')->nullable();
            $table->string('mata')->nullable();
            $table->string('leher')->nullable();
            $table->string('thorax')->nullable();
            $table->string('abdomen')->nullable();
            $table->string('extremitas')->nullable();
            $table->text('assesment_umum')->nullable();
            $table->text('edukasi_rencana_pengobatan')->nullable();
            $table->string('kesimpulan')->nullable();
            $table->string('tindak_lanjut')->nullable();
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
        Schema::dropIfExists('hasil_konsultasis');
    }
};
