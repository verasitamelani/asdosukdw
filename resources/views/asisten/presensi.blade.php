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
  @if ($message = Session::get('successtmbh'))
      <div class="alert alert-warning">
          <p>{{ $message }}</p>
      </div>
@endif
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
                      @foreach($tampil as $no => $mhs)
                      <tr>
                      <th scope="row">{{ $no +1 }}</td>
                      <td>{{ date('d F Y', strtotime($mhs->tgl)) }}</td>
                      <td>{{ $mhs->pertemuan }}</td>
                      <td>{{ $mhs->nama_mk }}</td>
                      <td> 
                      @if($cd >= 1)
                        <button type="button" class="btn btn-secondary btn-sm" id="btn" disabled>Hadir</button>
                      @elseif($mhs->tgl == $day++ && $time >= $mhs->jam_mulai && $time <= $mhs->jam_selesai) 
                          <form action="/mhspresensi" method="POST" class="d-inline">
                          @csrf
                          <input type="hidden" name="id_detail" value="{{ $mhs->id_detail }}">
                          <input type="hidden" name="pertemuan" value="{{ $mhs->pertemuan}}">
                          <button type="submit" class="btn btn-success btn-sm" id="btn">Hadir</button>
                          </form>
                          @else
                          <button type="button" class="btn btn-secondary btn-sm" id="btn" disabled>Hadir</button>
                        @endif
                        </td>
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
