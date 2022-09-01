<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/postlogin','LoginController@postlogin')->name('postlogin');
Route::get('/logout','LoginController@logout')->name('logout');
Route::get('/reset','LoginController@reset')->name('reset');
Route::post('/reset-password','UserController@ResetPassword')->name('resetPassword');
Route::post('/konfirmasi','UserController@konfirmasiCode')->name('konfirmasiCode');
Route::post("/password-baru",'UserController@PasswordBaru')->name('PasswordBaru');
Route::post('/registrasi', 'UserControllerBackup@create');
Route::get('/utama','MenuController@utama')->name('utama');

Route::group(['middleware' => ['auth','cekrole:admin']], function () {
    Route::get('/dashboard', 'dashboardController@index')->name('dashboard');
    Route::resource('/user','UserController');
    Route::get('/cari_user','UserController@search')->name('user.search');
    Route::resource('/data_menu', 'MenuController');
    Route::get('/menus','dashboardController@halamanmenu')->name('halamanmenu');
    Route::get('/pakets','dashboardController@halamanpaket')->name('halamanpaket');
    Route::get('/pemesanans','dashboardController@halamanpemesanan')->name('halamanpemesanan');
    Route::get('/antar/{id}','PemesananController@antar')->name('pemesanan.antar');
    Route::get('/pemesanan_sudah_diverifikasi','PemesananController@sudahverif')->name('sudahverif');
    Route::get('/pemesanan_sudah_dibayar','PemesananController@sudahbayar')->name('sudahbayar');
    Route::get('/pemesanan_sedang_antar','PemesananController@sudahantar')->name('sudahantar');
    Route::get('/pemesanan_selesai','PemesananController@sudahselesai')->name('sudahselesai');
    Route::get('/blokir','PemesananController@blokir')->name('blokir');
    Route::get('/blokir2/{id}','PemesananController@blokir2')->name('blokir2');

});
Route::group(['middleware' => ['auth','cekrole:admin,user']], function () {


    Route::get('/menu','MenuController@index')->name('menu');
    Route::resource('/pemesanan','PemesananController');
    Route::post('/transaksi','PemesananController@storebayar')->name('transaksi.store');
    Route::resource('/menu_paket', 'PaketController');
    Route::get('/verifikasi_pemesanan/{id}','PemesananController@verifikasi')->name('pemesanan.verifikasi');
    Route::get('/cari_pemesanan','PemesananController@search')->name('pemesanan.search');
    Route::get('/cari_paket','PaketController@search')->name('paket.search');
    Route::get('cari_menu','MenuController@search')->name('menu.search');
    Route::get('/edit_user/{user}','UserController@edit_user')->name('edit.user');
    Route::put('/update_user/{user}', 'UserController@update_user')->name('update.user');
    Route::post('/pemesanan_paket','PemesananController@gethargapaket')->name('pemesanan_paket');
    Route::post('/pemesanan_menu','PemesananController@gethargamenu')->name('pemesanan_menu');
    Route::get('/editbayar/{id}','PemesananController@editbayar')->name('edit.bayar');
    Route::resource('/laporan','LaporanController');
    Route::post('/cetakPemesanan','LaporanController@cetakPemesanan')->name('cetakPemesanan');
    Route::get('/loyal','LaporanController@index2')->name('laporan.index2');
    Route::post('/cetakLoyal','LaporanController@cetakLoyal')->name('cetakLoyal');
    Route::post('/diterima/{transaksi}','PemesananController@diterima')->name('diterima');
    Route::get('/selesai/{id}','PemesananController@selesai')->name('pemesanan.selesai');
});
