@extends('layouts.app')

@section('page-title', 'Tutti i progetti')

@section('main-content')
    <section id="index-admin">
        
        <div id="add">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-warning mb-3">
                Aggiungi
            </a>
        </div>

        <div class="row">
            @foreach ($project as $project)
                <div class="col-12 col-xs-6 col-sm-4 col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">
                                {{ $project->title }}
                            </h3>

                            <p>
                                {{ $project->content }}
                            </p>

                            <div class="d-flex flex-column">
                                <div>
                                    @if ($project->type != null)
                                    <div class="btn btn-light mb-3">
                                        <a href="{{ route('types.show', ['type'=>$project->type->slug]) }}">
                                            {{ $project->type->title }}
                                        </a>
                                    </div>                                    
                                    @endif
                                </div>

                                <div>
                                    @forelse ($project->tags as $tag)
                                    <a href="{{ route('admin.tags.show', ['tag' => $tag->slug]) }}" class="badge rounded-pill text-bg-info mb-3">
                                        {{ $tag->title }}
                                    </a>                               
                                        
                                    @empty 
                                        <span class="badge rounded-pill text-bg-info mb-3">
                                            -
                                        </span>
                                    @endif
                                </div>
                             
                            </div>
                            
                            <div class="edit-buttons-container d-flex justify-content-between">

                                <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}" class="btn btn-primary">
                                    Mostra
                                </a>

                                <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" class="edit-button mb-2">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form
                                onsubmit="return confirm('Sicuro di voler eliminare questo elemento ? ...')"
                                action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
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