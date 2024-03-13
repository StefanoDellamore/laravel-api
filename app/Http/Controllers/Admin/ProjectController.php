<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Form Request
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

//Models
use App\Models\Project;
use App\Models\Type;

//Helpers
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();
        return view('admin.projects.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $projectData = $request->validated();

        $projectData['slug'] = Str::slug($projectData['title']);

        $project = Project::create($projectData);

        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $slug)
    {
        $projectData = $request->validated();

        $project = Project::where('slug', $slug)->firstOrFail();

        $projectData['slug'] = Str::slug($projectData['title']);

        $project->update($projectData);

        return redirect()->route('admin.projects.show',['project'=>$project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $project->delete();

        return redirect() -> route('admin.projects.index');
    }
}
