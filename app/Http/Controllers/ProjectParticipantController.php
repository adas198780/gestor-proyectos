<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectParticipantController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string|max:50',
        ]);

        $project->participants()->syncWithoutDetaching([
            $validated['user_id'] => ['role' => $validated['role']],
        ]);

        return redirect()->route('projects.show', $project);
    }

    public function update(Request $request, Project $project, User $participant)
    {
        $validated = $request->validate([
            'role' => 'required|string|max:50',
            'contribution_hours' => 'required|integer|min:0',
        ]);

        $project->participants()->updateExistingPivot($participant->id, $validated);

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project, User $participant)
    {
        $project->participants()->detach($participant->id);

        return redirect()->route('projects.show', $project);
    }
}