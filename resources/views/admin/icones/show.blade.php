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
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">{{ $icone->getPrimeiroNome() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection