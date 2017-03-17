<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('pengguna','penggunaController@awal');
Route::get('pengguna/tambah','penggunaController@tambah');
Route::get('dosen/tambah','dosenController@tambah');
Route::get('mahasiswa/tambah','mahasiswaController@tambah');
Route::get('ruangan/tambah','ruanganController@tambah');
Route::get('matakuliah/tambah','matakuliahController@tambah');
Route::get('dosen_matakuliah/tambah','dosen_matakuliahController@tambah');
Route::get('jadwal_matakuliah/tambah','jadwal_matakuliahController@tambah');

Route::get('/', function () {
    return view('welcome');
});
