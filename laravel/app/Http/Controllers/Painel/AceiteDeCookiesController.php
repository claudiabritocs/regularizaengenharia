<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\AceiteDeCookies;

class AceiteDeCookiesController extends Controller
{
    public function index()
    {
        $registros = AceiteDeCookies::orderBy('created_at', 'DESC')->get();

        return view('painel.cookies.index', compact('registros'));
    }
}
