<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/validasi', 'InitC@validasi');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/checklogin', 'HomeController@checklogin');
Route::get('/tiket/{dari}/{ke}/{pergi}/{penumpang}/{id_tt}', 'PemesananC@tiket');
Route::match(['get','post'],'/detailpenumpang', 'PemesananC@detailpenumpang');


Route::group(['middleware'=>['admin']],function(){
	Route::get('/admin','AdminC@index');
	Route::get('/admin/datapengguna','AdminC@pengguna');
	Route::get('/admin/datapetugas','AdminC@petugas');
	Route::get('/admin/dataadmin','AdminC@admin');
});
Route::group(['middleware'=>['petugas'], 'prefix'=>'/petugas'],function(){
	Route::get('/dashboard','PetugasC@index');
	Route::get('/blumverifikasi','PetugasC@blumverifikasi');
	Route::get('/sdhverifikasi','PetugasC@sdhverifikasi');
	Route::get('/verifikasi/{id}','PetugasC@verifikasi');
});
Route::group(['middleware'=>['user']],function(){
	Route::match(['post','get'],'/simpandata', 'PemesananC@simpandata')->middleware('auth');
	Route::get('/bayartiket/{id}', 'PemesananC@bayartiket');
	Route::post('/uploadbukti/{kode_pemesanan}', 'PemesananC@uploadbukti');

	Route::get('/tracking', 'HomeController@tracking');
	Route::get('/transaksi', 'HomeController@transaksi');
	Route::get('/detaildata/{id}', 'HomeController@detaildata');
	Route::get('/transaksi', 'HomeController@transaksi');
	Route::get('/notifikasi', 'PemesananC@notifikasi');
});

Route::get('/getdatatujuan/{ruteawal}','InitC@gdatujuan');
Route::get('/getdatauser/','InitC@gduser');
Route::get('/check','InitC@check');
