<?php

namespace App\Models;

use App\Models\DataObat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dashboard extends Model
{
    use HasFactory;

    public function dataobat(){
        return $this->belongsTo(DataObat::class,'dataobat_id');
    }
}
