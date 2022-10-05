<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasukTemp extends Model
{
    use HasFactory;

    protected $fillable = ['kode_transaksi','tgl_masuk','data_obat_id','jumlah','harga','supplier_obat_id','expired','total'];
    
    public function dataobat(){
        return $this->belongsTo(DataObat::class,'data_obat_id');
    }

    public function supplier(){
        return $this->belongsTo(SupplierObat::class,'supplier_obat_id');
    }

}
