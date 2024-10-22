$(document).ready(function () {
    $('#multiStepForm').on('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        const url = $('#submitButton').data('url');

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log('Resposta do servidor:', response);

                if (response.qr_code) {
                    const qrCodeBase64 = 'data:image/png;base64,' + response.qr_code;

                    $('#qrCodeImage').attr('src', qrCodeBase64).show();
                    $('#qrCodeText').show();
                }

                if (response.pix_emv) {
                    $('#pixCode').val(response.pix_emv);
                }

                nextStep();
                $('#step3').hide();
                $('#step4').show();
            }
        });
    });
});
