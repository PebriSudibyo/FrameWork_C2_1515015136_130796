<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table = 'pengguna';

    public function dosen()
    {
    	return $this->hasOne(dosen::class);
    }
    public function mahasiswa()
    {
    	return $this->hasOne(mahasiswa::class);
    }
}
