@extends('layouts.app')

@section('page-title', $type->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-primary">
                        {{ $type->title }}
                    </h1>        
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center text-primary">
                        Tutti i modelli associati ai progetti
                    </h2>

                    <ul>
                        @foreach ($type->projects as $project) 
                            <li>
                               <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">
                                    {{ $project->title }}
                               </a>
                            </li>
                        @endforeach
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
