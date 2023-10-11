<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectUpstoreRequest;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('admin.projects.index', ["projects" => $projects]);
    }

    public function show($slug) {
        $project = Project::where("slug", $slug)->firstOrFail();

        return view('admin.projects.show', ["project" => $project]);
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(ProjectUpstoreRequest $request) {
        $data = $request->validated();

        $data["slug"] = $this->generateSlug($data["title"]);

        $data['finished'] = intval($data['finished']);

        $project = Project::create($data);

        return redirect()->route('admin.projects.index');
    }

    public function edit($slug) {
        $project = Project::where("slug", $slug)->first();

        return view('admin.projects.edit', ["project" => $project]);
    }

    public function update(ProjectUpstoreRequest $request, $slug) {
        $data = $request->validated();

        $project = Project::where("slug", $slug)->first();

        if($data['title'] !== $project['title']) {
            $data['slug'] = $this->generateSlug($data['title']);
        }

        $data['finished'] = intval($data['finished']);

        $project->update($data);

        return redirect()->route('admin.projects.show', $project->slug);
    }

    public function destroy($slug) {
        $project = Project::where("slug", $slug)->first();

        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    protected function generateSlug($title) {
        $counter = 0;

        do {
            $slug = str::slug($title . ($counter > 0 ? "-" . $counter : ""));

            $alreadyexist = Project::where("slug", $slug)->first();

            $counter++;
        }while($alreadyexist);

        return $slug;
    }
}
