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

           <center><h2>Daftar <span class="section-intro__style">Menu</span></h2></center>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
      <div class="container">
        @if(session('store'))
        <div class="alert alert-primary" role="alert">
            {{session('store')}}
        </div>
        @elseif (session('update'))
        <div class="alert alert-info" role="alert">
            {{session('update')}}
        </div>
        @endif
          <div class="row">
              <div class="col-6">
                  @if (auth()->user()->role=="admin")
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                      Tambah
                      <i class="far fa-plus-square"></i></button>
                    @endif
                </div>
        <form class="form-inline" action="{{route('menu.search')}}" method="GET">
              <div class="col-8">
                <input type="text"  class="form-control" name="cari" placeholder="Cari Disini">
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-outline-primary" >Cari <i class="fas fa-search"></i></button>
            </div>
            </form>
            </div>

          <br><br>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Tambah Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('data_menu.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Menu</label>
                            <input name="nama_menu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Menu" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input name="harga_menu" type="text" id="price" class="form-control" placeholder="Harga" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Gambar</label>
                            <input name="gambar_menu" type="file" class="form-control" placeholder="Gambar" required>
                          </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <div class="row">
            @foreach ($data_menu as $menu)
          <div class="col-md-6 col-lg-4 col-xl-3">
              <div class="card text-center card-product">
                  <div class="card-product__img">
                      <img class="card-img" src="{{asset('images/'.$menu -> gambar_menu)}}" width="150" height="150">
                    </div>
                    <div class="card-body">
                        <h4 class="card-product__title">{{$menu -> nama_menu}}</h4>
                        <p class="card-product__price">Rp. {{number_format($menu -> harga_menu)}},-</p>
                    </div>
                    @if (auth()->user()->role=="admin")
                    <td><a href="{{route('data_menu.edit', $menu->id)}}"><button class="btn btn-warning">Update <i class="far fa-edit"></i></button></a></td>
                    @endif
                    <br>
                </div>
            </div>
            @endforeach
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
