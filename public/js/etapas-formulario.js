$(document).ready(function () {
    const $steps = $('.form-step');
    let currentStep = 0;

    function showStep(step) {
        $steps.each(function (index) {
            $(this).toggleClass('form-step-active', index === step);
        });
        updateProgressCircles(step); // Chama a função de atualização da barra de progresso

        // Verifica se a etapa atual é a terceira (índice 2) e chama collectData
        if (step === 2) {
            collectData(); // Chama a função para preencher o resumo
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
        // Captura os valores preenchidos
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

        // Preenche os elementos HTML com os valores coletados
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

    showStep(currentStep);
});
