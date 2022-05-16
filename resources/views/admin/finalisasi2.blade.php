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
          <li ><a href="dtpresensi"><i class="fas fa-folder"></i> <span>Data Presensi</span></a></li>
          <li class="active"><a href="/finalisasi"><i class="fas fa-folder"></i> <span>Finalisasi</span></a></li>
          <li><a class="nav-link" href="/slipgaji"><i class="fas fa-folder-open"></i> <span>Data Slip Gaji</span></a></li>
          <li><a class="nav-link" href="/arsip"><i class="fas fa-archive"></i> <span>Data Arsip Slip Gaji</span></a></li>
    </aside>
  </div>
<section class="section">
    <div class="section-body">
        <ul class="breadcrumb mb-2">
            <h1 class="section-title"><a href="/finalisasi" class="text-dark">Finalisasi</a> > </h1>
            @foreach($prodi as $pd)
            <h1 class="section-title text-warning"> {{ $pd->nama_prodi }} </h1>
            @endforeach
        </ul>
        <div class="card mt-0">
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Asisten</th>
                        <th scope="col">Matakuliah</th>
                        <th scope="col">SKS</th>
                        <th scope="col">Hr SKS</th>
                        <th scope="col">Kehadiran</th>
                        <th scope="col">Hr Hadir</th>
                        <th scope="col">Jumlah Hadir</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($gaji as $no => $gj)
                      <tr>
                        <th scope="row">{{ ++$no + ($gaji->currentPage()-1) * $gaji->perPage() }}</th>
                        <td>{{ date('d F Y', strtotime($gj->tanggal)) }}</td>
                        <td>{{ $gj->hr_sks }}</td>
                        <td>{{ $gj->hr_hadir }}</td>
                        <td>{{ $gj->sks }}</td>
                        <td>{{ $gj->hr_sks  }}</td>
                        <td>{{ $gj->total_hadir }}</td>
                        <td>{{ $gj->hr_hadir }}</td>
                        <td>{{ $gj->jum_hr }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                @if($gaji->hasPages())
                    {{ $gaji->links() }}
                @endif
        </div>
      </div>
  </section>
</div>
@endsection

