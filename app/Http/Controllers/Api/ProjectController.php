<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Project;

class ProjectController extends Controller
{
    public function index ()
    {
        $projects = Project::paginate(2);

        return response()->json([
            'code'=> true,
            'results'=> $projects,
        ]);
    }

    public function show (string $slug)
    {
        $projects = Project::where('slug', $slug)->firstOrFail();

        return response()->json([
            'code'=> true,
            'results'=> $projects,
        ]);
    }
}
