@extends('layouts.guest')

@section('page-title', $project->title)

@section('main-content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-primary">
                        {{ $project->title }}
                    </h1>

                    <p>
                        {{ $project->content }}
                    </p>
                </div>
            </div>
        </div>
   </div>
@endsection
