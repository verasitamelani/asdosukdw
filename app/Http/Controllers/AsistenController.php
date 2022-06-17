<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\DetailKelas;
use App\Models\Absensi;
use App\Models\Matakuliah;
use App\Models\Gaji;
use Carbon\Carbon;
use PDF;

class AsistenController extends Controller
{
    public function index(){
        $ambil = auth()->user()->id;

        $asisten = DetailKelas::join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('users','users.id','=','kelas.id')
        ->select('kelas.hari','kelas.jam_mulai','kelas.jam_selesai','kelas.grup','matkul.nama_mk','users.nama','detail_kelas.id_detail')
        ->groupBy('detail_kelas.id_kelas')
        ->where('detail_kelas.id','=',$ambil)
        ->get();

        return view('asisten.dashmhs',[
            'user' =>  User::find($ambil),
            'asisten' => $asisten,
        ]);
    }

    public function cetakslip(){
        $ambil = auth()->user()->id;

        $gaji = Gaji::join('detail_kelas','detail_kelas.id_detail','=','gaji.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('semester','semester.id_smt','=','kelas.id_smt')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->where('gaji.id','=',$ambil)
        ->paginate(10);

        return view('asisten.cetakslip',[
            'gaji' => $gaji,
        ]);
    }

    public function pdfslipasisten($id){
        $gaji = Gaji::join('detail_kelas','detail_kelas.id_detail','=','gaji.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('semester','semester.id_smt','=','kelas.id_smt')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->where('gaji.id_gaji','=',$id)
        ->get();

        $pdf = PDF::loadView('asisten.pdfslip', compact('gaji'));

        return $pdf->stream();
    }

    public function presensi(Request $req){
        $ambil = Auth::user()->id;
        $now = Carbon::now();
        $time = $now->format('H:i:s');
        $day = $now->format('Y-m-d');
        $tampil = Absensi::join('detail_kelas','detail_kelas.id_detail','=','absensi.id_detail')
            ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
            ->join('users','users.id','=','detail_kelas.id')
            ->join('matkul','matkul.id_mk','=','kelas.id_mk')
            ->where('detail_kelas.id','=',$ambil)
            ->orderBy('id_absensi','DESC')->get();

        return view('asisten.presensi',[
            'user' => DetailKelas::find($ambil),
            'tampil' => $tampil,
            'time'=> $time,
            'day'=> $day,
       ]);
    }

    public function mhspresensi(Request $req, $id){ //klik-absen

        $now = Carbon::now();
        $tgl = $now->format('Y-m-d');
        $jam = $now->format('H:i:s');

        Absensi::where('id_absensi','=',$id)->update([
            'jam' => $jam,
            'kehadiran' => "hadir",
        ]);
        return redirect('/presensi')->with(['successtmbh' => 'Presensi Berhasil']);
    }


}
