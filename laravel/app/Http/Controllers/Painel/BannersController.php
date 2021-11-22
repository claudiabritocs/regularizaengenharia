<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests\BannersRequest;
use App\Http\Controllers\Controller;

use App\Models\Banners;

class BannersController extends Controller
{
    public function index()
    {
        $registros = Banners::ordenados()->get();

        return view('painel.banners.index', compact('registros'));
    }

    public function create()
    {
        return view('painel.banners.create');
    }

    public function store(BannersRequest $request)
    {
        try {

            $input = $request->all();

            if (isset($input['imagem'])) $input['imagem'] = Banners::upload_imagem();

            Banners::create($input);

            return redirect()->route('painel.banners.index')->with('success', 'Banner adicionado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao adicionar o banner: '.$e->getMessage()]);

        }
    }

    public function edit(Banners $registros)
    {
        return view('painel.banners.edit', compact('registros'));
    }

    public function update(BannersRequest $request, Banners $registros)
    {
        try {

            $input = $request->all();

            if (isset($input['imagem'])) $input['imagem'] = Banners::upload_imagem();

            $registros->update($input);

            return redirect()->route('painel.banners.index')->with('success', 'Banner alterado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar o banner: '.$e->getMessage()]);

        }
    }

    public function destroy(Banners $registros)
    {
        try {

            $registros->delete();

            return redirect()->route('painel.banners.index')->with('success', 'Banner excluído com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir o banner: '.$e->getMessage()]);

        }
    }
}
