<?php

namespace App\Http\Controllers;

use App\Models\ObatMasukTemp;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreObatMasukTempRequest;
use App\Http\Requests\UpdateObatMasukTempRequest;

class ObatMasukTempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreObatMasukTempRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObatMasukTempRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObatMasukTemp  $obatMasukTemp
     * @return \Illuminate\Http\Response
     */
    public function show(ObatMasukTemp $obatMasukTemp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObatMasukTemp  $obatMasukTemp
     * @return \Illuminate\Http\Response
     */
    public function edit(ObatMasukTemp $obatMasukTemp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateObatMasukTempRequest  $request
     * @param  \App\Models\ObatMasukTemp  $obatMasukTemp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateObatMasukTempRequest $request, ObatMasukTemp $obatMasukTemp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObatMasukTemp  $obatMasukTemp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        // DB::table('obat_masuk_temps')->destroy($id);
        ObatMasukTemp::destroy($id);
        Alert::success('Sukses', 'Data Berhasil Dihapus!');
        return redirect('/obat-masuk/create');
    }
}
