<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .cadastro-container {
            text-align: center;
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 25px;
            font-size: 1.5rem;
        }

        .btn-login {
            line-height: 35px;
            border-radius: 0.5rem;
            height: 3.7rem;
            margin: 10px 0;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn-login:hover {
            transform: scale(1.03);
        }

        .btn-primary {
            width: 100%;
            height: 4.7rem;
            background-color: #007bff;
            border: none;
            border-radius: 0.5rem;
            color: white;
            font-weight: bold;
        }

        .btn-comprovante {
            width: 100%;
            height: 4.7rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: bold;
        }

        .btn-comprovante:hover {
            background-color: #d3d3d3;
            transform: scale(1.03);
        }

        .email-container {
            position: relative;
            margin-bottom: 15px;
        }

        .email-label {
            position: absolute;
            top: -7px;
            left: 15px;
            background-color: white;
            padding: 0 5px;
            font-weight: bold;
            font-size: 10px;
        }

        .email-tag {
            border-radius: 0.5rem;
            padding: 15px 10px;
            font-size: 14px;
            color: #333;
            border: solid 1px #eee;
            width: 100%;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .btn-emissao {
            text-decoration: underline;
            height: 4.7rem;
        }

        .btn-emissao:hover {
            text-decoration: underline;
            height: 4.7rem;
            transform: scale(1.04);
        }

        .centralizar-texto {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 10px 20px;
            width: 100%;
        }

    </style>
</head>
<body>
<div class="logo">
    <x-logos.logo-regiao />
</div>
<div class="cadastro-container">
    <div class="email-container">
        <div class="email-label">Conta:</div>
        <div class="email-tag">{{ $email }}</div>
    </div>
    <h2>O que <strong>deseja</strong> fazer?</h2>
    <a href="{{ route('complete.registration', $slug) }}" class="btn btn-primary btn-login centralizar-texto">Iniciar</a>
    <a class="btn btn-login btn-comprovante centralizar-texto">Acessar Comprovante</a>
    <a class="btn btn-login btn-emissao centralizar-texto">Emitir para outro turista</a>
</div>
</body>
</html>
