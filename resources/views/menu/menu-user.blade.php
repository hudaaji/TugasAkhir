<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('template.head')
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
        <form class="form-inline" action="{{route('menu.search')}}" method="GET">
              <div class="col-sm-8">
                <input type="text"  class="form-control" name="cari" placeholder="Cari Disini">
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-outline-primary" >Cari <i class="fas fa-search"></i></button>
            </div>

            </form>
            <form action="{{route('pemesanan.store')}}" method="POST">
            <div class="col-sm-11">
              <button type="button" class="btn btn-success float-right" data-toggle="modal" id="pesan" data-target="#exampleModal">
                  Pesan
                  <i class="far fa-plus-square"></i></button>
              </div>
            </div>
          <br><br>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Pemesanan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Atas Nama</label>
                          <input name="atas_nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{auth()->user()->nama}}" readonly>
                          <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Acara</label>
                            <input name="alamat_acara" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat" required>
                          </div>
                          <div class="form-group row">
                            <label for="example-date-input" class="col-5 col-form-label">Tanggal Pemesanan</label>
                            <div class="col-12">
                              <input name="tgl_pemesanan" class="form-control" type="date" id="example-date-input" required>
                            </div>
                          </div>
                          <fieldset class="form-group">
                        <label for="exampleInputEmail1">Jenis Pemesanan</label>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jenis_pemesanan" id="optionsRadios1" value="box" checked>
                                Box
                              </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="jenis_pemesanan" id="optionsRadios2" value="prasmanan">
                                Prasmanan
                              </label>
                            </div>
                          </fieldset>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Undangan</label>
                            @if ($tanggal < 1000)
                            <input name="jumlah_undangan" type="number" min="10" max="1000" class="form-control" id="undangan" aria-describedby="emailHelp" placeholder="Jumlah Undangan" required>
                            @else
                            <p> Pesanan Hari Ini Sudah Penuh! </p>
                            @endif
                        </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input name="harga" type="text" class="form-control" readonly value="0" id="harga" aria-describedby="emailHelp" placeholder="harga" required>
                          </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                  @if ($tanggal < 1000)
                  <button type="submit" class="btn btn-success">Pesan</button>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <label for="exampleSelect1" class="col-md-1">Paket</label>
            <select class="form-control" id="paket" name="paket">
                <option selected value="">Silahkan Pilih Paket</option>
              @foreach ($data_paket as $paket )
                  <option value="{{$paket->id}}">{{$paket->nama_paket}}</option>
              @endforeach
            </select>
          </div>
          <br>
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
                        <input type="checkbox" name="menu_tambah[]" value="{{$menu->id}}" aria-label="Checkbox for following text input">
                    </div>
                    @if (auth()->user()->role=="admin")
                    <td><a href="{{route('data_menu.edit', $menu->id)}}"><button class="btn btn-warning">Update<i class="far fa-edit"></i></button></a></td>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
</form>

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
     $("#pesan").click(function(){
        if (menu_reset = 1){
            harga_menu = 0;
        }
        else {
            menu_reset = 1;
        }
        $.each($("input[name='menu_tambah[]']:checked"), function(){
            $.ajax({
                url: '{{ route('pemesanan_menu') }}',
                method: 'POST',
                data: {id_menu: $(this).val()},
                success: function (response) {
                    console.log(response)
                    $.each(response, function (harga,val) {
                        val = parseInt(val);
                        harga_menu = harga_menu + val;
                        total = (harga_paket + harga_menu)*undangan;
                        $('#harga').val(total)
                    })
                }
            })
        })
     });

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
</html>
