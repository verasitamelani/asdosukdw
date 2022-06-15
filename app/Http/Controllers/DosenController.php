<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\DetailKelas;
use App\Models\Kelas;
use App\Models\Absensi;
use App\Models\Matakuliah;

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

        $grup = DetailKelas::join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->where('detail_kelas.id_kelas','=',$id)
        ->first();

        $no=1;
        return view('dosen.detaildosen',[
            'dk' => $dk,
            'no' => $no,
            'grup'=> $grup
        ]);
    }

    public function dsnpresensi(){//tampil data presensi
        $ambil = auth()->user()->id;
        $presensi = DB::table('absensi')
        ->join('detail_kelas','detail_kelas.id_detail','=','absensi.id_detail')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->where('kelas.id','=',$ambil)
        // ->where('absensi.ket_vali','=',null)
        // ->where('absensi.jam','!=',null)
        ->orderBy('absensi.tgl', 'DESC')->paginate(10);

        return view('dosen.dsnpresensi', [
            'user' =>  User::find($ambil),
            'presensi' => $presensi,
        ]);
    }

    public function buatpresensi(){
        $ambil = auth()->user()->id;
        $detail = DB::table('kelas')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->select('kelas.id_kelas')
        ->groupBy('kelas.id_kelas');

        $kls = DB::table('detail_kelas')->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('users','users.id','=','kelas.id')
        ->select('kelas.id_kelas','detail_kelas.id_detail','matkul.nama_mk','kelas.grup')
        ->groupBy('kelas.id_kelas')
        ->where('kelas.id','=',$ambil)
        ->whereIn('kelas.id_kelas',$detail)
        ->get();

        $mk = DB::table('matkul')
        ->join('kelas','kelas.id_mk','=','matkul.id_mk')
        ->join('users','users.id','=','kelas.id')
        ->where('users.id','=',$ambil)
        ->get();

        return view('dosen.buatpresensi',compact('kls','mk'));
    }

    public function savepresensi(Request $req){
        $data[]= DetailKelas::join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->select('detail_kelas.id_detail')
        ->where('detail_kelas.id_kelas','=', $req->id_kelas)
        ->get('id_detail');

        $detail= DetailKelas::join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->where('detail_kelas.id_kelas','=', $req->id_kelas)
        ->get('id_detail');

        for($i=0; $i<count($data); $i++){
            foreach($detail as $dtl) {
            $databaru = [
                'id_detail'=> $dtl->id_detail,
                'tgl'=> $req->tgl[$i],
                'pertemuan'=>$req->pertemuan[$i],
            ];
            Absensi::create($databaru);
            }

        }
        return redirect('/dsnpresensi')->with('successtmbh','Data berhasil ditambahkan');
    }

    public function validasi($id){
        DB::table('absensi')->where('id_absensi',$id)
        ->update([
            'ket_vali' => "valid",
        ]);
        return redirect('/dsnpresensi')->with('successtmbh','Validasi berhasil!');
    }
}
