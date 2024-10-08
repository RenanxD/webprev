$(document).ready(function () {
    // Código existente
    $('.form-control').each(function () {
        const $field = $(this);
        const $requiredMessage = $field.next();

        if ($field.hasClass('is-invalid')) {
            $field.on('input', function () {
                if ($field.val().trim() !== '') {
                    $field.removeClass('is-invalid');
                    $requiredMessage.removeClass('show');
                }
            });
        }

        $field.on('blur', function () {
            if ($field.val().trim() === '') {
                $field.addClass('is-invalid');
                $requiredMessage.addClass('show');
            }
        });
    });

    // Novo código para o checkbox
    $('#aceitar_termos').change(function () {
        const $requiredMessage = $('#termosRequiredMessage');
        if ($(this).is(':checked')) {
            $requiredMessage.removeClass('show'); // Esconde a mensagem
        } else {
            $requiredMessage.addClass('show'); // Mostra a mensagem se desmarcado
        }
    });
});
