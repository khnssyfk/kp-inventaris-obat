<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Pasien;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     // 'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded =['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //satu user memiliki 1 role
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }
    // public function dokter(){
    //     return $this->belongsTo(Dokter::class);
    // }
}