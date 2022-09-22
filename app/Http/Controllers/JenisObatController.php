<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;


class JenisObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jenis-obat.index',[
            'title'=>'Jenis Obat',
            'jenis_obats'=>JenisObat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-obat.create',[
            'title'=>'Tambah Jenis Obat',
            'jenis_obats'=>JenisObat::all()
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
            'jenis_obat' => 'required|max:255',
            'keterangan'=>'required'
        ]);

        // dump($validatedData);
        
        if (count($validatedData['jenis_obat'])>0){
            foreach($validatedData['jenis_obat'] as $item=>$value){
                $data = array(
                    'kode_jenis'=>IdGenerator::generate(['table' => 'jenis_obats','field'=>'kode_jenis' ,'length' => 4, 'prefix' =>'J']),
                    'jenis_obat'=>$validatedData['jenis_obat'][$item],
                    'keterangan'=>$validatedData['keterangan'][$item]
                );
                // dump($data);
                JenisObat::create($data);

            }
        }

        Alert::success('Sukses', 'Jenis Obat Berhasil Ditambah!');
        return redirect('/jenis-obat');
    
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
        return view('jenis-obat.edit',[
            'title'=>'Edit Jenis Obat',
            'jenis_obat'=> JenisObat::where('kode_jenis',$id)->first()
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
            'jenis_obat' => 'required|max:255',
            'keterangan'=>'required'
        ]);
        JenisObat::where('kode_jenis',$id)->update($validatedData);
        Alert::success('Sukses', 'Jenis Obat Berhasil Diganti!');
        return redirect('/jenis-obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_jenis)
    {
        // $kode_jenis = $id;
        // DB::table('jenis_obats')->destroy($kode_jenis)->where('kode_jenis','=',$id);
        JenisObat::where('kode_jenis',$kode_jenis)->delete();
        Alert::success('Sukses', 'Jenis Berhasil Dihapus!');
        return redirect('/jenis-obat');
        // dd($id);
    }
}
