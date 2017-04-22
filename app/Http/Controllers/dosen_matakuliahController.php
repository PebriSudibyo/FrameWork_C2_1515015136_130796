<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DosenMatakuliahRequest;

use App\dosen_matakuliah;

use App\dosen;

use App\matakuliah;

class dosen_matakuliahController extends Controller
{
     protected $informasi = 'Gagal Melakukan Aksi';
   public function awal()
    {
        $semuaJadwalDosenMatakuliah = dosen_matakuliah::all();
        return view('dosen_matakuliah.awal',compact('semuaJadwalDosenMatakuliah'));
    }
    public function tambah()
    {
        $dosen = new dosen;
        $matakuliah = new matakuliah;
        return view('dosen_matakuliah.tambah',compact('dosen','matakuliah'));
    }
    public function simpan(DosenMatakuliahRequest $input)
    {
    	$dosen_matakuliah = new dosen_matakuliah($input->only('dosen_id','matakuliah_id'));
        if($dosen_matakuliah->save()) $this->informasi = "Jadwal Dosen Mengajar Berhasil Disimpan";
        return redirect('dosen_matakuliah')->with(['informasi'=> $this->informasi]);
    	/*$dosen_matakuliah->dosen_id = $input->dosen_id;
    	$dosen_matakuliah->matakuliah_id = $input->matakuliah_id;
    	$informasi = $dosen_matakuliah->save() ? 'berhasil Simpan data' : 'Gagal Simpan Data';
        return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);*/
    }
    public function edit($id)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $dosen = new dosen;
        $matakuliah = new matakuliah;
        return view('dosen_matakuliah.edit',compact('dosen_matakuliah','dosen','matakuliah'));
    }
    public function lihat($id)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        return view('dosen_matakuliah.lihat', compact('dosen_matakuliah'));
    }
    public function update($id, DosenMatakuliahRequest $input)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $dosen_matakuliah->dosen_id = $input->dosen_id;
        $dosen_matakuliah->matakuliah_id = $input->matakuliah_id;
        $informasi = $dosen_matakuliah->save() ? 'Berhasil Update' : 'Gagal Update Data';
        return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $informasi = $dosen_matakuliah->delete() ? 'Berhasil Hapus Data' : 'Gagal Hapus Data';
        return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
    }
}