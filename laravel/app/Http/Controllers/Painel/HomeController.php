<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests\HomeRequest;
use App\Http\Controllers\Controller;

use App\Models\Home;

class HomeController extends Controller
{
    public function index()
    {
        $registro = Home::first();

        return view('painel.home.edit', compact('registro'));
    }

    public function update(HomeRequest $request, Home $registro)
    {
        try {
            $input = $request->all();

            if (isset($input['imagem_sobre_1'])) $input['imagem_sobre_1'] = Home::upload_imagem_sobre_1();
            if (isset($input['imagem_sobre_2'])) $input['imagem_sobre_2'] = Home::upload_imagem_sobre_2();

            $registro->update($input);

            return redirect()->route('painel.home.index')->with('success', 'Registro alterado com sucesso.');
        } catch (\Exception $e) {
            return back()->withErrors(['Erro ao alterar registro: '.$e->getMessage()]);
        }
    }
}
