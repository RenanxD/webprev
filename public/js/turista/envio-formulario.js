$(document).ready(function () {
    $('#multiStepForm').on('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        const url = $('#submitButton').data('url');

        // Mostrar o loading
        $('#loading').show();

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Ocultar o loading
                $('#loading').hide();

                if (response.qr_code) {
                    const qrCodeBase64 = 'data:image/png;base64,' + response.qr_code;

                    $('#qrCodeImage').attr('src', qrCodeBase64).show();
                    $('#qrCodeText').show();
                }

                if (response.pix_emv) {
                    $('#pixCode').val(response.pix_emv);
                }

                if (validateCurrentStep()) {
                    // Quando a requisição for concluída e os dados validados
                    $('#step3').hide(); // Ocultar etapa 3
                    $('#step4').show(); // Mostrar etapa 4
                }
            },
            error: function (xhr, status, error) {
                // Ocultar o loading em caso de erro
                $('#loading').hide();
                // Exiba uma mensagem de erro ou trate o erro conforme necessário
                console.error(error);
            }
        });
    });
});
