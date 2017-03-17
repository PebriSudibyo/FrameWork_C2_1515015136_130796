<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\dosen;

class dosenController extends Controller
{
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$dosen = new dosen();
    	$dosen->nama = 'Tukijan';
    	$dosen->nip = '67890';
    	$dosen->alamat = 'Samarinda';
    	$dosen->pengguna_id = '1';
    	$dosen->save();
    	return "data table dosen {$dosen->nama} telah disimpan";
    }
}
