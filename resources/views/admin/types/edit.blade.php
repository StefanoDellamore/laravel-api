@extends('layouts.app')

@section('page-title', 'edit modello')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                        modifica Progetto
                    </h1>

                    <form action="{{ route('admin.types.update',['type' => $type->slug])  }}" method="POST">
                        
                        @method('PUT')

                        @csrf

                        <label for="title" class="form-label">Nome Modello</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del nuovo modello"
                            maxlength="1024" value="{{$project->title, old('title') }}">
                        @error('thumb')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div>
                            <button type="submit" class="btn btn-success w-100">
                                + Aggiorna
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection