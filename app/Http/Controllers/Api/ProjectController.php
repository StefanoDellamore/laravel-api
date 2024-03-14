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
        $projects = Project::all();

        return response()->json([
            'code'=> true,
            'results'=> $projects,
        ]);
    }
}
