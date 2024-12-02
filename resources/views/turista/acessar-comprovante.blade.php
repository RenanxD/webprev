@extends('layouts.signin')
@section('title', 'WebPrev - Comprovantes')
@section('content')
    <div class="acessar-comprovante-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <x-botao-voltar></x-botao-voltar>
            <h3 class="comprovante-titulo">Comprovantes</h3>
        </div>
        <div class="justify-content-center d-flex mt-4">
            <div class="mb-3">
                <a href="javascript:void(0);" id="link-ativos" class="link-style active"
                   onclick="showAtivos()">Ativo</a>
                <a href="javascript:void(0);" id="link-utilizados" class="link-style ml-3"
                   onclick="showUtilizados()">Utilizado</a>
            </div>
        </div>
        <div class="justify-content-center d-flex flex-column align-items-center" style="margin-top: 1rem;">
            <div class="comprovantes-cards" id="comprovantes-ativos" style="display: none;">
                <div class="text-center">
                    @if (!$comprovantes || $comprovantes->isEmpty())
                        <div style="margin-top: 8.45rem">
                            <x-logos.logo-nada-consta />
                            <p style="font-weight: bold; color: #ABABAB; font-size: 20px;">Nada consta</p>
                        </div>
                    @endif
                    @foreach($comprovantes as $comprovante)
                        <a href="/{{ $cidade->slug }}/comprovante/download/{{ $comprovante->id_comprovante }}"
                           target="_blank"
                           class="card mb-4 card-acessar-comprovante text-decoration-none"
                           style="color: inherit;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="text-left">
                                        <p class="card-text">
                                            Nº <strong>{{ $comprovante->id_comprovante }}</strong>
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="card-text">
                                            <strong>Data da emissão:</strong> {{ $comprovante->comprovante_data_emissao }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="text-left">
                                        <p class="card-text">
                                            Região: <strong>{{ $cidade->cidade_descricao }}</strong>
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="card-text">
                                            <strong>1 dia(s)</strong> de permanência:<br>
                                            <strong>{{ $comprovante->comprovante_data_inicio }} à {{ $comprovante->comprovante_data_fim }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div id="comprovantes-utilizados" style="display: none; margin-top: 10rem;">
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

        showAtivos();
    </script>
    <style>
        .link-style {
            font-weight: bold;
            text-decoration: none;
            color: #0056b3;
            font-size: 20px;
        }

        .link-style.active {
            color: #007bff;
            text-decoration: underline;
            cursor: pointer;
            font-size: 20px;
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

        .card-acessar-comprovante {
            border-radius: 0.75rem;
            height: 8rem;
            width: 40rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-right: 7px solid #4a90e2;
            padding: 0.75rem;
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 1rem;
            margin: 0;
        }

        .card-body div {
            display: flex;
        }

        .card-text {
            font-size: 0.8rem;
            color: #6c757d;
            margin: 0;
        }

        .card-text strong {
            color: #000;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .comprovante-titulo {
            width: 63%;
            display: flex;
            text-align: center;
        }

        .comprovantes-cards {
            margin-top: 25px;
        }
    </style>
@endsection
