<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisObat extends Model
{
    use HasFactory;

    public function dataobat(){
        return $this->belongsTo(DataObat::class);
    }
    protected $primaryKey = 'kode_jenis';
    protected $keyType = 'string';


    protected $fillable = [
        'jenis_obat','keterangan','kode_jenis'
    ];
    // public $incrementing = true;
}
