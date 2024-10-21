@extends('layouts.signin')
@section('title', 'Login - ' . $cidade->cidade_descricao)
@section('content')
    <div class="logo d-flex justify-content-center">
        <x-logos.logo-regiao/>
    </div>
    <h3 class="welcome-title">Olá, seja <strong>bem-vindo!</strong></h3>
    <div class="d-flex justify-content-center">
        <div class="login-container">
            <button class="btn btn-google">
                <img src="{{ asset('images/google.png') }}" alt="Google icon">
                <span>Entrar com Google</span>
            </button>
            <div class="mb-3 line-login">
                <hr class="line-signin">
                ou
                <hr class="line-signin">
            </div>
            <form method="POST" action="{{ url($cidade->slug . '/signin-link') }}">
                @csrf
                <div class="input-icon">
                    <input type="email" name="email" placeholder="Insira seu email" id="email"
                           class="form-control input-email">
                    <x-logos.logo-email/>
                </div>
                <button type="submit" class="btn btn-primary btn-login"><strong>Continue</strong></button>
            </form>
            <div class="help-text">
                Precisa de <a href="#">ajuda</a>?
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/turista/login.js') }}"></script>
@endsection
