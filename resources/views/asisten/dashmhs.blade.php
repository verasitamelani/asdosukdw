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
          <li class="active"><a href="asisten"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
          <li><a class="nav-link" href="presensi"><i class="fas fa-file-alt"></i> <span>Presensi</span></a></li>
    </aside>
  </div>
<section class="section">
    <div class="section-body">
        <h1 class="section-title mb-0"> Hello! {{ auth()->user()-> nama }} </h1>
        <p class="section-lead mt-15 mb-0">Welcome Back To <img src="../assets/img/asdosUKDW.png" width="80" ></p>

        <a href="/cetakslip" type="button" class="btn btn-outline-warning mb-3" tabindex="3">Cetak Slip Gaji</a>

        <div class="card mt-0">
            <div class="card-body">
                <div class="section-title mt-0">Jadwal Asistensi</div>
                <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Matakuliah</th>
                        <th scope="col">Grup</th>
                        <th scope="col">Dosen</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($asisten as $a)
                      <tr>
                        <td>{{ $a->hari }}</td>
                        <td>{{ date('H:i', strtotime($a->jam_mulai)) }} - {{ date('H:i', strtotime($a->jam_selesai)) }}</td>
                        <td>{{ $a->nama_mk}}</td>
                        <td>{{ $a->grup }}</td>
                        <td>{{ $a->nama }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
        </div>
      </div>
  </section>
</div>
@endsection
