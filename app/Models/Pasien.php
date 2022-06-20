<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use App\Models\ObatKeluar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    // use HasFactory;
    // public function getIdByRole(){
    //     const $id = User::where('role_id', '3')->first()->id;
    //     alert
    // };

    protected $primaryKey = 'no_rekam_medis';
    public $incrementing = false;
    protected $keyType = 'string';

    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function obatkeluar(){
        return $this->hasMany(ObatKeluar::class);
    }
    
}
