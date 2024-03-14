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

                    <div>
                        <h2>Modello:</h2>
                        <a href="{{ route('types.show', ['type'=>$project->type->slug]) }}">
                            {{ $project->type->title }}
                        </a>
                    </div>

                    <div>
                        @foreach ($tags->projects as $project) 
                        <li>
                           <a href="{{ route('admin.tags.show', ['tag' => $tag->slug]) }}">
                                {{ $project->title }}
                           </a>
                        </li>
                    @endforeach
                </ul>
                    </div>
                    


                    
                    <p>
                        {{ $project->content }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
