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
          <li><a class="nav-link" href="/admin"><i class="fas fa-th-large"></i> <span>Data Asisten dan Dosen</span></a></li>
          <li class="active"><a class="nav-link" href="/dtsmt"><i class="fas fa-list-ul"></i> <span>Data Semester</span></a></li>
          <li><a class="nav-link" href="/dtsmt"><i class="fas fa-clipboard-list"></i> <span>Data Matakuliah</span></a></li>
          <li><a class="nav-link" href="/dtrms"><i class="fas fa-plus-square"></i> <span>Data Rumus</span></a></li>
          <li><a class="nav-link" href="/dtkelas"><i class="fas fa-file-alt"></i> <span>Data Kelas</span></a></li>
          <li><a class="nav-link" href="/dtdetail"><i class="fas fa-file-alt"></i> <span>Data Detail Kelas</span></a></li>
          <li><a class="nav-link" href="/dtpresensi"><i class="fas fa-folder"></i> <span>Data Presensi</span></a></li>
          <li><a class="nav-link" href="/finalisasi"><i class="fas fa-folder"></i> <span>Finalisasi</span></a></li>
          <li><a class="nav-link" href="/slipgaji"><i class="fas fa-folder-open"></i> <span>Data Slip Gaji</span></a></li>
          <li><a class="nav-link" href="/arsip"><i class="fas fa-archive"></i> <span>Data Arsip Slip Gaji</span></a></li>
    </aside>
</div>
<section class="section">
    <div class="section-body">
        <ul class="breadcrumb mb-2">
            <h1 class="section-title"><a href="dtsmt" class="text-dark">Data Semester</a> > </h1>
            <h1 class="section-title text-warning"> Tambah Data</h1>
        </ul>
        <div class="card mt-0">
            <form action="/savesmt" method="POST" class="">
              @csrf
              <div class="card-header">
                <h4 class="section-title" >Form Tambah Data Semester </h4>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nama Semester</label>
                  <div class="col-sm-4"> <input type="text" class="form-control" name="nama_smt" required>
                  </div>
                  <p class="text-danger">*isi semester berupa angka, contoh : 1</p>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Tahun</label>
                  <div class="col-sm-4"> <input type="text" class="form-control" name="tahun" required>
                  </div>
                  <p class="text-danger">*isikan tahun ajaran, contoh : 2019/2020</p>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Keterangan Semester</label>
                    <div class="col-sm-4">
                    <select class="form-control" name="ket_smt">
                      <option>ganjil</option>
                      <option>genap</option>
                    </select>
                    </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
      </div>
  </section>
</div>
@endsection
