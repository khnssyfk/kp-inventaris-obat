<?php

namespace App\Http\Controllers;

use App\Models\BentukObat;
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
            'kemasan_obats'=>KemasanObat::all(),
            'bentuk_obats'=>BentukObat::orderBy('bentuk_obat')->get()
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
            'jumlah'=> 'required',
            'bentuk_obat_id'=>'required'
        ]);

        // dd($request);        
        if (count($validatedData['jumlah'])>0){
            foreach($validatedData['jumlah'] as $item=>$value){
                $data = array(
                    'kode_kemasan'=>IdGenerator::generate(['table' => 'kemasan_obats','field'=>'kode_kemasan' ,'length' => 4, 'prefix' =>'K']),
                    'keterangan'=>$validatedData['keterangan'][$item],
                    'jumlah'=>$validatedData['jumlah'][$item],
                    'bentuk_obat_id'=>$validatedData['bentuk_obat_id'][$item],
                );
                // dd($data);
                KemasanObat::create($data);

            }
        }

        Alert::success('Sukses', 'Bentuk Obat Berhasil Ditambah!');
        return redirect('/bentuk-obat');
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
        return view('kemasan-obat.edit',[
            'title'=>'Edit kemasan Obat',
            'kemasan_obat'=> kemasanObat::where('kode_kemasan',$id)->first(),
            'bentuk_obats'=>BentukObat::orderBy('bentuk_obat')->get()
        ]);
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
        $validatedData = $request->validate([
            'keterangan' => 'required',
            'jumlah'=> 'required',
            'bentuk_obat_id'=>'required'
        ]);
        // dd($id);
        kemasanObat::where('kode_kemasan',$id)->update($validatedData);
        Alert::success('Sukses', 'Kemasan Obat Berhasil Diganti!');
        return redirect('/bentuk-obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_kemasan)
    {
        KemasanObat::where('kode_kemasan',$kode_kemasan)->delete();
        Alert::success('Sukses', 'Bentuk Berhasil Dihapus!');
        return redirect('/bentuk-obat');
    }
}
