<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\dosen;

class dosenController extends Controller
{
    public function awal()
    {
        return view('dosen.awal', ['data'=>dosen::all()]);
    }
    public function tambah()
    {
        return view('dosen.tambah');
    }
    public function simpan(Request $input)
    {
        $dosen = new dosen();
        $dosen->nama = $input->nama;
        $dosen->nip = $input->nip;
        $dosen->alamat = $input->alamat;
        $dosen->pengguna_id = $input->pengguna_id;
        $informasi = $dosen->save() ? 'berhasil Simpan data' : 'Gagal Simpan Data';
        return redirect('dosen')->with(['informasi'=>$informasi]);
    }
    public function edit($id)
    {
        $dosen = dosen::find($id);
        return view('dosen.edit')->with(array('dosen'=>$dosen));
    }
    public function lihat($id)
    {
        $dosen = dosen::find($id);
        return view('dosen.lihat')->with(array('dosen'=>$dosen));
    }
    public function update($id, Request $input)
    {
        $dosen = dosen::find($id);
        $dosen->nama = $input->nama;
        $dosen->nip = $input->nip;
        $dosen->alamat = $input->alamat;
        $dosen->pengguna_id = $input->pengguna_id;
        $informasi = $dosen->save() ? 'Berhasil Update' : 'Gagal Update Data';
        return redirect('dosen')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $dosen = dosen::find($id);
        $informasi = $dosen->delete() ? 'Berhasil Hapus Data' : 'Gagal Hapus Data';
        return redirect('dosen')->with(['informasi'=>$informasi]);
    }
}
