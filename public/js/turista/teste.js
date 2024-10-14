$(document).ready(function () {
    // Seleciona os radios de necessidade especial
    var $radiosNecessidade = $('input[name="turista_necessidade_esp_opcao"]');
    var cobrancaValor = "{{ $cobrancaAtual->cobranca_valor ?? '' }}";
    var $valorTaxaSpan = $('td:contains("R$ {{ $cobrancaAtual->cobranca_valor ?? "" }}") span');
    var $totalTaxas = $('div:contains("Total de Taxas:") strong').next();
    var $totalGeral = $('div:contains("Total Geral:") strong').next();

    // Função para verificar a necessidade especial e alterar os valores
    function verificarIsencao() {
        var necessidadeSelecionada = $('input[name="turista_necessidade_esp_opcao"]:checked').val();

        if (necessidadeSelecionada === 'sim') {
            $valorTaxaSpan.text('R$ 0,00');
            $totalTaxas.text('R$ 0,00');
            $totalGeral.text('R$ 0,00');
        } else {
            $valorTaxaSpan.text(`R$ ${cobrancaValor}`);
            $totalTaxas.text(`R$ ${cobrancaValor}`);
            $totalGeral.text(`R$ ${cobrancaValor}`);
        }
    }

    // Adiciona o evento change aos radios
    $radiosNecessidade.on('change', verificarIsencao);

    // Chama a função no início para garantir que o valor correto esteja exibido
    verificarIsencao();
});
