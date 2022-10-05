<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use App\Models\DataObat;
use App\Models\JenisObat;
use App\Models\BentukObat;
use App\Models\KemasanObat;
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
            'data_obats'=>DataObat::all(),
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
            'title'=>'Tambah Obat Baru',
            'jenis_obats'=>JenisObat::orderBy('jenis_obat','asc')->get(),
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
        // $validatedData = $request->validate([
        //     'nama_obat' => 'required|max:255',
        //     'bentuk_obat_id'=>'required',
        //     'jenis_obat_id'=>'required',
        //     'kemasan_obat_id'=>'required',
        //     'berat_obat'=>'required',
        //     'satuan_berat_obat'=>'required',
        //     'merk_obat'
        // ]);

        $validatedData = [
            'nama_obat'=>$request->nama_obat,
            'jenis_obat_id'=>$request->jenis_obat_id,
            'kemasan_obat_id'=>$request->kemasan_obat_id,
            'berat_obat'=>$request->berat_obat,
            'satuan_berat_obat'=>$request->satuan_berat_obat,
            'merk_obat'=>$request->merk_obat
        ];

        // dd($validatedData);
        
        if (count($validatedData['nama_obat'])>0){
            foreach($validatedData['nama_obat'] as $item=>$value){
                $data = array(
                    'kode_obat'=>IdGenerator::generate(['table' => 'data_obats','field'=>'kode_obat' ,'length' => 8, 'prefix' =>'OBT']),
                    'nama_obat'=>$validatedData['nama_obat'][$item],
                    'jenis_obat_id'=>$validatedData['jenis_obat_id'][$item],
                    'kemasan_obat_id'=>$validatedData['kemasan_obat_id'][$item],
                    'satuan_berat_obat'=>$validatedData['satuan_berat_obat'][$item],
                    'berat_obat'=>$validatedData['berat_obat'][$item],
                    'merk_obat'=>$validatedData['merk_obat'][$item]
                );
                // dump($data);
                DataObat::create($data);

            }
        }

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
    public function edit($id)
    {
        // dd($dataObat->attributes);
        return view('nama-obat.edit',[
            'title'=>'Edit Data Obat',
            'data_obat'=> DataObat::where('kode_obat',$id)->first(),
            'jenis_obats'=>JenisObat::orderBy('jenis_obat','asc')->get(),
            'kemasan_obats'=>KemasanObat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataObat  $dataObat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $validatedData = $request->validate([
            'nama_obat' => 'required|max:255',
            'jenis_obat_id'=>'required',
            'kemasan_obat_id'=>'required',
            'berat_obat'=>'required',
            'satuan_berat_obat'=>'required'
        ]);
        DataObat::where('kode_obat',$id)->update($validatedData);
        Alert::success('Sukses', 'Data Obat Berhasil Diganti!');
        return redirect('/nama-obat');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataObat  $dataObat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataObat::destroy($id);
        Alert::success('Sukses', 'Obat Berhasil Dihapus!');
        return redirect('/nama-obat');
    }
}
