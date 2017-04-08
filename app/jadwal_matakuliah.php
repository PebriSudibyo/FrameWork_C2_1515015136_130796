<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal_matakuliah extends Model
{
    protected $table = 'jadwal_matakuliah';

    protected $guarded =['id'];

    public function mahasiswa()
    {
    	return $this->belongsto(mahasiswa::class);
    }

    public function ruangan()
    {
    	return $this->belongsto(ruangan::class);
    }

    public function dosen_matakuliah()
    {
    	return $this->belongsto(dosen_matakuliah::class);
    }
}
