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

    protected $fillable = [
        'kode_supplier','nama_supplier','alamat','no_hp'
    ];
}
