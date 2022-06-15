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
          <li><a class="nav-link" href="/dtsmt"><i class="fas fa-clipboard-list"></i> <span>Data Semester</span></a></li>
          <li><a class="nav-link" href="/dtmk"><i class="fas fa-list-ul"></i> <span>Data Matakuliah</span></a></li>
          <li><a class="nav-link" href="/dtrms"><i class="fas fa-plus-square"></i> <span>Data Rumus</span></a></li>
          <li><a class="nav-link" href="/dtkelas"><i class="fas fa-file-alt"></i> <span>Data Kelas</span></a></li>
          <li class="active"><a class="nav-link" href="/dtdetail"><i class="fas fa-file-alt"></i> <span>Data Detail Kelas</span></a></li>
          <li><a class="nav-link" href="/dtpresensi"><i class="fas fa-folder"></i> <span>Data Presensi</span></a></li>
          <li><a class="nav-link" href="/finalisasi"><i class="fas fa-folder"></i> <span>Finalisasi</span></a></li>
          <li><a class="nav-link" href="/slipgaji"><i class="fas fa-folder-open"></i> <span>Data Slip Gaji</span></a></li>
          <li><a class="nav-link" href="/arsip"><i class="fas fa-archive"></i> <span>Data Arsip Slip Gaji</span></a></li>
    </aside>
</div>
<section class="section">
    <div class="section-body">
        <ul class="breadcrumb mb-2">
            <h1 class="section-title"><a href="/dtdetail" class="text-dark">Data Detail Kelas</a> > </h1>
            <h1 class="section-title text-warning"> Tambah Data</h1>
        </ul>
        <div class="card mt-0">
            <form action="/dtdetailsave" method="POST" class="">
                @csrf
              <div class="card-header">
                <h4 class="section-title" >Form Tambah Data Detail Kelas </h4>
              </div>
              <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Matakuliah</label>
                    <div class="col-sm-8">
                    <select class="form-control select2" name="id_kelas" required >
                    <option value="">Pilih</option>
                    @foreach($matkul as $mk)
                        <option value="{{ $mk->id_kelas }}"> {{ $mk->nama_mk }} - {{ $mk->grup }}</option>
                    @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Asisten</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="id">
                    <option value="">Pilih</option>
                    @foreach($users as $user)
                      <option value="{{ $user->id }}"> {{ $user->nama }} - {{ $user->nama_prodi }}</option>
                    @endforeach
                    </select>
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
