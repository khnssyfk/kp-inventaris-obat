<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;

use App\Models\DataObat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dokter.index',[
            'title' => 'Data Dokter',
            'dokters'=>Dokter::all(),
            'users'=>User::all()

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
        return view('dokter.edit',[
            'user'=>User::all(),
            'title'=>'Edit Akun',
            'dokter'=> Dokter::where('id',$id)->first()
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
            'tgl_lahir'=>'required',
            'alamat'=>'required',
            'sip'=>'required',
            'spesialis'=>'required'
        ]);
        // $Dokter->update( [
        //     'user_id' => 'required|max:255',
        //     'tgl_lahir'=>'require',
        //     'alamat'=>'',
        //     'sip'=>'',
        //     'spesialis'=>''
        // ]);
        Dokter::where('id',$id)->update($validatedData);
        Alert::success('Sukses', 'Data Dokter Berhasil Diganti!');
        return redirect('/data-dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $user_id = Dokter::where('id',$id)->first();
        // dd($user_id->user_id);
        Dokter::destroy($id);
        User::destroy($user_id->user_id);
        Alert::success('Sukses', 'Akun Berhasil Dihapus!');
        return redirect('/data-dokter');
    }

    // public function search(Request $request)
    // {
    //     $query = $request->get('query');
    //     // $filterResult = DataObat::where('nama_obat', 'LIKE', '%'. $query. '%')->get();
    //     // $filterResult = Dokter::select('user_id')->pluck('user_id');
    //     // $filterResult = Dokter::select('user_id')->where('user_id', 'LIKE', '%'. $query. '%')
    //     // ->pluck('user_id');

    //     $log = User::where('role_id','=',4)->select('nama')->where('nama', 'LIKE', '%'. $query. '%')->pluck('nama'); // or whatever, just get one log
    //     // $username = $log->user_id->nama;
    //     return response()->json($log);
    //     // dd($log);
    // }
}
