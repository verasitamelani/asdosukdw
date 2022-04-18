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
          <li><a class="nav-link" href="asisten"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
          <li class="active"><a class="nav-link" href="presensi"><i class="fas fa-file-alt"></i> <span>Presensi</span></a></li>
    </aside>
  </div>
<section class="section">
    <div class="section-body">
        <div class="card mt-0">
            <div class="card-body">
                <div class="section-title mt-0">Tabel Presensi</div>
                <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pertemuan</th>
                        <th scope="col">Matakuliah</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><button type="submit" class="btn btn-warning btn-sm" tabindex="4">Absen</button></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td><button type="submit" class="btn btn-warning btn-sm" tabindex="4">Absen</button></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td><button type="submit" class="btn btn-warning btn-sm" tabindex="4">Absen</button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
        </div>
      </div>
  </section>
</div>
@endsection
