<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Livewire\Form;
use Mary\Traits\Toast;

class ProjectForm extends Form
{
    use Toast;

    public bool $isEdit = false;

    public ?int $id = null;

    public ?string $title = null;

    public ?string $subtitle = null;

    public $image = null;

    public function rules()
    {
        return [
            'title' => 'required',
            'subtitle' => 'required',
            'image' => $this->isEdit ? 'nullable' : 'required|image',
        ];
    }

    public function save()
    {

        $this->validate();
        Project::updateOrCreate(
            $this->only(['id']),
            $this->only(['title', 'subtitle', 'image'])
        );

        $this->reset();
    }

    public function destroy(Project $project)
    {
        $project->delete();
    }
}
