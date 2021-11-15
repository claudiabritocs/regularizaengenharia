<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SustentabilidadeImagensRequest extends Request
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
