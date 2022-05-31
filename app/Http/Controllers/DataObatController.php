<?php

namespace App\Http\Controllers;
use App\Models\DataObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DataObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nama-obat.index',[
            'title'=>'Nama Obat',
            'data_obats'=>DataObat::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nama-obat.create',[
            'title'=>'Tambah Obat Baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required|max:255',
            'satuan'=>'required'
        ]);
        
        
        $id = IdGenerator::generate(['table' => 'data_obats','field'=>'id' ,'length' => 10, 'prefix' =>'OBT-']);
        // dd($validatedData);
        DB::table('data_obats')->insert(['id'=>$id,'nama_obat'=>$validatedData['nama_obat'],'satuan'=>$validatedData['satuan']]);

        // $request->session()->flash('success','Registration successful! Please Login');
        Alert::success('Sukses', 'Obat Berhasil Ditambah!');
        return redirect('/nama-obat');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataObat  $dataObat
     * @return \Illuminate\Http\Response
     */
    public function show(DataObat $dataObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataObat  $dataObat
     * @return \Illuminate\Http\Response
     */
    public function edit(DataObat $dataObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataObat  $dataObat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataObat $dataObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataObat  $dataObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataObat $dataObat)
    {
        //
    }
}
