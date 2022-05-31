<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('super-admin.index',[
            'title'=>'Data User',
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
        return view('super-admin.create',[
            'title'=>'Buat Akun User',
            'roles'=>Role::all()
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
            'nama' => 'required|max:255',
            'no_hp'=>'required|max:20|unique:users',
            'email' => ['required','email:dns','unique:users'],
            'role_id'=> 'required',
            'password'=> ['required','min:5','max:255']
        ]);
        
        // if ($validatedData['role_id'] == 3){
        //         alert('uhuyyy');
        //     }
            $validatedData['password'] = bcrypt($validatedData['password']);
            // dd($validatedData);
        //masukan data ke tabel user
        User::create($validatedData);
        // $request->session()->flash('success','Registration successful! Please Login');
        Alert::success('Sukses', 'Akun Berhasil Dibuat!');
        return redirect('/data-user');
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
        User::destroy($id);
        Alert::success('Sukses', 'Akun Berhasil Dihapus!');
        return redirect('/data-user');
    }
}
