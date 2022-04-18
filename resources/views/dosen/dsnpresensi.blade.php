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
        <h1 class="section-title mb-3"> Data Presensi</h1>

        <a href="buatpresensi" type="button" class="btn btn-outline-warning mb-3" tabindex="3">Buat Presensi</a>

        <div class="card mt-0">
            <div class="card-body">
                <div class="section-title mt-0">Data Presensi Kehadiran Asisten</div>
                <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pertemuan</th>
                        <th scope="col">Matakuliah</th>
                        <th scope="col">Asisten</th>
                        <th scope="col">Jam Presensi</th>
                        <th scope="col">Keterangan Hadir</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</td>
                        <td>9 Maret 2022</td>
                        <td>2</td>
                        <td>Praktikum Basis Data</td>
                        <td>Veronika Verasita Melani</td>
                        <td>07.31</td>
                        <td><div class="badge badge-info">Hadir</div></td>
                        <td><a href="" type="button" class="btn btn-success btn-sm">Validasi</a>
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
