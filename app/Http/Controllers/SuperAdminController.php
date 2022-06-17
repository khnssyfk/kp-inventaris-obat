<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Dokter;
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
        $validatedData['password'] = bcrypt($validatedData['password']);
        //masukan data ke tabel user
        $user = User::create($validatedData);
        $user_id = $user->id;
        $user_role = $user->role_id;
        // dd($user_role);
        
        
        if($user_role==4){
            // dd('uhuy');
            Dokter::create(
                [
                    'user_id'=>$user_id,
                    'spesialis','tgl_lahir','alamat'
                ]
                );
        
        }


        // $request->session()->flash('success','Registration successful! Please Login');
        Alert::success('Sukses', 'Akun Berhasil Dibuat!');
        return redirect('/data-user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int   \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = User::where('id',$id)->first();
        // dd($user->email);
        return view('super-admin.edit',[
            'roles'=>Role::all(),
            'title'=>'Edit Akun',
            'user'=> User::where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //cari data user berdasarkan id
        $user = User::where('id',$id)->first();
        $rules = ([
            'nama' => 'required|max:255',
            'role_id'=> 'required',
        ]);
        if($request->no_hp != $user->no_hp){
            $rules['no_hp'] = 'required|max:20|unique:users';
            
        }
        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        };
        
        $validatedData = $request->validate($rules);
        $validatedData['id'] = $user->id;
        User::where('id',$id)->update($validatedData);
        Alert::success('Sukses', 'Akun Berhasil Diganti!');
        return redirect('/data-user');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Alert::success('Sukses', 'Akun Berhasil Dihapus!');
        return redirect('/data-user');
    }

}
