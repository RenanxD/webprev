<form action="{{ route('cobrancas.store') }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <x-logos.logo-valores-e-cobrancas/>
                        <h5 class="ml-2 modal-title font-weight-bold">Cadastrar Nova Cobrança</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf()
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_tipo_cobranca">Tipo de Cobrança</label>
                                <select name="id_tipo_cobranca" id="id_tipo_cobranca" class="form-control">
                                    @foreach($tiposCobranca as $tipo)
                                        <option value="{{ $tipo->id_tipo_cobranca }}">{{ $tipo->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <input type="text"
                                       class="form-control"
                                       name="cobranca_descricao"
                                       placeholder="Descrição"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cobranca_valor">Valor Cobrança</label>
                                <input type="text"
                                       class="form-control"
                                       name="cobranca_valor"
                                       placeholder="Valor Cobrança"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cobranca_perm_minima">Permanência mínima</label>
                                <input type="text"
                                       class="form-control"
                                       name="cobranca_perm_minima"
                                       placeholder="Permanência mínima"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cobranca_vlr_adicional">Valor Adicional</label>
                                <input type="text"
                                       class="form-control"
                                       name="cobranca_vlr_adicional"
                                       placeholder="Valor Adicional"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cobranca_perm_dia_adicional">Permanência mínima dias adicionais</label>
                                <input type="text"
                                       class="form-control"
                                       name="cobranca_perm_dia_adicional"
                                       placeholder="Permanência mínima dias adicionais"/>
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
                                               value="1"/>
                                        <label class="form-check-label" for="radioSim">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="cobranca_ativa"
                                               value="0"/>
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
