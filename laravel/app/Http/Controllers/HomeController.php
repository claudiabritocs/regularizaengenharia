<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Servicos;
use App\Models\Principal;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'home' => Principal::first(),
            'banners' => Banners::ordenados()->get(),
            'servicos' => Servicos::ordenados()->get(),
        ]);
    }
}
