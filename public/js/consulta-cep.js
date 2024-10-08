function pesquisacep(valor) {
    const cep = valor.replace(/\D/g, '');
    if (cep.length === 8) {
        $.getJSON(`https://viacep.com.br/ws/${cep}/json/`)
            .done(function (data) {
                if (!data.erro) {
                    $('#turista_rua').val(data.logradouro);
                    $('#turista_bairro').val(data.bairro);
                    $('#ruaField, #bairroField, #numeroField').addClass('show');
                } else {
                    alert('CEP não encontrado.');
                }
            })
            .fail(function () {
                alert('Erro ao consultar o CEP.');
            });
    }
}
