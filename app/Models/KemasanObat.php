<?php

namespace App\Models;

use App\Models\SatuanObat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KemasanObat extends Model
{
    use HasFactory;
    public function dataobat(){
        return $this->belongsTo(DataObat::class);
    }
    public function bentukobat(){
        return $this->belongsTo(BentukObat::class,'bentuk_obat_id');
    }
    protected $keyType = 'string';
    protected $primaryKey = 'kode_kemasan';

    public $timestamps = false;


    protected $fillable = [
        'kode_kemasan','keterangan','jumlah','bentuk_obat_id'
    ];
}
