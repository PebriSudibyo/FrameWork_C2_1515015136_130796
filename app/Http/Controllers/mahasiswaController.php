<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Requests\MahasiswaRequest;

use App\mahasiswa; //digunakan ketika controller akan mengakses table mahasiswa//

use App\pengguna;


class mahasiswaController extends Controller
{
    protected $informasi = 'Gagal Melakukan aksi';

    public function awal()
    {
        $semuaMahasiswa = mahasiswa::all();
        return view('mahasiswa.awal', compact('semuaMahasiswa'));//['data'=>mahasiswa::all()]);
    }
    public function tambah()
    {
        return view('mahasiswa.tambah');
    }
    public function simpan(MahasiswaRequest $input)
    {
        $pengguna = new pengguna($input->only('username','password'));
        if ($pengguna->save()) {
            $mahasiswa = new mahasiswa();
            $mahasiswa->nama = $input->nama;
            $mahasiswa->nim = $input->nim;
            $mahasiswa->alamat = $input->alamat;
            //$mahasiswa->pengguna_id = $input->pengguna_id;
            if($pengguna->mahasiswa()->save($mahasiswa)) $this->informasi = 'Berhasil Simpan Data';
           // $informasi = $mahasiswa->save() ? 'berhasil Simpan data' : 'Gagal Simpan Data';

        }
        return redirect('mahasiswa')->with(['informasi'=>$this->informasi]);
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
    public function update($id, MahasiswaRequest $input)
    {
        $mahasiswa = mahasiswa::find($id);
        $pengguna = $mahasiswa->pengguna;
        $mahasiswa->nama = $input->nama;
        $mahasiswa->nim = $input->nim;
        $mahasiswa->alamat = $input->alamat;
        //$mahasiswa->pengguna_id = $input->pengguna_id;
        $mahasiswa->save();
       if (!is_null($input->username)){
        $pengguna->fill($input->only('username'));
        if (!empty($input->password)){
            $pengguna->password = $input->password;
        }
        if($pengguna->save()) {
            $this->informasi = 'Berhasil Simpan Data';
        }else{
            $this->informasi = 'Gagal Simpan Data';
        }
       }

       // $informasi = $mahasiswa->save() ? 'Berhasil Update' : 'Gagal Update Data';

        return redirect('mahasiswa')->with(['informasi'=>$this->informasi]);
    }
    public function hapus($id)
    {
        $mahasiswa = mahasiswa::find($id);
        if($mahasiswa->pengguna()->delete()) {
            if($mahasiswa->delete()){
                $this->informasi = 'Berhasil Hapus Data';
            }
        }


       // $informasi = $mahasiswa->delete() ? 'Berhasil Hapus Data' : 'Gagal Hapus Data';
        return redirect('mahasiswa')->with(['informasi'=>$this->informasi]);
    }
}