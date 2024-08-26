<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg p-6">
                <div class="quadros-container">
                    <div class="quadro-item">
                        <a href="{{ route('cobrancas.index') }}" class="quadro">
                            <i class="fas fa-user-cog fa-2x mb-3"></i>
                            <span class="quadro-titulo">Usuários</span>
                            <span class="quadro-subtitulo">Gerencie as funcionalidades dos usuários</span>
                        </a>
                    </div>
                    <div class="quadro-item">
                        <a href="{{ route('cobrancas.index') }}" class="quadro">
                            <i class="fas fa-dollar-sign fa-2x mb-3"></i>
                            <span class="quadro-titulo">Valores e Cobranças</span>
                            <span class="quadro-subtitulo">Gerenciamento dos valores e cobranças</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</x-app-layout>
