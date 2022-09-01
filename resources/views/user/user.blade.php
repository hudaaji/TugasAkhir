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
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li><form action="{{route('user.search')}}" method="GET">
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control mr-sm-2" name="cari" placeholder="Cari Disini">
                      </div>
                      <div class="col">
                        <button type="submit" class="btn btn-outline-primary" >Cari <i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @if(session('sukses'))
            <div class="alert alert-primary" role="alert">
                {{session('sukses')}}
            </div>
            @elseif (session('berhasil'))
            <div class="alert alert-info" role="alert">
                {{session('berhasil')}}
            </div>
            @endif
            <div class="row">
                <button type="button" class="btn btn-success float-left" data-toggle="modal" data-target="#exampleModal">
                    Tambah
                    <i class="far fa-plus-square"></i></button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Form Registrasi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('user.store')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email</label>
                                  <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Telepon</label>
                                    <input name="telepon" type="text" class="form-control" placeholder="Telepon" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Kota</label>
                                    <input name="kota" type="text" class="form-control" placeholder="Kota" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlSelect1">Role</label>
                                    <select name="role" class="form-control" id="exampleFormControlSelect1">
                                      <option value="admin">Admin</option>
                                      <option value="user">User</option>
                                    </select>
                                  </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
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
                <table class="table table-striped" style="text-align:center;">
                    <tr>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Kota</th>
                        <th>Role</th>
                        <th>Aksi</th>
                   </tr>
                    @foreach ($data_user as $user)
                    <tr>
                        <td>{{$user -> email}}</td>
                        <td>{{$user -> nama}}</td>
                        <td>{{$user -> alamat}}</td>
                        <td>{{$user -> telepon}}</td>
                        <td>{{$user -> kota}}</td>
                        <td>{{$user -> role}}</td>
                        @if ($user -> role =="user")
                        <td><a href="{{route('user.edit', $user->id)}}"><button class="btn btn-warning">Update <i class="far fa-edit"></i></button></a></td>
                        @endif
                    </tr>
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
