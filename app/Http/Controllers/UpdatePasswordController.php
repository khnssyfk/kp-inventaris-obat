<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class UpdatePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user()->nama;

        return view('profile',[
            'title'=>"Profil"
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
        $user = Auth::user();
        $user_pass = Auth::user()->password;

        $request->validate([
            'currentpassword' => ['required','min:5','max:255',new MatchOldPassword],
            'newpassword' => ['required','min:5','max:255','different:currentpassword'],
            'confirmpassword' => ['required','min:5','max:255','same:newpassword'],
        ],[
            'currentpassword.min'=>' Password harus terdiri lebih dari 5 karakter',
            'newpassword.min'=>'Password harus terdiri lebih dari 5 karakter',
            'newpassword.different'=>'Password baru harus berbeda dari password lama',
            'confirmpassword.min'=>' Password harus terdiri lebih dari 5 karakter',
            'confirmpassword.same'=>'Password tidak sama'
        ]);
        if (Hash::check($request->currentpassword, $user->password)) { 
            User::find($user->id)->update(['password'=> Hash::make($request->newpassword)]);

            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
    
            return redirect('/login')->with('PasswordBerhasil','Password Berhasil Diganti, Silahkan Login Kembali!');
         
         } 
        //  else {
        //     Alert::warning('Gagal', 'Password yang anda input salah');
        //     return redirect('/profile');
        //  }
        
        // $validatedData['newpassword'] = bcrypt($validatedData['newpassword']);

        // dd($request->id);

        // User::find($user)->update(['password'=> $validatedData['pass-baru']]);
        // Auth::logout();
 
        // request()->session()->invalidate();
    
        // request()->session()->regenerateToken();
    
        // return redirect('/login');

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
        //
    }
}
