<div class="form-step form-step-active">
    <div class="form-group">
        <label for="turista_estrangeiro">Sou <strong>Estrangeiro?</strong></label><br>
        <input type="radio"
               id="estrangeiro_nao"
               name="turista_estrangeiro"
               value="nao"
               checked>
        <label for="estrangeiro_nao">Não</label>
        <input type="radio"
               id="estrangeiro_sim"
               name="turista_estrangeiro"
               value="sim">
        <label for="estrangeiro_sim">Sim</label>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text"
                   class="form-control"
                   id="turista_cpf"
                   name="turista_cpf"
                   placeholder="CPF"
                   required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="text"
                   class="form-control"
                   id="turista_nome"
                   name="turista_nome"
                   placeholder="Nome Completo"
                   required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="email"
                   class="form-control"
                   id="turista_email"
                   name="turista_email"
                   placeholder="Email"
                   value="{{ session('email') }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text"
                   class="form-control"
                   id="turista_fone1"
                   name="turista_fone1"
                   placeholder="Telefone Celular"
                   required>
        </div>
        <div class="form-group col-md-6">
            <input type="date"
                   class="form-control"
                   id="turista_data_nascimento"
                   name="turista_data_nascimento"
                   placeholder="Data de aniversário"
                   required>
            <small id="date-error" style="color: red; display: none;">Você deve ter pelo menos 18 anos.</small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text"
                   class="form-control"
                   id="turista_fone2"
                   name="turista_fone2"
                   placeholder="Contato de emergência"
                   required>
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
            <select class="form-control" id="turista_tipo_sangue" name="turista_tipo_sangue" required>
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
        <div class="form-group col-md-2">
            <input type="text"
                   class="form-control"
                   id="turista_endereco_cep"
                   name="turista_endereco_cep"
                   placeholder="CEP"
                   onblur="pesquisacep(this.value)"
                   required>
        </div>
        <div class="form-group col-md-5" id="ruaField">
            <input type="text"
                   class="form-control"
                   id="turista_endereco"
                   name="turista_endereco"
                   placeholder="Rua"
                   readonly>
        </div>
        <div class="form-group col-md-3" id="bairroField">
            <input type="text"
                   class="form-control"
                   id="turista_endereco_bairro"
                   name="turista_endereco_bairro"
                   placeholder="Bairro"
                   readonly>
        </div>
        <div class="form-group col-md-2" id="numeroField">
            <input type="text"
                   class="form-control"
                   id="turista_endereco_numero"
                   name="turista_endereco_numero"
                   placeholder="Nº"
                   required>
        </div>
    </div>
    <div class="form-group mb-1">
        <label for="turista_necessidade_esp_opcao">Possui alguma <strong>necessidade especial?</strong></label><br/>
        <input type="radio"
               id="turista_necessidade_esp_nao"
               name="turista_necessidade_esp_opcao"
               value="nao"
               checked/>
        <label for="turista_necessidade_esp_nao">Não</label>
        <input type="radio"
               id="turista_necessidade_esp_sim"
               name="turista_necessidade_esp_opcao"
               value="sim"/>
        <label for="turista_necessidade_esp_sim">Sim</label>
    </div>
    <div class="form-group col-md-4" id="necessidade-especial-options" style="display: none; padding-left: 0;">
        <select class="form-control" id="turista_necessidade_esp" name="turista_necessidade_esp">
            <option value="">Selecionar</option>
            <option value="Visual">Visual</option>
            <option value="Motora">Motora</option>
            <option value="Mental">Mental</option>
            <option value="Auditiva">Auditiva</option>
            <option value="Outra(s)">Outra(s)</option>
        </select>
    </div>
    <div class="form-group">
        <label for="turista_dependente">Possui <strong>dependentes</strong> menores de 18 anos?</label><br>
        <input type="radio"
               id="turista_dependente_nao"
               name="turista_dependente"
               value="nao"
               checked>
        <label for="turista_dependente_nao">Não</label>
        <input type="radio"
               id="turista_dependente_sim"
               name="turista_dependente"
               value="sim">
        <label for="turista_dependente_sim">Sim</label>
    </div>
    <div class="form-group">
        <input type="checkbox"
               id="aceitar_termos"
               required>
        <label for="aceitar_termos">Aceito todos os <a href="#" target="_blank">termos</a></label>
    </div>
    <div class="d-flex justify-content-between mt-4">
        <button type="button" class="btn btn-outline-secondary flex-fill mr-2" onclick="redirectToSignIn()">Cancelar</button>
        <button type="button" class="btn btn-primary flex-fill" onclick="nextStep()">Próximo
        </button>
    </div>
</div>
<script>
    function redirectToSignIn() {
        // Captura o slug do primeiro segmento da URL (depois do domínio)
        const slug = window.location.pathname.split("/")[1];

        // Redireciona para a URL de Sign In com o slug
        window.location.href = `/${slug}/signin`;
    }
</script>
