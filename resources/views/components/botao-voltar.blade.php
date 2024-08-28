<div class="d-flex align-items-center mb-3">
    <button onclick="window.history.back()" class="btn-back botao-voltar mr-2">
        <div class="circle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="lucide lucide-arrow-left ">
                <path d="m12 19-7-7 7-7"></path>
                <path d="M19 12H5"></path>
            </svg>
        </div>
    </button>
    <div class="d-flex align-items-center">
        <span class="ml-3" style="font-size: 23px; font-weight: bold;">{{ $slot }}</span>
    </div>
</div>
