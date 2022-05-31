<?php

namespace App\Http\Controllers;

use App\Models\data_obat;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DataObatController extends Controller
{
    public function store(Request $request){

        $id = IdGenerator::generate(['table' => 'data_obat', 'length' => 10, 'prefix' =>'OBT-']);
    
        $data_obat = new data_obat();
        $data_obat->id = $id;
        $data_obat->title = $request->get('title');
        $data_obat->save();
    
    }
}
