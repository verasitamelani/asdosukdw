@extends('layouts.main')
@section('content')
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
       <center> <img src="../assets/img/logo.png" alt="logo" width="200"></center>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header"> </li>
          <li><a class="nav-link" href="admin"><i class="fas fa-th-large"></i> <span>Data Asisten dan Dosen</span></a></li>
          <li><a class="nav-link" href="dtsmt"><i class="fas fa-clipboard-list"></i> <span>Data Semester</span></a></li>
          <li class="active"><a class="nav-link" href="dtmk"><i class="fas fa-list-ul"></i> <span>Data Matakuliah</span></a></li>
          <li><a class="nav-link" href="dtrms"><i class="fas fa-plus-square"></i> <span>Data Rumus</span></a></li>
          <li><a class="nav-link" href="dtkelas"><i class="fas fa-file-alt"></i> <span>Data Kelas</span></a></li>
          <li><a class="nav-link" href="dtdetail"><i class="fas fa-file-alt"></i> <span>Data Detail Kelas</span></a></li>
          <li><a class="nav-link" href="dtpresensi"><i class="fas fa-folder"></i> <span>Data Presensi</span></a></li>
          <li><a class="nav-link" href="finalisasi"><i class="fas fa-folder"></i> <span>Finalisasi</span></a></li>
          <li><a class="nav-link" href="slipgaji"><i class="fas fa-folder-open"></i> <span>Data Slip Gaji</span></a></li>
          <li><a class="nav-link" href="arsip"><i class="fas fa-archive"></i> <span>Data Arsip Slip Gaji</span></a></li>
    </aside>
  </div>
@if ($message = Session::get('successtambah'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
@endif
@if ($message = Session::get('successedit'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
@endif
@if ($message = Session::get('successhapus'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
@endif
<section class="section">
    <div class="section-body">
        <h1 class="section-title mb-3"> Data Matakuliah</h1>
        <a href="/dtmkadd" type="button" class="btn btn-outline-warning mb-3" tabindex="3">Tambah Data</a>
        <p class="section-lead ml-1"> *Keterangan Jenis : <br>
                1 : Praktikum <br>
                2 : Teori
        </p>
        <div class="card mt-0">
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Matakuliah</th>
                        <th scope="col">Nama Matakuliah</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($mk as $no => $matkul)
                      <tr>
                        <th scope="row">{{ ++$no + ($mk->currentPage()-1) * $mk->perPage() }}</th>
                        <td>{{ $matkul-> kode_mk}}</td>
                        <td>{{ $matkul-> nama_mk }}</td>
                        <td>@if($matkul->jenis_mk == 1) {{ "Praktikum"}}
                        @else
                        {{ "Teori" }}
                        @endif
                        </td>
                        <td>{{ $matkul-> nama_prodi }}</td>
                        <td><a href="dtmkedit/{{ $matkul->id_mk }}" type="button" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delmk/{{ $matkul->id_mk }}" type="button" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                {{ $mk->links() }}
        </div>
      </div>
  </section>
</div>
@endsection
