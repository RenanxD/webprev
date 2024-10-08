<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <!-- Form Header -->
                    <h4 class="text-center mb-4">
                        <span style="font-weight: 400;">Agora informe os seus</span>
                        <strong>dados</strong>
                    </h4>

                    <!-- Progress Bar for Steps -->
                    <div class="text-center mb-4">
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar bg-success" role="progressbar" id="progressBar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">1</div>
                        </div>
                    </div>

                    <!-- Form Starts -->
                    <form id="multiStepForm">
                        <!-- Step 1 -->
                        <div class="form-step form-step-active">
                            <div class="form-group">
                                <label for="estrangeiro">Sou <strong>Estrangeiro?</strong></label><br>
                                <input type="radio" id="estrangeiroNao" name="estrangeiro" value="nao" checked>
                                <label for="estrangeiroNao">Não</label>

                                <input type="radio" id="estrangeiroSim" name="estrangeiro" value="sim">
                                <label for="estrangeiroSim">Sim</label>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="turista_cpf" placeholder="CPF">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" id="turista_nome" placeholder="Nome Completo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" id="turista_email" name="turista_email" placeholder="Email" value="{{ session('email') }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="turista_fone1" name="turista_fone1" placeholder="Telefone Celular">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" id="turista_data_nascimento" name="turista_data_nascimento" placeholder="Data de aniversário">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="turista_fone2" name="turista_fone2" placeholder="Contato de emergência">
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" id="turista_sexo" name="turista_sexo">
                                        <option value="">Sexo</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="feminino">Feminino</option>
                                        <option value="outro">Outro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" id="turista_tipo_sangue" name="turista_tipo_sangue">
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
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="turista_cep" name="turista_cep" placeholder="CEP" onblur="pesquisacep(this.value)">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="turista_rua" placeholder="Rua" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="turista_bairro" placeholder="Bairro" readonly>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-block" onclick="nextStep()">Próximo</button>
                        </div>

                        <!-- Step 2 -->
                        <div class="form-step">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" id="dataAniversario">
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary btn-block" onclick="nextStep()">Próximo</button>
                            <button type="button" class="btn btn-secondary btn-block" onclick="prevStep()">Voltar</button>
                        </div>

                        <!-- Step 3 -->
                        <div class="form-step">
                            <div class="form-group">
                                <input type="checkbox" id="termos">
                                <label for="termos">Aceito todos os termos</label>
                            </div>

                            <button type="submit" class="btn btn-success btn-block">Enviar</button>
                            <button type="button" class="btn btn-secondary btn-block" onclick="prevStep()">Voltar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let currentStep = 0;
    const formSteps = document.querySelectorAll('.form-step');
    const progressBar = document.getElementById('progressBar');

    function updateProgressBar() {
        const stepPercentage = (currentStep + 1) / formSteps.length * 100;
        progressBar.style.width = `${stepPercentage}%`;
        progressBar.innerText = `${currentStep + 1}`;
    }

    function showStep() {
        formSteps.forEach((step, index) => {
            step.classList.toggle('form-step-active', index === currentStep);
        });
        updateProgressBar();
    }

    function nextStep() {
        if (currentStep < formSteps.length - 1) {
            currentStep++;
            showStep();
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            currentStep--;
            showStep();
        }
    }

    document.getElementById('multiStepForm').addEventListener('submit', function (event) {
        event.preventDefault();
        alert('Formulário enviado!');
    });

    showStep();

    // ViaCEP API functions
    function limpa_formulário_cep() {
        document.getElementById('turista_rua').value = "";
        document.getElementById('turista_bairro').value = "";
        document.getElementById('turista_cidade').value = "";
        document.getElementById('turista_uf').value = "";
        document.getElementById('turista_ibge').value = "";
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('turista_rua').value = conteudo.logradouro;
            document.getElementById('turista_bairro').value = conteudo.bairro;
            document.getElementById('turista_cidade').value = conteudo.localidade;
            document.getElementById('turista_uf').value = conteudo.uf;
            document.getElementById('turista_ibge').value = conteudo.ibge;
        } else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                document.getElementById('turista_rua').value = "...";
                document.getElementById('turista_bairro').value = "...";
                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            } else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } else {
            limpa_formulário_cep();
        }
    }
</script>
