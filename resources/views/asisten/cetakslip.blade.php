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
          <li class="active"><a href="/asisten"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
          <li><a class="nav-link" href="/presensi"><i class="fas fa-file-alt"></i> <span>Presensi</span></a></li>
    </aside>
  </div>
<section class="section">
    <div class="section-body">
        <ul class="breadcrumb mb-2">
            <h1 class="section-title"><a href="/asisten" class="text-dark">Dashboard</a> > </h1>
            <h1 class="section-title text-warning"> Slip Gaji Asisten</h1>
        </ul>
        <div class="card mt-0">
            <div class="card-body">
                <div class="section-title mt-0">Slip Gaji Asisten</div>
                <div class="table-responsive">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Bulan dan Tahun</th>
                        <th scope="col">Matakuliah</th>
                        <th scope="col">Grup</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($gaji as $no=>$gj)
                      <tr>
                        <th scope="row">{{ ++$no + ($gaji->currentPage()-1) * $gaji->perPage() }}</th>
                        <td>{{ date('F', strtotime($gj->tanggal)) }} {{ date('Y', strtotime($gj->tanggal)) }}</td>
                        <td>{{ $gj->nama_mk}}</td>
                        <td>{{ $gj->grup }}</td>
                        <td><a href="/asisten/pdfslip/{{ $gj->id_gaji }}" type="button" class="btn btn-info btn-sm">Cetak Slip</a>
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


