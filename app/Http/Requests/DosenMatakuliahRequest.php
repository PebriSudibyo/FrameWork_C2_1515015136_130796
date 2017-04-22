<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DosenMatakuliahRequest extends Request
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
            'dosen'=>'required',
            'matakuliah'=>'required',
        ];
        if($this->is('dosen_matakuliah/tambah')){
            $validasi['password'] = 'required';
        }
        return $validasi;
    }
}