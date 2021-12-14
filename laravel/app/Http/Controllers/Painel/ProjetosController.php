<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests\ProjetosRequest;
use App\Http\Requests\ProjetosEditRequest;
use App\Http\Controllers\Controller;

use App\Models\Projetos;

class ProjetosController extends Controller
{
    public function index()
    {
        $registro = Projetos::ordenados()->get();

        return view('painel.servicos.index', compact('registro'));
    }

    public function create()
    {
        return view('painel.servicos.create');
    }

    public function store(ProjetosRequest $request)
    {
        try {

            $input = $request->all();

            if (isset($input['imagem'])) $input['imagem'] = Projetos::upload_imagem();

            Projetos::create($input);

            return redirect()->route('painel.projetos.index')->with('success', 'Projeto adicionado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao adicionar o projeto: '.$e->getMessage()]);

        }
    }

    public function edit(Projetos $registro)
    {
        return view('painel.projetos.edit', compact('registro'));
    }

    public function update(ProjetosEditRequest $request, Projetos $registro)
    {
        try {

            $input = $request->all();

            if (isset($input['imagem'])) $input['imagem'] = Projetos::upload_imagem();

            $registro->update($input);

            return redirect()->route('painel.projetos.index')->with('success', 'Projeto alterado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar o projeto: '.$e->getMessage()]);

        }
    }

    public function destroy(Projetos $registro)
    {
        try {

            $registro->delete();

            return redirect()->route('painel.projetos.index')->with('success', 'Projeto excluído com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir o projeto: '.$e->getMessage()]);

        }
    }
}
