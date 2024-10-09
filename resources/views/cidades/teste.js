function collectData() {
    // Captura os valores preenchidos
    const estrangeiro = document.querySelector('input[name="turista_estrangeiro"]:checked').value;
    const cpf = document.getElementById('turista_cpf').value;
    const nome = document.getElementById('turista_nome').value;
    const email = document.getElementById('turista_email').value;
    const telefone = document.getElementById('turista_fone1').value;
    const nascimento = document.getElementById('turista_data_nascimento').value;
    const emergencia = document.getElementById('turista_fone2').value;
    const sexo = document.getElementById('turista_sexo').value;
    const tipoSanguineo = document.getElementById('turista_tipo_sangue').value;
    const cep = document.getElementById('turista_cep').value;
    const rua = document.getElementById('turista_rua').value;
    const bairro = document.getElementById('turista_bairro').value;
    const numero = document.getElementById('turista_numero').value;
    const necessidadeEspecial = document.querySelector('input[name="turista_necessidade_esp"]:checked').value;
    const dependente = document.querySelector('input[name="turista_dependente"]:checked').value;

    // Preenche o resumo
    document.getElementById('resumoPreenchido').innerHTML = `
        <p><strong>Estrangeiro:</strong> ${estrangeiro}</p>
        <p><strong>CPF:</strong> ${cpf}</p>
        <p><strong>Nome Completo:</strong> ${nome}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Telefone:</strong> ${telefone}</p>
        <p><strong>Data de Nascimento:</strong> ${nascimento}</p>
        <p><strong>Contato de Emergência:</strong> ${emergencia}</p>
        <p><strong>Sexo:</strong> ${sexo}</p>
        <p><strong>Tipo Sanguíneo:</strong> ${tipoSanguineo}</p>
        <p><strong>CEP:</strong> ${cep}</p>
        <p><strong>Rua:</strong> ${rua}, <strong>Número:</strong> ${numero}</p>
        <p><strong>Bairro:</strong> ${bairro}</p>
        <p><strong>Necessidade Especial:</strong> ${necessidadeEspecial}</p>
        <p><strong>Dependente menor de 18 anos:</strong> ${dependente}</p>
    `;
}

function nextStep() {
    // Lógica para avançar para o próximo passo
    const currentStep = document.querySelector('.form-step-active');
    currentStep.classList.remove('form-step-active');

    const nextStep = currentStep.nextElementSibling;
    nextStep.classList.add('form-step-active');

    // Se for a última etapa (resumo), capturar os dados
    if (nextStep.id === 'step3') {
        collectData();  // Coleta e exibe os dados no resumo
    }
}

function prevStep() {
    // Lógica para voltar ao passo anterior
    const currentStep = document.querySelector('.form-step-active');
    currentStep.classList.remove('form-step-active');

    const prevStep = currentStep.previousElementSibling;
    prevStep.classList.add('form-step-active');
}
