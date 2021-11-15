<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return view('painel.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('painel.usuarios.create');
    }

    public function store(UserRequest $request)
    {
        try {

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);

            User::create($input);
            return redirect()->route('painel.usuarios.index')->with('success', 'Usuário adicionado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao adicionar usuário: '.$e->getMessage()]);

        }
    }

    public function edit(User $usuario)
    {
        return view('painel.usuarios.edit', compact('usuario'));
    }

    public function update(UserRequest $request, User $usuario)
    {
        try {

            $input = array_filter($request->all(), 'strlen');
            if (isset($input['password'])) $input['password'] = bcrypt($input['password']);

            $usuario->update($input);
            return redirect()->route('painel.usuarios.index')->with('success', 'Usuário alterado com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao alterar usuário: '.$e->getMessage()]);

        }
    }

    public function destroy(User $usuario)
    {
        try {

            $usuario->delete();
            return redirect()->route('painel.usuarios.index')->with('success', 'Usuário excluído com sucesso.');

        } catch (\Exception $e) {

            return back()->withErrors(['Erro ao excluir usuário: '.$e->getMessage()]);

        }
    }
}
