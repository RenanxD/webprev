<?php

namespace App\Http\Controllers\Turista;

use App\Http\Controllers\Controller;
use App\Mail\LoginLinkMail;
use App\Models\Cidade;
use App\Models\Configuracoes\Cobrancas;
use App\Models\Turista\Turista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function signin($slug)
    {
        $cidade = Cidade::where('slug', $slug)->firstOrFail();

        $urlToken = request('token');
        $sessionToken = Session::get('auth_token');

        if ($urlToken && $sessionToken && hash_equals($sessionToken, $urlToken)) {
            return view('turista.signin-options', [
                'cidade' => $cidade,
                'email' => Session::get('email'),
                'slug' => $slug,
            ]);
        }

        return view('turista.signin', compact('cidade', 'slug'));
    }

    public function sendLoginLink(Request $request, $slug)
    {
        $request->validate(['email' => 'required|email']);

        $token = Str::random(60);
        Session::put('auth_token', $token);
        Session::put('email', $request->email);

        $link = route('login.signin', ['slug' => $slug, 'token' => $token]);

        Mail::to($request->email)->send(new LoginLinkMail($link));

        return response()->json(['success' => true, 'message' => 'Link de autenticação enviado para o seu e-mail.']);
    }

    public function showCompleteRegistrationForm($slug)
    {
        if (!Session::has('auth_token')) {
            return redirect()->route('login')->withErrors(['message' => 'Você precisa estar autenticado para acessar esta página.']);
        }

        $cobrancaAtual = Cobrancas::where('cobranca_ativa', true)->latest()->first()
            ?? Cobrancas::latest()->first();
        $email = session('email');

        $cliente = Turista::where('turista_email', $email)->first();

        return view('turista.complete-registration', compact('email', 'slug', 'cobrancaAtual', 'cliente'));
    }
}
