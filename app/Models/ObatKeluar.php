<?php

namespace App\Models;

use App\Models\Pasien;
use App\Models\DataObat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ObatKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_resep','tgl_keluar','data_obat_id','pasien_id','jumlah_keluar','dokter_id'
    ];

    public function dataobat(){
        return $this->belongsTo(DataObat::class,'data_obat_id');
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class,'pasien_id');
    }
    public function dokter(){
        return $this->belongsTo(Dokter::class,'dokter_id');
    }
}
