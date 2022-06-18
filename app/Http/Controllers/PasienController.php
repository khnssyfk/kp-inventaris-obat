<?php

namespace App\Http\Controllers;
use App\Models\Pasien;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pasien.index',[
            'title' => 'Data Pasien',
            'pasiens'=>Pasien::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create',[
            'title'=>'Buat Data Pasien'
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = DB::table('pasiens')->where('no_rekam_medis',$id)->first();
        // dump($data->nama);
        return view('pasien.show',[
            'title'=>'Buat Data Pasien',
            'pasien'=>DB::table('pasiens')->where('no_rekam_medis',$id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pasien.edit',[
            'title'=> 'Edit Pasien',
            'pasien'=>DB::table('pasiens')->where('no_rekam_medis',$id)->first()

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
        
        $validatedData =[
            'no_rekam_medis'=>$request->no_rekam_medis,
            'nama'=>$request->nama,
            'no_ktp'=>$request->no_ktp,
            'tgl_lahir'=>$request->tgl_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'agama'=>$request->agama,
            'pekerjaan'=>$request->perkejaan,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp
        ];
        // dd($validatedData);
        // $validatedData = $request->validate([
        //     'nama_obat' => 'required|max:255',
        //     'satuan'=>'required'
        // ]);
        Pasien::where('no_rekam_medis',$id)->update($validatedData);
        Alert::success('Sukses', 'Data Obat Berhasil Diganti!');
        return redirect('/data-pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasien::destroy($id);
        Alert::success('Sukses', 'Akun Berhasil Dihapus!');
        return redirect('/data-pasien');
    }
}
