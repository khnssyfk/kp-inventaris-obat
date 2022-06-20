<?php

namespace App\Models;

use App\Models\ObatMasuk;
use App\Models\ObatMasukTemp;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataObat extends Model
{
    // use HasFactory;
    // protected $guarded =['id'];
    protected $fillable = [
        'kode_obat','nama_obat','satuan'
    ];
    // public $incrementing = true;
    public $timestamps = false;

    protected $table = 'data_obats';
    protected $primaryKey = 'kode_obat';
    protected $keyType = 'string';
    // protected $primaryKey = 'kode_obat';

    //satu dataobat memiliki banyak obat masuk
    public function obatmasuk(){
        return $this->hasMany(ObatMasuk::class);
    }
    public function obatmasuktemp(){
        return $this->hasMany(ObatMasukTemp::class);
    }
    public function obatkeluar(){
        return $this->hasMany(ObatKeluar::class);
    }
    public function obatkeluartemp(){
        return $this->hasMany(ObatKeluarTemp::class);
    }
    // public function getLokasi($id = '')
    // {
    //     $results = DB::table('data_obats')
    //         ->select('kode_obat', 'nama_obat', 'satuan')->where('id', $id)->get();
    //     return $results;
    // }



}
