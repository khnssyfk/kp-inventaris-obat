<?php

namespace App\Http\Controllers;

use App\Models\BentukObat;
use App\Models\KemasanObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class BentukObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(bentukObat::all());
        return view('bentuk-obat.index',[
            'title'=>'Bentuk & Kemasan Obat',
            'bentuk_obats'=>BentukObat::all(),
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
        return view('bentuk-obat.create',[
            'title'=>'Tambah Bentuk Obat',
            'bentuk_obats'=>BentukObat::all()
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
            'bentuk_obat' => 'required|max:255'
        ]);

        // dd($validatedData);        
        if (count($validatedData['bentuk_obat'])>0){
            foreach($validatedData['bentuk_obat'] as $item=>$value){
                $data = array(
                    'kode_bentuk'=>IdGenerator::generate(['table' => 'bentuk_obats','field'=>'kode_bentuk' ,'length' => 4, 'prefix' =>'U']),
                    'bentuk_obat'=>$validatedData['bentuk_obat'][$item],
                );
                // dump($data);
                bentukObat::create($data);

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
        return view('bentuk-obat.edit',[
            'title'=>'Edit Bentuk Obat',
            'bentuk_obat'=> bentukObat::where('kode_bentuk',$id)->first()
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
            'bentuk_obat' => 'required|max:255',
        ]);
        bentukObat::where('kode_bentuk',$id)->update($validatedData);
        Alert::success('Sukses', 'Bentuk Obat Berhasil Diganti!');
        return redirect('/bentuk-obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_bentuk)
    {
        bentukObat::where('kode_bentuk',$kode_bentuk)->delete();
        Alert::success('Sukses', 'Bentuk Berhasil Dihapus!');
        return redirect('/bentuk-obat');
    }

    public function getBentuk(){
        $columns = bentukObat::all();
        // dd(json_encode($columns));
        return(json_encode($columns));
        // return response()->json([
        //    'kode_bentuk' => $columns->kode_bentuk,
        //    'bentuk_obat' => $columns->bentuk_obat,
        // ]);

        // 'rooms' => $rooms->values()->toArray()
    }
}
