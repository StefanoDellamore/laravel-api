@extends('layouts.app')

@section('page-title', 'Tutti i Tag')

@section('main-content')
    <section id="index-admin">
        
        <div id="add">
            <a href="{{ route('admin.tags.create') }}" class="btn btn-warning mb-3">
                Aggiungi
            </a>
        </div>

        <div class="row">
            @foreach ($tags as $singleTag)
                <div class="col-12 col-xs-6 col-sm-4 col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">
                                {{ $singleTag->title }}
                            </h3>

                            <div class="edit-buttons-container d-flex justify-content-between">

                                <a href="{{ route('admin.tags.show', ['tag' => $singleTag->slug]) }}" class="btn btn-primary">
                                    Mostra
                                </a>

                                <form
                                onsubmit="return confirm('Sicuro di voler eliminare questo elemento ? ...')"
                                action="{{ route('admin.tags.destroy', ['tag' => $singleTag->slug]) }}"
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