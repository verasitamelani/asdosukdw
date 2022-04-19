<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\DB;

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
        $mk = Matakuliah::orderBy('id_mk')->paginate(10);
        return view('admin.dtmk', compact('mk'));
    }

    public function dtmkadd(){
        return view('admin.dtmkadd');
    }

    public function dtmkaddsave(Request $request){
        $request->validate([
            'nama_mk' => 'required',
            'kode_mk' => 'required',
            'jenis_mk' => 'required',
        ]);
        Matakuliah::create($request->all());
        return redirect('/dtmk')->with('successtambah', 'Data Berhasil Ditambahkan');
    }

    public function dtmkedit($id){
        $mk = Matakuliah::find($id);
        return view('admin.dtmkedit', compact('mk'));
    }

    public function dtmkeditup(Request $request, $id){
        $request->validate([
            'nama_mk' => 'required',
            'kode_mk' => 'required',
            'jenis_mk' => 'required',
        ]);
        Matakuliah::find($id)->update($request->all());
        return redirect('/dtmk')->with('successedit', 'Data Berhasil Diubah');
    }

    public function delmk($id){
        $mk = Matakuliah::find($id);
        $mk->delete();
        return redirect('/dtmk')->with('successhapus', 'Data Berhasil Dihapus');
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
