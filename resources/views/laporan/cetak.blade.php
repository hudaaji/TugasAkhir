<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('css/plugins/fontawesome-free/css/all.min.css')}}">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{asset('css/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('css/dist/css/adminlte.min.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
@include('template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 @include('template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="form-group">
                <div class="form-group">
                <img src="{{asset('gambar/logo.jpg')}}" alt="AdminLTE Logo" class="rounded mx-auto d-block" width="10%" height="10%" style="opacity: .8">
                <center>
                    <h3><b>Laporan Pemesanan</b></h3>
                    <h4><b>Suryani Catering</b></h4>
                    Jalan Kaswari No. 41, Br. Semaga, Denpasar, Bali. <br>
                    Telp. 082144534412 <br>
                    <b>Periode : </b>
                    {{$tglawal}} - {{$tglakhir}} <br>
                    
                </center>
                </div>
                <div>
                    <button class="btn btn-outline-info" onclick="window.print()"> Print Laporan </button>
                </div>
                <br>
                <table class="static" align="center" rules="all" border="1px" style="width: 85%;">
                    <tr align="center">
                        <th>Atas Nama</th>
                        <th>Alamat Acara</th>
                        <th>Tanggal Pesan</th>
                        <th>Jenis Pemesanan</th>
                        <th>Paket</th>
                        <th>Menu Tambahan</th>
                        <th>Jumlah Undangan</th>
                        <th>Harga</th>
                    </tr>
                    @foreach ($laporan as $a)
                    <tr align="center">
                        <td style="width: 20%">{{ $a->user->nama }}</td>
                        <td>{{ $a->alamat_acara }}</td>
                        <td>{{ $a->tgl_pemesanan }}</td>
                        <td>{{ $a->jenis_pemesanan }}</td>
                        <td>@if($a->paket != NULL) {{ $a->paket2->nama_paket }} @endif</td>
                        <td>
                            @foreach ($a->menutambah as $tambah)
                            {{$tambah->menu->nama_menu}} <br>
                            @endforeach
                        </td>
                        <td>{{ $a->jumlah_undangan }}</td>
                        <td align="left" style="width: 10%">Rp. {{ number_format($a->harga) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="7" align="center"><b> TOTAL </b></td>
                        <td><b>RP. {{ number_format($total) }}</b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

  </div>
</div>

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
</div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('css/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('css/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('css/dist/js/adminlte.min.js')}}"></script>
{{--  <script type="text/javascript">
    window.print();
</script>  --}}
</body>
</html>
