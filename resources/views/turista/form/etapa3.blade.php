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
                        style="font-size: 11px;"><strong><span
                                class="resumoDataInicial"></span></strong> a <strong><span
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
            <div class="container m-2">
                <div class="row">
                    <div class="col-md-6 mb-2 mt-2">
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
                    <div class="col-md-6 mb-2">
                        <span class="resumoCpf form-control"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <span class="resumoNome form-control"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <span class="resumoEmail form-control"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <span class="resumoTelefone form-control"></span>
                    </div>
                    <div class="col-md-6 mb-2">
                        <span class="resumoNascimento form-control"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <span class="resumoEmergencia form-control"></span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <span class="resumoSexo form-control"></span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <span class="resumoTipoSanguineo form-control"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <span class="resumoCep form-control"></span>
                    </div>
                    <div class="col-md-4 mb-2">
                        <span class="resumoRua form-control"></span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <span class="resumoBairro form-control"></span>
                    </div>
                    <div class="col-md-2 mb-2">
                        <span class="resumoNumero form-control"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2 mt-3">
                        <label class="form-label">Possui alguma <strong>necessidade especial?</strong></label>
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
                        <div class="col-md-5 mt-2" style="padding-left:0;">
                            <span class="resumoTuristaNecessidadeEsp form-control"></span>
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
                        <td><span id="valorTaxaTabela">R$ {{ $cobrancaAtual->cobranca_valor ?? '' }}</span></td>
                    </tr>
                    </tbody>
                </table>

                <div class="mt-3">
                    <strong>Total de Taxas:</strong> <span
                        id="totalTaxas">R$ {{ $cobrancaAtual->cobranca_valor ?? '' }}</span>
                </div>
                <div class="mt-2">
                    <strong>Total Geral:</strong> <span
                        id="totalGeral">R$ {{ $cobrancaAtual->cobranca_valor ?? '' }}</span>
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