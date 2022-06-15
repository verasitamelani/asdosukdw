<!DOCTYPE html>

<head>

    <title>Slip Gaji</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
            text-transform: uppercase;

        }
        #halaman{
            text-align:justify;
            width: auto;
            height: auto;
            position: absolute;
            padding-top: 40px;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 40px;
        }
        ul.a {
            list-style-type: square;
            font-size: 3;
        }
        ul.b{
            list-style-type: square;
            font-size: 5;
        }
        .tab1 {
            display: inline-block;
            margin-left: 20px;
        }
        .tab2 {
            display: inline-block;
            margin-left: 24px;
        }
        .font {
            text-align: right;
            float: right;
        }
        .page-break {
            page-break-before: always;
        }

        .invoice-articles-table {
            padding-bottom: 50px; //height of your footer
        }

    </style>
</head>
<body>
        <table border="0" align="justify">
            <tr>
            <td>  <img src="https://i.ibb.co/b5f1pZT/ukdw.png" width=60 height=80/></td>
            <td>
                <font size="4">UNIVERSITAS KRISTEN DUTA WACANA</font><br>
                <font size="2"><b>Jl.dr.Wahidin 5-25 Jogjakarta, 55224 Indonesia, Telp:62-274-563929 Fax:62-274-513235</b></font>
                <hr>
            </td>
            </tr>
        </table>
    @foreach($gaji as $gj)
    <div id=halaman>
            <b><font size="4">Honor Asisten Praktikum</font></b><br>
            <b><font size="4">Semester {{  $gj->ket_smt }} {{  $gj->tahun }}</font></b><br>
            <font size="3">Bulan<span class="tab1"></span>: {{ \Carbon\Carbon::parse($gj->tanggal)->format('F') }}</font><br>
            <font size="3">Nama<span class="tab1"></span>: {{ $gj->nama }}</font><br>
            <font size="3">Prodi<span class="tab2"></span>: {{ $gj->nama_prodi }}</font><br>
        <br>
        <table style="border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:147.7pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong>Matakuliah</strong></p>
                    </td>
                    <td style="width:1.0cm;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong>SKS</strong></p>
                    </td>
                    <td style="width:57.0pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong>Hr SKS</strong></p>
                    </td>
                    <td style="width:57.55pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong>Kehadiran</strong></p>
                    </td>
                    <td style="width:63.55pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong>Hr Hadir</strong></p>
                    </td>
                    <td style="width:70.85pt;border:solid windowtext 1.0pt;border-left:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong>Jumlah Hr</strong></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:147.7pt;border:solid windowtext 1.0pt;border-top:  none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>{{ $gj->nama_mk }}</p>
                    </td>
                    <td style="width:1.0cm;border-top:none;border-left:none;border-bottom:  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>{{ $gj->sks }}</p>
                    </td>
                    <td style="width:57.0pt;border-top:none;border-left:none;border-bottom:  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>Rp.{{number_format($gj->hr_sks,0,',','.')}}</p>
                    </td>
                    <td style="width:57.55pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>{{ $gj->total_hadir }}</p>
                    </td>
                    <td style="width:63.55pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>Rp.{{number_format($gj->hr_hadir,0,',','.')}}</p>
                    </td>
                    <td style="width:70.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>Rp.{{number_format($gj->jum_hr,0,',','.')}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="width:354.15pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><strong>Total</strong></p>
                    </td>
                    <td style="width:70.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>Rp.{{number_format($gj->jum_hr,0,',','.')}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="width:354.15pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><strong>Pajak</strong></p>
                    </td>
                    <td style="width:70.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>Rp.{{number_format($gj->pajak,0,',','.')}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="width:354.15pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><strong>Diterima</strong></p>
                    </td>
                    <td style="width:70.85pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'> Rp.{{number_format($gj->diterima,0,',','.')}}</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
        <table style="width:425.15pt;margin-left:21.75pt;border-collapse:collapse;border: none;">
            <tbody>
                <tr>
                    <td style="width: 150.4pt;padding: 0cm 5.4pt;height: 14.15pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                    </td>
                    <td style="width: 83pt;padding: 0cm 5.4pt;height: 14.15pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                    </td>
                    <td style="width:191.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>Yogyakarta, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150.4pt;padding: 0cm 5.4pt;height: 14.15pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>Yang Menerima</p>
                    </td>
                    <td style="width: 83pt;padding: 0cm 5.4pt;height: 14.15pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                    </td>
                    <td style="width:191.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:14.15pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>Biro 2 Keuangan</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150.4pt;padding: 0cm 5.4pt;height: 55.8pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                    </td>
                    <td style="width: 83pt;padding: 0cm 5.4pt;height: 55.8pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                    </td>
                    <td style="width:191.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:55.8pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150.4pt;padding: 0cm 5.4pt;height: 4.15pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>{{ $gj->nama }}</p>
                    </td>
                    <td style="width: 83pt;padding: 0cm 5.4pt;height: 4.15pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                    </td>
                    <td style="width:191.75pt;padding:0cm 5.4pt 0cm 5.4pt;height:4.15pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>Lois Kartika S</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
<br>
    </div>

</body>
@endforeach
</html>
