<x-layouts.app>
    @slot('title', 'Welcome')
    <div class="mt-5 mb-10">
        <h1 class="text-3xl font-bold">Yoo, welcome 👋</h1>
        <p class="text-lg leading-relaxed text-pretty">"Explore my projects and see the work I’ve built."</p>
    </div>

    <div class="grid grid-cols-3 gap-3">
        @for ($i = 1; $i <= 6; $i++)
            <x-card class="shadow">
                <x-slot:figure class="flex-col gap-2">
                    <livewire:lazy.image src="https://picsum.photos/500/300" >
                </x-slot:figure>
                <x-slot:title class="text-lg">
                    <livewire:lazy.text text="Inventory gudang">
                </x-slot:title>
                <x-slot:subtitle class="text-md">
                    <livewire:lazy.text label="Aplikasi manajemen barang berbasis desktop" >
                </x-slot:subtitle>
                <x-slot:actions>
                    <x-button icon="fas.link" class="btn-circle btn-xs" />
                    <x-button icon="fab.github" class="btn-circle btn-xs" />
                </x-slot:actions>
            </x-card>
        @endfor
    </div>
    <div class="flex justify-center mt-5">
        <x-button icon-right="s-arrow-right-circle" label="View More" class="rounded-full btn-sm animate-bounce" />
    </div>
</x-layouts.app>
