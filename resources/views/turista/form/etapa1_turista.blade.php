<div class="form-step form-step-active">
    <div class="form-group">
        <label for="turista_estrangeiro">Sou <strong>Estrangeiro?</strong></label><br>
        <input type="radio" id="estrangeiro_nao" name="turista_estrangeiro" value="nao"
            {{ optional($cliente)->turista_estrangeiro === false ? 'checked' : '' }}>
        <label for="estrangeiro_nao">Não</label>
        <input type="radio" id="estrangeiro_sim" name="turista_estrangeiro" value="sim"
            {{ optional($cliente)->turista_estrangeiro === true ? 'checked' : '' }}>
        <label for="estrangeiro_sim">Sim</label>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="turista_cpf" name="turista_cpf" placeholder="CPF"
                   value="{{ $cliente->turista_cpf ?? '' }}" {{ $cliente ? 'readonly' : '' }} required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="text" class="form-control" id="turista_nome" name="turista_nome" placeholder="Nome Completo"
                   value="{{ $cliente->turista_nome ?? '' }}" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="email" class="form-control" id="turista_email" name="turista_email" placeholder="Email"
                   value="{{ session('email') }}" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="turista_fone1" name="turista_fone1"
                   placeholder="Telefone Celular"
                   value="{{ $cliente->turista_fone1 ?? '' }}" required>
        </div>
        <div class="form-group col-md-6">
            <input type="date" class="form-control" id="turista_data_nascimento" name="turista_data_nascimento"
                   value="{{ $cliente->turista_data_nascimento ?? '' }}" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <input type="text" class="form-control" id="turista_endereco_cep" name="turista_endereco_cep"
                   placeholder="CEP" value="{{ $cliente->turista_endereco_cep }}" onblur="pesquisacep(this.value)"
                   required>
        </div>
        <div class="form-group col-md-5" id="ruaField">
            <input type="text" class="form-control" id="turista_endereco" name="turista_endereco" placeholder="Rua"
                   value="{{ $cliente->turista_endereco }}" readonly>
        </div>
        <div class="form-group col-md-3" id="bairroField">
            <input type="text" class="form-control" id="turista_endereco_bairro" name="turista_endereco_bairro"
                   placeholder="Bairro" value="{{ $cliente->turista_endereco_bairro }}" readonly>
        </div>
        <div class="form-group col-md-2" id="numeroField">
            <input type="text" class="form-control" id="turista_endereco_numero" name="turista_endereco_numero"
                   placeholder="Nº" value="{{ $cliente->turista_endereco_numero }}" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="turista_fone2" name="turista_fone2"
                   placeholder="Contato de emergência" value="{{ $cliente->turista_fone2 }}" required>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control" id="turista_sexo" name="turista_sexo" required>
                <option value="">Sexo</option>
                <option value="Masculino" {{ $cliente->turista_sexo === 'Masculino' ? 'selected' : '' }}>Masculino
                </option>
                <option value="Feminino" {{ $cliente->turista_sexo === 'Feminino' ? 'selected' : '' }}>Feminino</option>
                <option value="Outro" {{ $cliente->turista_sexo === 'Outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control" id="turista_tipo_sangue" name="turista_tipo_sangue" required>
                <option value="">Tipo Sanguíneo</option>
                <option value="A+" {{ $cliente->turista_tipo_sangue === 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ $cliente->turista_tipo_sangue === 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ $cliente->turista_tipo_sangue === 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ $cliente->turista_tipo_sangue === 'B-' ? 'selected' : '' }}>B-</option>
                <option value="AB+" {{ $cliente->turista_tipo_sangue === 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ $cliente->turista_tipo_sangue === 'AB-' ? 'selected' : '' }}>AB-</option>
                <option value="O+" {{ $cliente->turista_tipo_sangue === 'O+' ? 'selected' : '' }}>O+</option>
                <option value="O-" {{ $cliente->turista_tipo_sangue === 'O-' ? 'selected' : '' }}>O-</option>
            </select>
        </div>
    </div>
    <div class="form-group mb-1">
        <label for="turista_necessidade_esp_opcao">Possui alguma <strong>necessidade especial?</strong></label><br/>
        <input type="radio" id="turista_necessidade_esp_nao" name="turista_necessidade_esp_opcao" value="nao"
            {{ $cliente->turista_necessidade_esp === "0" ? 'checked' : ''}}/>
        <label for="turista_necessidade_esp_nao">Não</label>
        <input type="radio" id="turista_necessidade_esp_sim" name="turista_necessidade_esp_opcao" value="sim"
            {{ $cliente->turista_necessidade_esp != "0" ? 'checked' : ''}}/>
        <label for="turista_necessidade_esp_sim">Sim</label>
    </div>
    <div class="form-group col-md-4" id="necessidade-especial-options"
         style="{{ $cliente->turista_necessidade_esp !== '0' ? '' : 'display: none;' }}">
        <select class="form-control" id="turista_necessidade_esp" name="turista_necessidade_esp">
            <option value="">Selecionar</option>
            <option value="Visual" {{ $cliente->turista_necessidade_esp === 'Visual' ? 'selected' : '' }}>Visual
            </option>
            <option value="Motora" {{ $cliente->turista_necessidade_esp === 'Motora' ? 'selected' : '' }}>Motora
            </option>
            <option value="Mental" {{ $cliente->turista_necessidade_esp === 'Mental' ? 'selected' : '' }}>Mental
            </option>
            <option value="Auditiva" {{ $cliente->turista_necessidade_esp === 'Auditiva' ? 'selected' : '' }}>Auditiva
            </option>
            <option value="Outra(s)" {{ $cliente->turista_necessidade_esp === 'Outra(s)' ? 'selected' : '' }}>Outra(s)
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="turista_dependente">Possui <strong>dependentes</strong> menores de 18 anos?</label><br>
        <input type="radio" id="turista_dependente_nao" name="turista_dependente" value="nao" checked>
        <label for="turista_dependente_nao">Não</label>
        <input type="radio" id="turista_dependente_sim" name="turista_dependente" value="sim">
        <label for="turista_dependente_sim">Sim</label>
    </div>
    <div class="form-group" id="adicionar-dependente" style="display: none;">
        <button type="button" class="btn btn-secondary" onclick="abrirModalDependente()">Adicionar Dependente</button>
    </div>
    <x-modal-dependente/>
    <div id="listaDependentes" style="display: none;"></div>
    <div class="form-group">
        <input type="checkbox" id="aceitar_termos" required>
        <label for="aceitar_termos">Aceito todos os <a href="#" target="_blank">termos</a></label>
    </div>
    <div class="d-flex justify-content-between mt-4">
        <button type="button" class="btn btn-outline-secondary flex-fill mr-2" onclick="redirectToSignIn()">Cancelar
        </button>
        <button type="button" class="btn btn-primary flex-fill" onclick="nextStep()">Próximo
        </button>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var cep = document.getElementById("turista_endereco_cep").value;
        if (cep) {
            pesquisacep(cep);
        }
    });
</script>
<script>
    const dependenteSim = document.getElementById('turista_dependente_sim');
    const dependenteNao = document.getElementById('turista_dependente_nao');
    const adicionarDependenteBtn = document.getElementById('adicionar-dependente');
    const dependenteView = document.getElementById('listaDependentes');

    function toggleDependenteButton() {
        if (dependenteSim.checked) {
            adicionarDependenteBtn.style.display = 'block';
            dependenteView.style.display = 'block';
        } else {
            adicionarDependenteBtn.style.display = 'none';
            dependenteView.style.display = 'none';
        }
    }

    dependenteSim.addEventListener('change', toggleDependenteButton);
    dependenteNao.addEventListener('change', toggleDependenteButton);

    function abrirModalDependente() {
        document.getElementById('modalDependente').style.display = 'block';
    }

    function fecharModalDependente() {
        document.getElementById('modalDependente').style.display = 'none';
    }

    toggleDependenteButton();
</script>
<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-dialog {
        max-width: 50rem;
    }
</style>
