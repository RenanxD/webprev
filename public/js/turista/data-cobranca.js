function setMinFinalDate() {
    var minDays = document.getElementById('data_inicial').dataset.minDays;
    var dataInicial = document.getElementById('data_inicial').value;

    if (dataInicial) {
        var initialDate = new Date(dataInicial);
        initialDate.setDate(initialDate.getDate() + parseInt(minDays));

        var day = ("0" + initialDate.getDate()).slice(-2);
        var month = ("0" + (initialDate.getMonth() + 1)).slice(-2);
        var year = initialDate.getFullYear();
        var minFinalDate = year + "-" + month + "-" + day;

        document.getElementById('data_final').setAttribute('min', minFinalDate);
    }
}

window.onload = function() {
    var today = new Date();
    var day = ("0" + today.getDate()).slice(-2);
    var month = ("0" + (today.getMonth() + 1)).slice(-2);
    var year = today.getFullYear();
    var currentDate = year + "-" + month + "-" + day;

    document.getElementById('data_inicial').setAttribute('min', currentDate);
    document.getElementById('data_final').setAttribute('min', currentDate);
}

function calcularDias() {
    const dataInicial = document.getElementById('data_inicial').value;
    const dataFinal = document.getElementById('data_final').value;

    if (dataInicial && dataFinal) {
        const date1 = new Date(dataInicial);
        const date2 = new Date(dataFinal);
        const diffTime = Math.abs(date2 - date1);
        let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        diffDays += 1;

        document.getElementById('dias_selecionados').innerText = diffDays;
        document.getElementById('diasInfo').style.display = 'block';
    } else {
        document.getElementById('diasInfo').style.display = 'none';
    }
}

function handleDateChange() {
    setMinFinalDate();
    calcularDias();
}
