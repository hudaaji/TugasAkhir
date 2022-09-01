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
        <center><h1><b>Pemesanan</b></h1></center>
        <div class="row mb-2">
          <div class="col-sm-6">
            @if (auth()->user()->role=="user")
                <button type="button" class="btn btn-success float-left" data-toggle="modal" data-target="#exampleModal">
                    Tambah
                    <i class="far fa-plus-square"></i></button>
            @endif
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li><form action="{{route('pemesanan.search')}}" method="GET">
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
        @if(session('store'))
        <div class="alert alert-primary" role="alert">
            {{session('store')}}
        </div>
        @elseif (session('update'))
        <div class="alert alert-info" role="alert">
            {{session('update')}}
        </div>
        @elseif (session('bayar'))
        <div class="alert alert-success" role="alert">
            {{session('bayar')}}
        </div>
        @elseif (session('verif'))
        <div class="alert alert-success" role="alert">
            {{session('verif')}}
        </div>
        @elseif (session('reject'))
        <div class="alert alert-danger" role="alert">
            {{session('reject')}}
        </div>
        @endif
        <div class="container-fluid">
            <div class="row">

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
                            <form action="{{route('pemesanan.store')}}" method="POST">
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
                                    <label for="example-date-input" class="col-2 col-form-label">Tanggal Pemesanan</label>
                                    <div class="col-10">
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
                                    <label for="exampleSelect1">Paket</label>
                                    <select class="form-control" id="paket" name="paket" required>
                                        <option selected disabled value>Silahkan Pilih Paket</option>
                                      @foreach ($data_paket as $paket )
                                          <option value="{{$paket->id}}">{{$paket->nama_paket}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleSelect2">Menu Tambahan</label>
                                    <select class="form-control" id="menu" name="menu_tambahan">
                                        <option value="-">Silahkan Pilih Menu Tambahan</option>
                                      @foreach ($data_menu as $menu )
                                          <option value="{{$menu->id}}">{{$menu->nama_menu}}</option>
                                      @endforeach
                                    </select>
                                  </div>
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
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          @if ($tanggal < 1000)
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          @endif
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('pemesanan.index')}}">Belum Diverifikasi <span class="badge bg-secondary">{{$count[0]}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sudahverif')}}">Sudah Diverifikasi <span class="badge bg-secondary">{{$count[1]}}</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('sudahbayar')}}">Sudah Dibayar <span class="badge bg-secondary">{{$count[2]}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sudahantar')}}">Sedang Diantar <span class="badge bg-secondary">{{$count[3]}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('sudahselesai')}}"> Pesanan Selesai <span class="badge bg-secondary">{{$count[4]}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blokir')}}">Pesanan Diblokir <span class="badge bg-secondary">{{$count[5]}}</span></a>
                    </li>
                </ul>
                <table class="table table-striped" style="width:100% text-align:center;">
                    <tr>
                        <th>ID Pemesanan</th>
                        <th>Atas Nama</th>
                        <th>Alamat Acara</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Jenis Pemesanan</th>
                        <th>Paket</th>
                        <th>Menu Tambahan</th>
                        <th>Jumlah Undangan</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                        @if (auth()->user()->role =="user")
                            <th>Aksi</th>
                        @endif
                   </tr>
                   @php
                       $modals=1;
                   @endphp
                    @foreach ($pemesanan as $p)
                    <tr>
                        <td>{{$p -> id}}</td>
                        <td>{{$p -> user -> nama}}</td>
                        <td>{{$p -> alamat_acara}}</td>
                        <td>{{$p -> tgl_pemesanan}}</td>
                        <td>{{$p -> jenis_pemesanan}}</td>
                        <td >

                            @if($p->paket != NULL)
                            <a href="#" data-toggle="modal" data-target="#paketmodal-{{$modals}}">{{$p -> paket2 -> nama_paket}}</a>

                            <div class="modal fade" id="paketmodal-{{$modals}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Detail Paket</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach ($p->paket2->detail_paket as $isi_paket)
                                            {{$isi_paket->menu->nama_menu}}<br>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endif
                        </td>
                        <td>
                            {{--  @if ($p -> menutambah == 0)
                            -
                            @else  --}}

                            @foreach ($p->menutambah as $tambah)
                                {{$tambah->menu->nama_menu}} <br>
                            @endforeach

                            {{--  @endif  --}}
                        </td>
                        <td>{{$p -> jumlah_undangan}}</td>
                        <td style="width: 10%">Rp. {{number_format($p -> harga)}}</td>
                        @if (auth()->user()->role =="admin")
                            @if ($p->keterangan == 0)
                                <td>
                                    <a href="{{route('pemesanan.verifikasi', $p->id)}}"><button class="btn btn-success">Verifikasi</button></a>
                                  </td>
                                  @elseif ($p->keterangan == 1)
                                  <td>
                                    Belum Dibayar
                                  </td>
                                  @elseif ($p->keterangan == 2)
                                  <td>
                                    <a href="{{route('pemesanan.antar', $p->id)}}"><button class="btn btn-success">Antar</button></a>
                                  </td>
                                  @else
                                  <td>
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#detail-{{$modals}}">Detail</button>
                                  <div class="modal fade" id="detail-{{$modals}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="text-align:left;">
                                            <form action="{{route('diterima', $p->transaksi->id)}}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="pemesanan_id" value="{{$p->id}}">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Atas Nama</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$p->user->nama}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Alamat Acara</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$p->alamat_acara}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tanggal Pemesanan</label>
                                                    <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$p->tgl_pemesanan}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Jenis Pemesanan</label>
                                                    <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$p->jenis_pemesanan}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Jumlah Pemesanan</label>
                                                    <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$p->jumlah_undangan}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Metode Pembayaran</label>
                                                    <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$p->transaksi->metode_pembayaran}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Total</label>
                                                    <input name="total" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$p->harga}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Dibayarkan</label>
                                                    <input name="dibayar" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$p->transaksi->bayar}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Bukti Pembayaran</label>
                                                    <img class="card-img" src="{{asset('images/transaksi/'.$p->transaksi->bukti_transfer)}}" width="200" height="350">
                                                </div>
                                            <div class="modal-footer">
                                                @if ($p->transaksi->metode_pembayaran == "DP" && $p->transaksi->sisa > 0)
                                                <input type="submit" value="Terima Sisa Pembayaran" class="btn btn-info">
                                                @endif
                                            </form>
                                            <form action="{{route('pemesanan.destroy', $p->transaksi->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            {{-- <button type="submit" class="btn btn-danger">Reject</button> --}}
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                            @endif
                        @else
                            @if ($p -> keterangan == 0)
                                <td>
                                    Belum Diverifikasi
                                </td>
                                <td>
                                    <a href="{{route('pemesanan.edit', $p->id)}}"><button class="btn btn-warning btn-sm">Update<i class="far fa-edit"></i></button></a>
                                </td>
                                @elseif ($p->keterangan == 1)
                                <td>
                                    Sudah Diverifikasi | Belum Dibayar
                                </td>
                                <td>
                                    <a href="{{route('edit.bayar',$p->id)}}"><button class="btn btn-success"> Bayar </button></a>
                                </td>
                                @elseif($p->keterangan == 2)
                                <td>
                                    Sudah Dibayar
                                </td>
                                @elseif ($p->keterangan == 3)
                                <td>
                                    Sedang Diantar
                                </td>
                                <td>
                                    <a href="{{route('pemesanan.selesai', $p->id)}}"><button class="btn btn-success">Diterima</button></a>
                                  </td>
                                @elseif ($p->keterangan == 4)
                                <td>
                                    Sudah Diterima | Pesanan Selesai
                                </td>
                                @elseif ($p->keterangan == 5)
                                <td>
                                    Pesanan Diblokir
                                </td>
                            @endif
                        @endif
                    </tr>
                    @php
                        $modals++;
                    @endphp
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
</html>
