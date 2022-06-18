<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasukTemp extends Model
{
    use HasFactory;

    protected $fillable = ['tgl_masuk','dataobat_id','jumlah','harga','nama_apotek','expired'];
    
    public function dataobat(){
        return $this->belongsTo(DataObat::class,'dataobat_id');
    }

}
