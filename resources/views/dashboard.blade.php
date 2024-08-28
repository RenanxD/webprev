@extends('templates.template')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="quadros-container">
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <x-logos.logo-turistas/>
                            <span class="quadro-titulo">
                                Turistas
                            </span>
                            <span class="quadro-subtitulo">Controle detalhado dos turistas</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <x-logos.logo-prestadores/>
                            <span class="quadro-titulo">Prestadores</span>
                            <span class="quadro-subtitulo">Informações e Configurações</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <x-logos.logo-usuarios/>
                            <span class="quadro-titulo">Usuários</span>
                            <span class="quadro-subtitulo">Gerenciamento dos colaboradores</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <x-logos.logo-isencoes/>
                            <span class="quadro-titulo">Isenções</span>
                            <span class="quadro-subtitulo">Gerenciamento dos beneficiários</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="quadros-container">
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <x-logos.logo-atividades/>
                            <span class="quadro-titulo">Atividades</span>
                            <span class="quadro-subtitulo">Informações sobre as atividades</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <x-logos.logo-comprovantes-emitidos/>
                            <span class="quadro-titulo">Comprovantes Emitidos</span>
                            <span class="quadro-subtitulo">Informações sobre as taxas geradas</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="{{ route('configuracoes.index') }}" class="quadro">
                            <x-logos.logo-configuracoes/>
                            <span class="quadro-titulo">Configurações</span>
                            <span class="quadro-subtitulo">Gerenciamento das funcionalidades</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <x-logos.logo-validacoes/>
                            <span class="quadro-titulo">Validações</span>
                            <span class="quadro-subtitulo">Lista de validações dos prestadores</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="quadros-container">
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <x-logos.logo-pagamentos/>
                            <span class="quadro-titulo">Pagamentos</span>
                            <span class="quadro-subtitulo">Lista de pagamentos e pedidos de extorno</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
