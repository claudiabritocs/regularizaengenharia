<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ContatoRecebido;

class ContatosRecebidosController extends Controller
{
    public function index()
    {
        $contatosrecebidos = ContatoRecebido::orderBy('created_at', 'DESC')->get();

        return view('painel.contato.recebidos.index', compact('contatosrecebidos'));
    }

    public function show(ContatoRecebido $contato)
    {
        $contato->update(['lido' => 1]);

        return view('painel.contato.recebidos.show', compact('contato'));
    }

    public function destroy(ContatoRecebido $contato)
    {
        try {

            $contato->delete();
            return redirect()->route('painel.contato.recebidos.index')->with('success', 'Mensagem excluída com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir mensagem: '.$e->getMessage()]);

        }
    }

    public function toggle(ContatoRecebido $contato, Request $request)
    {
        try {

            $contato->update([
                'lido' => !$contato->lido
            ]);

            return redirect()->route('painel.contato.recebidos.index')->with('success', 'Mensagem alterada com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar mensagem: '.$e->getMessage()]);

        }
    }
}
