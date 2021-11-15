<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DestaquesRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'projeto_id' => 'required',
            'imagem'     => 'required|image',
        ];

        if ($this->method() != 'POST') {
            $rules['imagem'] = 'image';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'projeto_id' => 'projeto',
        ];
    }
}
