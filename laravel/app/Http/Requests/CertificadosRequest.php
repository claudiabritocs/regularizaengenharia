<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CertificadosRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'imagem' => 'required|image',
        ];

        if ($this->method() != 'POST') {
            $rules['imagem'] = 'image';
        }

        return $rules;
    }
}
