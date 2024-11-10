<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Computed};
use App\Models\Project;
use App\Livewire\Forms\ProjectForm;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

new class extends Component {
    use WithFileUploads, Toast;

    public ProjectForm $form;

    public bool $modal = false;
    public bool $isEdit = false;

    public function save()
    {
        $this->form->save();
        $this->modal = false;
        $this->success("Data saved");
    }

    public function setProject(int $id)
    {
        $this->form->isEdit = true;

        $project = Project::find($id);

        $this->form->id = $project->id;
        $this->form->title = $project->title;
        $this->form->subtitle = $project->subtitle;
        $this->form->image = $project->image;

    }
    public function delete(Project $id)
    {
        $this->form->destroy($id);
        $this->success("Data deleted !");
    }

    public function updatingModal()
    {
        $this->form->reset();
    }

    #[Computed]
    public function projects()
    {
        return Project::take(6)->get();
    }

    #[Computed]
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#'],
            ['key' => 'image', 'label' => 'Image'],
            ['key' => 'title', 'label' => 'Title'],
            ['key' => 'subtitle', 'label' => 'Subtitle'],
            ['key' => 'actions', 'label' => 'Actions']
        ];
    }

    public function with(): array
    {
        return [
            'headers' => $this->headers(),
            'projects' => $this->projects(),
        ];
    }
}; ?>

<div>
    <x-header title="Projects" subtitle="List of your projects">
        <x-slot:middle class="!justify-end order-2">
            <x-input icon="o-bolt" placeholder="Search..." class="rounded-md" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button wire:click="$toggle('modal')" icon="o-plus" class="rounded-md btn-primary" />
        </x-slot:actions>
    </x-header>
    <x-table :headers="$headers" :rows="$projects">
        @scope('cell_image', $project)
            <div class="w-[100px] h-[50px] overflow-hidden">
                <img src="{{ Storage::url($project->image) }}" alt="" class="object-cover object-center w-full h-full" >
            </div>
        @endscope
        @scope('cell_subtitle', $project)
            <p>{{ str($project->subtitle)->limit(50, preserveWords: true) }}</p>
        @endscope
        @scope('actions', $project)
        <div class="flex gap-3" >
            <x-button icon="o-pencil-square" class="btn-sm btn-circle text-warning" wire:click.stop="$toggle('modal'); $wire.setProject({{ $project->id }})"  />
            <x-button icon="o-trash" class="btn-sm btn-circle text-error" wire:click.stop='delete({{ $project }})'  />
        </div>
        @endscope
    </x-table>

    <x-modal wire:model='modal' class="backdrop-blur-lg">
        <x-form wire:submit='save'>
            <x-input wire:model='form.title' label="Title" />
            <x-textarea wire:model='form.subtitle' label="Subtitle" />
            <x-file wire:model='form.image' label="Image"/>

            <x-button type="submit" label="Save" class="mt-3 bg-primary" spinner="save" />
        </x-form>
    </x-modal>
</div>
