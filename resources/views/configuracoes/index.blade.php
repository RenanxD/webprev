@extends('templates.template')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white min-h-screen overflow-hidden sm:rounded-lg p-6">
                <div class="quadros-container">
                    <x-botao-voltar>
                        Configurações
                    </x-botao-voltar>
                    <div class="quadro-item">
                        <a href="{{ route('cobrancas.index') }}" class="quadro">
                            <x-logo-configuracoes-usuarios/>
                            <span class="quadro-titulo">Usuários</span>
                            <span class="quadro-subtitulo">Gerencie as funcionalidades dos usuários</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="{{ route('cobrancas.index') }}" class="quadro">
                            <x-logo-valores-e-cobrancas/>
                            <span class="quadro-titulo">Valores e Cobranças</span>
                            <span class="quadro-subtitulo">Gerenciamento dos valores e cobranças</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
