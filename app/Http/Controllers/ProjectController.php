<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'status' => 'required|in:pendiente,en curso,completado',
        ]);

        $request->user()->ownedProjects()->create($validated);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
