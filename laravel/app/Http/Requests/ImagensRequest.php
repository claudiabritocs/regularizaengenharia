<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImagensRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'imagem' => 'required|image',
            'link' => '',
        ];

        if ($this->method() != 'POST') {
            $rules['imagem'] = 'image';
        }

        return $rules;
    }
}
