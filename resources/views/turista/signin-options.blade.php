<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
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
    <a class="btn btn-login btn-comprovante centralizar-texto">Acessar Comprovante</a>
    <a class="btn btn-login btn-emissao centralizar-texto">Emitir para outro turista</a>
</div>
</body>
</html>
