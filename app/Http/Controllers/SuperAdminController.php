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

        $user = User::where('id',$id)->first();
        $rules = ([
            'nama' => 'required|max:255',
            'role_id'=> 'required',
            'password'=> ['required','min:5','max:255']
        ]);
        if($request->no_hp != $user->no_hp){
            $rules['no_hp'] = 'required|max:20|unique:users';
            
        }
        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        };
        // dd($request->validate($rules));
        
        $validatedData = $request->validate($rules);
        $validatedData['id'] = $user->id;
        User::where('id',$id)->update($validatedData);
        Alert::success('Sukses', 'Akun Berhasil Dihapus!');
        return redirect('/data-user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        Alert::success('Sukses', 'Akun Berhasil Dihapus!');
        return redirect('/data-user');
    }

}
