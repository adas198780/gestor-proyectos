<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
    {
        $projects = Project::with('owner')->latest()->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->user()->ownedProjects()->create($this->validateProject($request));

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
public function show(Project $project)
{
    $project->load('owner', 'participants');

    $availableUsers = User::where('id', '!=', $project->user_id)
        ->whereNotIn('id', $project->participants->pluck('id'))
        ->orderBy('name')
        ->get();

    return view('projects.show', compact('project', 'availableUsers'));
}

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($this->validateProject($request));

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }

    private function validateProject(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'status' => 'required|in:pendiente,en curso,completado',
        ]);
    }
}
