<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\matakuliah;

class matakuliahController extends Controller
{
    public function tambah()
    {
    	return $this->simpan();
    }
    public function simpan()
    {
    	$matakuliah = new matakuliah();
    	$matakuliah->title= 'pemrograman FrameWork';
    	$matakuliah->keterangan= 'Praktikum';
    	$matakuliah->save();
    	return "data table matakuliah {$matakuliah->title} telah disimpan";
    }
}
