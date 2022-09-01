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
            <h1 class="m-0">Form Pembayaran</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('transaksi.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="pemesanan_id" value="{{$p->id}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Atas Nama</label>
                            <input name="atas_nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{auth()->user()->nama}}" readonly>
                            <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input name="harga" type="text" class="form-control" id="harga2" aria-describedby="emailHelp" placeholder="Harga" value="{{$p->harga}}" readonly>
                        </div>
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Metode Pembayaran</label>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="metode_pembayaran" id="optionsRadios1" value="DP">
                                    Down Payment (DP)
                                  </label>
                                </div>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="metode_pembayaran" id="optionsRadios2" value="Lunas" checked>
                                    Lunas
                                </label>
                                </div>
                        </fieldset>
                        <div id="metode">
                            <div class="form-group" id="bayar">
                                <label for="exampleInputEmail1">Dibayarkan</label> (Min 10%)
                                <input name="bayar" type="number" class="form-control" id="dibayar" aria-describedby="emailHelp" value="{{$p->harga*10/100}}" min="{{$p->harga*10/100}}" max="{{$p->harga}}" placeholder="Jumlah Yang Ingin Dibayarkan" required>
                            </div>
                            <div class="form-group" id="sisa">
                                <label for="exampleInputEmail1">Sisa</label>
                                <input name="sisa" type="text" class="form-control" id="sisakan" placeholder="Sisa" value="{{$p->harga-($p->harga*10/100)}}" readonly>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Jenis Pembayaran</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="pembayaran">
                              <option selected disabled value>Silahkan Pilih</option>
                              <option value="M-Banking">M-banking</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bukti Pembayaran</label>
                            <input name="bukti_pembayaran" type="file" class="form-control" placeholder="Silahkan Upload Bukti Pembayaran" required>
                        </div>
                        <div>
                            NB : <br>
                            Rek. BRI 0182974925791 a/n Suryani Catering
                        </div>
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
 $('input[type=radio][name=metode_pembayaran]').change(function() {
     if (this.value == 'DP') {
        $("#metode").show();
     }
     else if (this.value == 'Lunas') {
         $("#metode").hide();
     }
 });
 $('#simpan').click(function(event) { // <- goes here !
     if ($('input[type=radio][name=metode_pembayaran]').val == 'DP' && parseInt($('input[name = bayar]').val()) < {{$p->harga*10/100}}){
         event.preventDefault();
         alert('Maaf Jumlah Yang Dibayarkan Kurang Dari 10%');
     }
 });
 $('#dibayar').on('change', function () {
         dibayar =$(this).val();
         harga = $('#harga2').val();
         total = (harga - dibayar);
         $('#sisakan').val(total)
     })

 </script>
</body>
</html>
