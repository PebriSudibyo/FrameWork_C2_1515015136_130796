<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'pengguna';
    protected $quarded = ['id'];

    protected $fillable = ['username', 'password'];

    public function dosen()
    {
    	return $this->hasOne(dosen::class);
    }
    public function mahasiswa()
    {
    	return $this->hasOne(mahasiswa::class);
    }
}
