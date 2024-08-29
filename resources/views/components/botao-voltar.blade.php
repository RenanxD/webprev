<div class="d-flex align-items-center mb-3">
    <button onclick="window.history.back()" class="btn-back botao-voltar mr-2" aria-label="Voltar">
        <div class="circle d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="lucide lucide-arrow-left">
                <path d="m12 19-7-7 7-7"></path>
                <path d="M19 12H5"></path>
            </svg>
        </div>
    </button>
    <div class="d-flex align-items-center">
        <span class="ml-3" style="font-size: 23px; font-weight: bold;">{{ $slot }}</span>
    </div>
</div>

<style>
    .btn-back {
        border: none;
        background-color: transparent;
        cursor: pointer;
        padding: 8px;
        border-radius: 50%;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-back:hover {
        background-color: rgba(0, 0, 0, 0.1);
        transform: scale(1);
    }

    .circle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
    }

    .lucide-arrow-left {
        color: #000000;
    }

    @media (max-width: 576px) {
        .btn-back {
            padding: 5px;
        }

        .circle {
            width: 30px;
            height: 30px;
        }

        span {
            font-size: 20px;
        }
    }
</style>
