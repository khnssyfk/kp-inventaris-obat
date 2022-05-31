<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view('auth.login',[
            'title'=>'Login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
        return back()->with('loginError','Login Tidak Berhasil. Silahkan cek kembali Email atau Password!');
    }
    public function logout(){
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/login');
    }
    
}
