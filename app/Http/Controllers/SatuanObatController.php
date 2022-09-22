<?php

namespace App\Http\Controllers;

use App\Models\SatuanObat;
use App\Models\KemasanObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class SatuanObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(SatuanObat::all());
        return view('satuan-obat.index',[
            'title'=>'Satuan Obat',
            'satuan_obats'=>SatuanObat::all(),
            'kemasan_obats'=>KemasanObat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuan-obat.create',[
            'title'=>'Tambah Satuan Obat',
            'satuan_obats'=>SatuanObat::all()
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
            'satuan_obat' => 'required|max:255'
        ]);

        // dd($validatedData);        
        if (count($validatedData['satuan_obat'])>0){
            foreach($validatedData['satuan_obat'] as $item=>$value){
                $data = array(
                    'kode_satuan'=>IdGenerator::generate(['table' => 'satuan_obats','field'=>'kode_satuan' ,'length' => 4, 'prefix' =>'U']),
                    'satuan_obat'=>$validatedData['satuan_obat'][$item],
                );
                // dump($data);
                satuanObat::create($data);

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
        return view('satuan-obat.edit',[
            'title'=>'Edit Satuan Obat',
            'satuan_obat'=> SatuanObat::where('kode_satuan',$id)->first()
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
            'satuan_obat' => 'required|max:255',
        ]);
        SatuanObat::where('kode_satuan',$id)->update($validatedData);
        Alert::success('Sukses', 'Satuan Obat Berhasil Diganti!');
        return redirect('/satuan-obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_satuan)
    {
        SatuanObat::where('kode_satuan',$kode_satuan)->delete();
        Alert::success('Sukses', 'Satuan Berhasil Dihapus!');
        return redirect('/satuan-obat');
    }

    public function getSatuan(){
        $columns = SatuanObat::all();
        // dd(json_encode($columns));
        return(json_encode($columns));
        // return response()->json([
        //    'kode_satuan' => $columns->kode_satuan,
        //    'satuan_obat' => $columns->satuan_obat,
        // ]);

        // 'rooms' => $rooms->values()->toArray()
    }
}
