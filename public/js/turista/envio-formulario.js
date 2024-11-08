$(document).ready(function () {
    $('#multiStepForm').on('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        const url = $('#submitButton').data('url');
        const dependentes = JSON.parse(localStorage.getItem('dependentes')) || [];
        formData.append('dependentes', JSON.stringify(dependentes));

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

                if (response.qr_code) {
                    const qrCodeBase64 = 'data:image/png;base64,' + response.qr_code;
                    $('#qrCodeImage').attr('src', qrCodeBase64).show();
                    $('#qrCodeText').show();
                }

                if (response.pix_emv) {
                    $('#pixCode').val(response.pix_emv);
                }

                if (response.id_cobranca_bb) {
                    localStorage.setItem('id_cobranca_bb', response.id_cobranca_bb);
                    startPaymentStatusCheck(response.id_cobranca_bb);
                }

                if (validateCurrentStep()) {
                    $('#step3').hide();
                    $('#step4').show();
                    startTimer();
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

    function startPaymentStatusCheck(idCobrancaBB) {
        const interval = 15;
        checkPaymentStatus(idCobrancaBB);
        const checkInterval = setInterval(() => {
            checkPaymentStatus(idCobrancaBB, checkInterval);
        }, interval * 1000);
    }

    function checkPaymentStatus(idCobranca, checkInterval) {
        const slug = window.location.pathname.split('/')[1];

        $.get(`/${slug}/api/check-payment-status`, { id_cobranca_bb: idCobranca })
            .done(function (data) {
                if (data.paid) {
                    clearInterval(checkInterval);
                    $('#paymentStatus').text('Seu pagamento foi confirmado!').show();
                    $('#timerDisplay').hide();

                    const downloadUrl = `/${slug}/comprovante/download/${idCobranca}`;
                    $('#downloadButton').attr('href', downloadUrl).show();

                    localStorage.removeItem('id_cobranca_bb');
                }
            })
            .fail(function () {
                console.error('Erro ao verificar o status do pagamento.');
            });
    }

    function startTimer() {
        let timer = 300;
        updateTimerDisplay(timer);

        const timerInterval = setInterval(() => {
            if (timer <= 0) {
                clearInterval(timerInterval);
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
