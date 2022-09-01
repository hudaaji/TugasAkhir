<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\Menu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.home');
    }

    public function cetakPemesanan(Request $request)
    {
    $tglawal = $request->tglawal;
    $tglakhir = $request->tglakhir;
        $laporan = Pemesanan::with('transaksi','menu')->whereBetween('tgl_pemesanan',[$tglawal,$tglakhir])
        ->where('keterangan',4)->get();

        $total = $laporan->sum('harga');


        return view('laporan.cetak',compact('laporan','total','tglawal','tglakhir'));

    }

    public function index2()
    {
        return view('laporan.home2');
    }

    public function cetakLoyal(Request $request)
    {
    $tglawal = $request->tglawal;
    $tglakhir = $request->tglakhir;

    if($request->option == "jumlah"){
        $loyal = Pemesanan::with('user')->selectRaw('*, count("id") as "user_transaksi"')
        ->whereBetween('tgl_pemesanan',[$tglawal,$tglakhir])->where('keterangan',4)->groupBy('id_user')->get();

        return view('laporan.cetak-loyal',compact('loyal','tglawal','tglakhir'));
    }else {
        $loyal = Pemesanan::with('user')->selectRaw('*, count("id") as "user_transaksi", sum(harga) as "duit_masuk"')
        ->whereBetween('tgl_pemesanan',[$tglawal,$tglakhir])->where('keterangan',4)->groupBy('id_user')->get();

        // $loyal = Pemesanan::with('transaksi','menu')->whereBetween('tgl_pemesanan',[$tglawal,$tglakhir])
        // ->whereIn('keterangan',['Sudah Dibayar'])->get();

        return view('laporan.cetak-loyal-total',compact('loyal','tglawal','tglakhir','total'));
    }

    //  return $loyal ;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
        //
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
        //
    }
    // Revisi
    // 1. Reset password user (done)
    // 2. info diskon 10% di menu paket user (done)
    // 3. verifikasi email (jika mampu)
    // 4. hapus metode pembayaran emoney (done)
    // 5. reject pemesanan (done)
    // 6. btn cetak (done)
    // 7. hapus id laporan (done)
    // 8. customer loyal berdasarkan jumlah pemesanan dan total belanja (done)
    // 9. periode laporan (done)
    // 10. loyal ditampilkan > 5 pesanan (done)
    // 11. shortby latest input data (done)

    // revisi sidang
    // 1. sort keterangan pemesanan (done)
    // 2. dashboard berisi tabel pemesanan (done)
    // 3. halaman utama customer langsung form pemesanan (done)
    // 4. login dilakukan jika customer ingin melakukan pemesanan (done)
    // 5. pemesanan diurutkan berdasarkan tgl terdekat (done)
    // 6. tambah status (belum diverifikasi -> sudah diverifikasi -> belum dibayar
    //    -> sudah dibayar -> sudah diantar -> sudah diterima -> pesanan selesai) (done)
    // 7. waktu pembatalan pesanan (done)
    // 8. halaman menu dan pemesanan jadi satu (done)
    // 9. menu checklist untuk membuat pesanan (tambah keranjang di e-commers) (done)


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
