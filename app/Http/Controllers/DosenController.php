<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
        return view('dosen.dashdsn');
    }

    public function detaildosen(){
        return view('dosen.detail');
    }

    public function dsnpresensi(){
        return view('dosen.dsnpresensi');
    }

    public function buatpresensi(){
        return view('dosen.buatpresensi');
    }
}
