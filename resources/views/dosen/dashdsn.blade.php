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
          <li class="active"><a href="dosen"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
          <li><a class="nav-link" href="dsnpresensi"><i class="fas fa-file-alt"></i> <span>Data Presensi</span></a></li>
    </aside>
  </div>
<section class="section">
    <div class="section-body">
        <h1 class="section-title mb-0"> Hello! Nama Dosen</h1>
        <p class="section-lead mt-15 mb-0">Welcome Back To <img src="../assets/img/asdosUKDW.png" width="80" ></p>
        <div class="card mt-0">
            <div class="card-body">
                <div class="section-title mt-0">Jadwal Mengajar</div>
                <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Matakuliah</th>
                        <th scope="col">Grup</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Senin</td>
                        <td>13:20-14:45</td>
                        <td>Praktikum Basis Data</td>
                        <td>A</td>
                        <td><a href="detail" type="button" class="btn btn-success btn-sm">Detail</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
        </div>
      </div>
  </section>
</div>
@endsection
