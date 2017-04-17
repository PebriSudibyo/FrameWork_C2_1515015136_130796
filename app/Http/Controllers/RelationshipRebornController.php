<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\dosen;

class RelationshipRebornController extends Controller
{
    public function ujiHas()
    {
    	return dosen::has('dosen_matakuliah')->get();
    }

    public function ujiDoesntHave() //fungsi ini untuk menampilkan data dosen yang belum memiliki matakuliah / belum terdaftar pada matakuliah
    {
    	return dosen::doesntHave('dosen_matakuliah')->get();
    }
   
}
