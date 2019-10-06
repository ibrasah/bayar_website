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
Route::get('/', 'MasterController@home');
Route::get('/login', 'AdminController@index');
Route::post('/loginproses', 'AdminController@loginproses');
// -------------------------------------------------------------------------------------------------------------
Route::get('/logout', 'AdminController@logout');
Route::get('/admin', 'AdminController@dashboard');
Route::get('/admin/siswa', 'AdminController@siswa');
Route::get('/admin/siswa/detail/{uid}', 'AdminController@detail');
Route::get('/admin/siswa/delete/{uid}', 'AdminController@deleteUser');
Route::get('/admin/addsiswa', 'AdminController@addSiswa');
Route::post('/admin/addsiswa', 'AdminController@addDataSiswa');
// --------------------------------------------------------------------------------------------------------------
Route::get('/admin/pembayaran', 'AdminPembayaran@pembayaran');
Route::get('/admin/pembayaran/kelasx', 'AdminPembayaran@kelasx');
Route::get('/admin/pembayaran/kelasxi', 'AdminPembayaran@kelasxi');
Route::get('/admin/pembayaran/kelasxii', 'AdminPembayaran@kelasxii');
Route::get('/admin/pembayaran/kelasx/detail/{uid}', 'AdminPembayaran@detail');

// ------------------------------------------------------ MASTER BARU ------------------------------------------------------  \\
Route::get('/master', 'AdminControllerBaru@master');
Route::get('/master2', 'AdminControllerBaru@master2');
Route::get('/admindua', 'AdminControllerBaru@dashboard');
Route::get('/admindua/siswa', 'AdminControllerBaru@siswa');
Route::get('/admindua/siswa/detail/{uid}', 'AdminControllerBaru@detail');
Route::get('/admindua/siswa/delete/{uid}', 'AdminControllerBaru@deleteUser');
Route::get('/admindua/addsiswa', 'AdminControllerBaru@addSiswa');
Route::post('/admindua/addsiswa', 'AdminControllerBaru@addDataSiswa');
//---HALAMAN_PERCOBAAN---\\

Route::get('/admin/coba', 'AdminController@coba');
Route::get('/adduser', 'AdminController@index');
Route::get('/crud', 'FirebaseController@index'); //----BISA----\\
Route::post('/crud', 'FirebaseController@addjob'); //----BISA----\\
Route::get('/crud2', 'FirebaseController@crud2');


Route::get('/conto', 'FirebaseController@conto');
