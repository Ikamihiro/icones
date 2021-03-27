@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-end mb-3">
            <div class="col-sm-12 col-md-auto">
                <a href="{{ route('icones.create') }}" class="btn btn-primary">
                    Adicionar Ícone
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="col-12">
                @if ($icones)
                    <table class="table table-bordered table-striped table-responsive-sm bg-white my-shadow">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Nacionalidade</th>
                                <th>Data de Nascimento</th>
                                <th>Foto</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($icones as $icone)
                                <tr>
                                    <td>{{ $icone->nome }}</td>
                                    <td>{{ $icone->nacionalidade }}</td>
                                    <td>{{ $icone->data_nascimento->format('d/m/Y') }}</td>
                                    <td>
                                        <img src="{{ asset('storage/fotos/' . $icone->foto_path) }}" 
                                            alt="" class="img-fluid">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('icones.show', $icone) }}" class="btn btn-primary">
                                                Ver
                                            </a>
                                            <a href="{{ route('icones.edit', $icone) }}" class="btn btn-warning">
                                                Editar
                                            </a>
                                            <form action="{{ route('icones.destroy', $icone) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $icones->render() }}
                @else
                    Sem ícones cadastrados
                @endif
            </div>
        </div>
    </div>
@endsection
