<?php

namespace App\Models;

use App\Models\Pasien;
use App\Models\DataObat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ObatKeluar extends Model
{
    use HasFactory;

    public function dataobat(){
        return $this->belongsTo(DataObat::class,'dataobat_id');
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class,'pasien_id');
    }
}
