<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Webprev - Registro</title>
</head>
<body>
<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 id="titulo-etapa" class="text-center mb-4">
                        <span style="font-weight: 400;">Agora informe os seus</span> <strong>dados</strong>
                    </h4>

                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <div class="progress-circle active" id="circle1">1</div>
                        <div class="progress-line"></div>
                        <div class="progress-circle" id="circle2">2</div>
                        <div class="progress-line"></div>
                        <div class="progress-circle" id="circle3">3</div>
                        <div class="progress-line"></div>
                        <div class="progress-circle" id="circle4">4</div>
                    </div>

                    <!-- Form Starts -->
                    <form id="multiStepForm" method="POST">
                        @csrf

                        <!-- Step 1 -->
                        @include('turista.form.etapa1')

                        <!-- Step 2 -->
                        @include('turista.form.etapa2')

                        <!-- Step 3 -->
                        @include('turista.form.etapa3')

                        <!-- Step 4 -->
                        @include('turista.form.etapa4')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="{{ asset('js/turista/consulta-cep.js') }}"></script>
<script src="{{ asset('js/turista/barra-progresso.js') }}"></script>
<script src="{{ asset('js/turista/etapas-formulario.js') }}"></script>
<script src="{{ asset('js/turista/data-cobranca.js') }}"></script>
<script src="{{ asset('js/turista/resumo-cobranca.js') }}"></script>
<script src="{{ asset('js/turista/mascara-campos.js') }}"></script>
<script>
    $(document).ready(function () {
        $('input[name="turista_necessidade_esp_opcao"]').change(function () {
            if ($('#turista_necessidade_esp_sim').is(':checked')) {
                $('#necessidade-especial-options').show();
            } else {
                $('#necessidade-especial-options').hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        var $radiosNecessidade = $('input[name="turista_necessidade_esp_opcao"]');
        var cobrancaValor = "{{ $cobrancaAtual->cobranca_valor ?? '' }}";
        var $valorTaxaSpan = $('#valorTaxa');
        var $valorTaxaTabela = $('#valorTaxaTabela');
        var $totalTaxas = $('#totalTaxas');
        var $totalGeral = $('#totalGeral');

        function verificarIsencao() {
            var necessidadeSelecionada = $('input[name="turista_necessidade_esp_opcao"]:checked').val();

            if (necessidadeSelecionada === 'sim') {
                $valorTaxaSpan.text('Isento');
                $valorTaxaTabela.text('Isento');
                $totalTaxas.text('R$ 0,00');
                $totalGeral.text('R$ 0,00');
            } else {
                $valorTaxaSpan.text(`R$ ${cobrancaValor}`);
                $valorTaxaTabela.text(`R$ ${cobrancaValor}`);
                $totalTaxas.text(`R$ ${cobrancaValor}`);
                $totalGeral.text(`R$ ${cobrancaValor}`);
            }
        }

        $radiosNecessidade.on('change', verificarIsencao);

        verificarIsencao();
    });
</script>
<script>
    $(document).ready(function () {
        var today = new Date();
        var maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
        var maxDateString = maxDate.toISOString().split('T')[0];

        $('#turista_data_nascimento').attr('max', maxDateString);

        $('#turista_data_nascimento').on('change', function () {
            var selectedDate = new Date($(this).val());

            if (selectedDate > maxDate) {
                $('#date-error').show();
                $(this).val('');
            } else {
                $('#date-error').hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#multiStepForm').on('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this); // Initialize the formData object with the form data

            $.ajax({
                url: '{{ route("form.submit") }}', // Corrected the selector
                method: 'POST',
                data: formData,
                contentType: false,  // Needed for FormData to send files
                processData: false,  // Prevents jQuery from converting the form data
                success: function (response) {
                    console.log('Resposta do servidor:', response);
                    $('#step4').html('<img src="' + response.qr_code + '" alt="QR Code">');
                    $('#step3').hide();
                    $('#step4').show();
                },
                error: function (xhr, status, error) {
                    console.error('Erro ao enviar o formulário:', error);
                    alert('Ocorreu um erro: ' + error);
                }
            });
        });
    });
</script>
