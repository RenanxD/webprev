<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ $cidade->cidade_descricao }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Login para a cidade de {{ $cidade->cidade_descricao }}</h2>
    <form method="POST" action="{{ url($cidade->slug . '/signin') }}">
        @csrf
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar código de acesso</button>
    </form>
</div>
</body>
</html>
