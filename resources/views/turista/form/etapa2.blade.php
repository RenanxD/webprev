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
            <label for="data_final">Data Final</label>
            <input type="date"
                   class="form-control"
                   id="data_final"
                   name="data_final"
                   placeholder="Data Final"
                   onchange="calcularDias()"
                   required>
        </div>
    </div>

    <p class="mt-3"><strong>Alto Paraíso De Goiás</strong><br>possui taxa de conservação ambiental</p>

    <div class="mt-3 mb-4" id="diasInfo" style="display: none; font-size: 19px;">
        <span id="dias_selecionados" style="color: #4a90e2; font-weight: bold;"></span>
        <span style="color: #4a90e2; font-weight: bold;">dias</span> de permanência <br>Valor da taxa: <span id="valorTaxa" style="color: #4a90e2; font-weight: bold;">R${{ $cobrancaAtual->cobranca_valor ?? '' }}</span>
        <input type="hidden" name="valor_taxa" value="{{ $cobrancaAtual->cobranca_valor ?? '' }}">
    </div>

    <div class="form-check text-center">
        <input class="form-check-input"
               type="checkbox"
               id="termos">
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
<script src="{{ asset('js/turista/data-cobranca.js') }}"></script>
