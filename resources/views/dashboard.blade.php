<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg p-6">
                <div class="quadros-container">
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <i class="fas fa-suitcase-rolling fa-2x mb-3"></i>
                            <span class="quadro-titulo">
                                Turistas
                            </span>
                            <span class="quadro-subtitulo">Controle detalhado dos turistas</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <i class="fas fa-user-tie fa-2x mb-3"></i>
                            <span class="quadro-titulo">Prestadores</span>
                            <span class="quadro-subtitulo">Informações e Configurações</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <i class="fas fa-users fa-2x mb-3"></i>
                            <span class="quadro-titulo">Usuários</span>
                            <span class="quadro-subtitulo">Gerenciamento dos colaboradores</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <i class="fas fa-barcode fa-2x mb-3"></i>
                            <span class="quadro-titulo">Isenções</span>
                            <span class="quadro-subtitulo">Gerenciamento dos beneficiários</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg p-6">
                <div class="quadros-container">
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <i class="fas fa-map-marked-alt fa-2x mb-3"></i>
                            <span class="quadro-titulo">Atividades</span>
                            <span class="quadro-subtitulo">Informações sobre as atividades</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <i class="fas fa-address-card fa-2x mb-3"></i>
                            <span class="quadro-titulo">Comprovantes Emitidos</span>
                            <span class="quadro-subtitulo">Informações sobre as taxas geradas</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="{{ route('configuracoes.index') }}" class="quadro">
                            <i class="fas fa-tools fa-2x mb-3"></i>
                            <span class="quadro-titulo">Configurações</span>
                            <span class="quadro-subtitulo">Gerenciamento das funcionalidades</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <i class="fas fa-user-check fa-2x mb-3"></i>
                            <span class="quadro-titulo">Validações</span>
                            <span class="quadro-subtitulo">Lista de validações dos prestadores</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg p-6">
                <div class="quadros-container">
                    <div class="quadro-item">
                        <a href="#" class="quadro">
                            <i class="fas fa-money-check-alt fa-2x mb-3"></i>
                            <span class="quadro-titulo">Pagamentos</span>
                            <span class="quadro-subtitulo">Lista de pagamentos e pedidos de extorno</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
