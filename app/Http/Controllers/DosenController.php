<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DetailKelas;
use App\Models\Kelas;

class DosenController extends Controller
{
    public function index(){
        $ambil = auth()->user()->id;
        $detail = Kelas::join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('users','users.id','=','kelas.id')
        ->where('kelas.id','=',$ambil)
        ->get();
        return view('dosen.dashdsn', [
            'user' =>  User::find($ambil),
            'detail' => $detail,
        ]);
    }

    public function detaildosen($id){
        $dk = DetailKelas::join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->where('detail_kelas.id_kelas','=',$id)
        ->get();
        $no=1;
        return view('dosen.detail',[
            'dk' => $dk,
            'no' => $no
        ]);

        // return $dk;
    }

    public function dsnpresensi(){
        return view('dosen.dsnpresensi');
    }

    public function buatpresensi(){
        return view('dosen.buatpresensi');
    }
}
