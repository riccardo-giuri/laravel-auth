<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('admin.projects.index', compact($projects));
    }

    public function show($id) {
        $project = Project::findorFail($id);

        return view('admin.projects.show', compact($project));
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => "required|max:255",
            'description' => "required",
            'imageURL' => "required",
            'slug' => "required|max:255"
        ]);

        $project = Project::create($data);

        return redirect()->route('admin.profile.show');
    }
}
