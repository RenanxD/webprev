<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('auth-login.login');
    }

    // Enviar o código de autenticação por e-mail
    public function sendLoginCode(Request $request)
    {
        // Validação do e-mail
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Encontrar o usuário
        $user = User::where('email', $request->email)->first();

        // Gerar um código de 6 dígitos aleatório
        $code = rand(100000, 999999);

        // Salvar o código na sessão (ou banco de dados, se preferir)
        Session::put('login_code', $code);
        Session::put('email', $user->email);

        // Enviar o código por e-mail
        Mail::to($user->email)->send(new \App\Mail\LoginCodeMail($code));

        return redirect()->route('verify-code')->with('success', 'Código enviado para o seu e-mail.');
    }

    // Exibir o formulário para inserir o código
    public function showVerifyCodeForm()
    {
        return view('auth.verify-code');
    }

    // Verificar o código enviado
    public function verifyCode(Request $request)
    {
        // Validação do código
        $request->validate([
            'code' => 'required|numeric',
        ]);

        // Verificar o código
        if (Session::get('login_code') == $request->code) {
            $user = User::where('email', Session::get('email'))->first();

            // Autenticar o usuário
            Auth::login($user);

            // Limpar a sessão
            Session::forget('login_code');
            Session::forget('email');

            return redirect()->route('home')->with('success', 'Login realizado com sucesso.');
        } else {
            return back()->withErrors(['code' => 'Código inválido']);
        }
    }
}
