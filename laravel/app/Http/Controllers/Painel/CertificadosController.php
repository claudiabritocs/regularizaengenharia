<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CertificadosRequest;

use App\Http\Requests;
use App\Models\Certificados;

class CertificadosController extends Controller
{
    public function index()
    {
        $certificados = Certificados::ordenados()->get();

        return view('painel.certificados.index', compact('certificados'));
    }

    public function create()
    {
        return view('painel.certificados.create');
    }

    public function store(CertificadosRequest $request)
    {
        try {

            $input = $request->all();

            if (isset($input['imagem'])) $input['imagem'] = Certificados::upload_imagem();

            Certificados::create($input);

            return redirect()->route('painel.certificados.index')->with('success', 'Certificado adicionado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao adicionar certificado: '.$e->getMessage()]);

        }
    }

    public function edit(Certificados $certificados)
    {
        return view('painel.certificados.edit', compact('certificados'));
    }

    public function update(CertificadosRequest $request, Certificados $certificados)
    {
        try {

            $input = $request->all();

            if (isset($input['imagem'])) $input['imagem'] = Certificados::upload_imagem();

            $certificados->update($input);

            return redirect()->route('painel.certificados.index')->with('success', 'Certificado alterado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar certificado: '.$e->getMessage()]);

        }
    }

    public function destroy(Certificados $certificados)
    {
        try {

            $certificados->delete();

            return redirect()->route('painel.certificados.index')->with('success', 'Certificado excluído com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir certificado: '.$e->getMessage()]);

        }
    }
}
