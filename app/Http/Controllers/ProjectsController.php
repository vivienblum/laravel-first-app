<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {

        Project::create(request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
        ]));

        session()->flash('message-content', 'Project has been created');
        session()->flash('message-type', 'primary');

        return redirect('/projects');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project)
    {
        $project->update(request(['title', 'description']));

        session()->flash('message-content', 'Project has been edited');
        session()->flash('message-type', 'info');

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        session()->flash('message-content', 'Project has been deleted');
        session()->flash('message-type', 'warning');

        return redirect('/projects');
    }
}
