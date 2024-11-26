$(document).ready(function () {
    const $steps = $('.form-step');
    let currentStep = 0;

    function showStep(step) {
        $steps.each(function (index) {
            $(this).toggleClass('form-step-active', index === step);
        });
        updateProgressCircles(step);
        alterarTitulo(step);

        if (step === 2) {
            collectData();
        }
    }

     window.validateCurrentStep = function () {
        let valid = true;
        const $currentFormStep = $steps.eq(currentStep);

        $currentFormStep.find('.invalid-feedback').remove();

        $currentFormStep.find('input, select').each(function () {
            if ($(this).prop('required') && !$(this).val()) {
                valid = false;
                $(this).addClass('is-invalid');
                $(this).after('<small class="invalid-feedback" style="color: red;">Campo obrigatório.</small>');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        function validateCheckbox(checkboxId, labelId, errorMessage) {
            const checkbox = $(checkboxId);
            const label = $(`label[for="${labelId}"]`);

            if (!checkbox.is(':checked')) {
                valid = false;
                checkbox.addClass('is-invalid');

                if (label.next('.invalid-feedback').length === 0) {
                    label.after(`<small class="invalid-feedback show" style="color: red;">${errorMessage}</small>`);
                } else {
                    label.next('.invalid-feedback').addClass('show');
                }
            } else {
                checkbox.removeClass('is-invalid');
                label.next('.invalid-feedback').remove();
            }
        }

        validateCheckbox('#aceitar_termos', 'aceitar_termos', 'Você deve aceitar os termos.');

        if (currentStep === 1) {
            validateCheckbox('#termos', 'termos', 'Você deve aceitar os termos.');
        }

        return valid;
    };

    $('#aceitar_termos').on('change', function () {
        const checkboxTermos = $(this);
        const labelTermos = $('label[for="aceitar_termos"]');

        if (!checkboxTermos.is(':checked')) {
            checkboxTermos.addClass('is-invalid');

            if (labelTermos.next('.invalid-feedback').length === 0) {
                labelTermos.after('<small class="invalid-feedback show" style="color: red;">Você deve aceitar os termos.</small>');
            } else {
                labelTermos.next('.invalid-feedback').addClass('show');
            }
        } else {
            checkboxTermos.removeClass('is-invalid');
            labelTermos.next('.invalid-feedback').remove();
        }
    });

    $('#termos').on('change', function () {
        const checkboxTermos = $(this);
        const labelTermos = $('label[for="termos"]');

        if (!checkboxTermos.is(':checked')) {
            checkboxTermos.addClass('is-invalid');

            if (labelTermos.next('.invalid-feedback').length === 0) {
            } else {
                labelTermos.next('.invalid-feedback').addClass('show');
            }
        } else {
            checkboxTermos.removeClass('is-invalid');
            labelTermos.next('.invalid-feedback').remove();
        }
    });

    window.nextStep = function () {
        if (validateCurrentStep()) {
            if (currentStep < $steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        }
    };

    window.prevStep = function () {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    };

    function collectData() {
        const dataInicial = $('#data_inicial').val();
        const dataFinal = $('#data_final').val();
        const estrangeiro = $('input[name="turista_estrangeiro"]:checked').val();
        const cpf = $('#turista_cpf').val();
        const nome = $('#turista_nome').val();
        const email = $('#turista_email').val();
        const telefone = $('#turista_fone1').val();
        const nascimento = $('#turista_data_nascimento').val();
        const emergencia = $('#turista_fone2').val();
        const sexo = $('#turista_sexo').val();
        const tipoSanguineo = $('#turista_tipo_sangue').val();
        const cep = $('#turista_endereco_cep').val();
        const rua = $('#turista_endereco').val();
        const bairro = $('#turista_endereco_bairro').val();
        const numero = $('#turista_endereco_numero').val();
        const necessidadeEspecial = $('input[name="turista_necessidade_esp_opcao"]:checked').val();

        $('.resumoDataInicial').text(dataInicial);
        $('.resumoDataFinal').text(dataFinal);
        if (estrangeiro === 'sim') {
            $('#resumoEstrangeiroSim').prop('checked', true);
        } else {
            $('#resumoEstrangeiroNao').prop('checked', true);
        }
        $('.resumoCpf').text(cpf);
        $('.resumoNome').text(nome);
        $('.resumoEmail').text(email);
        $('.resumoTelefone').text(telefone);
        $('.resumoNascimento').text(nascimento);
        $('.resumoEmergencia').text(emergencia);
        $('.resumoSexo').text(sexo);
        $('.resumoTipoSanguineo').text(tipoSanguineo);
        $('.resumoCep').text(cep);
        $('.resumoRua').text(rua);
        $('.resumoBairro').text(bairro);
        $('.resumoNumero').text(numero);
        if (necessidadeEspecial === 'sim') {
            $('#resumoNecessidadeEspecialSim').prop('checked', true);

            // Verifica se o usuário escolheu uma necessidade especial no select
            const selectedNecessidade = $('#turista_necessidade_esp').val();
            if (selectedNecessidade) {
                $('.resumoTuristaNecessidadeEsp').text(selectedNecessidade);
            } else {
                $('.resumoTuristaNecessidadeEsp').text('Necessidade especial não selecionada');
            }

        } else {
            $('#resumoNecessidadeEspecialNao').prop('checked', true);
            $('.resumoTuristaNecessidadeEsp').text('Não');
        }
    }

    function alterarTitulo(step) {
        var titulo = document.getElementById('titulo-etapa');

        switch (step) {
            case 0:
                titulo.innerHTML = '<span style="font-weight: 400;">Agora informe os seus</span> <strong>dados</strong>';
                break;
            case 1:
                titulo.innerHTML = '<span style="font-weight: 400;"><strong>Prazo de permanência</strong></span>';
                break;
            case 2:
                titulo.innerHTML = '<span style="font-weight: 400;"><strong>Resumo</strong> das informações</span>';
                break;
            case 3:
                titulo.innerHTML = '<span style="font-weight: 400;"><strong>Realize o</strong> pagamento</span>';
                break;
            default:
                titulo.innerHTML = '<span style="font-weight: 400;">Agora informe os seus</span> <strong>dados</strong>';
        }
    }

    $steps.on('input change', 'input, select', function () {
        $(this).removeClass('is-invalid');
        $(this).next('.invalid-feedback').remove();
    });

    showStep(currentStep);
});
