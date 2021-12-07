<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Banners;
use App\Models\Contato;
use App\Models\Servicos;
use App\Models\Principal;
use App\Models\Certificados;

class RegularizacaoController extends Controller
{
    public function index()
    {
        return view('frontend.regularizacao', [
            'home' => Principal::first(),
            'contato' => Contato::first(),
            'banners' => Banners::ordenados()->get(),
            'certificados' => Certificados::ordenados()->get(),
            'faq' => Faq::ordenados()->get(),
        ]);
    }
}
