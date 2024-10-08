<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ $cidade->cidade_descricao }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fff;
        }
        .login-container {
            text-align: center;
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        .logo {
            margin-bottom: 10px;
        }
        .welcome-title {
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: 500;
            text-align: center;
        }
        .login-container img {
            width: 21px;
            margin-bottom: 9px;
            margin-top: 9px;
        }
        .btn-google {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            background-color: #fff;
            color: #555;
            border: 1px solid #eee;
            margin-bottom: 20px;
        }
        .btn-google img {
            margin-right: 8px;
            width: 20px;
        }
        .form-group input {
            text-align: center;
        }
        .help-text {
            margin-top: 20px;
            font-size: 14px;
            color: #6c757d;
        }
        .btn-login {
            line-height: 35px;
            border-radius: calc(.5rem - 2px);
            height: 3.7rem;
        }
        .input-email {
            border-radius: calc(.5rem - 2px);
            height: 3.1em;
            margin-bottom: 20px;
        }
        .input-icon {
            position: relative;
            width: 100%;
        }
        .input-icon input {
            padding-left: 35px;
        }
        .input-icon-svg {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            pointer-events: none;
        }
        input, .input-email, hr {
            border-color: #eee;
        }
        .btn-primary {
            width: 100%;
            background-color: #007bff;
            border: none;
        }
        .btn-custom-confirm {
            background-color: #007bff !important;
            border-color: #007bff !important;
            color: #fff;
            padding: 10px 24px;
            font-size: 16px;
            border-radius: 4px;
        }
        .btn-custom-confirm:hover {
            background-color: #0056b3 !important;
            border-color: #0056b3 !important;
        }
        .btn-custom-confirm:focus {
            outline: none;
            box-shadow: none;
        }
    </style>
</head>
<body>
<div class="logo">
    <x-logos.logo-regiao />
</div>
<h3 class="welcome-title">Olá, seja <strong>bem-vindo!</strong></h3>
<div class="login-container">
    <button class="btn btn-google">
        <img src="{{ asset('images/google.png') }}" alt="Google icon">
        <span>Entrar com Google</span>
    </button>
    <div class="mb-3" style="display: flex; align-items: center;">
        <hr style="flex-grow: 1; border: none; border-top: 1px solid #eee; margin-right: 10px;">
        ou
        <hr style="flex-grow: 1; border: none; border-top: 1px solid #eee; margin-left: 10px;">
    </div>
    <form method="POST" action="{{ url($cidade->slug . '/signin-link') }}">
        @csrf
        <div class="input-icon">
            <input type="email" name="email" placeholder="Insira seu email" id="email" class="form-control input-email">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="input-icon-svg" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path fill="none" d="M0 0h24v24H0V0z"></path>
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"></path>
            </svg>
        </div>
        <button type="submit" class="btn btn-primary btn-login"><strong>Continue</strong></button>
    </form>
    <div class="help-text">
        Precisa de <a href="#">ajuda</a>?
    </div>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Exibe o loading
        Swal.fire({
            title: 'Enviando...',
            text: 'Por favor, aguarde enquanto processamos sua solicitação.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                // Fechar o loading
                Swal.close();

                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'E-mail enviado!',
                        text: data.message,
                        confirmButtonText: 'Ok',
                        customClass: {
                            confirmButton: 'btn-custom-confirm'
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: data.message || 'Ocorreu um erro ao enviar o e-mail.',
                        confirmButtonText: 'Ok'
                    });
                }
            })
            .catch(error => {
                Swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Ocorreu um erro ao enviar o e-mail.',
                    confirmButtonText: 'Ok'
                });
            });
    });
</script>
