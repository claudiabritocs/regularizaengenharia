<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjetosImagensRequest;
use App\Models\Projeto;
use App\Models\ProjetoImagem;
use Illuminate\Http\Request;

class ProjetosImagensController extends Controller
{
    public function index(Projeto $projeto)
    {
        $imagens = ProjetoImagem::projeto($projeto->id)->ordenados()->get();

        return view('painel.projetos.imagens.index', compact('projeto', 'imagens'));
    }

    public function show(Projeto $projeto, ProjetoImagem $imagem)
    {
        return $imagem;
    }

    public function store(ProjetosImagensRequest $request, Projeto $projeto)
    {
        try {
            $input = $request->all();
            $input['imagem'] = ProjetoImagem::upload_imagem();
            $input['projeto_id'] = $projeto->id;

            $imagem = ProjetoImagem::create($input);

            $view = view('painel.projetos.imagens.imagem', compact('projeto', 'imagem'))->render();

            return response()->json(['body' => $view]);
        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao adicionar registro: ' . $e->getMessage()]);
        }
    }

    public function destroy(Projeto $projeto, ProjetoImagem $imagen)
    {
        try {
            $imagen->delete();

            return redirect()->route('painel.projetos.imagens.index', $projeto->id)->with('success', 'Registro excluído com sucesso.');
        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir registro: ' . $e->getMessage()]);
        }
    }

    public function clear(Projeto $projeto)
    {
        try {
            $projeto->imagens()->delete();

            return redirect()->route('painel.projetos.imagens.index', $projeto->id)->with('success', 'Imagens excluídas com sucesso.');
        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir imagens: ' . $e->getMessage()]);
        }
    }
}
