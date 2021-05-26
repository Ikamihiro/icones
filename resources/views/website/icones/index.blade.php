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
                                <div class="card-body w-100">
                                    <h5 class="card-title">{{ $icone->nome }}</h5>
                                    <p class="card-text text-truncate">
                                        {{ $icone->contribuicao }}
                                    </p>
                                    <p class="card-text text-white">
                                        <small>
                                            Nasceu em {{ $icone->data_nascimento->format('d/m/Y') }}
                                        </small>
                                    </p>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('website.icones.show', $icone) }}" class=" btn btn-light stretched-link">
                                            Quero saber mais
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-right ml-2" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                            </svg>
                                        </a>
                                    </div>
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
