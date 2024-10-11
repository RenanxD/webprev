<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ $cidade->cidade_descricao }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="logo" style="margin-top: 10rem;">
    <x-logos.logo-regiao/>
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
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="input-icon-svg"
                 height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path fill="none" d="M0 0h24v24H0V0z"></path>
                <path
                    d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 14H4V8l8 5 8-5v10zm-8-7L4 6h16l-8 5z"></path>
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
    document.querySelector('form').addEventListener('submit', function (e) {
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
