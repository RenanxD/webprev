<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <!-- Form Header -->
                    <h4 id="titulo-etapa" class="text-center mb-4">
                        <span style="font-weight: 400;">Agora informe os seus</span> <strong>dados</strong>
                    </h4>

                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <div class="progress-circle active" id="circle1">1</div>
                        <div class="progress-line"></div>
                        <div class="progress-circle" id="circle2">2</div>
                        <div class="progress-line"></div>
                        <div class="progress-circle" id="circle3">3</div>
                    </div>

                    <!-- Form Starts -->
                    <form action="{{ route('form.submit')}}" method="POST">
                        @csrf
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
                                    <input type="text" class="form-control" id="turista_cpf" name="turista_cpf"
                                           placeholder="CPF" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" id="turista_nome" name="turista_nome"
                                           placeholder="Nome Completo" required>
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
                                    <input type="text" class="form-control" id="turista_fone1"
                                           name="turista_fone1" placeholder="Telefone Celular" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" id="turista_data_nascimento"
                                           name="turista_data_nascimento" placeholder="Data de aniversário" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="turista_fone2"
                                           name="turista_fone2" placeholder="Contato de emergência" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" id="turista_sexo" name="turista_sexo" required>
                                        <option value="">Sexo</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" id="turista_tipo_sangue"
                                            name="turista_tipo_sangue" required>
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
                                    <input type="text"
                                           class="form-control"
                                           id="turista_endereco_cep"
                                           name="turista_endereco_cep"
                                           placeholder="CEP"
                                           onblur="pesquisacep(this.value)"
                                           required>
                                </div>
                                <div class="form-group col-md-4" id="ruaField">
                                    <input type="text"
                                           class="form-control"
                                           id="turista_endereco"
                                           name="turista_endereco"
                                           placeholder="Rua"
                                           readonly>
                                </div>
                                <div class="form-group col-md-4" id="bairroField">
                                    <input type="text"
                                           class="form-control"
                                           id="turista_endereco_bairro"
                                           name="turista_endereco_bairro"
                                           placeholder="Bairro"
                                           readonly>
                                </div>
                                <div class="form-group col-md-1" id="numeroField">
                                    <input type="text"
                                           class="form-control"
                                           id="turista_endereco_numero"
                                           name="turista_endereco_numero"
                                           placeholder="Nº"
                                           required>
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
                            <div class="form-group">
                                <input type="checkbox" id="aceitar_termos" required>
                                <label for="aceitar_termos">Aceito todos os <a href="#"
                                                                               target="_blank">termos</a></label>
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
                                        Taxa mínima de R${{ $cobrancaAtual->cobranca_valor ?? '' }}. Válida por {{ $cobrancaAtual->cobranca_perm_minima ?? '' }} dias.
                                    </small>
                                </span>
                            </h4>

                            <div class="form-row justify-content-center text-start">
                                <div class="form-group col-md-4 position-relative">
                                    <label for="data_inicial">Data Inicial</label>
                                    <input type="date"
                                           class="form-control"
                                           id="data_inicial"
                                           name="data_inicial"
                                           data-min-days="{{ $cobrancaAtual->cobranca_perm_minima ?? '' }}"
                                           placeholder="Data Inicial"
                                           onchange="handleDateChange()"
                                           required>
                                </div>
                            </div>

                            <div class="form-row justify-content-center text-start">
                                <div class="form-group col-md-4 position-relative">
                                    <input type="date"
                                           class="form-control"
                                           id="data_final"
                                           name="data_final"
                                           placeholder="Data Final"
                                           onchange="calcularDias()"
                                           required>
                                </div>
                            </div>

                            <p class="mt-3"><strong>Alto Paraíso De Goiás</strong><br>possui taxa de conservação
                                ambiental</p>

                            <div class="mt-3 mb-4" id="diasInfo" style="display: none; font-size: 19px;">
                                <span id="dias_selecionados" style="color: #4a90e2; font-weight: bold;"></span>
                                <span style="color: #4a90e2; font-weight: bold;">dias</span> de permanência <br>
                                Valor da taxa: <span
                                    style="color: #4a90e2; font-weight: bold;">R$ {{ $cobrancaAtual->cobranca_valor ?? '' }}</span>
                            </div>

                            <div class="form-check text-center">
                                <input class="form-check-input" type="checkbox" id="termos">
                                <label class="form-check-label" for="termos" style="color: #000000;">
                                    Aceito todos os <a href="#" class="text-decoration-underline">termos de taxa</a>
                                </label>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary flex-fill mr-2"
                                        onclick="prevStep()">Voltar
                                </button>
                                <button type="button" class="btn btn-primary flex-fill" onclick="nextStep()">Próximo
                                </button>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="form-step" id="step3">
                            <div id="resumoPreenchido"></div>

                            <!-- Card Data de Permanência -->
                            <div class="container">
                                <div class="card card-radius mb-4" style="border-radius: 0.75rem;">
                                    <div class="card-content m-4 d-flex align-items-start">
                                        <x-logos.logo-calendario class="me-2"/>
                                        <div>
                                            <strong>Data </strong>de Permanência<br>
                                            <span
                                                style="font-size: 11px;"><strong><span class="resumoDataInicial"></span></strong> a <strong><span
                                                        class="resumoDataFinal"></span></strong></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="divider-text">
                                    <span>Turista(s)</span>
                                    <hr>
                                </div>
                            </div>
                            <!-- Card Turista -->
                            <div class="container">
                                <div class="card card-radius" style="border-radius: 0.75rem; cursor: pointer;"
                                     data-toggle="collapse"
                                     data-target="#collapseContentResumo" aria-expanded="false"
                                     aria-controls="collapseContentResumo">
                                    <div class="card-content m-4 d-flex align-items-start">
                                        <x-logos.logo-turista class="me-2"/>
                                        <div>
                                            <strong>Nome: </strong><span class="resumoNome"></span><br>
                                            <strong>CPF: </strong><span class="resumoCpf"></span><br>
                                        </div>
                                        <div class="ml-auto">
                                            <span>Detalhes <i class="arrow fas fa-chevron-up"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="collapse" id="collapseContentResumo">
                                    <div class="card card-body mt-2">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Sou <strong>Estrangeiro?</strong></label>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="resumoEstrangeiro" value="sim"
                                                               disabled id="resumoEstrangeiroSim"> Sim
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="resumoEstrangeiro" value="nao"
                                                               disabled id="resumoEstrangeiroNao"> Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="resumoCpf" class="form-label"></label>
                                                <span class="resumoCpf form-control"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="resumoNome" class="form-label"></label>
                                                <span class="resumoNome form-control"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="resumoEmail" class="form-label"></label>
                                                <span class="resumoEmail form-control"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="resumoTelefone" class="form-label"></label>
                                                <span class="resumoTelefone form-control"></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="resumoNascimento" class="form-label"></label>
                                                <span class="resumoNascimento form-control"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="resumoEmergencia" class="form-label"></label>
                                                <span class="resumoEmergencia form-control"></span>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="resumoSexo" class="form-label"></label>
                                                <span class="resumoSexo form-control"></span>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="resumoTipoSanguineo" class="form-label"></label>
                                                <span class="resumoTipoSanguineo form-control"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="resumoCep" class="form-label"></label>
                                                <span class="resumoCep form-control"></span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="resumoRua" class="form-label"></label>
                                                <span class="resumoRua form-control"></span>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="resumoBairro" class="form-label"></label>
                                                <span class="resumoBairro form-control"></span>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="resumoNumero" class="form-label"></label>
                                                <span class="resumoNumero form-control"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3 mt-3">
                                                <label class="form-label">Possui alguma <strong>necessidade
                                                        especial?</strong></label>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="resumoNecessidadeEspecial" value="sim"
                                                               disabled id="resumoNecessidadeEspecialSim"> Sim
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="resumoNecessidadeEspecial" value="nao"
                                                               disabled id="resumoNecessidadeEspecialNao"> Não
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="divider-text">
                                    <span>Acompanhante(s) ou Dependente(s)</span>
                                    <hr>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div class="mb-2">
                                        <x-logos.logo-warning/>
                                    </div>
                                    <p style="font-weight:bold; color:#ABABAB;">Nenhum acompanhante ou dependente foi
                                        adicionado</p>
                                </div>
                            </div>
                            <div class="container mt-5">
                                <div style="margin: 0;" class="divider-text" data-toggle="collapse"
                                     data-target="#collapseContent" aria-expanded="false"
                                     aria-controls="collapseContent">
                                    <span>Valores e Taxas</span>
                                    <hr>
                                    <span>Detalhes <i class="arrow fas fa-chevron-up"></i></span>
                                </div>

                                <div class="collapse" id="collapseContent">
                                    <div class="card card-body mt-2">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Taxas</th>
                                                <th>Valor</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td><span class="resumoNome"></span></td>
                                                <td><span>R$ {{ $cobrancaAtual->cobranca_valor ?? '' }}</span></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <div class="mt-3">
                                            <strong>Total de Taxas:</strong> R$ {{ $cobrancaAtual->cobranca_valor ?? '' }}
                                        </div>
                                        <div class="mt-2">
                                            <strong>Total Geral:</strong> R$ {{ $cobrancaAtual->cobranca_valor ?? '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary flex-fill mr-2"
                                        onclick="prevStep()">Voltar
                                </button>
                                <button type="submit" class="btn btn-success flex-fill">Finalizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="{{ asset('js/turista/consulta-cep.js') }}"></script>
<script src="{{ asset('js/turista/barra-progresso.js') }}"></script>
<script src="{{ asset('js/turista/etapas-formulario.js') }}"></script>
<script src="{{ asset('js/turista/data-cobranca.js') }}"></script>
<script src="{{ asset('js/turista/resumo-cobranca.js') }}"></script>
