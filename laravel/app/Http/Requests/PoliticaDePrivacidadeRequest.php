<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PoliticaDePrivacidadeRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'texto' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => "Preencha todos os campos corretamente.",
        ];
    }
}
