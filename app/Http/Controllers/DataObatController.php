<?php

namespace App\Http\Controllers;
use App\Models\DataObat;
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
            'data_obats'=>DataObat::all()
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
            'title'=>'Tambah Obat Baru'
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
            'nama_obat' => 'required|max:255',
            'satuan'=>'required'
        ]);
                
        // $kode_obat = IdGenerator::generate(['table' => 'data_obats','field'=>'kode_obat' ,'length' => 10, 'prefix' =>'OBT-']);
        // dd($validatedData);
        // DB::table('data_obats')->insert(['kode_obat'=>$kode_obat,'nama_obat'=>$validatedData['nama_obat'],'satuan'=>$validatedData['satuan']]);


        // $kode_obat = IdGenerator::generate(['table' => 'data_obats','field'=>'kode_obat' ,'length' => 10, 'prefix' =>'OBT-']);
        // dd($kode_obat);
        
        if (count($validatedData['nama_obat'])>0){
            foreach($validatedData['nama_obat'] as $item=>$value){
                $data = array(
                    'kode_obat'=>IdGenerator::generate(['table' => 'data_obats','field'=>'kode_obat' ,'length' => 8, 'prefix' =>'OBT']),
                    'nama_obat'=>$validatedData['nama_obat'][$item],
                    'satuan'=>$validatedData['satuan'][$item]
                );
                // dump($data);
                DataObat::create($data);

            }
        }

        // for ($i=0; $i < 10; $i++) { 
	    // 	$kode_obat = IdGenerator::generate(['table' => 'data_obats','field'=>'kode_obat' ,'length' => 10, 'prefix' =>'OBT-'])
        //     dump($kode_obat);
    	// }

        // $request->session()->flash('success','Registration successful! Please Login');
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
            'data_obat'=> DataObat::where('kode_obat',$id)->first()
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
            'satuan'=>'required'
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
