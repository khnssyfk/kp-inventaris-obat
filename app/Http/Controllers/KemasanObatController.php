<?php

namespace App\Http\Controllers;

use App\Models\KemasanObat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class KemasanObatController extends Controller
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
        return view('kemasan-obat.create',[
            'title'=>'Tambah Kemasan Obat',
            'kemasan_obats'=>KemasanObat::all()
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
        // dd($request);
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'jumlah'=> 'required'
        ]);

        // dd($request);        
        if (count($validatedData['jumlah'])>0){
            foreach($validatedData['jumlah'] as $item=>$value){
                $data = array(
                    'id'=>IdGenerator::generate(['table' => 'kemasan_obats','field'=>'id' ,'length' => 4, 'prefix' =>'K']),
                    'keterangan'=>$validatedData['keterangan'][$item],
                    'jumlah'=>$validatedData['jumlah'][$item],
                );
                // dd($data);
                KemasanObat::create($data);

            }
        }

        Alert::success('Sukses', 'Satuan Obat Berhasil Ditambah!');
        return redirect('/satuan-obat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
