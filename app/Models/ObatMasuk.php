<?php

namespace App\Models;

use App\Models\DataObat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ObatMasuk extends Model
{
    use HasFactory;

    protected $table = 'obat_masuk';

    protected $fillable = [
        'kode_transaksi'
    ];

    //satu obat masuk memiliki satu kode obat
    public function dataobat(){
        return $this->belongsTo(DataObat::class,'data_obat_id');
    }
}
