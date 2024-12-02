@extends('layouts.complete-registration')
@section('title', 'WebPrev - Registro')
@section('content')
    <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h4 id="titulo-etapa" class="text-center mb-4">
                            <span style="font-weight: 400;">Agora informe os seus</span> <strong>dados</strong>
                        </h4>
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <div class="progress-circle active" id="circle1">1</div>
                            <div class="progress-line"></div>
                            <div class="progress-circle" id="circle2">2</div>
                            <div class="progress-line"></div>
                            <div class="progress-circle" id="circle3">3</div>
                            <div class="progress-line"></div>
                            <div class="progress-circle" id="circle4">4</div>
                        </div>
                        <form id="multiStepForm" method="POST" novalidate>
                            @csrf
                            @if($cliente)
                                @include('turista.form.etapa1_turista')
                            @else
                                @include('turista.form.etapa1')
                            @endif
                            @include('turista.form.etapa2')
                            @include('turista.form.etapa3')
                            @include('turista.form.etapa4')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/turista/consulta-cep.js') }}"></script>
    <script src="{{ asset('js/turista/barra-progresso.js') }}"></script>
    <script src="{{ asset('js/turista/etapas-formulario.js') }}"></script>
    <script src="{{ asset('js/turista/resumo-cobranca.js') }}"></script>
    <script src="{{ asset('js/turista/mascara-campos.js') }}"></script>
    <script src="{{ asset('js/turista/necessidade-especial.js') }}"></script>
    <script>const cobrancaValor = "{{ $cobrancaAtual->cobranca_valor ?? '0,00' }}";</script>
    <script src="{{ asset('js/turista/verificacao-isencao.js') }}"></script>
    <script src="{{ asset('js/turista/validacao-data.js') }}"></script>
    <script src="{{ asset('js/turista/envio-formulario.js') }}"></script>
@endsection
