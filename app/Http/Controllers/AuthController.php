<?php

namespace App\Http\Controllers;

use App\Mail\LoginLinkMail;
use App\Models\Cidade;
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

        $sessionToken = Session::get('auth_token');

        if ($sessionToken) {
            return view('cidades.signin-options', [
                'cidade' => $cidade,
                'email' => Session::get('email'),
                'slug' => $slug,
            ]);
        }

        return view('cidades.signin', compact('cidade', 'slug'));
    }

    public function sendLoginLink(Request $request, $slug)
    {
        $request->validate(['email' => 'required|email']);

        $token = Str::random(60);
        Session::put('auth_token', $token);
        Session::put('email', $request->email);

        $link = route('login.signin', ['slug' => $slug]);

        Mail::to($request->email)->send(new LoginLinkMail($link));

        return response()->json(['success' => true, 'message' => 'Link de autenticação enviado para o seu e-mail.']);
    }

    public function showCompleteRegistrationForm($slug)
    {
        if (!Session::has('auth_token')) {
            return redirect()->route('login')->withErrors(['message' => 'Você precisa estar autenticado para acessar esta página.']);
        }

        $email = session('email');
        return view('cidades.complete-registration', compact('email', 'slug'));
    }

    public function completeRegistration(Request $request)
    {
        $request->validate([
            'turista_cpf' => 'nullable',
            'turista_passaporte' => 'nullable',
            'turista_nome' => 'nullable',
            'turista_email' => 'nullable',
            'turista_fone1' => 'nullable',
            'turista_fone2' => 'nullable',
            'turista_data_nascimento' => 'nullable',
            'turista_sexo' => 'nullable',
            'turista_tipo_sangue' => 'nullable',
            'turista_endereco_cep' => 'nullable',
            'turista_endereco' => 'nullable',
            'turista_endereco_bairro' => 'nullable',
            'turista_endereco_numero' => 'nullable',
            'turista_necessidade_esp' => 'nullable',
            'turista_dependente' => 'nullable',
            'turista_estrangeiro' => 'nullable'
        ]);

        $turista = new Turista();

        $turista->turista_cpf = $request->input('turista_cpf');
        $turista->turista_passaporte = $request->input('turista_passaporte');
        $turista->turista_nome = $request->input('turista_nome');
        $turista->turista_email = $request->input('turista_email');
        $turista->turista_fone1 = $request->input('turista_fone1');
        $turista->turista_fone2 = $request->input('turista_fone2');
        $turista->turista_data_nascimento = $request->input('turista_data_nascimento');
        $turista->turista_sexo = $request->input('turista_sexo');
        $turista->turista_tipo_sangue = $request->input('turista_tipo_sangue');
        $turista->turista_endereco_cep = $request->input('turista_endereco_cep');
        $turista->turista_endereco = $request->input('turista_endereco');
        $turista->turista_endereco_bairro = $request->input('turista_endereco_bairro');
        $turista->turista_endereco_numero = $request->input('turista_endereco_numero');
        $turista->turista_necessidade_esp = $request->input('turista_necessidade_esp');
        $turista->turista_dependente = $request->input('turista_dependente');
        $turista->turista_estrangeiro = $request->input('turista_estrangeiro');

        $turista->save();

        Auth::login($turista);

        return redirect()->route('home')->with('success', 'Cadastro completo e login realizado com sucesso.');
    }
}
