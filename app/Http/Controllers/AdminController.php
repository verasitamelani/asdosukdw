<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Matakuliah;
use App\Models\DetailKelas;
use App\Models\Kelas;
use App\Models\Semester;
use App\Models\User;
use App\Models\Rumus;
use App\Models\Absensi;
use App\Models\Prodi;
use App\Models\Gaji;
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

    //DATA SEMESTER
    public function dtsmt(){
        return view('admin.dtsmt');
    }

    //DATA MATAKULIAH
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

    //DATA RUMUS
    public function dtrms(){
        return view('admin.dtrms');
    }

    //DATA KELAS
    public function dtkelas(){
        $kelas = Kelas::join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('users','users.id','=','kelas.id')
        ->join('semester','semester.id_smt','=','kelas.id_smt')
        ->where('users.nama_role','=','dosen')->paginate(2);
        return view('admin.dtkelas', compact('kelas'));
    }
    public function dtkelasadd(){
        $matkul = Matakuliah::all();
        $semester = Semester::all();
        $users = User::where('nama_role','=','dosen')->get();
        return view('admin.dtkelasadd',compact('matkul','semester', 'users'));
    }
    public function dtkelassave(Request $request){
        $request->validate([
            'id_mk' => 'required',
            'id_smt' => 'required',
            'sks' => 'required',
            'grup' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'id' => 'required',
        ]);
        Kelas::create($request->all());
        return redirect('/dtkelas')->with('successtambah', 'Data Berhasil Ditambahkan');
    }
    public function dtkelasedit($id){
        $kelas = Kelas::find($id);
        $matkul = Matakuliah::all();
        $semester = Semester::all();
        $users = User::where('nama_role','=','dosen')->get();
        return view('admin.dtkelasedit', compact('kelas','matkul','semester', 'users'));
    }
    public function dtkelaseditup(Request $request, $id){
        $request->validate([
            'id_mk' => 'required',
            'id_smt' => 'required',
            'sks' => 'required',
            'grup' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'id' => 'required',
        ]);
        Kelas::find($id)->update($request->all());
        return redirect('/dtkelas')->with('successedit', 'Data Berhasil Diupdate');
    }
    public function delkelas($id){
        $kls = Kelas::find($id);
        $kls->delete();
        return redirect('/dtkelas')->with('successhapus', 'Data Berhasil Dihapus');
    }

    //DATA DETAIL KELAS
    public function dtdetail(){
        $detail = DetailKelas::join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('users','users.id','=','detail_kelas.id')->paginate(4);
        return view('admin.dtdetail', compact('detail'));
    }
    public function dtdetailadd(){
        $matkul = Kelas::join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->get();
        $users = User::where('nama_role','=','asisten')->get();
        return view('admin.dtdetailadd',compact('matkul','users'));
    }
    public function dtdetailsave(Request $request){
        $request->validate([
            'id_kelas' => 'required',
            'id' => 'required',
        ]);
        DetailKelas::create($request->all());
        return redirect('/dtdetail')->with('successtambah', 'Data Berhasil Ditambahkan');
    }
    public function dtdetailedit($id){
        $detail = DetailKelas::find($id);
        $matkul = Kelas::join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->get();
        $users = User::where('nama_role','=','asisten')->get();
        return view('admin.dtdetailedit',compact('detail','matkul','users'));
    }
    public function dtdetaileditup(Request $request, $id){
        $request->validate([
            'id_kelas' => 'required',
            'id' => 'required',
        ]);
        DetailKelas::find($id)->update($request->all());
        return redirect('/dtdetail')->with('successedit', 'Data Berhasil Diupdate');
    }
    public function deldetail($id){
        $detail = DetailKelas::find($id);
        $detail->delete();
        return redirect('/dtdetail')->with('successhapus', 'Data Berhasil Dihapus');
    }

    //DATA PRESENSI
    public function dtpresensi(){
        $prodi = Prodi::all();
        return view('admin.dtpresensi', compact('prodi'));
    }
    public function dtpresensi2($id){
        $absen = Absensi::join('detail_kelas','detail_kelas.id_detail','=','absensi.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->where('matkul.id_prodi','=',$id)->paginate();

        $prodi = Prodi::where('id_prodi','=',$id)
        ->get();

        return view('admin.dtpresensi2', compact('absen','prodi'));
    }

    public function finalisasi(){
        $prodi = Prodi::all();
        return view('admin.finalisasi', compact('prodi'));
    }

    public function finalisasi2($id){
        $gaji = Gaji::join('absensi','absensi.id_absensi','=','gaji.id_absensi')
        ->join('detail_kelas','detail_kelas.id_detail','=','absensi.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->where('matkul.id_prodi','=',$id)->paginate();

        $prodi = Prodi::where('id_prodi','=',$id)
        ->get();
        return view('admin.finalisasi', compact('gaji','prodi'));
    }

    public function slipgaji(){
        $prodi = Prodi::all();
        return view('admin.slipgaji', compact('prodi'));
    }

    public function arsip(){
        $prodi = Prodi::all();
        return view('admin.arsip', compact('prodi'));
    }
}
