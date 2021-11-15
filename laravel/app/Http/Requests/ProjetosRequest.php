<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjetosRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'projetos_categoria_id' => 'required',
            'titulo' => 'required',
            'capa' => 'required|image',
            'local' => 'required',
            // 'descricao' => 'required',
        ];

        if ($this->method() != 'POST') {
            $rules['capa'] = 'image';
        }

        return $rules;
    }
}
