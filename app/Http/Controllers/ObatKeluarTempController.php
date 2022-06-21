<?php

namespace App\Http\Controllers;

use App\Models\ObatKeluarTemp;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreObatKeluarTempRequest;
use App\Http\Requests\UpdateObatKeluarTempRequest;

class ObatKeluarTempController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreObatKeluarTempRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObatKeluarTempRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObatKeluarTemp  $obatKeluarTemp
     * @return \Illuminate\Http\Response
     */
    public function show(ObatKeluarTemp $obatKeluarTemp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObatKeluarTemp  $obatKeluarTemp
     * @return \Illuminate\Http\Response
     */
    public function edit(ObatKeluarTemp $obatKeluarTemp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateObatKeluarTempRequest  $request
     * @param  \App\Models\ObatKeluarTemp  $obatKeluarTemp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateObatKeluarTempRequest $request, ObatKeluarTemp $obatKeluarTemp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObatKeluarTemp  $obatKeluarTemp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObatKeluarTemp $obatKeluarTemp)
    {
        // dd($obatKeluarTemp->id);
        ObatKeluarTemp::destroy($obatKeluarTemp->id);
        Alert::success('Sukses', 'Data Berhasil Dihapus!');
        return redirect('/obat-keluar/create');
    }
}
