<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ServicosEditRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required',
            'paragrafo' => 'required',
            'imagem' => ''
        ];
    }
}
