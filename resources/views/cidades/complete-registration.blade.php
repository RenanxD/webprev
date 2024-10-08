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
                                <small class="required-message show" id="termosRequiredMessage"><strong>* Campo obrigatório</strong></small>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button type="button" class="btn btn-outline-secondary flex-fill mr-2">Cancelar</button>
                                <button type="button" class="btn btn-primary flex-fill">Próximo</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/consulta-cep.js') }}" ></script>
<script src="{{ asset('js/campos-obrigatorios.js') }}" ></script>
<script src="{{ asset('js/barra-progresso.js') }}" ></script>
<script src="{{ asset('js/etapas-formulario.js') }}" ></script>
