<?php

namespace App\Models;

use App\Models\DataObat;
use App\Models\SupplierObat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ObatMasuk extends Model
{
    use HasFactory;

    protected $table = 'obat_masuk';

    protected $fillable = [
        'kode_transaksi','tgl_masuk','data_obat_id','jumlah','harga','supplier_obat_id','expired','total'
    ];

    //satu obat masuk memiliki satu kode obat
    public function dataobat(){
        return $this->belongsTo(DataObat::class,'data_obat_id');
    }
    public function supplier(){
        return $this->belongsTo(SupplierObat::class,'supplier_obat_id');
    }
}
