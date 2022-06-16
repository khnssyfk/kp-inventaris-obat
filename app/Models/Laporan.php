<?php

namespace App\Models;

use App\Models\DataObat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    public function dataobat(){
        return $this->HasMany(DataObat::class);
    }
}
