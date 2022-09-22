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
        $role = ['Super Admin', 'Farmasi'];
        return view('super-admin.create',[
            'title'=>'Buat Akun User',
            'roles'=>Role::whereIn('rolename', $role)->get()
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
        // $user_id = $user->id;
        // $user_role = $user->role_id;
        // dd($user_role);
        
        
        // if($user_role==4){
        //     // dd('uhuy');
        //     Dokter::create(
        //         [
        //             'user_id'=>$user_id,
        //             'spesialis','tgl_lahir','alamat'
        //         ]
        //         );
        
        // }


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
        $role = ['Super Admin', 'Farmasi'];
        return view('super-admin.edit',[
            'roles'=>Role::whereIn('rolename', $role)->get(),
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
        if($request->role_id != $user->role_id){
            if($request->role_id == 4){
                Dokter::create(
                    [
                        'user_id'=>$id,
                        'spesialis','tgl_lahir','alamat'
                    ]
                    );
            };
            if($user->role_id == 4 && $request->role_id != 4){
                $user_id = Dokter::where('user_id',$id)->first();
                Dokter::destroy($user_id->id);

            }
        }


        
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
        // $user_id = Dokter::where('user_id',$id)->first();
        // $temp = User::where('id','=',$id)->value('role_id');
        // if ($temp == 4){
        //     Dokter::destroy($user_id->id);
        //     User::destroy($id);
        //     Alert::success('Sukses', 'Akun Berhasil Dihapus!');
        //     return redirect('/data-user');

        // }else{
            User::destroy($id);
            Alert::success('Sukses', 'Akun Berhasil Dihapus!');
            return redirect('/data-user');
        // }
        // dd($user_id->id);
        // Alert::success('Sukses', 'Akun Berhasil Dihapus!');
        // return redirect('/data-user');
    }

}
