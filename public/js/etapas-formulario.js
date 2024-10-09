$(document).ready(function () {
    const $steps = $('.form-step');
    let currentStep = 0;

    function showStep(step) {
        $steps.each(function (index) {
            $(this).toggleClass('form-step-active', index === step);
        });
        updateProgressCircles(step); // Chama a função de atualização da barra de progresso
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

    showStep(currentStep);
});
