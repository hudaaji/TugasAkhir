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
            <h1 class="m-0">Data Menu</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('data_menu.update',$data_menu->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Menu</label>
                        <input name="nama_menu" type="text" class="form-control" value="{{$data_menu->nama_menu}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Menu" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input name="harga_menu" type="text" id="price" class="form-control" value="{{$data_menu->harga_menu}}" placeholder="Harga" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Gambar</label>
                        <input name="gambar_menu" type="file" class="form-control" value="{{$data_menu->gambar_menu}}" placeholder="Gambar" >
                      </div>
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-danger" data-dismiss="modal" href="{{route('data_menu.index')}}">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
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
   <footer class="main-footer">
    @include('template.footer')
  </footer>
</div>
</div>
<
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('css/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('css/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('css/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
