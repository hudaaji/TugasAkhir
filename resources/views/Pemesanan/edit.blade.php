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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

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
            <h1 class="m-0">Data Pemesanan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('pemesanan.update',$pemesanan->id)}}" method="POST">
                    @method('PUT')
                    {{ csrf_field() }}
                      <div class="form-group">
                          <label for="exampleInputEmail1">Alamat Acara</label>
                          <input name="alamat_acara" value="{{$pemesanan->alamat_acara}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat" required>
                        </div>
                        <div class="form-group row">
                          <label for="example-date-input" class="col-12 col-form-label">Tanggal Pemesanan</label>
                          <div class="col-12">
                            <input name="tgl_pemesanan" value="{{$pemesanan->tgl_pemesanan}}" class="form-control" type="date" id="example-date-input">
                          </div>
                        </div>
                        <fieldset class="form-group">
                          <label> Jenis Pemesanan </label>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input"  name="jenis_pemesanan" id="optionsRadios1" value="box"
                                @if ($pemesanan -> jenis_pemesanan == "box")
                                  checked
                                @endif>
                              Box
                            </label>
                          </div>
                          <div class="form-check">
                          <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="jenis_pemesanan" id="optionsRadios2" value="prasmanan"
                              @if ($pemesanan -> jenis_pemesanan == "prasmanan")
                              checked
                              @endif>
                              Prasmanan
                            </label>
                          </div>
                        </fieldset>
                        <div class="form-group">
                          <label for="exampleSelect1">Paket</label>
                          <select class="form-control" id="paket" name="paket">
                              <option>Silahkan Pilih Paket</option>
                            @foreach ($data_paket as $paket )
                                <option value="{{$paket->id}}" @if ($pemesanan -> paket == $paket->id)
                                    selected
                                @endif>{{$paket->nama_paket}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleSelect2">Menu Tambahan</label>
                          <select class="form-control" id="menu" name="menu_tambahan">
                              <option>Silahkan Pilih Menu Tambahan</option>
                            @foreach ($data_menu as $menu )
                                <option value="{{$menu->id}}" @if ($pemesanan -> menu_tambahan == $menu->id)
                                    selected
                                @endif > {{$menu->nama_menu}} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Jumlah Undangan</label>
                          <input name="jumlah_undangan" value="{{$pemesanan->jumlah_undangan}}" type="text" class="form-control" id="undangan" aria-describedby="emailHelp" placeholder="Jumlah Undangan" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Harga</label>
                          <input name="harga" type="text" class="form-control" readonly value="{{$pemesanan->harga}}" id="harga" aria-describedby="emailHelp" placeholder="harga" required>
                        </div>
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-danger" data-dismiss="modal" href="{{route('pemesanan.index')}}">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
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
<script>
    $(function () {
     $.ajaxSetup({
         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
     });

     var paket_reset = 0;
     var menu_reset = 0;
     var harga_paket = 0;
     var harga_menu = 0;
     var total = 0;
     var undangan = 1;

     $('#paket').on('change', function () {
         $.ajax({
             url: '{{ route('pemesanan_paket') }}',
             method: 'POST',
             data: {id_paket: $(this).val()},
             success: function (response) {
                 console.log(response)
                 $.each(response, function (harga,val) {
                     val = parseInt(val);
                     if (paket_reset = 1){
                         harga_paket = 0;
                     }
                     else {
                         paket_reset = 1;
                     }
                     harga_paket = val;
                     total = (harga_paket + harga_menu)*undangan;
                     $('#harga').val(total)
                 })
             }
         })
     })
     $('#menu').on('change', function () {
         $.ajax({
             url: '{{ route('pemesanan_menu') }}',
             method: 'POST',
             data: {id_menu: $(this).val()},
             success: function (response) {
                 console.log(response)
                 $.each(response, function (harga,val) {
                     val = parseInt(val);
                     if (menu_reset = 1){
                         harga_menu = 0;
                     }
                     else {
                         menu_reset = 1;
                     }
                     harga_menu = val;
                     total = (harga_paket + harga_menu)*undangan;
                     $('#harga').val(total)
                 })
             }
         })
     })
     $('#undangan').on('change', function () {
         undangan = $(this).val();
         total = (harga_paket + harga_menu)*undangan;
         $('#harga').val(total)
     })
 });

 </script>
</body>
</html>
