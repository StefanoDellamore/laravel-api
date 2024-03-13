@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-primary">
                        {{ $project->title }}
                    </h1>

                    <h2>
                        Modello:
                        <a href="{{ route('types.show', ['type'=>$project->type->slug]) }}">
                            {{ $project->type->title }}
                        </a>
                    </h2>
                    
                    <p>
                        {{ $project->content }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
