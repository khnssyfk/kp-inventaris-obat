<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use App\Models\StokObat;
use App\Models\ObatMasuk;
use App\Http\Requests\StoreStokObatRequest;
use App\Http\Requests\UpdateStokObatRequest;

class StokObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('stok-obat.index',[
            'title'=>'Stok Obat',
            'dataobats'=>DataObat::orderBy('jumlah','desc')->get()
        ]);
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
     * @param  \App\Http\Requests\StoreStokObatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStokObatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StokObat  $stokObat
     * @return \Illuminate\Http\Response
     */
    public function show(StokObat $stokObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StokObat  $stokObat
     * @return \Illuminate\Http\Response
     */
    public function edit(StokObat $stokObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStokObatRequest  $request
     * @param  \App\Models\StokObat  $stokObat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStokObatRequest $request, StokObat $stokObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StokObat  $stokObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(StokObat $stokObat)
    {
        //
    }
}
