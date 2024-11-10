<x-layouts.app>
    @slot('title', 'Welcome')
    <div class="min-h-dvh " >
        <div class="mt-5 mb-10">
            <h1 class="text-3xl font-bold">Yoo, welcome 👋</h1>
            <p class="text-sm leading-relaxed md:text-lg text-pretty">"Explore my projects and see the work I’ve built."</p>
        </div>

        <div class="grid gap-3 sm:grid-cols-2 md:grid-cols-3">
            @forelse($projects as $project)
                <x-card class="shadow">
                    <x-slot:figure class="aspect-video">
                        <livewire:lazy.image :src="Storage::url($project->image)">
                    </x-slot:figure>
                    <x-slot:title>
                        <livewire:lazy.text :label="$project->title" class="text-lg">
                    </x-slot:title>
                    <x-slot:subtitle>
                        <livewire:lazy.text :label="$project->subtitle" class="text-md">
                    </x-slot:subtitle>
                    <x-slot:actions>
                        <x-button icon="fas.link" class="btn-circle btn-xs" />
                        <x-button icon="fab.github" class="btn-circle btn-xs" />
                    </x-slot:actions>
                </x-card>
            @empty
            <div class="text-center col-span-full" >
                <x-icon name="o-cube" label="Empty" class="w-6 h-6 animate-bounce" />
            </div>
            @endforelse
        </div>

        @if ($projects->count() == 6)
            <div class="flex justify-center mt-5">
                <x-button icon-right="s-arrow-right-circle" label="View More" class="rounded-full btn-sm animate-bounce" />
            </div>
        @endif
    </div>
</x-layouts.app>
