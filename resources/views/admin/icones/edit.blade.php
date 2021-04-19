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
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Editar Ícone
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('icones.update', $icone) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                                    value="{{ old('nome', $icone->nome) }}" name="nome">
                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nacionalidade" class="form-label">Nacionalidade</label>
                                <input type="text" class="form-control @error('nacionalidade') is-invalid @enderror"
                                    id="nacionalidade" value="{{ old('nacionalidade', $icone->nacionalidade) }}" name="nacionalidade">
                                @error('nacionalidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                        <input type="date"
                                            class="form-control @error('data_nascimento') is-invalid @enderror"
                                            id="data_nascimento" 
                                            value="{{ old('data_nascimento', $icone->data_nascimento->format('Y-m-d')) }}"
                                            name="data_nascimento">
                                        @error('data_nascimento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-9">
                                        <label for="local_nascimento" class="form-label">Local de Nascimento</label>
                                        <input type="text"
                                            class="form-control @error('local_nascimento') is-invalid @enderror"
                                            id="local_nascimento" value="{{ old('local_nascimento', $icone->local_nascimento) }}"
                                            name="local_nascimento">
                                        @error('local_nascimento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="data_falecimento" class="form-label">Data de Falecimento</label>
                                        <input type="date"
                                            class="form-control @error('data_falecimento') is-invalid @enderror"
                                            id="data_falecimento" 
                                            value="{{ old('data_falecimento', $icone->data_falecimento->format('Y-m-d')) }}"
                                            name="data_falecimento">
                                        @error('data_falecimento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-9">
                                        <label for="local_falecimento" class="form-label">Local de Falecimento</label>
                                        <input type="text"
                                            class="form-control @error('local_falecimento') is-invalid @enderror"
                                            id="local_falecimento" value="{{ old('local_falecimento', $icone->local_falecimento) }}"
                                            name="local_falecimento">
                                        @error('local_falecimento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contribuicao" class="form-label">Descreva a contribuição</label>
                                <textarea class="form-control @error('contribuicao') is-invalid @enderror"
                                    name="contribuicao" id="contribuicao" cols="30"
                                    rows="10">{{ old('contribuicao', $icone->contribuicao) }}</textarea>
                                @error('contribuicao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto_path" class="form-label">Anexar uma foto</label>
                                <input class="form-control-file @error('foto_path') is-invalid @enderror" type="file"
                                    id="foto_path" name="foto_path">
                                @error('foto_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
