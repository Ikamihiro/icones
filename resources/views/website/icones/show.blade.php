@extends('layouts.website')
@section('content')
    <div class="turing-image">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            {{ $icone->nome }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            {{ $icone->contribuicao }}
                        </p>
                        
                        <div class="d-flex flex-column text-light">
                            <div class="d-flex justify-content-center p-2">
                                <strong class="font-weight-bolder mr-2">Nome completo:</strong>
                                {{ $icone->nome }}
                            </div>
                            <div class="d-flex justify-content-center p-2">
                                <strong class="font-weight-bolder mr-2">Nacionalidade:</strong>
                                {{ $icone->nacionalidade }}
                            </div>
                            <div class="d-flex justify-content-center p-2">
                                <strong class="font-weight-bolder mr-2">Nascimento:</strong>
                                {{ $icone->data_nascimento->format('d/m/Y') }}, {{ $icone->local_nascimento }}
                            </div>
                            <div class="d-flex justify-content-center p-2">
                                <strong class="font-weight-bolder mr-2">Data de falecimento:</strong>
                                {{ $icone->data_falecimento->format('d/m/Y') }}, {{ $icone->local_falecimento }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
