<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function creating(Project $project): void
    {
        $project->image = Storage::disk('public')->put('projects', $project->image);
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updating(Project $project): void
    {
        if ($project->isDirty('image')) {
            Storage::disk('public')->delete($project->getOriginal('image'));
            $project->image = Storage::disk('public')->put('projects', $project->image);
        }
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $project): void
    {
        Storage::disk('public')->delete($project->image);
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        //
    }
}
