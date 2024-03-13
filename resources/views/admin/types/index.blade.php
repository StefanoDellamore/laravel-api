@extends('layouts.app')

@section('page-title', 'Tutti i modelli')

@section('main-content')
    <section id="index-admin">
        
        <div id="add">
            <a href="{{ route('admin.types.create') }}" class="btn btn-warning mb-3">
                Aggiungi
            </a>
        </div>

        <div class="row">
            @foreach ($types as $singleType)
                <div class="col-12 col-xs-6 col-sm-4 col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">
                                {{ $singleType->title }}
                            </h3>

                            <div class="edit-buttons-container d-flex justify-content-between">

                                <a href="{{ route('admin.types.show', ['type' => $singleType->slug]) }}" class="btn btn-primary">
                                    Mostra
                                </a>

                                <form
                                onsubmit="return confirm('Sicuro di voler eliminare questo elemento ? ...')"
                                action="{{ route('admin.types.destroy', ['type' => $singleType->slug]) }}"
                                method="POST"
                                class="d-inline-block">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                                
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection