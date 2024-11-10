<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="black">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ Vite::asset('resources/img/profile.jpg') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen font-serif antialiased bg-base-200/50 dark:bg-base-200">
    <x-nav sticky full-width class="bg-transparent backdrop-blur-2xl">
        <x-slot:brand>
            <label for="main-drawer" class="mr-5 lg:hidden">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
            <a wire:navigate class="text-2xl font-bold" href="/">zaiimrq</a>
        </x-slot:brand>
        <x-slot:actions>
            <x-theme-toggle class="btn-small" darkTheme="black" lightTheme="light" />
        </x-slot:actions>
    </x-nav>
    <x-main with-nav full-width>
        @auth
            @if (!request()->routeIs('welcome'))
                <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
                    <x-menu activate-by-route>

                        @if ($user = auth()->user())
                            <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                                class="-mx-2 !-my-2 rounded">
                                <x-slot:actions>
                                    <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logout"
                                        no-wire-navigate link="/logout" />
                                </x-slot:actions>
                            </x-list-item>

                            <x-menu-separator />
                        @endif

                        <x-menu-item title="Dashboard" icon="hugeicons.dashboard-square-02" :link="route('dashboard')" />
                        <x-menu-item title="Projects" icon="hugeicons.task-01" :link="route('project.index')" />
                    </x-menu>
                </x-slot:sidebar>
            @endif
        @endauth

        <x-slot:content @class(['max-w-screen-md' => request()->routeIs('welcome')])>
            {{ $slot }}

            <x-footer :show="request()->routeIs('welcome')" />
        </x-slot:content>

    </x-main>

    @persist('toast')
        <x-toast />
    @endpersist
    @livewireScriptConfig()
</body>

</html>
