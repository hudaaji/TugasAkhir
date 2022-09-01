<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only. 081527447247
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

           <center><h2>Daftar <span class="section-intro__style">Menu Paket</span></h2></center>

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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Tambah
                    <i class="far fa-plus-square"></i></button>
              </div>
      <form class="form-inline" action="{{route('paket.search')}}" method="GET">
            <div class="col-8">
              <input type="text"  class="form-control" name="cari" placeholder="Cari Disini">
          </div>
          <div class="col-1">
              <button type="submit" class="btn btn-outline-primary" >Cari <i class="fas fa-search"></i></button>
          </div>
          </form>
          </div>
          <br>
          @if (auth()->user()->role=="user")
                <b>Harga menu paket yang disediakan telah mendapat diskon 10%</b><br>
                <b>Bila Anda membuat menu paket sendiri maka akan tetap mendapat harga normal</b><br>
                @endif
        <br>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Menu Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="{{route('menu_paket.store')}}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                          <label for="exampleInputEmail1">Nama Menu Paket</label>
                          <input name="nama_paket" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Menu" required>
                        </div>
                        <div class="form-group required">
                          <label for="exampleInputEmail1">List Menu</label>
                          @foreach ($data_menu as $menu)
                          <br>
                          <input name="menu[]" type="checkbox" class="" value="{{$menu->id}}">{{$menu->nama_menu}}
                          @endforeach
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
        <div id="accordion">
            @php
                $colabs = 1;
            @endphp
            {{--  admin  --}}
            <div class="row">
            @foreach ($data_paket as $paket)
            @if ($paket->user->role == 'admin')
            <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse"  href="#collapse-{{$colabs}}">
                       {{$paket -> nama_paket}} (Rp. {{number_format($paket -> harga_paket)}})
                    </a>
                </div>
                <div id="collapse-{{$colabs}}" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        @foreach ($detail_paket as $menu)
                        @if ($menu -> id_paket == $paket -> id)
                            {{$menu -> nama_menu}}
                            <br>
                        @endif
                        @endforeach
                        Rp. {{number_format($paket -> harga_paket)}}
                        <br>
                        @if (auth()->user()->role=="admin")
                    <td><a href="{{route('menu_paket.edit', $paket->id)}}"><button class="btn btn-warning btn-sm">Update<i class="far fa-edit"></i></button></a></td>
                    @endif
                    </div>
                </div>
            </div>
            @php
                $colabs++;
            @endphp
            </div>
            @endif
            @endforeach
            </div>
            {{--  customer  --}}
            @if (auth()->user()->role=="user")

            <div class="row">
                @foreach ($paket_user as $ps)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse"  href="#collapse-{{$colabs}}">
                                {{$ps -> nama_paket}} (Rp. {{number_format($paket -> harga_paket)}})
                            </a>
                        </div>
                        <div id="collapse-{{$colabs}}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                @foreach ($detail_paket as $menu)
                                @if ($menu -> id_paket == $ps -> id)
                                {{$menu -> nama_menu}}
                                <br>
                                @endif
                                @endforeach
                                Rp. {{number_format($ps -> harga_paket)}}
                                <br>

                                <td><a href="{{route('menu_paket.edit', $ps->id)}}"><button class="btn btn-warning btn-sm">Update</button></a></td>

                            </div>
                        </div>
                    </div>
                    @php
                    $colabs++;
                    @endphp
                </div>
                @endforeach
            </div>
            @endif
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
