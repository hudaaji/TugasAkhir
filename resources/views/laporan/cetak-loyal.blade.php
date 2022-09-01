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
                    <h3><b>Laporan Customer Loyal</b></h3>
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
                <table class="static" align="center" rules="all" border="1px" style="width: 60%;">
                    <tr align="center">
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Jumlah Pemesanan</th>
                    </tr>
                    @foreach ($loyal as $a)
                    @if ($a->user_transaksi >= 5)
                    <tr align="center">
                        <td>{{ $a->user->nama }}</td>
                        <td>{{ $a->user->alamat }}</td>
                        <td>{{ $a->user->kota }}</td>
                        <td><b>{{ $a->user_transaksi }}</b></td>
                    </tr>
                    @endif
                    @endforeach
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
