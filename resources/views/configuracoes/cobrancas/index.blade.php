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
                                    <p class="card-text"><strong
                                            style="font-size: 14px;">Descrição:</strong><br>{{ $cobrancaAtual->descricao }}
                                    </p>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <p class="card-text"><strong style="font-size: 14px;">Data da
                                                    Ativação:</strong><br>{{ \Carbon\Carbon::parse($cobrancaAtual->created_at)->format('d/m/Y') }}
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="card-text"><strong style="font-size: 14px;">Valor
                                                    Mínimo:</strong><br>R$ {{ number_format($cobrancaAtual->valor, 2, ',', '.') }}
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="card-text"><strong style="font-size: 14px;">Permanência
                                                    Mínima:</strong><br>{{ $cobrancaAtual->cobranca_perm_minima }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="card-text"><strong style="font-size: 14px;">Valor Diário
                                                    Adicional:</strong><br>R$ {{ number_format($cobrancaAtual->cobranca_vlr_adicional, 2, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                    <button type="button"
                                            class="btn-custom btn-edit"
                                            data-toggle="modal"
                                            data-target="#modal-create">
                                        Nova Cobrança
                                    </button>
                                    <button type="button"
                                            class=""
                                            data-toggle="modal"
                                            data-target="#modal-create">
                                        Adicionar Tipo de Cobrança
                                    </button>
                                @elseif (isset($ultimaCobrancaAtiva))
                                    <p class="card-text"><strong style="font-size: 14px;">Última Cobrança
                                            Ativa:</strong><br>{{ $ultimaCobrancaAtiva->descricao }}</p>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <p class="card-text"><strong style="font-size: 14px;">Data da
                                                    Ativação:</strong><br>{{ \Carbon\Carbon::parse($ultimaCobrancaAtiva->created_at)->format('d/m/Y') }}
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="card-text"><strong style="font-size: 14px;">Valor
                                                    Mínimo:</strong><br>R$ {{ number_format($ultimaCobrancaAtiva->valor, 2, ',', '.') }}
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="card-text"><strong style="font-size: 14px;">Permanência
                                                    Mínima:</strong><br>{{ $ultimaCobrancaAtiva->cobranca_perm_minima }}
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="card-text"><strong style="font-size: 14px;">Valor Diário
                                                    Adicional:</strong><br>R$ {{ number_format($ultimaCobrancaAtiva->cobranca_vlr_adicional, 2, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                    <button type="button"
                                            class="btn-custom btn-edit"
                                            data-toggle="modal"
                                            data-target="#modal-create">
                                        Nova Cobrança
                                    </button>
                                    <button type="button"
                                            class=""
                                            data-toggle="modal"
                                            data-target="#modal-create">
                                        Adicionar Tipo de Cobrança
                                    </button>
                                @else
                                    <p>Nenhuma Cobrança cadastrada ainda.</p>
                                    <div class="d-flex">
                                        <button type="button"
                                                class="btn-custom"
                                                data-toggle="modal"
                                                data-target="#modal-create">
                                            Nova Cobrança
                                        </button>
                                        <button type="button"
                                                class="btn-custom"
                                                data-toggle="modal"
                                                data-target="#modal-create">
                                            Adicionar Tipo de Cobrança
                                        </button>
                                    </div>
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
                                                    <td>
                                                        @if ($cobranca->cobranca_ativa)
                                                            Ativa
                                                        @else
                                                            Inativa
                                                        @endif
                                                    </td>
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
        }, 5000);

        setTimeout(function () {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.classList.add('fade-out');
                setTimeout(function () {
                    successMessage.style.display = 'none';
                }, 1000);
            }
        }, 5000);
    });
</script>
