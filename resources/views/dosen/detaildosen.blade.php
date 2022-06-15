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
          <li class="active"><a href="/dosen"><i class="fas fa-th-large"></i> <span>Dashboard</span></a></li>
          <li><a class="nav-link" href="/dsnpresensi"><i class="fas fa-file-alt"></i> <span> Data Presensi</span></a></li>
    </aside>
  </div>
<section class="section">
    <div class="section-body">
        <ul class="breadcrumb mb-2">
            <h1 class="section-title"><a href="/dosen" class="text-dark">Dashboard</a> > </h1>
            <h1 class="section-title text-warning"> Detail</h1>
        </ul>
        <div class="card3 mt-0">
        @if (count($dk)>0)
        <div class="card-header section-title">Grup </div>
        <div class="card-body" width="100%">
            <div class="table-responsive">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nim</th>
                      <th scope="col">Nama</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dk as $dk1)
                    <tr>
                      <th scope="row">{{ $no++ }}</th>
                      <td> {{ $dk1->nim_nidn }} </td>
                      <td>{{ $dk1->nama }} </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        @else
        <div class="card-header section-title">"Belum ada Asisten Yang Terdaftar!"</div>
        @endif
  </section>
</div>
@endsection
