@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('attention'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('attention') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card my-shadow">
                    <div class="card-header bg-secondary text-light">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="card-text">Bem vindo ao Ícones Admin!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
