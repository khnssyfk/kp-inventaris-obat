<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierObat extends Model
{
    use HasFactory;

    public function dataobat(){
        return $this->belongsTo(DataObat::class);
    }
    public function obatmasuk(){
        return $this->hasMany(ObatMasuk::class);
    }
    public function obatmasuktemp(){
        return $this->hasMany(ObatMasuk::class);
    }
    protected $primaryKey = 'kode_supplier';
    protected $keyType = 'string';
    
    protected $fillable = [
        'kode_supplier','nama_supplier','alamat','no_hp'
    ];
}
