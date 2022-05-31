<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class data_obat extends Model
{
    // use HasFactory;
    protected $fillable = ['id'];
    public $incrementing = false;


    public static function boot(){
    parent::boot();
    self::creating(function ($model) {
        $model->uuid = IdGenerator::generate(['table' => 'data_obat', 'length' => 10, 'prefix' =>'OBT-']);
    });
    }

}
