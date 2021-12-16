<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjetosRequest;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjetosController extends Controller
{
    public function index()
    {
        $projetos = Projeto::ordenados()->get();
        $cores = ['#000' => 'Preto', '#FFF' => 'Branco'];

        return view('painel.projetos.index', compact('projetos', 'cores'));
    }

    public function create()
    {
        $cores = ['#000' => 'Preto', '#FFF' => 'Branco'];

        return view('painel.projetos.create', compact('cores'));
    }

    public function store(ProjetosRequest $request)
    {
        try {
            $input = $request->all();

            $input['slug_pt'] = Str::slug($request->titulo_pt, "-");
            if (isset($input['titulo_en'])) $input['slug_en'] = Str::slug($request->titulo_en, "-");
            if (isset($input['titulo_es'])) $input['slug_es'] = Str::slug($request->titulo_es, "-");

            if (isset($input['capa'])) $input['capa'] = Projeto::upload_capa();

            Projeto::create($input);

            return redirect()->route('painel.projetos.index')->with('success', 'Registro adicionado com sucesso.');
        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar registro: ' . $e->getMessage()]);
        }
    }

    public function edit(Projeto $projeto)
    {
        $cores = ['#000' => 'Preto', '#FFF' => 'Branco'];

        return view('painel.projetos.edit', compact('projeto', 'cores'));
    }

    public function update(ProjetosRequest $request, Projeto $projeto)
    {
        try {
            $input = $request->all();

            $input['slug_pt'] = Str::slug($request->titulo_pt, "-");
            if (isset($input['titulo_en'])) $input['slug_en'] = Str::slug($request->titulo_en, "-");
            if (isset($input['titulo_es'])) $input['slug_es'] = Str::slug($request->titulo_es, "-");

            if (isset($input['capa'])) $input['capa'] = Projeto::upload_capa();

            $projeto->update($input);

            return redirect()->route('painel.projetos.index')->with('success', 'Registro alterado com sucesso.');
        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar registro: ' . $e->getMessage()]);
        }
    }

    public function destroy(Projeto $projeto)
    {
        try {
            $projeto->delete();

            return redirect()->route('painel.projetos.index')->with('success', 'Registro excluído com sucesso.');
        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir registro: ' . $e->getMessage()]);
        }
    }
}
