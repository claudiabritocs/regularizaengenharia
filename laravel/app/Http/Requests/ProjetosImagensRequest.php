<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjetosImagensRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'imagem' => 'required|image'
        ];
    }
}
