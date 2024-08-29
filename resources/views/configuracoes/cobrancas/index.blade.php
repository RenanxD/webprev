@extends('templates.template')
@section('content')
    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @isset($mensagemSucesso)
                <div id="success-message" class="alert alert-success">
                    {{ $mensagemSucesso }}
                </div>
            @endisset
            <div class="bg-white overflow-hidden sm:rounded-lg p-6">
                <x-botao-voltar>
                    <div class="d-flex align-items-center">
                        <x-logos.logo-valores-e-cobrancas/>
                        <span class="ml-3">Gerenciar Cobranças</span>
                    </div>
                </x-botao-voltar>
                <div data-orientation="horizontal"
                     role="none"
                     class="mt-3 shrink-0 h-[1px] w-full min-w-full"
                     style="background-color: #e5e7eb;">
                </div>
                <div class="row justify-content-center">
                    <div class="mt-8 col-md-11 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Cobrança atual</h5>
                                @if ($cobrancaAtual && $cobrancaAtual->cobranca_ativa)
                                    @include('configuracoes.cobrancas.partials.cobranca-ativa', ['cobranca' => $cobrancaAtual])
                                @endisset
                                @empty($cobrancaAtual)
                                    @isset($ultimaCobrancaAtiva)
                                        @include('configuracoes.cobrancas.partials.ultima-cobranca-ativa', ['cobranca' => $ultimaCobrancaAtiva])
                                    @endisset
                                @endempty
                                @if (count($cobrancas) === 0)
                                    <p>Nenhuma cobrança cadastrada ainda.</p>
                                    <div class="d-flex justify-content-end">
                                        <button type="button"
                                                class="btn-custom"
                                                data-toggle="modal"
                                                data-target="#modal-create"
                                                @if(!$temTipoCobranca) disabled @endif>
                                            Nova Cobrança
                                        </button>
                                        <button type="button"
                                                class="btn-custom"
                                                data-toggle="modal"
                                                data-target="#modal-add-tipo-cobranca">
                                            Adicionar Tipo de Cobrança
                                        </button>
                                    </div>
                                @else
                                    @if ($cobrancas->every(fn($cobranca) => !$cobranca->cobranca_ativa))
                                        <p>Nenhuma cobrança ativa</p>
                                        <div class="d-flex justify-content-end">
                                            <button type="button"
                                                    class="btn-custom"
                                                    data-toggle="modal"
                                                    data-target="#modal-create"
                                                    @if(!$temTipoCobranca) disabled @endif>
                                                Nova Cobrança
                                            </button>
                                            <button type="button"
                                                    class="btn-custom"
                                                    data-toggle="modal"
                                                    data-target="#modal-add-tipo-cobranca">
                                                Adicionar Tipo de Cobrança
                                            </button>
                                        </div>
                                    @endif
                                @endif
                                @if(!$temTipoCobranca)
                                    <p class="text-danger">Para cadastrar uma nova cobrança, é necessário cadastrar ao menos um tipo de cobrança.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-11 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Cobranças cadastradas</h5>
                                @if (count($cobrancas) > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Tipo da cobrança</th>
                                                <th>Descrição</th>
                                                <th>Permanência Mínima</th>
                                                <th>Valor Diário Adicional</th>
                                                <th>Dia Adicional</th>
                                                <th>Situação</th>
                                                <th>Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cobrancas as $cobranca)
                                                <tr>
                                                    <td>{{ $cobranca->id_tipo_cobranca }}</td>
                                                    <td>{{ $cobranca->cobranca_descricao }}</td>
                                                    <td>{{ $cobranca->cobranca_perm_minima }}</td>
                                                    <td>
                                                        R$ {{ number_format($cobranca->cobranca_vlr_adicional, 2, ',', '.') }}</td>
                                                    <td>R$ {{ number_format($cobranca->valor, 2, ',', '.') }}</td>
                                                    <td>{{ $cobranca->cobranca_ativa ? 'Ativa' : 'Inativa' }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#modal-edit{{ $cobranca->id_cobranca }}"
                                                                style="padding: 5px 6px; font-size: 0.8rem;"
                                                                title="Editar Cobrança">
                                                            <i class="fas fa-edit" aria-hidden="true"></i>
                                                        </button>
                                                        <form
                                                            action="{{ route('cobrancas.destroy', $cobranca->id_cobranca) }}"
                                                            method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-times" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @include('configuracoes.cobrancas.edit')
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $cobrancas->links() }}
                                @else
                                    <p>Nenhuma cobrança cadastrada ainda.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('configuracoes.cobrancas.add-tipo-cobranca')
    @include('configuracoes.cobrancas.create')
@stop
<script>
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.classList.add('fade-out');
                setTimeout(function () {
                    errorMessage.style.display = 'none';
                }, 1000);
            }

            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.classList.add('fade-out');
                setTimeout(function () {
                    successMessage.style.display = 'none';
                }, 1000);
            }
        }, 4000);
    });
</script>
