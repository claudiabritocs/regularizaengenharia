<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests\ServicosRequest;
use App\Http\Requests\ServicosEditRequest;
use App\Http\Controllers\Controller;

use App\Models\Servicos;

class ServicosController extends Controller
{
    public function index()
    {
        $registro = Servicos::ordenados()->get();

        return view('painel.servicos.index', compact('registro'));
    }

    public function create()
    {
        return view('painel.servicos.create');
    }

    public function store(ServicosRequest $request)
    {
        try {

            $input = $request->all();

            if (isset($input['imagem'])) $input['imagem'] = Servicos::upload_imagem();

            Servicos::create($input);

            return redirect()->route('painel.servicos.index')->with('success', 'Serviço adicionado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao adicionar o serviço: '.$e->getMessage()]);

        }
    }

    public function edit(Servicos $registro)
    {
        return view('painel.servicos.edit', compact('registro'));
    }

    public function update(ServicosEditRequest $request, Servicos $registro)
    {
        try {

            $input = $request->all();

            if (isset($input['imagem'])) $input['imagem'] = Servicos::upload_imagem();

            $registro->update($input);

            return redirect()->route('painel.servicos.index')->with('success', 'Serviço alterado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar o serviço: '.$e->getMessage()]);

        }
    }

    public function destroy(Servicos $registro)
    {
        try {

            $registro->delete();

            return redirect()->route('painel.servicos.index')->with('success', 'Serviço excluído com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir o serviço: '.$e->getMessage()]);

        }
    }
}
