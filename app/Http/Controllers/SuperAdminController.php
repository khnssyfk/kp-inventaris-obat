<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index(){
        return view('super-admin.index',[
            'title'=>'Data User',
            'users'=>User::all()
        ]);
    }
    public function create(){
        return view('super-admin.create',[
            'title'=>'Buat Akun User',
            'roles'=>Role::all()
        ]);
    }

    public function store(Request $request){
        // return request()->all();//ngambil semua request yg ada dan ditampilkan
        // return $request->all();
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'no_hp'=>'required|max:20',
            'email' => ['required','email:dns','unique:users'],
            'id_role'=> 'required',
            'password'=> ['required','min:5','max:255']
        ]);
        // dd($validatedData);

        $validatedData['password'] = bcrypt($validatedData['password']);
        //masukan data ke tabel user
        User::create($validatedData);
        // $request->session()->flash('success','Registration successful! Please Login');
        return redirect('/data-user/create')->with('success','Buat Akun Berhasil!');
    }
}
