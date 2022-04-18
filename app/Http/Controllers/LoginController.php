<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        $creden = $request->validate([
            'nim_nidn' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($creden)){
            $request->session()->regenerate();
            if(auth()->user()->nama_role == 'admin'){
                return redirect() ->intended('/admin');
            }
            elseif(auth()->user()->nama_role == 'dosen'){
                return redirect() ->intended('/dosen');
            }
            else{
                return redirect() ->intended('/asisten');
            }
        }
        return back()->with('logineror', 'Login Gagal!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
