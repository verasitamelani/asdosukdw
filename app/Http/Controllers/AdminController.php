<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dtmhsdsn');
    }

    public function adduser(){
        return view('admin.adduser');
    }

    public function edituser(){
        return view('admin.edituser');
    }

    public function dtmk(){
        return view('admin.dtmk');
    }

    public function dtsmt(){
        return view('admin.dtsmt');
    }

    public function dtrms(){
        return view('admin.dtrms');
    }

    public function dtkelas(){
        return view('admin.dtkelas');
    }

    public function dtdetail(){
        return view('admin.dtdetail');
    }

    public function dtpresensi(){
        return view('admin.dtpresensi');
    }

    public function finalisasi(){
        return view('admin.finalisasi');
    }

    public function slipgaji(){
        return view('admin.slipgaji');
    }

    public function arsip(){
        return view('admin.arsip');
    }
}
