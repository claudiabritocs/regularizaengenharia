<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SobreRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'imagem_1' => 'image',
            'texto_1' => 'required',
            // 'frase' => 'required',
            // 'imagem_2' => 'image',
            'texto_2' => 'required'
            // 'imagem_3' => 'image',
            // 'texto_3' => 'required',
            // 'imagem_4' => 'image',
            // 'texto_4' => 'required',
        ];
    }
}
