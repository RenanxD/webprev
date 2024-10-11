$(document).ready(function () {
    // Validação dos campos obrigatórios para cada etapa
    function validateStep(stepNumber) {
        let isValid = true;

        // Validar todos os campos obrigatórios da etapa atual
        $('.form-step-active .form-control').each(function () {
            const $field = $(this);
            const $requiredMessage = $field.next();

            if ($field.val().trim() === '') {
                $field.addClass('is-invalid');
                $requiredMessage.addClass('show');
                isValid = false;
            } else {
                $field.removeClass('is-invalid');
                $requiredMessage.removeClass('show');
            }
        });

        // Verifica se o checkbox de termos da etapa atual foi aceito
        if (stepNumber === 1) {
            const $termos = $('#aceitar_termos');
            const $termosRequiredMessage = $('#termosRequiredMessage');
            if (!$termos.is(':checked')) {
                $termosRequiredMessage.addClass('show');
                isValid = false;
            } else {
                $termosRequiredMessage.removeClass('show');
            }
        } else if (stepNumber === 2) {
            const $termos = $('#termos');
            const $termosRequiredMessage = $('#termosRequiredMessage');
            if (!$termos.is(':checked')) {
                $termosRequiredMessage.addClass('show');
                isValid = false;
            } else {
                $termosRequiredMessage.removeClass('show');
            }
        }

        return isValid;
    }

    // Ação do botão "Próximo"
    $('#nextStepButton').on('click', function (e) {
        e.preventDefault();

        // Determina qual etapa está ativa
        const stepNumber = $('.form-step-active').index() + 1;

        if (validateStep(stepNumber)) {
            // Prosseguir para a próxima etapa se os campos estiverem válidos
            nextStep();
        }
    });

    // Validação ao digitar para remover a classe de erro
    $('.form-control').on('input', function () {
        const $field = $(this);
        const $requiredMessage = $field.next();

        if ($field.val().trim() !== '') {
            $field.removeClass('is-invalid');
            $requiredMessage.removeClass('show');
        }
    });

    // Verificação do checkbox de termos ao mudar (Etapa 1 e 2)
    $('#aceitar_termos, #termos').change(function () {
        const $requiredMessage = $(this).siblings('.required-message');
        if ($(this).is(':checked')) {
            $requiredMessage.removeClass('show');
        } else {
            $requiredMessage.addClass('show');
        }
    });
});
