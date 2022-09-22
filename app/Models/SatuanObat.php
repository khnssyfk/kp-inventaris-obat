<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanObat extends Model
{
    use HasFactory;

    public function dataobat(){
        return $this->belongsTo(DataObat::class);
    }
    protected $primaryKey = 'kode_satuan';
    protected $keyType = 'string';

    protected $fillable = [
        'kode_satuan','satuan_obat'
    ];
}
