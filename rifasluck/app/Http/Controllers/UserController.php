<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ...

    public function register(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nomeRegistro' => 'required|string',
            'emailRegistro' => 'required|email|unique:users,email',
            'senhaRegistro' => 'required|min:6',
        ]);

        // Criação de um novo usuário no banco de dados
        $user = new User([
            'name' => $request->input('nomeRegistro'),
            'email' => $request->input('emailRegistro'),
            'password' => bcrypt($request->input('senhaRegistro')),
        ]);

        $user->save();

        // Autentica o usuário
        Auth::login($user);

        // Redireciona para a página desejada após o registro
        return redirect('/dashboard');
    }

    public function login(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'emailLogin' => 'required|email',
            'senhaLogin' => 'required',
        ]);

        // Tentativa de autenticação
        if (Auth::attempt(['email' => $request->input('emailLogin'), 'password' => $request->input('senhaLogin')])) {
            // Autenticação bem-sucedida, redireciona para a página desejada
            return redirect('/dashboard');
        }

        // Autenticação falhou, redireciona de volta para o formulário de login com uma mensagem de erro
        return redirect()->back()->withErrors(['login' => 'Credenciais inválidas.']);
    }

    // ...
}
