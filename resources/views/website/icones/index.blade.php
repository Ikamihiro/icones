@extends('layouts.website')
@section('content')
    <div class="turing-image">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column">
                @foreach ($icones as $icone)
                    <div class="card mb-4">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/fotos/' . $icone->foto_path) }}" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $icone->nome }}</h5>
                                    <p class="card-text text-truncate">
                                        {{ $icone->contribuicao }}
                                    </p>
                                    <p class="card-text text-white">
                                        <small>
                                            Nasceu em {{ $icone->data_nascimento->format('d/m/Y') }}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-auto">
                {{ $icones->render() }}
            </div>
        </div>
    </div>
@endsection
