<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BannersRequest extends Request
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
            'projeto' => '',
        ];

        if ($this->method() != 'POST') {
            $rules['imagem'] = 'image';
        }

        return $rules;
    }
}
