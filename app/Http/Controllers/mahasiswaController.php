<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\mahasiswa; //digunakan ketika controller akan mengakses table mahasiswa//

class mahasiswaController extends Controller
{

    public function awal()
    {
        return view('mahasiswa.awal', ['data'=>mahasiswa::all()]);
    }
    public function tambah()
    {
        return view('mahasiswa.tambah');
    }
    public function simpan(Request $input)
    {
        $mahasiswa = new mahasiswa();
        $mahasiswa->nama = $input->nama;
        $mahasiswa->nim = $input->nim;
        $mahasiswa->alamat = $input->alamat;
        $mahasiswa->pengguna_id = $input->pengguna_id;
        $informasi = $mahasiswa->save() ? 'berhasil Simpan data' : 'Gagal Simpan Data';
        return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    }
    public function edit($id)
    {
        $mahasiswa = mahasiswa::find($id);
        return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
    }
    public function lihat($id)
    {
        $mahasiswa = mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }
    public function update($id, Request $input)
    {
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->nama = $input->nama;
        $mahasiswa->nim = $input->nim;
    $mahasiswa->alamat = $input->alamat;
    $mahasiswa->pengguna_id = $input->pengguna_id;
        $informasi = $mahasiswa->save() ? 'Berhasil Update' : 'Gagal Update Data';
        return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $mahasiswa = mahasiswa::find($id);
        $informasi = $mahasiswa->delete() ? 'Berhasil Hapus Data' : 'Gagal Hapus Data';
        return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    }
}