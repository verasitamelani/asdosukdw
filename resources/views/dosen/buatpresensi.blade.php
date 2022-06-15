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
          <li><a class="nav-link" href="dosen"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
          <li class="active"><a class="nav-link" href="dsnpresensi"><i class="fas fa-file-alt"></i> <span>Data Presensi</span></a></li>
    </aside>
  </div>

<section class="section">
    <div class="section-body">
            <ul class="breadcrumb mb-2">
                <h1 class="section-title"><a href="dsnpresensi" class="text-dark">Data Presensi</a> > </h1>
                <h1 class="section-title text-warning"> Buat Presensi</h1>
            </ul>
            <div class="card mt-0">
                <form action="/savepresensi" method="POST" class="">
                @csrf
                <div class="form" id="form">
                @foreach($kls as $m )
                <input type="hidden" name="id_detail[]" value="{{ $m->id_detail }}">
                @endforeach
                  <div class="card-body">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal</label>
                      <div class="col-sm-4"> <input type="date" class="form-control" name="tgl[]" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Pertemuan Ke</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="pertemuan[]" required>
                      </div>
                      <p class="text-danger">*isi berupa angka, contoh : 10</p>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Matakuliah</label> {{-- pilihan matakuliah berdasarkan dosen yg mengampu/kalau satu didefault --}}
                        <div class="col-sm-4">
                        <select class="form-control" id="kelas" name="id_kelas" >
                        @foreach($kls as $m )
                          <option value="{{ $m->id_kelas }}"> {{ $m->nama_mk }}  {{$m->grup}} </option>
                        @endforeach
                        </select>
                        </div>
                      </div>
                  <div class="card-footer text-right col-sm-7">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                </form>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection
