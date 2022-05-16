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
          <li><a class="nav-link" href="/dtdetail"><i class="fas fa-file-alt"></i> <span>Data Detail Kelas</span></a></li>
          <li class="active"><a href="/dtpresensi"><i class="fas fa-folder"></i> <span>Data Presensi</span></a></li>
          <li><a class="nav-link" href="/finalisasi"><i class="fas fa-folder"></i> <span>Finalisasi</span></a></li>
          <li><a class="nav-link" href="/slipgaji"><i class="fas fa-folder-open"></i> <span>Data Slip Gaji</span></a></li>
          <li><a class="nav-link" href="/arsip"><i class="fas fa-archive"></i> <span>Data Arsip Slip Gaji</span></a></li>
    </aside>
  </div>
<section class="section">
    <div class="section-body">
        <ul class="breadcrumb mb-2">
            <h1 class="section-title"><a href="/dtpresensi" class="text-dark">Data Presensi</a> > </h1>
            @foreach($prodi as $pd)
            <h1 class="section-title text-warning"> {{ $pd->nama_prodi }} </h1>
            @endforeach
        </ul>
        <div class="card-header-action dropdown show">
            <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle" aria-expanded="true">Filter</a>
            <ul class="dropdown-menu dropdown-menu-sm">
              <li class="dropdown-title">Select Period</li>
              <li><a href="#" class="dropdown-item">Today</a></li>
              <li><a href="#" class="dropdown-item">Week</a></li>
              <li><a href="#" class="dropdown-item active">Month</a></li>
              <li><a href="#" class="dropdown-item">This Year</a></li>
            </ul>
          </div>
        <div class="card mt-3">
            <div class="card-body">
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
                        <th scope="col">Ket Hadir</th>
                        <th scope="col">validitas</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($absen as $no => $absn)
                      <tr>
                        <th scope="row">{{ ++$no + ($absen->currentPage()-1) * $absen->perPage() }}</th>
                        <td>{{ date('d F Y', strtotime($absn->tgl)) }}</td>
                        <td>{{ $absn->pertemuan }}</td>
                        <td>{{ $absn->nama_mk }}</td>
                        <td>{{ $absn->nama }}</td>
                        <td>{{ date('H:i', strtotime($absn->jam)) }}</td>
                        <td>{{ $absn->kehadiran }}</td>
                        <td>{{ $absn->ket_vali }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                @if($absen->hasPages())
                    {{ $absen->links() }}
                @endif
        </div>
      </div>
  </section>
</div>
@endsection
