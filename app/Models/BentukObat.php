<?php

namespace App\Models;

use App\Models\KemasanObat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BentukObat extends Model
{
    use HasFactory;

    public function dataobat(){
        return $this->belongsTo(DataObat::class);
    }
    public function kemasanobat(){
        return $this->belongsTo(KemasanObat::class);
    }
    protected $primaryKey = 'kode_bentuk';
    protected $keyType = 'string';

    protected $fillable = [
        'kode_bentuk','bentuk_obat'
    ];
}
