@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-end mb-3">
            <div class="col-sm-12 col-md-auto">
                <a href="{{ route('icones.index') }}" class="btn btn-primary">
                    Voltar
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-shadow">
                    <div class="card-header bg-secondary text-light">
                        <div class="card-title">{{ $icone->getPrimeiroNome() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection