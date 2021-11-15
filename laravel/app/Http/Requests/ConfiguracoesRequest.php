<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConfiguracoesRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => '',
            'keywords' => '',
            'imagem_de_compartilhamento' => 'image',
            'analytics' => '',
        ];
    }
}
