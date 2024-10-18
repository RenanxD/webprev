<div class="form-step" id="step4" style="display: none; text-align: center; margin-top: 5rem;">
    <img id="qrCodeImage" src="" alt="QR Code" style="display: none;">
    <p id="qrCodeText" style="display: none; text-align: center; margin-top: 2rem">
        Aponte sua câmera para o <strong>QR Code</strong> ou copie o código
    </p>
    <div style="display: inline-block; width: 100%; max-width: 600px;">
        <textarea id="pixCode" readonly="" rows="4"
            style="display: inline; margin-top: 1rem; width: 100%;
                padding: 10px; border-radius: 5px; border: 1px solid #ccc;
                font-size: 14px; resize: none; text-align: center;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        </textarea>
        <button class="btn btn-primary btn-login centralizar-texto" id="copyPixButton"
                style="margin-top: 1rem;width: 15rem;align-items: center;">Copiar Código Pix
        </button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#copyPixButton').on('click', function () {
            var pixCode = $('#pixCode').val();
            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(pixCode).select();
            document.execCommand('copy');
            tempInput.remove();

            // Muda o texto do botão e a classe
            $(this).text('Código Copiado!').removeClass('btn-primary').addClass('btn-success');

            // Opcional: Reverter a mudança após alguns segundos
            var button = $(this);
            setTimeout(function () {
                button.text('Copiar Código Pix').removeClass('btn-success').addClass('btn-primary');
            }, 2000); // Muda de volta após 2 segundos
        });
    });
</script>
