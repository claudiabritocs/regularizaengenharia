<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\ProjetoImagem;
use Illuminate\Http\Request;

class ProjetosController extends Controller
{
    public function index()
    {
        $projetos = Projeto::ordenados()->get();

        return view('frontend.projetos', compact('projetos'));
    }

    public function getDados()
    {
        $projetos = Projeto::ordenados()->get();

        return response()->json(['projetos' => $projetos]);
    }

    public function show($slug)
    {
        $projeto = Projeto::where('slug_pt', $slug)->first();
        $imagens = ProjetoImagem::projeto($projeto->id)->ordenados()->get();

        return view('frontend.projetos-show', compact('projeto', 'imagens'));
    }

    public function getShowDados($slug) 
    {
        $projeto = Projeto::where('slug_pt', $slug)->first();
        $imagens = ProjetoImagem::projeto($projeto->id)->ordenados()->get();

        return response()->json(['projeto' => $projeto, 'imagens' => $imagens]);
    }

    public function getShowDadosProximo($slug) 
    {
        $projetoAtual = Projeto::where('slug_pt', $slug)->first();
        $projeto = Projeto::ordenados()->where('ordem', ">", $projetoAtual->ordem)->first();
        $imagens = ProjetoImagem::projeto($projeto->id)->ordenados()->get();

        return response()->json(['projeto' => $projeto, 'imagens' => $imagens]);
    }

    public function getShowDadosAnterior($slug) 
    {
        $projetoAtual = Projeto::where('slug_pt', $slug)->first();
        $projeto = Projeto::where('ordem', "<", $projetoAtual->ordem)->orderBy('ordem', 'desc')->first();
        $imagens = ProjetoImagem::projeto($projeto->id)->ordenados()->get();

        return response()->json(['projeto' => $projeto, 'imagens' => $imagens]);
    }
}
