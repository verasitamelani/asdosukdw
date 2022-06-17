
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
          <li class="active"><a class="nav-link" href="/dtkelas"><i class="fas fa-file-alt"></i> <span>Data Kelas</span></a></li>
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
            <h1 class="section-title"><a href="/dtmk" class="text-dark">Data Kelas</a> > </h1>
            <h1 class="section-title text-warning"> Edit Data</h1>
        </ul>
        <div class="card mt-0">
            <form action="{{ url('dtkelaseditup/'.$kelas->id_kelas) }}"  method="POST" class="">
                @csrf
                @method('PUT')
              <div class="card-header">
                <h4 class="section-title" >Form Edit Data Kelas </h4>
              </div>
              <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Matakuliah</label>
                    <div class="col-sm-8">
                    <select class="form-control select2" name="id_mk">
                    @foreach($matkul as $mk)
                        <option value="{{ $mk->id_mk }}" @if($mk->id_mk == $kelas->id_mk) selected @endif>{{ $mk->nama_mk }}</option>
                    @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Semester</label>
                    <div class="col-sm-8">
                    <select class="form-control " name="id_smt">
                    @foreach($semester as $smt)
                        <option value="{{ $smt->id_smt }}" @if($smt->id_smt == $kelas->id_smt) selected @endif>{{ $smt->nama_smt }}</option>
                    @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">SKS</label>
                  <div class="col-sm-4"> <input type="text" class="form-control" name="sks" value="{{ $kelas->sks }}"  required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Grup</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="grup" value="{{ $kelas->grup }}"  required>
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Hari</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="hari">
                      <option value="Senin" {{ $kelas->hari=="Senin" ? 'selected' : '' }}>Senin</option>
                      <option value="Selasa" {{ $kelas->hari=="Selasa" ? 'selected' : '' }}>Selasa</option>
                      <option value="Rabu" {{ $kelas->hari=="Rabu" ? 'selected' : '' }}>Rabu</option>
                      <option value="Kamis" {{ $kelas->hari=="Kamis" ? 'selected' : '' }}>Kamis</option>
                      <option value="Jumat" {{ $kelas->hari=="Jumat" ? 'selected' : '' }}>Jumat</option>
                      <option value="Sabtu" {{ $kelas->hari=="Sabtu" ? 'selected' : '' }}>Sabtu</option>
                      <option value="Minggu" {{ $kelas->hari=="Minggu" ? 'selected' : '' }}>Minggu</option>
                    </select>
                    </div>
                </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jam Mulai</label>
                    <div class="col-sm-4">
                      <input type="time" class="form-control" name="jam_mulai" value="{{ $kelas->jam_mulai }}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jam Selesai</label>
                    <div class="col-sm-4">
                      <input type="time" class="form-control" name="jam_selesai" value="{{ $kelas->jam_selesai }}"  required>
                    </div>
                  </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Dosen</label>
                    <div class="col-sm-8">
                    <select class="form-control " name="id">
                    @foreach($users as $user)
                      <option value="{{ $user->id }}" @if($user->id == $kelas->id) selected @endif>{{ $user->nama }} - {{ $user->nama_prodi }}</option>
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
