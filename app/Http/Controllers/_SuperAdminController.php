<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'no_hp'=>'required|max:20|unique:users',
            'email' => ['required','email:dns','unique:users'],
            'id_role'=> 'required',
            'password'=> ['required','min:5','max:255']
        ]);
        // dd($validatedData);

        $validatedData['password'] = bcrypt($validatedData['password']);
        //masukan data ke tabel user
        User::create($validatedData);
        // $request->session()->flash('success','Registration successful! Please Login');
        Alert::success('Sukses', 'Akun Berhasil Dibuat!');
        return redirect('/data-user');

    }

    public function destroy(User $user){
        User::destroy($user->id);
        // Alert::success('Sukses', 'Akun Berhasil Dihapus!');
        // return redirect('/data-user');
    }
}
