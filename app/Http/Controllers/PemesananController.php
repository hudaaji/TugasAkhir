<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Paket;
use Illuminate\Http\Request;
use App\Pemesanan;
use App\DetailPaket;
use App\MenuTambah;
use App\Transaksi;
use App\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Return_;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jumlah(){
        $a = Pemesanan::where('keterangan',0)->count();
        $b = Pemesanan::where('keterangan',1)->count();
        $c = Pemesanan::where('keterangan',2)->count();
        $d = Pemesanan::where('keterangan',3)->count();
        $e = Pemesanan::where('keterangan',4)->count();
        $f = Pemesanan::where('keterangan',5)->count();

        $count = array($a,$b,$c,$d,$e,$f);
        return $count;
    }

    public function index()
    {
        //waktu skrg
        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");

        //max pemesanan
        $tanggal = Pemesanan::where('tgl_pemesanan',$date)->sum('jumlah_undangan');

        $data_paket = Paket::all();
        $data_menu = Menu::all();
        $detail_paket = DetailPaket::all();

        if (auth()->user()->role=="user"){
            $id = auth()->user()->id;
            $pemesanan = Pemesanan::whereHas('user',function ($query)use($id){ return $query->where('id','=',$id);})->orderBy('id','desc')->get();

            return view('pemesanan.pemesanan',['pemesanan' => $pemesanan, 'data_paket'=>$data_paket, 'data_menu'=>$data_menu, 'detail_paket'=>$detail_paket,'date'=>$date,'tanggal'=>$tanggal]);

        }else{
            $pemesanan = Pemesanan::where('keterangan',0)->orderBy('id','desc')->get();
            $count = $this -> jumlah();
            return view('pemesanan.pemesanan-belum-diverifikasi',['pemesanan' => $pemesanan, 'data_paket'=>$data_paket, 'data_menu'=>$data_menu, 'detail_paket'=>$detail_paket,'date'=>$date,'tanggal'=>$tanggal, 'count'=>$count]);

        }

        //  return $pemesanan;
    }

    public function sudahverif()
    {
        //waktu skrg
        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");

        //max pemesanan
        $tanggal = Pemesanan::where('tgl_pemesanan',$date)->sum('jumlah_undangan');

        $data_paket = Paket::all();
        $data_menu = Menu::all();
        $detail_paket = DetailPaket::all();


            $pemesanan = Pemesanan::where('keterangan',1)->orderBy('id','desc')->get();
            $count = $this -> jumlah();
            return view('pemesanan.pemesanan-sudah-diverifikasi',['count'=>$count ,'pemesanan' => $pemesanan, 'data_paket'=>$data_paket, 'data_menu'=>$data_menu, 'detail_paket'=>$detail_paket,'date'=>$date,'tanggal'=>$tanggal]);

        //  return $pemesanan;
    }

    public function sudahbayar()
    {
        //waktu skrg
        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");

        //max pemesanan
        $tanggal = Pemesanan::where('tgl_pemesanan',$date)->sum('jumlah_undangan');

        $data_paket = Paket::all();
        $data_menu = Menu::all();
        $detail_paket = DetailPaket::all();


            $pemesanan = Pemesanan::where('keterangan',2)->orderBy('id','desc')->get();
            $count = $this -> jumlah();
            return view('pemesanan.pemesanan-sudah-dibayar',['count'=>$count ,'pemesanan' => $pemesanan, 'data_paket'=>$data_paket, 'data_menu'=>$data_menu, 'detail_paket'=>$detail_paket,'date'=>$date,'tanggal'=>$tanggal]);

        //  return $pemesanan;
    }

    public function sudahantar()
    {
        //waktu skrg
        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");

        //max pemesanan
        $tanggal = Pemesanan::where('tgl_pemesanan',$date)->sum('jumlah_undangan');

        $data_paket = Paket::all();
        $data_menu = Menu::all();
        $detail_paket = DetailPaket::all();


            $pemesanan = Pemesanan::where('keterangan',3)->orderBy('id','desc')->get();
            $count = $this -> jumlah();
            return view('pemesanan.pemesanan-sedang-diantar',['count'=>$count ,'pemesanan' => $pemesanan, 'data_paket'=>$data_paket, 'data_menu'=>$data_menu, 'detail_paket'=>$detail_paket,'date'=>$date,'tanggal'=>$tanggal]);

        //  return $pemesanan;
    }

    public function sudahselesai()
    {
        //waktu skrg
        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");

        //max pemesanan
        $tanggal = Pemesanan::where('tgl_pemesanan',$date)->sum('jumlah_undangan');

        $data_paket = Paket::all();
        $data_menu = Menu::all();
        $detail_paket = DetailPaket::all();


            $pemesanan = Pemesanan::where('keterangan',4)->orderBy('id','desc')->get();
            $count = $this -> jumlah();
            return view('pemesanan.pemesanan-selesai',['count'=>$count,'pemesanan' => $pemesanan, 'data_paket'=>$data_paket, 'data_menu'=>$data_menu, 'detail_paket'=>$detail_paket,'date'=>$date,'tanggal'=>$tanggal]);

        //  return $pemesanan;
    }
    public function blokir()
    {
        //waktu skrg
        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");

        //max pemesanan
        $tanggal = Pemesanan::where('tgl_pemesanan',$date)->sum('jumlah_undangan');

        $data_paket = Paket::all();
        $data_menu = Menu::all();
        $detail_paket = DetailPaket::all();


            $pemesanan = Pemesanan::where('keterangan',5)->orderBy('id','desc')->get();
            $count = $this -> jumlah();
            return view('pemesanan.pemesanan-blokir',['count'=>$count,'pemesanan' => $pemesanan, 'data_paket'=>$data_paket, 'data_menu'=>$data_menu, 'detail_paket'=>$detail_paket,'date'=>$date,'tanggal'=>$tanggal]);

        //  return $pemesanan;
    }

    public function search(Request $request)
    {
        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");

        //max pemesanan
        $tanggal = Pemesanan::where('tgl_pemesanan',$date)->sum('jumlah_undangan');

        $search = $request->get('cari');
        $pemesanan = Pemesanan::where('id','like','%'.$search.'%')
        ->orwhereHas('user',function ($query)use($search){ return $query->where('nama','like','%'.$search.'%');})
        ->orwhereHas('paket2',function ($query)use($search){ return $query->where('nama_paket','like','%'.$search.'%');})
        ->orwhereHas('menu',function ($query)use($search){ return $query->where('nama_menu','like','%'.$search.'%');})
        ->orwhere('alamat_acara','like','%'.$search.'%')->orwhere('tgl_pemesanan','like','%'.$search.'%')
        ->orwhere('jenis_pemesanan','like','%'.$search.'%')->orwhere('keterangan','like','%'.$search.'%')->get();;
        $data_paket = Paket::all();
        $data_menu = Menu::all();
        $detail_paket = DetailPaket::all();

        // return $pemesanan;
        return view('pemesanan.pemesanan',['pemesanan' => $pemesanan, 'data_paket'=>$data_paket, 'data_menu'=>$data_menu, 'detail_paket'=>$detail_paket,'tanggal'=>$tanggal]);
    }

    public function verifikasi($id){
        date_default_timezone_set("Asia/Singapore");
        $day = strtotime('+1 day');
        $deadline = date('Y-m-d H:i:s', $day);

        $pemesanan = Pemesanan::find($id);
        $pemesanan->keterangan = 1;
        $pemesanan->waktu=$deadline;
        $pemesanan->save();

        return redirect('pemesanan')->with('verif','Pesanan Telah Diverifikasi');
    }
    public function antar($id){
        $pemesanan = Pemesanan::find($id);
        $pemesanan->keterangan = 3;
        $pemesanan->save();

        return redirect('pemesanan_sudah_dibayar')->with('antar','Pesanan Telah Diantar');
    }
    public function selesai($id){
        $pemesanan = Pemesanan::find($id);
        $pemesanan->keterangan = 4;
        $pemesanan->save();

        return redirect('pemesanan')->with('selesai','Pesanan Telah Diterima');
    }
    public function blokir2($id){
        $pemesanan = Pemesanan::find($id);
        $pemesanan->keterangan = 5;
        $pemesanan->save();

        return redirect('pemesanan_sudah_diverifikasi')->with('selesai','Pesanan Telah Diterima');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function gethargapaket(Request $request)
    {

        $harga = Paket::select('harga_paket')->where('id',$request ->get('id_paket'))->first();
        return response()->json($harga);
    }
    public function gethargamenu(Request $request){
        $harga = Menu::select('harga_menu')->where('id',$request ->get('id_menu'))->first();
        return response()->json($harga);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;
        $pemesanan = Pemesanan::select('jumlah_undangan')->where('tgl_pemesanan',$request->tgl_pemesanan)->sum('jumlah_undangan');
        $pemesanan = $pemesanan + $request->jumlah_undangan;
        if($pemesanan > 1000){
            return redirect('pemesanan')->with('store','Maaf, Jumlah Pemesanan Pada Tanggal Tersebut Sudah Penuh, Silahkan Pilih Tanggal Lain');
        }

        date_default_timezone_set("Asia/Singapore");
        $date = date("Y-m-d");


        //max pemesanan
        $tanggal = Pemesanan::where('tgl_pemesanan',$date)->sum('jumlah_undangan');

        $pemesanan = new Pemesanan();

        $pemesanan->id_user=$request->user_id;
        $pemesanan->alamat_acara=$request->alamat_acara;
        $pemesanan->tgl_pemesanan=$request->tgl_pemesanan;
        $pemesanan->jenis_pemesanan=$request->jenis_pemesanan;
        $pemesanan->paket=$request->paket;
        $pemesanan->jumlah_undangan=$request->jumlah_undangan;
        $pemesanan->harga=$request->harga;
        $pemesanan->save();

        if($request->has('menu_tambah')){
            $p = Pemesanan::orderBy('id','desc')->first();
        foreach($request->menu_tambah as $pesan){
            $a = new MenuTambah();
            $a->pemesanan_id = $p->id;
            $a->menu_id = $pesan;
            $a->save();
        }
        }

        return redirect('pemesanan')->with('store','Selamat Anda Telah Berhasil Membuat Pesanan Baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_menu = \App\Menu::all();

        $data_paket = Paket::all();
        $pemesanan = Pemesanan::find($id);

      //  return $detail_paket;
        return view('pemesanan/edit')->with(['data_paket' => $data_paket, 'data_menu'=>$data_menu , 'pemesanan' => $pemesanan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::find($id);

        $pemesanan->alamat_acara=$request->alamat_acara;
        $pemesanan->tgl_pemesanan=$request->tgl_pemesanan;
        $pemesanan->jenis_pemesanan=$request->jenis_pemesanan;
        $pemesanan->paket=$request->paket;
        $pemesanan->menu_tambahan=$request->menu_tambahan;
        $pemesanan->jumlah_undangan=$request->jumlah_undangan;
        $pemesanan->harga=$request->harga;
        $pemesanan->save();


        return redirect('pemesanan')->with('update','Update Pesanan Sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storebayar(Request $request){
        $transaksi = new Transaksi();

        $transaksi->pemesanan_id=$request->pemesanan_id;
        $transaksi->metode_pembayaran=$request->metode_pembayaran;
        if($request->metode_pembayaran == "DP"){
            $transaksi->bayar=$request->bayar;
            $transaksi->sisa=$request->sisa;
        }else{
            $transaksi->bayar = $request->harga;
        }
        $transaksi->pembayaran=$request->pembayaran;
        if($request->hasFile('bukti_pembayaran')){
            $request->file('bukti_pembayaran')->move('images/transaksi/',$request->file('bukti_pembayaran')->getClientOriginalName());
            $transaksi->bukti_transfer = $request->file('bukti_pembayaran')->getClientOriginalName();
        }
        $transaksi->tgl_pembayaran=date('Y-m-d');
        $transaksi->save();

        $pemesanan = Pemesanan::find($request->pemesanan_id);
        $pemesanan->keterangan = 2;
        $pemesanan->save();


        return redirect('pemesanan')->with('bayar','Pembayaran Pesanan Sukses!');
    }

    public function editbayar($id)
    {

        $pemesanan = Pemesanan::find($id);

      //  return $detail_paket;
        return view('pemesanan/bayar')->with(['p' => $pemesanan]);
    }

    public function destroy($id)
    {
        //ubah ket.
        $transaksi = Transaksi::where('id',$id)->first();
        $pemesanan_id = $transaksi -> pemesanan_id;
        $pemesanan = Pemesanan::where('id',$pemesanan_id)->first();
        $pemesanan -> keterangan = 'Belum Dibayar';
        $pemesanan -> save();
        $user_id = $pemesanan->id_user;
        $user_email = User::select('email')->where('id',$user_id)->first();

        $details = [
            'title' => 'Reject Pembayaran',
            'body' => 'Transaksi yang anda lakukan gagal. Kami menemukan kesalahan pada pembayaran anda.'
        ];

        Mail::to($user_email)->send(new \App\Mail\ResetPassword($details));

        $transaksi -> delete();


        return redirect('pemesanan')->with('reject','Pesanan telah di reject');
    }
    public function diterima(Request $request,$id)
    {
        $request['total'] = filter_var($request->total, FILTER_SANITIZE_NUMBER_INT);
        $transaksi = Transaksi::where('id',$id)->first();
        $transaksi->bayar=$request->total;
        $transaksi->sisa=0;
        $transaksi->save();

        return redirect('pemesanan')->with('bayar','Sisa Pembayaran Sudah Lunas');
    }
}
