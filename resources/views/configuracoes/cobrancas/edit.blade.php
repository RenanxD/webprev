<form action="{{ route('cobrancas.update', $cobranca->id_cobranca) }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="modal-edit{{ $cobranca->id_cobranca }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Cobrança</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf()
                    @method('PUT')
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" class="form-control blocked-label" name="descricao"
                               value="{{ $cobranca->descricao }}" placeholder="Descrição" readonly>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control blocked-label" name="valor"
                               value="{{ $cobranca->valor }}" placeholder="Valor" readonly>
                    </div>
                    <div class="form-group">
                        <label for="cobranca_perm_minima">Permanência mínima</label>
                        <input type="text" class="form-control blocked-label" name="cobranca_perm_minima"
                               value="{{ $cobranca->cobranca_perm_minima }}" placeholder="Permanência mínima" readonly>
                    </div>
                    <div class="form-group">
                        <label for="cobranca_vlr_adicional">Valor Adicional</label>
                        <input type="text" class="form-control blocked-label" name="cobranca_vlr_adicional"
                               value="{{ $cobranca->cobranca_vlr_adicional }}" placeholder="Valor Adicional" readonly>
                    </div>
                    <div class="form-group">
                        <label for="cobranca_perm_dia_adicional">Permanência mínima dias adicionais</label>
                        <input type="text" class="form-control blocked-label" name="cobranca_perm_dia_adicional"
                               value="{{ $cobranca->cobranca_perm_dia_adicional }}"
                               placeholder="Permanência mínima dias adicionais" readonly>
                    </div>
                    <div class="form-group">
                        <fieldset>
                            <label for="cobranca_ativa">Ativo</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cobranca_ativa" value="1"
                                    {{ $cobranca->cobranca_ativa == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioSim">Sim</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cobranca_ativa" value="0"
                                    {{ $cobranca->cobranca_ativa == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="radioNao">Não</label>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-custom" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn-custom">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>
