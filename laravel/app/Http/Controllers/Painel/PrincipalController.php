<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;

use App\Http\Requests\PrincipalRequest;
use App\Http\Controllers\Controller;

use App\Models\Principal;

class PrincipalController extends Controller
{
    public function index()
    {
        $registro = Principal::first();

        return view('painel.principal.edit', compact('registro'));
    }

    public function update(PrincipalRequest $request, Principal $registro)
    {
        try {
            $input = $request->all();

            $registro->update($input);

            return redirect()->route('painel.principal.index')->with('success', 'Registro alterado com sucesso.');
        } catch (\Exception $e) {
            return back()->withErrors(['Erro ao alterar registro: '.$e->getMessage()]);
        }
    }
}
