<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests\ConfiguracoesRequest;
use App\Http\Controllers\Controller;

use App\Models\Configuracoes;

class ConfiguracoesController extends Controller
{
    public function index()
    {
        $registro = Configuracoes::first();

        return view('painel.configuracoes.edit', compact('registro'));
    }

    public function update(ConfiguracoesRequest $request, Configuracoes $registro)
    {
        try {
            $input = $request->all();

            if (isset($input['imagem_de_compartilhamento'])) $input['imagem_de_compartilhamento'] = Configuracoes::upload_imagem_de_compartilhamento();

            $registro->update($input);

            return redirect()->route('painel.configuracoes.index')->with('success', 'Registro alterado com sucesso.');
        } catch (\Exception $e) {
            return back()->withErrors(['Erro ao alterar registro: '.$e->getMessage()]);
        }
    }
}
