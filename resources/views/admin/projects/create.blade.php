@extends('layouts.app')

@section('page-title', 'Aggiungi progetto')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                       Nuovo Progetto
                    </h1>

                    <form action="{{ route('admin.projects.store') }}" method="POST">
                        @csrf
                        
                        <label for="title" class="form-label">Nome Progetto</label>
                        <input type="text" class="form-control mb-3 @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del nuovo progetto"
                            maxlength="1024" value="{{ old('title') }}">
                        @error('thumb')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Modelli</label>
                            <select name="type_id" id="type_id" class="form-select mb-3">
                                <option value="" disalble selected>Seleziona un modello</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="content" class="form-label">Descrizione</label>
                        <input type="text" class="form-control mb-3 @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci la descrizione del progetto"
                            maxlength="1024" value="{{ old('content') }}">
                        @error('thumb')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="update_at" class="form-label">Ora di creazione</label>
                        <input type="text" class="form-control mb-3 @error('content') is-invalid @enderror" id="update_at" name="update_at" placeholder="Inserisci l'ora di creazione"
                            maxlength="1024" value="{{ old('update_at') }}">
                        @error('thumb')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="create_at" class="form-label">Data di creazione</label>
                        <input type="text" class="form-control mb-3 @error('create_at') is-invalid @enderror" id="create_at" name="create_at" placeholder="Inserisci la data di creazione"
                            maxlength="1024" value="{{ old('create_at') }}">
                        @error('thumb')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div>
                            <button type="submit" class="btn btn-success w-100">
                                + Aggiungi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection