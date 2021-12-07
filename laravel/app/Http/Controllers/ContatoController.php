<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ContatosRecebidosRequest;

use App\Models\Contato;
use App\Models\ContatoRecebido;

use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function index()
    {
        $contato = Contato::first();

        return view('frontend.contato', compact('contato'));
    }

    public function post(ContatosRecebidosRequest $request, ContatoRecebido $contatoRecebido)
    {
        $data = $request->all();

        $contatoRecebido->create($data);
        $this->sendMail($data);

        return redirect('contato')->with('enviado', true);
    }

    private function sendMail($data)
    {
        if (! $email = Contato::first()->email) {
           return false;
        }

        Mail::send('emails.contato', $data, function($m) use ($email, $data)
        {
            $m->to($email, config('app.name'))
               ->subject('[CONTATO] '.config('app.name'))
               ->replyTo($data['email'], $data['nome']);
        });
    }
}
