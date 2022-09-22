<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KemasanObat extends Model
{
    use HasFactory;
    public function dataobat(){
        return $this->belongsTo(DataObat::class);
    }
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        'id','keterangan','jumlah'
    ];
}
