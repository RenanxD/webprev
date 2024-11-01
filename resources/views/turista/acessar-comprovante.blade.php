@extends('layouts.signin')

@section('content')
    <div class="acessar-comprovante-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Alinhamento entre a seta e o título -->
            <x-botao-voltar></x-botao-voltar>
            <h3 class="mx-auto comprovante-titulo">Comprovantes</h3> <!-- Classe mx-auto centraliza o título -->
        </div>
        <div class="justify-content-center d-flex mt-4">
            <div class="mb-3">
                <a href="javascript:void(0);" id="link-ativos" class="link-style active"
                   onclick="showAtivos()">Ativo</a>
                <a href="javascript:void(0);" id="link-utilizados" class="link-style ml-3"
                   onclick="showUtilizados()">Utilizado</a>
            </div>
        </div>
        <div class="justify-content-center d-flex flex-column align-items-center" style="margin-top: 12rem;">
            <div id="comprovantes-ativos" style="display: none;">
                <div class="text-center">
                    <x-logos.logo-nada-consta />
                    <p style="font-weight: bold; color: #ABABAB; font-size: 20px;">Nada consta</p>
                </div>
            </div>

            <div id="comprovantes-utilizados" style="display: none;">
                <div class="text-center">
                    <x-logos.logo-nada-consta />
                    <p style="font-weight: bold; color: #ABABAB; font-size: 20px;">Nada consta</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showAtivos() {
            document.getElementById('comprovantes-ativos').style.display = 'block';
            document.getElementById('comprovantes-utilizados').style.display = 'none';

            document.getElementById('link-ativos').classList.add('active');
            document.getElementById('link-utilizados').classList.remove('active');
        }

        function showUtilizados() {
            document.getElementById('comprovantes-ativos').style.display = 'none';
            document.getElementById('comprovantes-utilizados').style.display = 'block';

            document.getElementById('link-ativos').classList.remove('active');
            document.getElementById('link-utilizados').classList.add('active');
        }

        // Exibe "Ativo" por padrão
        showAtivos();
    </script>
    <style>
        .link-style {
            font-weight: bold;
            text-decoration: none;
            color: #0056b3;
        }

        .link-style.active {
            color: #007bff;
            text-decoration: underline;
            cursor: pointer;
        }

        .acessar-comprovante-container {
            text-align: center;
            max-width: 50rem;
            width: 100%;
            height: 90%;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .back-button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #d0e7ff; /* cor de fundo parecida com a da imagem */
            color: #333; /* cor da seta */
            font-size: 20px;
            text-decoration: none;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 20px; /* Ajuste a posição conforme necessário */
            left: 20px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #4a90e2; /* cor de fundo ao passar o mouse */
            color: #000;
        }

        .ml-auto, .mx-auto {
            margin-left: 12rem !important;
        }
    </style>
@endsection
