<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JadwalMatakuliahRequest extends Request
{
    /**
    * Determine if the user is authorized to make this request.
    *
    *@return bool
    */
    public function authorize()
    {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    *@return array
    */

    public function rules()
    {
        $validasi = [
            'mahasiswa'=>'required',
            'ruangan'=>'required',
            'matakuliah'=>'required',
            //'username'=>'required'
        ];
        if($this->is('jadwal_matakuliah/tambah')){
            $validasi['password'] = 'required';
        }
        return $validasi;
    }
}