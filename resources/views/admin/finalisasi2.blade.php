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
          <li ><a href="/dtpresensi"><i class="fas fa-folder"></i> <span>Data Presensi</span></a></li>
          <li class="active"><a href="/finalisasi"><i class="fas fa-folder"></i> <span>Finalisasi</span></a></li>
          <li><a class="nav-link" href="/slipgaji"><i class="fas fa-folder-open"></i> <span>Data Slip Gaji</span></a></li>
          <li><a class="nav-link" href="/arsip"><i class="fas fa-archive"></i> <span>Data Arsip Slip Gaji</span></a></li>
    </aside>
  </div>
  @if ($message = Session::get('successtambah'))
  <div class="alert alert-warning">
      <p>{{ $message }}</p>
  </div>
@endif
@if ($message = Session::get('eror'))
  <div class="alert alert-warning">
      <p>{{ $message }}</p>
  </div>
@endif
<section class="section">
    <div class="section-body">
        <ul class="breadcrumb mb-2">
            <h1 class="section-title"><a href="/finalisasi" class="text-dark">Finalisasi</a> > </h1>
            @foreach($prodi as $pd)
            <h1 class="section-title text-warning"> {{ $pd->nama_prodi }} </h1></ul>
            @endforeach
            <form method="POST" action="/finalisasihasil">
                @csrf
                <div class="form" id="form">

                </div>
                <button type="submit" class="btn btn-outline-warning mb-3" id="final">Finalisasi</button>
                </form>

    </div>
    <div class="form-group row">
        <div class="col-sm-2">
        <select name="bulan" id="bulan" class="form-control filter">
            <option value="0">Pilih Bulan</option>
        @foreach($bulan as $bln)
        <option value="{{ $bln->value }}"> {{ $bln->label }}</option>
            @endforeach
        </select>
        </div>
    </div>
    </form>
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm" id="finalisasi">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Matakuliah</th>
                        <th scope="col">SKS</th>
                        <th scope="col">Hr SKS</th>
                        <th scope="col">Kehadiran</th>
                        <th scope="col">Hr Hadir</th>
                        <th scope="col">Jumlah Hr</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                    @foreach($jum_hr as $hdr)
                      <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $hdr->nama }}</td>
                        <td>{{ $hdr->nama_mk }}</td>
                        <td>{{ $hdr->sks }}</td>
                        <td>{{ $hdr->hr_sks  }}</td>
                        <td>{{ $hdr->total_hadir  }}</td>
                        <td>{{ $hdr->hr_hadir  }}</td>
                        <td>{{ $hdr->jum_hr  }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                    {{ $jum_hr->links() }}
        </div>
      </div>
  </section>
</div>
@endsection
@push('customscript')
<script>
    var id={!! $id !!}
    console.log(id)

            $(document).ready(function(){
                $("#bulan").on('change', function(){
                    var bulan = $(this).val();
                    var url = "{{ route('finalisasibyTgl', ':id')}}";
                    url = url.replace(':id', id);
                    $.ajax({
                        url : url,
                        type : "GET",
                        data : {'bulan':bulan},
                        dataType : "json",
                        success:function(data){
                            console.log(url);
                            var html = '';
                            var form = '';
                            var no = 1;
                            $.each(data, function(key, data) {
                                    html += '<tr>\
                                        <th>  '+(no++)+' </th>\
                                        <td> '+data.nama+'</td>\
                                        <td> '+data.nama_mk+'</td>\
                                        <td> '+data.sks+'</td>\
                                        <td> '+data.hr_sks+' </td>\
                                        <td> '+data.total_hadir+'</td>\
                                        <td> '+data.hr_hadir+' </td>\
                                        <td> '+data.jum_hr+' </td>\
                                        </tr>';
                            });
                            $("#tbody").html(html);
                            $.each(data, function(key, data) {
                                    form += '<input type="hidden" name="total_hadir[]" value='+data.total_hadir+'>\
                                        <input type="hidden" name="hr_sks[]" value='+data.hr_sks+'>\
                                        <input type="hidden" name="hr_hadir[]" value='+data.hr_hadir+'>\
                                        <input type="hidden" name="jum_hr[]" value='+data.jum_hr+'>\
                                        <input type="hidden" name="pajak[]" value='+data.pajak+'>\
                                        <input type="hidden" name="diterima[]" value='+data.diterima+'>\
                                        <input type="hidden" name="pengali_sks[]" value='+data.pengali_sks+'>\
                                        <input type="hidden" name="harga_kehadiran[]" value='+data.harga_kehadiran+'>\
                                        <input type="hidden" name="pengali_jum_hadir[]" value='+data.pengali_jum_hadir+'>\
                                        <input type="hidden" name="id_detail[]" value='+data.id_detail+'>\
                                        <input type="hidden" name="tgl[]" value='+data.tgl+'>\
                                        <input type="hidden" name="id[]" value='+data.id+'> ';
                            });
                            $(".form").html(form);
                        }
                    });
                });

            });
</script>
@endpush
