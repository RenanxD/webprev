<div class="d-flex align-items-center mb-3">
    <button onclick="window.history.back()" class="btn-back botao-voltar mr-2">
        <div class="circle">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 arrow-icon" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 19l-7-7 7-7"/>
            </svg>
        </div>
    </button>
    <div class="d-flex align-items-center">
        <span class="ml-3" style="font-size: 23px; font-weight: bold;">{{ $slot }}</span>
    </div>
</div>
