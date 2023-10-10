<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('admin.projects.index', ["projects" => $projects]);
    }

    public function show($slug) {
        $project = Project::where("slug", $slug)->first();

        return view('admin.projects.show', ["project" => $project]);
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => "required|max:255",
            'description' => "required",
            'imageURL' => "required",
        ]);

        $counter = 0;

        do {
            $slug = str::slug($data["title"] . ($counter > 0 ? "-" . $counter : ""));

            $alreadyexist = Project::where("slug", $slug)->first();

            $counter++;
        }while($alreadyexist);

        $data["slug"] = $slug;

        $project = Project::create($data);

        return redirect()->route('admin.projects.index');
    }
}
