@extends('layouts.app')

@section('page-title', 'Creazione modello')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                       Nuovo Modello
                    </h1>

                    <form action="{{ route('admin.types.store') }}" method="POST">
                        @csrf
                        
                        <label for="title" class="form-label">Nome Modello</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del nuovo modello"
                            maxlength="1024" value="{{ old('title') }}">
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