<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AsistenController extends Controller
{
    public function index(){
        return view('asisten.dashmhs');
    }

    public function presensi(){
        return view('asisten.presensi');
    }
}
