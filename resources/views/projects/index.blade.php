@extends('layouts.guest')

@section('page-title', 'Nostri progetti')

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h1 class="text-center text-primary">
                    Nostri progetti!
                </h1>

                
                    
               @foreach ($projects as $project)
                    <div class="col-12 col-xs-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4>
                                    {{ $project->title }}
                                </h4>

                                <a href="{{ route('projects.show', ['project'=>$project->slug]) }}" class="btn btn-primary">
                                    Leggi
                                </a>
                            </div>
                        </div>
                    </div>
               @endforeach
            
        </div>
    </div>
@endsection
