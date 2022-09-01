<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('template.head')
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
              <div class="col-sm-12">
            <center> <h1 class="m-0">Dashboard</h1></center>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
              <!-- small box -->
            <div class="col-sm-6">
                <center> <h4> Pesanan Hari Ini </h4> </center>
            <table class="table table-striped" style="width:100% text-align:center;">
                <tr>
                    <th>ID </th>
                    <th>Atas Nama</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Jenis Pemesanan</th>
                    <th>Jumlah Undangan</th>
                </tr>
                @foreach ($pemesanan as $p)
                <tr>
                    <th>{{$p->id}}</th>
                    <td>{{$p -> user -> nama}}</td>
                    <td>{{$p -> tgl_pemesanan}}</td>
                    <td>{{$p -> jenis_pemesanan}}</td>
                    <td>{{$p -> jumlah_undangan}}</td>
                </tr>
                @endforeach
            </table>
            </div>
            <div class="col-sm-6">
                <center> <h4> Pesanan Besok </h4> </center>
                <table class="table table-striped" style="width:100% text-align:center;">
                    <tr>
                        <th>ID </th>
                        <th>Atas Nama</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Jenis Pemesanan</th>
                        <th>Jumlah Undangan</th>
                    </tr>
                    @foreach ($pemesanan_besok as $p)
                <tr>
                    <th>{{$p->id}}</th>
                    <td>{{$p -> user -> nama}}</td>
                    <td>{{$p -> tgl_pemesanan}}</td>
                    <td>{{$p -> jenis_pemesanan}}</td>
                    <td>{{$p -> jumlah_undangan}}</td>
                </tr>
                @endforeach
                </table>
            </div>
            <div class="col-sm-6">
                <center> <h4> Pesanan Lusa </h4> </center>
                <table class="table table-striped" style="width:100% text-align:center;">
                    <tr>
                        <th>ID </th>
                        <th>Atas Nama</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Jenis Pemesanan</th>
                        <th>Jumlah Undangan</th>
                    </tr>
                    @foreach ($pemesanan_lusa as $p)
                <tr>
                    <th>{{$p->id}}</th>
                    <td>{{$p -> user -> nama}}</td>
                    <td>{{$p -> tgl_pemesanan}}</td>
                    <td>{{$p -> jenis_pemesanan}}</td>
                    <td>{{$p -> jumlah_undangan}}</td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
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
  <footer class="main-footer">
    @include('template.footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
<script>
</script>
</html>
