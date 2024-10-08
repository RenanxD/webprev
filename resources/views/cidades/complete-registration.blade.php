<!-- Include Bootstrap, FontAwesome, and your custom styles as needed -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<style>
    body {
        background-color: #f0f0f0;
    }

    .form-step {
        display: none;
    }

    .form-step-active {
        display: block;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .progress-bar {
        background-color: #5cb85c; /* Cor verde para a barra de progresso */
        font-weight: bold; /* Texto em negrito */
    }

    .progress-circle {
        width: 30px;
        height: 30px;
        border: 2px solid #5cb85c; /* Círculo verde */
        border-radius: 50%; /* Forma circular */
        display: inline-block;
        line-height: 30px; /* Centraliza o texto verticalmente */
        color: #5cb85c; /* Cor do texto do círculo */
    }

    .progress-circle.inactive {
        border-color: #ccc; /* Círculos inativos em cinza */
        color: #ccc; /* Texto em cinza */
    }

    #ruaField, #bairroField, #numeroField {
        transition: opacity 0.3s ease, transform 0.3s ease;
        transform: translateY(-10px);
        opacity: 0;
    }

    #ruaField.show, #bairroField.show, #numeroField.show {
        opacity: 1;
        transform: translateY(0);
    }

    .is-valid {
        border-color: #28a745;
    }

    .is-invalid {
        border-color: #F44336;
    }

    .required-message {
        color: #F44336;
        font-size: 0.8rem;
        display: none;
    }

    .required-message.show {
        display: block;
    }

    .btn-block {
        width: auto;
        margin-right: 0.5rem;
    }

    .progress-info {
        font-size: 0.9rem;
        color: #555;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <!-- Form Header -->
                    <h4 class="text-center mb-4">
                        <span style="font-weight: 400;">Agora informe os seus</span>
                        <strong>dados</strong>
                    </h4>

                    <!-- Progress Bar for Steps -->
                    <div class="text-center mb-4">
                        <div class="progress-info">
                            <span>Passo <span id="stepNumber">1</span> de 3</span>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <div class="progress-circle" id="circle1">1</div>
                            <div class="progress-circle" id="circle2">2</div>
                            <div class="progress-circle" id="circle3">3</div>
                        </div>
                        <div class="progress" style="height: 20px;" aria-live="polite">
                            <div class="progress-bar" role="progressbar" id="progressBar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">1</div>
                        </div>
                    </div>

                    <!-- Form Starts -->
                    <form id="multiStepForm">
                        <!-- Step 1 -->
                        <div class="form-step form-step-active">
                            <div class="form-group">
                                <label for="turista_estrangeiro">Sou <strong>Estrangeiro?</strong></label><br>
                                <input type="radio" id="estrangeiro_nao" name="turista_estrangeiro" value="nao" checked>
                                <label for="estrangeiro_nao">Não</label>
                                <input type="radio" id="estrangeiro_sim" name="turista_estrangeiro" value="sim">
                                <label for="estrangeiro_sim">Sim</label>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control is-invalid" id="turista_cpf" placeholder="CPF">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control is-invalid" id="turista_nome" placeholder="Nome Completo">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" id="turista_email" name="turista_email" placeholder="Email" value="{{ session('email') }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control is-invalid" id="turista_fone1" name="turista_fone1" placeholder="Telefone Celular">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control is-invalid" id="turista_data_nascimento" name="turista_data_nascimento" placeholder="Data de aniversário">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control is-invalid" id="turista_fone2" name="turista_fone2" placeholder="Contato de emergência">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control is-invalid" id="turista_sexo" name="turista_sexo">
                                        <option value="">Sexo</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="feminino">Feminino</option>
                                        <option value="outro">Outro</option>
                                    </select>
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control is-invalid" id="turista_tipo_sangue" name="turista_tipo_sangue">
                                        <option value="">Tipo Sanguíneo</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control is-invalid" id="turista_cep" name="turista_cep" placeholder="CEP" onblur="pesquisacep(this.value)">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                                <div class="form-group col-md-4" id="ruaField">
                                    <input type="text" class="form-control" id="turista_rua" placeholder="Rua" readonly>
                                </div>
                                <div class="form-group col-md-4" id="bairroField">
                                    <input type="text" class="form-control" id="turista_bairro" placeholder="Bairro" readonly>
                                </div>
                                <div class="form-group col-md-1" id="numeroField">
                                    <input type="text" class="form-control is-invalid" id="turista_numero" placeholder="Nº">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="turista_necessidade_esp">Possui alguma <strong>necessidade especial?</strong></label><br>
                                <input type="radio" id="turista_necessidade_esp_nao" name="turista_necessidade_esp" value="nao" checked>
                                <label for="turista_necessidade_esp_nao">Não</label>
                                <input type="radio" id="turista_necessidade_esp_sim" name="turista_necessidade_esp" value="sim">
                                <label for="turista_necessidade_esp_sim">Sim</label>
                            </div>
                            <div class="form-group">
                                <label for="turista_dependente">Possui <strong>dependentes</strong> menores de 18 anos?</label><br>
                                <input type="radio" id="turista_dependente_nao" name="turista_dependente" value="nao" checked>
                                <label for="turista_dependente_nao">Não</label>
                                <input type="radio" id="turista_dependente_sim" name="turista_dependente" value="sim">
                                <label for="turista_dependente_sim">Sim</label>
                            </div>
                            <div class="form-group is-invalid">
                                <input type="checkbox" id="aceitar_termos" required>
                                <label for="aceitar_termos">Aceito todos os <a href="#" target="_blank">termos</a></label>
                                <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-block" onclick="nextStep()">Próximo</button>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="form-step">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" id="dob" placeholder="Date of Birth">
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                            <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                        </div>

                        <!-- Step 3 -->
                        <div class="form-step">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="comments" rows="4" placeholder="Additional comments..."></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const steps = document.querySelectorAll('.form-step');
    let currentStep = 0;

    function showStep(step) {
        steps.forEach((formStep, index) => {
            formStep.classList.toggle('form-step-active', index === step);
        });
        updateProgressBar(step);
    }

    function nextStep() {
        if (currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    }

    function updateProgressBar(step) {
        const progressBar = document.getElementById('progressBar');
        const stepNumber = document.getElementById('stepNumber');
        const circles = [
            document.getElementById('circle1'),
            document.getElementById('circle2'),
            document.getElementById('circle3')
        ];
        const progressPercentage = ((step + 1) / steps.length) * 100;

        // Atualiza a barra de progresso
        progressBar.style.width = progressPercentage + '%';
        progressBar.innerText = step + 1;
        stepNumber.innerText = step + 1;

        // Atualiza os círculos
        circles.forEach((circle, index) => {
            if (index <= step) {
                circle.classList.remove('inactive');
                circle.style.color = '#5cb85c'; // cor verde
            } else {
                circle.classList.add('inactive');
                circle.style.color = '#ccc'; // cor cinza
            }
        });
    }

    function pesquisacep(valor) {
        const cep = valor.replace(/\D/g, '');
        if (cep.length === 8) {
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('turista_rua').value = data.logradouro;
                        document.getElementById('turista_bairro').value = data.bairro;
                        document.getElementById('ruaField').classList.add('show');
                        document.getElementById('bairroField').classList.add('show');
                        document.getElementById('numeroField').classList.add('show');
                    } else {
                        alert('CEP não encontrado.');
                    }
                })
                .catch(error => {
                    alert('Erro ao consultar o CEP.');
                });
        }
    }

    document.getElementById('multiStepForm').addEventListener('submit', function(event) {
        event.preventDefault();
        alert('Formulário enviado com sucesso!');
    });

    showStep(currentStep);
</script>
<script>
    // Adiciona lógica de validação para mostrar as mensagens inicialmente
    document.querySelectorAll('.form-control').forEach(field => {
        // Verifica se o campo é obrigatório
        if (field.classList.contains('is-invalid')) {
            field.addEventListener('input', function() {
                const requiredMessage = this.nextElementSibling;
                // Remove a classe de erro e a mensagem se o campo for preenchido
                if (this.value.trim() !== '') {
                    this.classList.remove('is-invalid');
                    requiredMessage.classList.remove('show');
                }
            });
        }

        field.addEventListener('blur', function() {
            const requiredMessage = this.nextElementSibling;
            // Se o campo estiver vazio ao perder o foco, mostra a mensagem de erro
            if (this.value.trim() === '') {
                this.classList.add('is-invalid');
                requiredMessage.classList.add('show');
            }
        });
    });
</script>
