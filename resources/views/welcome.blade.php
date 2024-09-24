<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <style>
        .full-height {
            height: 100vh;
        }

        .cidade-card {
            margin: 10px;
            width: 150px;
            text-align: center;
            cursor: pointer;
        }

        .cidade-card .card-body {
            padding: 1rem;
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="container d-flex flex-column justify-content-center align-items-center text-center full-height">
    <div class="mb-4">
        <x-logos.logo-regiao/>
    </div>
    <div>
        <h1 style="font-size: 35px"><strong>Selecione</strong> qual <strong>região</strong> <br> deseja acessar</h1>
    </div>
    <div class="form-group">
        <select name="estado" id="estado" class="form-control" style="width: 300px; height: 45px">
            <option value="">Selecione um estado</option>
            @foreach($estados as $estado)
                <option value="{{ $estado->id_estado }}">{{ $estado->estado_descricao }}</option>
            @endforeach
        </select>
    </div>
    <div id="cidade-card" style="display: none;">
        <div class="d-flex flex-wrap justify-content-center">
            <!-- Cards will be appended here -->
        </div>
    </div>
</div>

<script>
    document.getElementById('estado').addEventListener('change', function () {
        var estadoId = this.value;
        var cidadeCardContainer = document.getElementById('cidade-card');
        var cidadeCardContent = cidadeCardContainer.querySelector('.d-flex');

        // Clear previous cards
        cidadeCardContent.innerHTML = '';

        // Return early if no estadoId is selected
        if (!estadoId) {
            cidadeCardContainer.style.display = 'none';
            return;
        }

        // Show loading text
        cidadeCardContainer.style.display = 'block';
        cidadeCardContent.innerHTML = '<p>Carregando cidades...</p>';

        fetch(`/api/estados/${estadoId}/cidades`)
            .then(response => response.json())
            .then(data => {
                cidadeCardContent.innerHTML = ''; // Clear loading text
                if (data.length > 0) {
                    data.forEach(function (cidade) {
                        var card = document.createElement('div');
                        card.classList.add('card', 'cidade-card');
                        card.innerHTML = `
                        <div class="card-body">
                            <h5 class="card-title">${cidade.cidade_descricao}</h5>
                        </div>
                    `;
                        // Add click event listener to redirect to the city's login route
                        card.addEventListener('click', function () {
                            window.location.href = `/${cidade.slug}/signin`;
                        });
                        cidadeCardContent.appendChild(card);
                    });
                } else {
                    cidadeCardContent.innerHTML = '<p>Nenhuma cidade disponível.</p>';
                }
            });
    });
</script>

</body>
</html>
