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
          <li class="active"><a class="nav-link" href="/dtrms"><i class="fas fa-plus-square"></i> <span>Data Rumus</span></a></li>
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
            <h1 class="section-title"><a href="/dtrms" class="text-dark">Data Rumus</a> > </h1>
            <h1 class="section-title text-warning"> Edit Data</h1>
        </ul>
        <div class="card mt-0">
            <form action="{{ url('dtrumuseditup/'.$rumus->id_rms) }}"  method="POST" class="">
                @csrf
                @method('PUT')
              <div class="card-header">
                <h4 class="section-title" >Form Edit Data Rumus </h4>
              </div>
              <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> Program Studi</label>
                    <div class="col-sm-8">
                    <select class="form-control select2" name="id_prodi">
                    @foreach($prodi as $pd)
                        <option value="{{ $pd->id_prodi }}" @if($pd->id_prodi == $rumus->id_prodi) selected @endif>{{ $pd->nama_prodi }}</option>
                    @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Pengali SKS</label>
                  <div class="col-sm-4"> <input type="text" class="form-control" name="pengali_sks" value="{{ $rumus->pengali_sks }}"  required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Harga Kehadiran</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="harga_kehadiran" value="{{ $rumus->harga_kehadiran }}"  required>
                  </div>
                </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pengali Kehadiran</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="pengali_jum_hadir" value="{{ $rumus->pengali_jum_hadir }}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pajak 1</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="pajak1" value="{{ $rumus->pajak1 }}"  required>
                    </div>
                    <label class="text-danger"> *diisi 0.05 untuk 50%</label>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pajak 2</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="pajak2" value="{{ $rumus->pajak2 }}"  required>
                    </div>
                    <label class="text-danger"> *diisi 0.5 untuk 5%</label>
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
