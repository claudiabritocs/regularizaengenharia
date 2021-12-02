<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;

use App\Http\Requests;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::ordenados()->get();

        return view('painel.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('painel.faq.create');
    }

    public function store(FaqRequest $request)
    {
        try {

            $input = $request->all();

            Faq::create($input);

            return redirect()->route('painel.faq.index')->with('success', 'FAQ adicionado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao adicionar FAQ: '.$e->getMessage()]);

        }
    }

    public function edit(Faq $faqs)
    {
        return view('painel.faq.edit', compact('faqs'));
    }

    public function update(FaqRequest $request, Faq $faqs)
    {
        try {

            $input = $request->all();

            $faqs->update($input);

            return redirect()->route('painel.faq.index')->with('success', 'FAQ alterado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar FAQ: '.$e->getMessage()]);

        }
    }

    public function destroy(Faq $faqs)
    {
        try {

            $faqs->delete();

            return redirect()->route('painel.faq.index')->with('success', 'FAQ excluído com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir FAQ: '.$e->getMessage()]);

        }
    }
}
