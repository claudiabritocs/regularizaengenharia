<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests\ContatoRequest;
use App\Http\Controllers\Controller;

use App\Models\Contato;

class ContatoController extends Controller
{
    public function index()
    {
        $contato = Contato::first();

        return view('painel.contato.index', compact('contato'));
    }

    public function update(ContatoRequest $request, Contato $contato)
    {
        try {

            $input = $request->all();

            $contato->update($input);
            return redirect()->route('painel.contato.index')->with('success', 'Informações alteradas com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar informações: '.$e->getMessage()]);

        }
    }
}
