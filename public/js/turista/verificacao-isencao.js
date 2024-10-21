$(document).ready(function () {
    var $radiosNecessidade = $('input[name="turista_necessidade_esp_opcao"]');
    var $valorTaxaSpan = $('#valorTaxa');
    var $totalTaxas = $('#totalTaxas');
    var $totalGeral = $('#totalGeral');

    function verificarIsencao() {
        var necessidadeSelecionada = $('input[name="turista_necessidade_esp_opcao"]:checked').val();

        if (necessidadeSelecionada === 'sim') {
            $valorTaxaSpan.text('Isento');
            $totalTaxas.text('R$ 0,00');
            $totalGeral.text('R$ 0,00');
        } else {
            $valorTaxaSpan.text(`R$ ${cobrancaValor}`);
            $totalTaxas.text(`R$ ${cobrancaValor}`);
            $totalGeral.text(`R$ ${cobrancaValor}`);
        }
    }

    $radiosNecessidade.on('change', verificarIsencao);
    verificarIsencao();
});
