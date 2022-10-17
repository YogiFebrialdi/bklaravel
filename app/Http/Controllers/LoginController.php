<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('Login.login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');

            // return redirect('/dashboard-admin');
            // return redirect('/dashboard-guru');
            // return redirect('/dashboard-siswa');
        }
        // return redirect('/dashboard-admin');
        // return redirect('/dashboard-guru');
        // return redirect('/dashboard-siswa');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
