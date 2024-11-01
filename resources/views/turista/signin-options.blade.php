@extends('layouts.signin-options')
@section('title', 'Bem-vindo')
@section('content')
    <div class="logo" style="margin-top: 10rem;">
        <x-logos.logo-regiao/>
    </div>
    <div class="cadastro-container">
        <div class="email-container">
            <div class="email-label">Conta:</div>
            <div class="email-tag">{{ $email }}</div>
        </div>
        <h2>O que <strong>deseja</strong> fazer?</h2>
        <a href="{{ route('complete.registration', $slug) }}"
           class="btn btn-primary btn-login centralizar-texto">Iniciar</a>
        <a href="{{ route('acessar.comprovante', ['slug' => $slug]) }}"
           class="btn btn-login btn-comprovante centralizar-texto">Acessar Comprovante</a>
        <a class="btn btn-login btn-emissao centralizar-texto" onclick="redirectToSignIn()">Emitir para outro turista</a>
    </div>
@endsection
<script>
    function redirectToSignIn() {
        const slug = window.location.pathname.split("/")[1];

        window.location.href = `/${slug}/signin`;
    }
</script>
