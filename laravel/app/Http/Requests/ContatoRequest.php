<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContatoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'       => 'email|required',
            'telefone'    => 'required',
            'endereco'    => 'required',
            'google_maps' => 'required',
            'imagem'      => 'image',
        ];
    }
}
