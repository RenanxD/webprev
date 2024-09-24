<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CidadeController extends Controller
{
    public function signin($slug)
    {
        $cidade = Cidade::where('slug', $slug)->firstOrFail();
        return view('cidades.signin', compact('cidade'));
    }

    public function sendLoginCode(Request $request, $slug)
    {
        // Valida o e-mail inserido
        $request->validate([
            'email' => 'required|email',
        ]);

        // Gera um código de 6 dígitos aleatório
        $code = rand(100000, 999999);

        // Armazena o código e o e-mail na sessão
        Session::put('login_code', $code);
        Session::put('email', $request->email); // Usar o e-mail inserido

        // Envia o e-mail com o código de autenticação
        Mail::to($request->email)->send(new \App\Mail\LoginCodeMail($code));

        // Redireciona para a página de verificação do código
        return redirect()->route('verify-code')->with('success', 'Código de acesso enviado para o seu e-mail.');
    }

    public function showVerifyCodeForm()
    {
        return view('cidades.verify-code');
    }

    public function verifyCode(Request $request)
    {
// Validação do código inserido
        $request->validate([
            'code' => 'required|numeric',
        ]);

// Verifica se o código inserido corresponde ao código armazenado na sessão
        if (Session::get('login_code') == $request->code) {
            $user = User::where('email', Session::get('email'))->first();

// Autentica o usuário
            Auth::login($user);

// Limpa os dados da sessão
            Session::forget('login_code');
            Session::forget('email');

            return redirect()->route('home')->with('success', 'Login realizado com sucesso.');
        } else {
            return back()->withErrors(['code' => 'Código inválido']);
        }
    }
}
