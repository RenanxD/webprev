<form action="{{ route('tipocobranca.store') }}" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="modal-add-tipo-cobranca" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <x-logos.logo-valores-e-cobrancas/>
                        <h5 class="ml-2 modal-title font-weight-bold">Cadastrar Tipo de Cobrança</h5>
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
                                <label for="descricao">Descrição</label>
                                <input type="text"
                                       class="form-control"
                                       name="descricao"
                                       placeholder="Descrição"/>
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
