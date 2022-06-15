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
          <li><a class="nav-link" href="/dtpresensi"><i class="fas fa-folder"></i> <span>Data Presensi</span></a></li>
          <li><a class="nav-link" href="/finalisasi"><i class="fas fa-folder"></i> <span>Finalisasi</span></a></li>
          <li><a class="nav-link" href="/slipgaji"><i class="fas fa-folder-open"></i> <span>Data Slip Gaji</span></a></li>
          <li class="active"><a href="/arsip"><i class="fas fa-archive"></i> <span>Data Arsip Slip Gaji</span></a></li>
    </aside>
  </div>
  <section class="section">
    <div class="section-body">
        <ul class="breadcrumb mb-2">
            <h1 class="section-title"><a href="/arsip" class="text-dark">Arsip Slip Gaji</a> > </h1>
            @foreach($prodi as $pd)
            <h1 class="section-title text-warning"> {{ $pd->nama_prodi }} </h1></ul>
            @endforeach
    </div>
    <div class="form-group row mt-3">
        <div class="col-sm-2">
        <select name="bulan" id="bulan" class="form-control filter">
            <option value="0">Pilih Bulan</option>
        @foreach($bulan as $bln)
        <option value="{{ $bln->value }}"> {{ $bln->label }}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Matakuliah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Pajak</th>
                    <th scope="col">Total Gaji Bersih</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                @foreach($gaji as $no=>$gj)
                  <tr>
                    <th scope="row">{{ ++$no + ($gaji->currentPage()-1) * $gaji->perPage() }}</th>
                    <td>{{ date('F', strtotime($gj->tanggal)) }}</td>
                    <td>{{ $gj->nama }}</td>
                    <td>{{ $gj->nama_mk }}</td>
                    <td>{{ $gj->jum_hr  }}</td>
                    <td>{{ $gj->pajak  }}</td>
                    <td>{{ $gj->diterima  }}</td>
                    <td><a href="/slipgaji2/pdfslip/{{ $gj->id_gaji }}" type="button" class="btn btn-info btn-sm">Lihat</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
                {{ $gaji->links() }}
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
                    var url = "{{ route('arsiptgl', ':id')}}";
                    url = url.replace(':id', id);
                    $.ajax({
                        url : url,
                        type : "GET",
                        data : {'bulan':bulan},
                        dataType : "json",
                        success:function(data){
                            console.log(url);
                            var html = '';
                            var no = 1;
                            $.each(data, function(key, data) {
                                const tgl = new Date(data.tanggal);
                                    html += '<tr>\
                                        <th>  '+(no++)+' </th>\
                                        <td> '+tgl.toLocaleString('default',{month: 'long'})+'</td>\
                                        <td> '+data.nama+'</td>\
                                        <td> '+data.nama_mk+'</td>\
                                        <td> '+data.jum_hr+' </td>\
                                        <td> '+data.pajak+'</td>\
                                        <td> '+data.diterima+' </td>\
                                        <td> <a href="/arsip/pdfslip/'+data.id_gaji+'" type="button" class="btn btn-info btn-sm">Lihat</a> </td>\
                                        </tr>';
                            });
                            $("#tbody").html(html);
                        }
                    });
                });
            });
</script>
@endpush
