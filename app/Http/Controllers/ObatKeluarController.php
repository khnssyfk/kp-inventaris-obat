<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\DataObat;
use App\Models\ObatKeluar;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreObatKeluarRequest;
use App\Http\Requests\UpdateObatKeluarRequest;

class ObatKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('obat-keluar.index',[
            'title'=>'Obat Keluar'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat-keluar.create',[
            'title'=>'Tambah Data Obat Keluar',
            'dataobats'=>DataObat::all(),
            'pasiens'=>Pasien::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreObatKeluarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObatKeluarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(ObatKeluar $obatKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(ObatKeluar $obatKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateObatKeluarRequest  $request
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateObatKeluarRequest $request, ObatKeluar $obatKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObatKeluar  $obatKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObatKeluar $obatKeluar)
    {
        //
    }

    public function getDataMasuk($id=""){
        $columns = DB::table('pasiens')->where('no_rekam_medis', $id)->first();
        return response()->json([
           'nama' => $columns->nama,
        ]);

    }
}
