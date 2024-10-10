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

    window.nextStep = function () {
        if (currentStep < $steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    };

    window.prevStep = function () {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    };

    $('#multiStepForm').on('submit', function (event) {
        event.preventDefault();
        alert('Formulário enviado com sucesso!');
    });

    function collectData() {
        const estrangeiro = $('input[name="turista_estrangeiro"]:checked').val();
        const cpf = $('#turista_cpf').val();
        const nome = $('#turista_nome').val();
        const email = $('#turista_email').val();
        const telefone = $('#turista_fone1').val();
        const nascimento = $('#turista_data_nascimento').val();
        const emergencia = $('#turista_fone2').val();
        const sexo = $('#turista_sexo').val();
        const tipoSanguineo = $('#turista_tipo_sangue').val();
        const cep = $('#turista_cep').val();
        const rua = $('#turista_rua').val();
        const bairro = $('#turista_bairro').val();
        const numero = $('#turista_numero').val();
        const necessidadeEspecial = $('input[name="turista_necessidade_esp"]:checked').val();
        const dependente = $('input[name="turista_dependente"]:checked').val();

        $('#resumoEstrangeiro').text(estrangeiro);
        $('#resumoCpf').text(cpf);
        $('#resumoNome').text(nome);
        $('#resumoEmail').text(email);
        $('#resumoTelefone').text(telefone);
        $('#resumoNascimento').text(nascimento);
        $('#resumoEmergencia').text(emergencia);
        $('#resumoSexo').text(sexo);
        $('#resumoTipoSanguineo').text(tipoSanguineo);
        $('#resumoCep').text(cep);
        $('#resumoRua').text(rua);
        $('#resumoNumero').text(numero);
        $('#resumoBairro').text(bairro);
        $('#resumoNecessidadeEspecial').text(necessidadeEspecial);
        $('#resumoDependente').text(dependente);
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
            default:
                titulo.innerHTML = '<span style="font-weight: 400;">Agora informe os seus</span> <strong>dados</strong>';
        }
    }

    showStep(currentStep);
});
