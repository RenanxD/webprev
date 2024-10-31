$(document).ready(function () {
    $('#multiStepForm').on('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        const url = $('#submitButton').data('url');

        $('#loading').show();
        updateProgressCircles(4);

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                $('#loading').hide();

                // Verifica se o QR code foi gerado
                if (response.qr_code) {
                    const qrCodeBase64 = 'data:image/png;base64,' + response.qr_code;
                    $('#qrCodeImage').attr('src', qrCodeBase64).show();
                    $('#qrCodeText').show();
                }

                // Verifica se o código PIX foi gerado
                if (response.pix_emv) {
                    $('#pixCode').val(response.pix_emv);
                }

                // Armazena o ID da cobrança se estiver presente na resposta
                if (response.id_cobranca) {
                    localStorage.setItem('id_cobranca', response.id_cobranca);
                    startPaymentStatusCheck(response.id_cobranca); // Inicia a verificação de pagamento
                }

                // Valida o passo atual e exibe o próximo
                if (validateCurrentStep()) {
                    $('#step3').hide();
                    $('#step4').show();
                    startTimer(); // Inicia o timer ao entrar na etapa 4
                }
            },
            error: function (xhr, status, error) {
                $('#loading').hide();
                let errorMessage = 'Ocorreu um erro. Tente novamente mais tarde.';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMessage = xhr.responseJSON.error;
                }
                if (xhr.responseJSON && xhr.responseJSON.exception) {
                    errorMessage += ' Detalhes: ' + xhr.responseJSON.exception;
                }

                $('#errorMessage').text(errorMessage).show();
                console.error(errorMessage);
            }
        });
    });

    // Função para iniciar a verificação de pagamento
    function startPaymentStatusCheck(idCobranca) {
        const interval = 15; // Intervalo de 15 segundos
        checkPaymentStatus(idCobranca); // Verifica o status imediatamente
        const checkInterval = setInterval(() => {
            checkPaymentStatus(idCobranca, checkInterval); // Chama a função para verificar o status
        }, interval * 1000);
    }

    // Função para verificar o status de pagamento
    function checkPaymentStatus(idCobranca, checkInterval) {
        const slug = window.location.pathname.split('/')[1]; // Ajusta conforme sua estrutura de URL

        $.get(`/${slug}/api/check-payment-status`, { id_cobranca: idCobranca })
            .done(function (data) {
                console.log(data);
                if (data.paid) {
                    clearInterval(checkInterval); // Para a verificação se o pagamento foi confirmado
                    $('#paymentStatus').text('Seu pagamento foi confirmado!').show();
                    $('#timerDisplay').hide();
                    localStorage.removeItem('id_cobranca'); // Remove o ID do Local Storage
                }
            })
            .fail(function () {
                console.error('Erro ao verificar o status do pagamento.');
            });
    }

    // Função para iniciar o timer
    function startTimer() {
        let timer = 300; // 5 minutos em segundos
        updateTimerDisplay(timer);

        const timerInterval = setInterval(() => {
            if (timer <= 0) {
                clearInterval(timerInterval);
                alert('O tempo para pagamento expirou.');
                return;
            }
            timer--;
            updateTimerDisplay(timer);
        }, 1000);
    }

    function updateTimerDisplay(timer) {
        const minutes = Math.floor(timer / 60);
        const seconds = timer % 60;
        $('#timerDisplay').text(`Seu QR Code vai expirar em ${minutes}:${seconds.toString().padStart(2, '0')} minutos`);
    }
});
