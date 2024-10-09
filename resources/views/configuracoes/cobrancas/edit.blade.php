<form action="{{ route('cobrancas.update', $cobranca->id_cobranca) }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="modal-edit{{ $cobranca->id_cobranca }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <x-logos.logo-valores-e-cobrancas/>
                        <h5 class="ml-2 modal-title font-weight-bold">Editar Cobrança</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf()
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_tipo_cobranca">Tipo de Cobrança</label>
                                <select name="id_tipo_cobranca" id="id_tipo_cobranca" class="form-control readonly" disabled>
                                    @foreach($tiposCobranca as $tipo)
                                        <option value="{{ $tipo->id_tipo_cobranca }}"
                                            {{ $cobranca->id_tipo_cobranca == $tipo->id_tipo_cobranca ? 'selected' : '' }}>
                                            {{ $tipo->descricao }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text"
                                       class="form-control blocked-label"
                                       name="descricao"
                                       value="{{ $cobranca->cobranca_descricao }}"
                                       placeholder="Descrição"
                                       readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cobranca_valor">Valor Cobrança</label>
                                <input type="text"
                                       class="form-control blocked-label"
                                       name="cobranca_valor"
                                       value="{{ $cobranca->cobranca_valor }}"
                                       placeholder="Valor Cobrança"
                                       readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cobranca_perm_minima">Permanência mínima</label>
                                <input type="text"
                                       class="form-control blocked-label"
                                       name="cobranca_perm_minima"
                                       value="{{ $cobranca->cobranca_perm_minima }}"
                                       placeholder="Permanência mínima"
                                       readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cobranca_vlr_adicional">Valor Adicional</label>
                                <input type="text"
                                       class="form-control blocked-label"
                                       name="cobranca_vlr_adicional"
                                       value="{{ $cobranca->cobranca_vlr_adicional }}"
                                       placeholder="Valor Adicional"
                                       readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cobranca_perm_dia_adicional">Permanência mínima dias adicionais</label>
                                <input type="text"
                                       class="form-control blocked-label"
                                       name="cobranca_perm_dia_adicional"
                                       value="{{ $cobranca->cobranca_perm_dia_adicional }}"
                                       placeholder="Permanência mínima dias adicionais"
                                       readonly/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cobranca_ativa">Ativo</label>
                                <div class="d-flex align-items-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="cobranca_ativa"
                                               value="1"
                                            {{ $cobranca->cobranca_ativa == 1 ? 'checked' : '' }} />
                                        <label class="form-check-label" for="radioSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="cobranca_ativa"
                                               value="0"
                                            {{ $cobranca->cobranca_ativa == 0 ? 'checked' : '' }} />
                                        <label class="form-check-label" for="radioNao">Não</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-custom">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>
