<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class HomeRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'frase' => '',
            'texto' => '',
            'video' => '',
            'imagem_sobre_1' => 'image',
            'imagem_sobre_2' => 'image',
        ];
    }
}
