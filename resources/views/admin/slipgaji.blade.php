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
          <li><a class="nav-link" href="dtmk"><i class="fas fa-list-ul"></i> <span>Data Matakuliah</span></a></li>
          <li><a class="nav-link" href="dtrms"><i class="fas fa-plus-square"></i> <span>Data Rumus</span></a></li>
          <li><a class="nav-link" href="dtkelas"><i class="fas fa-file-alt"></i> <span>Data Kelas</span></a></li>
          <li><a class="nav-link" href="dtdetail"><i class="fas fa-file-alt"></i> <span>Data Detail Kelas</span></a></li>
          <li><a class="nav-link" href="dtpresensi"><i class="fas fa-folder"></i> <span>Data Presensi</span></a></li>
          <li><a class="nav-link" href="finalisasi"><i class="fas fa-folder"></i> <span>Finalisasi</span></a></li>
          <li class="active"><a href="slipgaji"><i class="fas fa-folder-open"></i> <span>Data Slip Gaji</span></a></li>
          <li><a class="nav-link" href="arsip"><i class="fas fa-archive"></i> <span>Data Arsip Slip Gaji</span></a></li>
    </aside>
  </div>
<section class="section">
    <div class="section-body">
        <h1 class="section-title mb-5"> Data Slip Gaji </h1>
        <p class="section-lead"> Program Studi Universitas Kristen Duta Wacana</p>
        <div class="row ml-0">
            <div class="statistic__item mr-5">
                <h3 class="title-tulisan"><a class="text-warning" href="">Sarjana Filsafat Keilahian</a></h3>
            </div>
            <div class="statistic__item mr-5">
                <h3 class="title-tulisan"><a class="text-warning" href="">Arsitektur</a></h3>
            </div>
            <div class="statistic__item mr-5">
                <h3 class="title-tulisan"><a class="text-warning" href="">Desain Produk</a></h3>
            </div>
            <div class="statistic__item mr-5">
                <h3 class="title-tulisan"><a class="text-warning" href="">Biologi</a></h3>
            </div>
            <div class="statistic__item mr-5">
                <h3 class="title-tulisan"><a class="text-warning" href="">Kedokteran</a></h3>
            </div>
            <div class="statistic__item mr-5">
                <h3 class="title-tulisan"><a class="text-warning" href="">Manajemen</a></h3>
            </div>
            <div class="statistic__item mr-5">
                <h3 class="title-tulisan"><a class="text-warning" href="">Akuntansi</a></h3>
            </div>
            <div class="statistic__item mr-5">
                <h3 class="title-tulisan"><a class="text-warning" href="">Informatika</a></h3>
            </div>
            <div class="statistic__item mr-5">
                <h3 class="title-tulisan"><a class="text-warning" href="">Sistem Informasi</a></h3>
            </div>
            <div class="statistic__item mr-5">
                <h3 class="title-tulisan"><a class="text-warning" href="">Pendidikan Bahasa Inggris</a></h3>
            </div>
        </div>
  </section>
</div>
@endsection
