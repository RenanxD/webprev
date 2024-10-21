$(document).ready(function () {
    $('input[name="turista_necessidade_esp_opcao"]').change(function () {
        if ($('#turista_necessidade_esp_sim').is(':checked')) {
            $('#necessidade-especial-options').show();
        } else {
            $('#necessidade-especial-options').hide();
        }
    });
});
