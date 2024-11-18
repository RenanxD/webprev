<div class="form-step form-step-active">
    <div class="form-group">
        <label for="turista_estrangeiro">Sou <strong>Estrangeiro?</strong></label><br>
        <input type="radio" id="estrangeiro_nao" name="turista_estrangeiro" value="nao"
            {{ optional($cliente)->estrangeiro === 'nao' ? 'checked' : '' }}>
        <label for="estrangeiro_nao">Não</label>
        <input type="radio" id="estrangeiro_sim" name="turista_estrangeiro" value="sim"
            {{ optional($cliente)->estrangeiro === 'sim' ? 'checked' : '' }}>
        <label for="estrangeiro_sim">Sim</label>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="turista_cpf" name="turista_cpf" placeholder="CPF"
                   value="{{ $cliente->cpf ?? '' }}" {{ $cliente ? 'readonly' : '' }} required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="text" class="form-control" id="turista_nome" name="turista_nome" placeholder="Nome Completo"
                   value="{{ $cliente->nome ?? '' }}" required>
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
            <input type="text" class="form-control" id="turista_fone1" name="turista_fone1" placeholder="Telefone Celular"
                   value="{{ $cliente->telefone_celular ?? '' }}" required>
        </div>
        <div class="form-group col-md-6">
            <input type="date" class="form-control" id="turista_data_nascimento" name="turista_data_nascimento"
                   value="{{ $cliente->data_nascimento ?? '' }}" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <input type="text" class="form-control" id="turista_endereco_cep" name="turista_endereco_cep" placeholder="CEP"
                   value="{{ $cliente->endereco_cep ?? '' }}" required>
        </div>
        <div class="form-group col-md-5" id="ruaField">
            <input type="text" class="form-control" id="turista_endereco" name="turista_endereco" placeholder="Rua"
                   value="{{ $cliente->endereco_rua ?? '' }}" readonly>
        </div>
        <div class="form-group col-md-3" id="bairroField">
            <input type="text" class="form-control" id="turista_endereco_bairro" name="turista_endereco_bairro" placeholder="Bairro"
                   value="{{ $cliente->endereco_bairro ?? '' }}" readonly>
        </div>
        <div class="form-group col-md-2" id="numeroField">
            <input type="text" class="form-control" id="turista_endereco_numero" name="turista_endereco_numero" placeholder="Nº"
                   value="{{ $cliente->endereco_numero ?? '' }}" required>
        </div>
    </div>
</div>
