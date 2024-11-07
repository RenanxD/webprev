<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            font-size: 15px;
            border-bottom: 1px dashed #000;
            padding-bottom: 5px;
            width: 100%; /* Garante que a div ocupe toda a largura disponível */
        }

        .footer {
            text-align: center;
            font-size: 10px;
            margin-bottom: 10px;
        }

        .section-title {
            background-color: #eee;
            padding: 5px;
            font-weight: bold;
            margin-top: 10px;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }

        .content {
            margin: 40px 0; /* Aumentar o espaçamento acima e abaixo */
        }

        .qrcode {
            text-align: center;
            margin: 5rem 0;
        }

        .qrcode img {
            width: 300px;
            height: 300px;
        }

        .details, .taxes {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .details th, .taxes th {
            background-color: #eee;
            font-weight: bold;
            padding: 5px;
        }

        .details td, .taxes td {
            padding: 5px;
            border: 1px solid #ccc;
        }

        .text-right {
            text-align: right;
        }

        .total {
            font-weight: bold;
            background-color: #eee;
        }

        .spacer {
            margin-top: 6rem; /* Adiciona um espaçamento maior antes das próximas seções */
        }
    </style>
    <title>Comprovante de Pagamento</title>
</head>
<body>
<div class="header">
    <table style="width: 100%;">
        <tr>
            <td style="text-align: left;">N° 1/2024</td>
            <td style="text-align: right;">Região: {{ $regiao }}</td>
        </tr>
    </table>
</div>

<div class="qrcode">
    <img src="{{ $qr_code }}" alt="QR Code">
</div>

<div class="spacer"></div>

<div class="content">
    <p>Permanência: <strong>{{ $permanencia }} dias</strong></p>
    <p>Período: {{ $data_inicio }} à {{ $data_fim }}</p>
</div>

<div class="section-title">Turistas</div>
<table class="details">
    <tr>
        <td>1. Renan de Paula da Silva</td>
        <td class="text-right">Total: 1</td>
    </tr>
</table>

<div class="section-title">Valores e Taxas</div>
<table class="taxes">
    <tr>
        <td>Taxa de conservação ambiental</td>
        <td class="text-right">R$ {{ $valor }}</td>
    </tr>
    <tr class="total">
        <td>Total Pago</td>
        <td class="text-right">R$ {{ $valor }}</td>
    </tr>
</table>

<div class="footer" style="font-size: 12px; margin-top: 3rem; border-top: 1px dashed #000">
    <p>Data de emissão</p>
    <p>{{ $data_emissao }}</p>
</div>
</body>
</html>
