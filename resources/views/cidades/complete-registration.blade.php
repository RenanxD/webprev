<!-- Include Bootstrap, FontAwesome, and your custom styles as needed -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

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

                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <div class="progress-circle active" id="circle1">1</div>
                        <div class="progress-line"></div>
                        <div class="progress-circle" id="circle2">2</div>
                        <div class="progress-line"></div>
                        <div class="progress-circle" id="circle3">3</div>
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
                                    <input type="text" class="form-control is-invalid" id="turista_cpf"
                                           placeholder="CPF">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control is-invalid" id="turista_nome"
                                           placeholder="Nome Completo">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" id="turista_email" name="turista_email"
                                           placeholder="Email" value="{{ session('email') }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control is-invalid" id="turista_fone1"
                                           name="turista_fone1" placeholder="Telefone Celular">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control is-invalid" id="turista_data_nascimento"
                                           name="turista_data_nascimento" placeholder="Data de aniversário">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control is-invalid" id="turista_fone2"
                                           name="turista_fone2" placeholder="Contato de emergência">
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
                                    <select class="form-control is-invalid" id="turista_tipo_sangue"
                                            name="turista_tipo_sangue">
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
                                    <input type="text" class="form-control is-invalid" id="turista_cep"
                                           name="turista_cep" placeholder="CEP" onblur="pesquisacep(this.value)">
                                    <small class="required-message show"><strong>* Campo obrigatório</strong></small>
                                </div>
                                <div class="form-group col-md-4" id="ruaField">
                                    <input type="text" class="form-control" id="turista_rua" placeholder="Rua" readonly>
                                </div>
                                <div class="form-group col-md-4" id="bairroField">
                                    <input type="text" class="form-control" id="turista_bairro" placeholder="Bairro"
                                           readonly>
                                </div>
                                <div class="form-group col-md-1" id="numeroField">
                                    <input type="text" class="form-control is-invalid" id="turista_numero"
                                           placeholder="Nº">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="turista_necessidade_esp">Possui alguma <strong>necessidade
                                        especial?</strong></label><br>
                                <input type="radio" id="turista_necessidade_esp_nao" name="turista_necessidade_esp"
                                       value="nao" checked>
                                <label for="turista_necessidade_esp_nao">Não</label>
                                <input type="radio" id="turista_necessidade_esp_sim" name="turista_necessidade_esp"
                                       value="sim">
                                <label for="turista_necessidade_esp_sim">Sim</label>
                            </div>
                            <div class="form-group">
                                <label for="turista_dependente">Possui <strong>dependentes</strong> menores de 18 anos?</label><br>
                                <input type="radio" id="turista_dependente_nao" name="turista_dependente" value="nao"
                                       checked>
                                <label for="turista_dependente_nao">Não</label>
                                <input type="radio" id="turista_dependente_sim" name="turista_dependente" value="sim">
                                <label for="turista_dependente_sim">Sim</label>
                            </div>
                            <div class="form-group is-invalid">
                                <input type="checkbox" id="aceitar_termos" required>
                                <label for="aceitar_termos">Aceito todos os <a href="#"
                                                                               target="_blank">termos</a></label>
                                <small class="required-message show" id="termosRequiredMessage"><strong>* Campo
                                        obrigatório</strong></small>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary flex-fill mr-2">Cancelar</button>
                                <button type="button" class="btn btn-primary flex-fill" onclick="nextStep()">Próximo
                                </button>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="form-step text-center">
                            <h4 class="mb-4" style="text-align: left; display: inline-block;">
                                <span style="font-weight: 400;">Informe o<br>
                                    <strong>prazo de permanência</strong>
                                    <small class="required-message taxa-message show mt-3" id="termosRequiredMessage">
                                        Taxa mínima de R${{ $cobrancaAtual->cobranca_valor }}. Válida por {{ $cobrancaAtual->cobranca_perm_minima }} dias.
                                    </small>
                                </span>
                            </h4>

                            <div class="form-row justify-content-center text-start">
                                <div class="form-group col-md-4 position-relative">
                                    <input type="text" class="form-control-date" id="data_inicial" placeholder="Data Inicial"
                                           onfocus="(this.type='date')" onblur="if(this.value===''){this.type='text'}" onchange="handleDateChange()">
                                </div>
                            </div>

                            <div class="form-row justify-content-center text-start">
                                <div class="form-group col-md-4 position-relative">
                                    <input type="text" class="form-control-date" id="data_final" placeholder="Data Final"
                                           onfocus="(this.type='date')" onblur="if(this.value===''){this.type='text'}" onchange="calcularDias()">
                                </div>
                            </div>

                            <p class="mt-3"><strong>Alto Paraíso De Goiás</strong><br>possui taxa de conservação ambiental</p>

                            <div class="mt-3 mb-4" id="diasInfo" style="display: none; font-size: 19px;">
                                <span id="dias_selecionados" style="color: #4a90e2; font-weight: bold;"></span>
                                <span style="color: #4a90e2; font-weight: bold;">dias</span> de permanência <br>
                                Valor da taxa: <span style="color: #4a90e2; font-weight: bold;">R$ {{ $cobrancaAtual->cobranca_valor }}</span>
                            </div>

                            <div class="form-check text-center">
                                <input class="form-check-input" type="checkbox" id="termos">
                                <label class="form-check-label" for="termos">
                                    Aceito todos os <a href="#" class="text-decoration-underline">termos de taxa</a>
                                </label>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary flex-fill mr-2" onclick="prevStep()">Voltar</button>
                                <button type="button" class="btn btn-primary flex-fill" onclick="nextStep()">Próximo</button>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="form-step" id="step3">
                            <h4>Resumo do que foi preenchido</h4>
                            <div id="resumoPreenchido"></div>
                            <p><strong>CPF:</strong> <span id="cpfDisplay"></span></p>
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary flex-fill mr-2" onclick="prevStep()">Voltar</button>
                                <button type="submit" class="btn btn-success flex-fill">Finalizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/consulta-cep.js') }}"></script>
<script src="{{ asset('js/campos-obrigatorios.js') }}"></script>
<script src="{{ asset('js/barra-progresso.js') }}"></script>
<script src="{{ asset('js/etapas-formulario.js') }}"></script>
<script>
    function setMinFinalDate() {
        var minDays = {{ $cobrancaAtual->cobranca_perm_minima }};
        var dataInicial = document.getElementById('data_inicial').value;

        if (dataInicial) {
            var initialDate = new Date(dataInicial);
            initialDate.setDate(initialDate.getDate() + minDays);

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

            // Adicionar 1 para incluir o último dia no cálculo
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
</script>
