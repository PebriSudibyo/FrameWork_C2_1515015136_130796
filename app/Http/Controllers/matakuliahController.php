<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\matakuliah;

class matakuliahController extends Controller
{
    public function awal(){
        return view("matakuliah.awal", ['data'=>matakuliah::all()]);
    }
    public function tambah(){
        return view('matakuliah.tambah');
    }
    public function simpan(Request $input){
        $matakuliah = new matakuliah();
        $matakuliah->title = $input->title;
        $matakuliah->keterangan = $input->keterangan;
        $informasi = $matakuliah->save() ? 'Berhasil Simpan Data' : 'Gagal Simpan Data';
        return redirect('matakuliah')->with(['informasi'=>$informasi]);
    }
    public function edit($id){
        $matakuliah = matakuliah::find($id);
        return view('matakuliah.edit')->with(array('matakuliah'=>$matakuliah));
    }
    public function lihat($id){
        $matakuliah = matakuliah::find($id);
        return view('matakuliah.lihat')->with(array('matakuliah'=>$matakuliah));
    }
    public function update($id, Request $input){
        $matakuliah = matakuliah::find($id);
        $matakuliah->title = $input->title;
        $matakuliah->keterangan = $input->keterangan;
        $informasi = $matakuliah->save() ? 'Berhasil update Data' : 'Gagal update Data';
        return redirect('matakuliah')->with(['informasi'=>$informasi]);
    }
    public function hapus($id, Request $input){
        $matakuliah = matakuliah::find($id);
        $informasi = $matakuliah->delete() ? 'Berhasil hapus Data' : 'Gagal hapus Data';
        return redirect('matakuliah')->with(['informasi'=>$informasi]);
    }
}
