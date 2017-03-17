<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\mahasiswa;

class mahasiswaController extends Controller
{
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$mahasiswa = new mahasiswa();
    	$mahasiswa->nama = 'Pebri Sudibyo';
    	$mahasiswa->nim = '1515015136';
    	$mahasiswa->alamat = 'Kota Bangun';
    	$mahasiswa->pengguna_id = '1';
    	$mahasiswa->save();
    	return "data table mahasiswa {$mahasiswa->nama} telah disimpan";
    }
}
