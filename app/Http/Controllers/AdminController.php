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
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function index(){ //datauser
        $mhsdsn = User::join('prodi','prodi.id_prodi','=','users.id_prodi')->paginate(10);
        return view('admin.dtmhsdsn',compact('mhsdsn'));
    }

    public function adduser(){
        $prodi = Prodi::all();
        return view('admin.adduser',compact('prodi'));
    }
    public function saveuser(Request $r){ //save tambah user
        $prodi = Prodi::all();
        $r->validate([
                'nim_nidn'=> 'required',
                'nama'=> 'required',
                'nama_role'=> 'required',
                'id_prodi'=> 'required',
                'password'=> 'required',
        ]);
        DB::table('users')->insert([
            'nim_nidn'=> $r->nim_nidn,
            'nama'=> $r->nama,
            'nama_role'=> $r->nama_role,
            'id_prodi'=> $r->id_prodi,
            'password'=> Hash::make($r->password)
        ]);

        return redirect('/admin')->with(['successtmbh' => 'Data Berhasil Disimpan']);
    }

    public function edituser($id){ //tampil user edit
        $prodi = Prodi::all();
        $mhsdsn = User::find($id);

        return view('admin.edituser',compact('mhsdsn','prodi'));
    }

    public function saveedituser(Request $r, $id){ //simpan edit user
        $prodi = Prodi::all();
        $r->validate([
            'nim_nidn'=> 'required',
            'nama'=> 'required',
            'id_prodi'=> 'required',
            'password'=> 'required',
            'nama_role'=> 'required',
        ]);
        User::find($id)->where('id',$id)->update([
            'nim_nidn'=> $r->nim_nidn,
            'nama'=> $r->nama,
            'id_prodi'=> $r->id_prodi,
            'password'=> Hash::make($r->password),
            'nama_role'=> $r->nama_role,
        ]);
        return redirect('/admin')->with('successedit','Data Berhasil Diubah');
    }

    public function deluser($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect('/admin')->with('successhps', 'Data Berhasil Dihapus');
    }

    //DATA SEMESTER
    public function dtsmt(){//data semester
        $smt = Semester::orderBy('id_smt')->paginate(10);
        return view('admin.dtsmt', compact('smt'));
    }
    public function addsmt(){
        return view('admin.addsmt');
    }
    public function savesmt(Request $r){ //tambah dt semester
        $r->validate([
            'nama_smt' => 'required',
            'tahun' => 'required',
            'ket_smt' => 'required',
        ]);
        Semester::create($r->all());
        return redirect('/dtsmt')->with('successtmbh', 'Data Berhasil Ditambahkan');

    }
    public function editsmt($id){
        $smt = Semester::find($id);
        return view('admin.editsmt',compact('smt'));
    }

    public function saveeditsmt(Request $r, $id){
        $r->validate([
            'nama_smt' => 'required',
            'tahun' => 'required',
            'ket_smt' => 'required',
        ]);
        Semester::find($id)->update($r->all());
        return redirect('/dtsmt')->with('successedit', 'Data Berhasil Diubah');
    }

    public function delsmt($id){
        $mk = Semester::find($id);
        $mk->delete();
        return redirect('/dtsmt')->with('successhps', 'Data Berhasil Dihapus');
    }

    //DATA MATAKULIAH
    public function dtmk(){
        $mk = Matakuliah::join('prodi','prodi.id_prodi','=','matkul.id_prodi')->paginate(10);
        return view('admin.dtmk', compact('mk'));
    }
    public function dtmkadd(){
        $prodi = Prodi::all();
        return view('admin.dtmkadd', compact('prodi'));
    }
    public function dtmkaddsave(Request $request){
        $request->validate([
            'nama_mk' => 'required',
            'kode_mk' => 'required',
            'jenis_mk' => 'required',
            'id_prodi' => 'required',
        ]);
        Matakuliah::create($request->all());
        return redirect('/dtmk')->with('successtambah', 'Data Berhasil Ditambahkan');
    }
    public function dtmkedit($id){
        $mk = Matakuliah::find($id);
        $prodi = Prodi::all();
        return view('admin.dtmkedit', compact('mk','prodi'));
    }
    public function dtmkeditup(Request $request, $id){
        $request->validate([
            'nama_mk' => 'required',
            'kode_mk' => 'required',
            'jenis_mk' => 'required',
            'id_prodi' => 'required',
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
        $rumus = Rumus::join('prodi','prodi.id_prodi','=','rumus.id_prodi')->paginate(5);
        return view('admin.dtrms', compact('rumus'));
    }
    public function dtrumusadd(){
        $prodi = Prodi::all();
        $rumus = Rumus::all();
        return view('admin.dtrumusadd',compact('prodi','rumus'));
    }
    public function dtrumussave(Request $request){
        $request->validate([
            'id_prodi' => 'required',
            'pengali_sks' => 'required',
            'harga_kehadiran' => 'required',
            'pengali_jum_hadir' => 'required',
            'pajak1' => 'required',
            'pajak2' => 'required',
        ]);
        Rumus::create($request->all());
        return redirect('/dtrms')->with('successtambah', 'Data Berhasil Ditambahkan');
    }
    public function dtrumusedit($id){
        $rumus = Rumus::find($id);
        $prodi = Prodi::all();
        return view('admin.dtrumusedit', compact('prodi','rumus'));
    }
    public function dtrumuseditup(Request $request, $id){
        $request->validate([
            'id_prodi' => 'required',
            'pengali_sks' => 'required',
            'harga_kehadiran' => 'required',
            'pengali_jum_hadir' => 'required',
            'pajak1' => 'required',
            'pajak2' => 'required',
        ]);
        Rumus::find($id)->update($request->all());
        return redirect('/dtrms')->with('successedit', 'Data Berhasil Diupdate');
    }
    public function delrumus($id){
        $rumus = Rumus::find($id);
        $rumus->delete();
        return redirect('/dtrms')->with('successhapus', 'Data Berhasil Dihapus');
    }

    //DATA KELAS
    public function dtkelas(){
        $kelas = Kelas::join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('users','users.id','=','kelas.id')
        ->join('semester','semester.id_smt','=','kelas.id_smt')
        ->where('users.nama_role','=','dosen')->paginate(10);
        return view('admin.dtkelas', compact('kelas'));
    }
    public function dtkelasadd(){
        $matkul = Matakuliah::all();
        $semester = Semester::all();
        $users = User::join('prodi','prodi.id_prodi','=','users.id_prodi')
        ->where('nama_role','=','dosen')->get();
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
        $users = User::join('prodi','prodi.id_prodi','=','users.id_prodi')
        ->where('nama_role','=','dosen')->get();
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
        ->join('users','users.id','=','detail_kelas.id')->paginate(10);
        return view('admin.dtdetail', compact('detail'));
    }
    public function dtdetailadd(){
        $matkul = Kelas::join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->get();
        $users = User::join('prodi','prodi.id_prodi','=','users.id_prodi')
        ->where('nama_role','=','asisten')->get();
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
        $users = User::join('prodi','prodi.id_prodi','=','users.id_prodi')
        ->where('nama_role','=','asisten')->get();
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
        ->where('matkul.id_prodi','=',$id)->paginate(10);

        $prodi = Prodi::where('id_prodi','=',$id)
        ->get();

        $bulan = DB::table('absensi')
        ->selectRaw('distinct DATE_FORMAT(tgl, "%m") as value, DATE_FORMAT(tgl, "%M") as label')
        ->orderByDesc('value')
        ->get();

        return view('admin.dtpresensi2', compact('absen','prodi','bulan','id'));
    }
    public function dtpresensitgl(Request $request, $id){
        $absen = Absensi::join('detail_kelas','detail_kelas.id_detail','=','absensi.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->where('matkul.id_prodi','=',$id)
        ->whereMonth('absensi.tgl', $request->bulan)->get();

        return response()->json($absen);
    }

    public function finalisasi(){
        $prodi = Prodi::all();
        return view('admin.finalisasi', compact('prodi'));
    }

    public function finalisasi2(Request $request, $id){
        $now = Carbon::now();
        $tanggal = $now->format('Y-m-d');
        $tahun = Carbon::parse($tanggal)->format('Y');
        $jum_hr = DB::table('absensi')
        ->join('detail_kelas','detail_kelas.id_detail','=','absensi.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->join('rumus','rumus.id_prodi','=','prodi.id_prodi')
        ->selectRaw('count(id_absensi) as total_hadir, (pengali_sks * harga_kehadiran) as hr_sks,
        (kelas.sks * count(id_absensi) * pengali_jum_hadir) as hr_hadir,
        ((pengali_sks * harga_kehadiran) + (kelas.sks * count(id_absensi) * pengali_jum_hadir)) as jum_hr,
        (((pengali_sks * harga_kehadiran) + (kelas.sks * count(id_absensi) * pengali_jum_hadir))* pajak1)* pajak2 as pajak,
        (((pengali_sks * harga_kehadiran) + (kelas.sks * count(id_absensi) * pengali_jum_hadir)) - (((pengali_sks * harga_kehadiran) + (sks * count(id_absensi) * pengali_jum_hadir))* pajak1)* pajak2) as diterima,
        detail_kelas.id, users.nama, absensi.tgl, matkul.nama_mk, kelas.sks, kelas.id_kelas, detail_kelas.id_detail, rumus.pengali_sks, rumus.harga_kehadiran, rumus.pengali_jum_hadir')
        ->groupBy('detail_kelas.id', 'detail_kelas.id_kelas')
        ->where('matkul.id_prodi','=', $id)
        ->where('absensi.ket_vali','=','valid')
        ->where('rumus.id_prodi','=',$id)
        ->whereYear('absensi.tgl', $tahun)
        ->paginate(10);

        $no=1;
        $prodi = Prodi::where('id_prodi','=',$id)
        ->get();

        $bulan = DB::table('absensi')
        ->selectRaw('distinct DATE_FORMAT(tgl, "%m") as value, DATE_FORMAT(tgl, "%M") as label')
        ->orderByDesc('value')
        ->get();

        return view('admin.finalisasi2', compact('jum_hr','no','prodi','bulan','id'));
    }

    public function finalisasibyTgl(Request $request, $id){

            $now = Carbon::now();
            $tanggal = $now->format('Y-m-d');
            $tahun = Carbon::parse($tanggal)->format('Y');

            $jum_hr = DB::table('absensi')
            ->join('detail_kelas','detail_kelas.id_detail','=','absensi.id_detail')
            ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
            ->join('users','users.id','=','detail_kelas.id')
            ->join('matkul','matkul.id_mk','=','kelas.id_mk')
            ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
            ->join('rumus','rumus.id_prodi','=','prodi.id_prodi')
            ->selectRaw('count(id_absensi) as total_hadir, (pengali_sks * harga_kehadiran) as hr_sks,
            (kelas.sks * count(id_absensi) * pengali_jum_hadir) as hr_hadir,
            ((pengali_sks * harga_kehadiran) + (kelas.sks * count(id_absensi) * pengali_jum_hadir)) as jum_hr,
            (((pengali_sks * harga_kehadiran) + (kelas.sks * count(id_absensi) * pengali_jum_hadir))* pajak1)* pajak2 as pajak,
            (((pengali_sks * harga_kehadiran) + (kelas.sks * count(id_absensi) * pengali_jum_hadir)) - (((pengali_sks * harga_kehadiran) + (sks * count(id_absensi) * pengali_jum_hadir))* pajak1)* pajak2) as diterima,
            detail_kelas.id, users.nama, absensi.tgl, matkul.nama_mk, kelas.sks, kelas.id_kelas, detail_kelas.id_detail, rumus.pengali_sks, rumus.harga_kehadiran, rumus.pengali_jum_hadir')
            ->groupBy('detail_kelas.id', 'detail_kelas.id_kelas')
            ->whereMonth('absensi.tgl', $request->bulan)
            ->where('matkul.id_prodi','=', $id)
            ->where('absensi.ket_vali','=','valid')
            ->where('rumus.id_prodi','=',$id)
            ->whereYear('absensi.tgl', $tahun)
            ->get();

            return response()->json($jum_hr);
    }

    public function finalisasihasil(Request $req){
        if(!empty($req->jum_hr)){
            for($i=0; $i<count($req->jum_hr); $i++){
                $data = array(
                    'total_hadir'=>$req->total_hadir[$i],
                    'hr_sks'=>$req->hr_sks[$i],
                    'hr_hadir'=>$req->hr_hadir[$i],
                    'jum_hr'=>$req->jum_hr[$i],
                    'pajak'=>$req->pajak[$i],
                    'diterima'=>$req->diterima[$i],
                    'pengali_sks'=>$req->pengali_sks[$i],
                    'harga_kehadiran'=>$req->harga_kehadiran[$i],
                    'pengali_jum_hadir'=>$req->pengali_jum_hadir[$i],
                    'id_detail'=>$req->id_detail[$i],
                    'tanggal'=>$req->tgl[$i],
                    'id'=>$req->id[$i]

                );
                Gaji::create($data);
            }
        }else{
            return redirect()->back()->with('eror', 'Data pada bulan tersebut tidak ada');
        }
            return redirect()->back()->with('successtambah', 'Data Berhasil Ditambahkan');
    }

    public function slipgaji(){
        $prodi = Prodi::all();
        return view('admin.slipgaji', compact('prodi'));
    }

    public function slipgaji2($id){
        $prodi = Prodi::where('id_prodi','=',$id)
        ->get();
        $gaji = Gaji::join('detail_kelas','detail_kelas.id_detail','=','gaji.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->where('matkul.id_prodi','=',$id)->paginate(10);

        $bulan = DB::table('gaji')
        ->selectRaw('distinct DATE_FORMAT(tanggal, "%m") as value, DATE_FORMAT(tanggal, "%M") as label')
        ->orderByDesc('value')
        ->get();

        return view('admin.slipgaji2', compact('prodi','gaji', 'bulan', 'id'));
    }

    public function slipgajitgl(Request $request, $id){
        $gaji = Gaji::join('detail_kelas','detail_kelas.id_detail','=','gaji.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->where('matkul.id_prodi','=',$id)
        ->whereMonth('gaji.tanggal', $request->bulan)->get();

        return response()->json($gaji);
    }

    public function arsip(){
        $prodi = Prodi::all();
        return view('admin.arsip', compact('prodi'));
    }
    public function arsip2($id){
        $prodi = Prodi::where('id_prodi','=',$id)
        ->get();
        $gaji = Gaji::join('detail_kelas','detail_kelas.id_detail','=','gaji.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->where('matkul.id_prodi','=',$id)->paginate(10);

        $bulan = DB::table('gaji')
        ->selectRaw('distinct DATE_FORMAT(tanggal, "%m") as value, DATE_FORMAT(tanggal, "%M") as label')
        ->orderByDesc('value')
        ->get();

        return view('admin.arsip2', compact('prodi','gaji', 'bulan', 'id'));
    }

    public function arsiptgl(Request $request, $id){
        $gaji = Gaji::join('detail_kelas','detail_kelas.id_detail','=','gaji.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->where('matkul.id_prodi','=',$id)
        ->whereMonth('gaji.tanggal', $request->bulan)->get();

        return response()->json($gaji);
    }

    public function pdfslip($id){
        $gaji = Gaji::join('detail_kelas','detail_kelas.id_detail','=','gaji.id_detail')
        ->join('kelas','kelas.id_kelas','=','detail_kelas.id_kelas')
        ->join('users','users.id','=','detail_kelas.id')
        ->join('matkul','matkul.id_mk','=','kelas.id_mk')
        ->join('semester','semester.id_smt','=','kelas.id_smt')
        ->join('prodi','prodi.id_prodi','=','matkul.id_prodi')
        ->where('gaji.id_gaji','=',$id)->get();

        $pdf = PDF::loadView('admin.pdfslip', compact('gaji'));
        return $pdf->stream();
    }
}
