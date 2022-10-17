<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    public function index()
    {
        return view ('login.index', [
            'tittle' => 'Login',
            'active' => 'login'
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt(@credentials)) {
            $request->session->regenerate();
            return redirect ()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login failed!');
    }
}
