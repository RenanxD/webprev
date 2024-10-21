$(document).ready(function () {
    $('#copyPixButton').on('click', function () {
        var pixCode = $('#pixCode').val();
        var tempInput = $('<input>');
        $('body').append(tempInput);
        tempInput.val(pixCode).select();
        document.execCommand('copy');
        tempInput.remove();

        $(this).text('Código Copiado!').removeClass('btn-primary').addClass('btn-success');

        var button = $(this);
        setTimeout(function () {
            button.text('Copiar Código Pix').removeClass('btn-success').addClass('btn-primary');
        }, 4000);
    });
});
