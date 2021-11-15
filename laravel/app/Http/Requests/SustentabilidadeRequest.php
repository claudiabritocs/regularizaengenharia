<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SustentabilidadeRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'titulo' => 'required',
            'descricao' => '',
            'video' => '',
        ];

        if ($this->method() != 'POST') {
        }

        return $rules;
    }
}
