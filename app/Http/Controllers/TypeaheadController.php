<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use Illuminate\Http\Request;

class TypeaheadController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
 
    public function autocompleteSearch(Request $request)
    {
        $data = DataObat::select("nama_obat")
                    ->where('nama_obat', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();

        return response()->json($data);
    }
}
