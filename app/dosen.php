<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $table = 'dosen';

    public function pengguna()
    {
    	return $this->belongsto(pengguna::class);
    }

    public function dosen_matakuliah()
    {
    	return $this->hasMany(dosen_matakuliah::class);
    }
}
