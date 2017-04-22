<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\JadwalMatakuliahRequest;

use App\jadwal_matakuliah;

use App\ruangan;

use App\mahasiswa;

use App\dosen_matakuliah;

class jadwal_matakuliahController extends Controller
{
    protected $informasi = 'Gagal Melakukan Aksi';
   public function awal()
    {
        $semuaJadwalMatakuliah = jadwal_matakuliah::all();
        return view('jadwal_matakuliah.awal',compact('semuaJadwalMatakuliah'));
    }
    public function tambah()
    {
        $mahasiswa = new mahasiswa;
        $ruangan = new ruangan;
        $dosenMatakuliah = new dosen_matakuliah;
        return view('jadwal_matakuliah.tambah', compact('mahasiswa','ruangan','dosenMatakuliah'));
    }
    public function simpan(JadwalMatakuliahRequest $input)
    {
        $jadwal_matakuliah = new jadwal_matakuliah($input->only('mahasiswa_id','ruangan_id','dosen_matakuliah_id'));
        if($jadwal_matakuliah->save()) $this->informasi = "Jadwal Mahasiswa Berhasil disimpan";
        return redirect('jadwal_matakuliah')->with(['informasi'=> $this->informasi]); 
        /*$jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
        $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
        $jadwal_matakuliah->dosen_matakuliah_id = $input->dosen_matakuliah_id;
        $informasi = $jadwal_matakuliah->save() ? 'berhasil Simpan data' : 'Gagal Simpan Data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]); */
    }
    public function edit($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        $mahasiswa = new Mahasiswa;
        $ruangan = new ruangan;
        $dosenMatakuliah = new dosen_Matakuliah;
        return view('jadwal_matakuliah.edit', compact('mahasiswa','ruangan','dosenMatakuliah','jadwal_matakuliah'));
    }
    public function lihat($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        return view('jadwal_matakuliah.lihat',compact('jadwal_matakuliah'));
    }
    public function update($id, JadwalMatakuliahRequest $input)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
         $jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
        $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
        $jadwal_matakuliah->dosen_matakuliah_id = $input->dosen_matakuliah_id;
        $informasi = $jadwal_matakuliah->save() ? 'Berhasil Update' : 'Gagal Update Data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        $informasi = $jadwal_matakuliah->delete() ? 'Berhasil Hapus Data' : 'Gagal Hapus Data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }
}