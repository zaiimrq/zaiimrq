<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen font-serif antialiased bg-base-200/50 dark:bg-base-200">
    <x-nav sticky full-width class="bg-transparent backdrop-blur-2xl">
        <x-slot:brand>
            <div class="text-2xl font-bold">zaiimrq</div>
        </x-slot:brand>
        <x-slot:actions>
            <x-theme-toggle class="btn-small" darkTheme="black" lightTheme="light" />
        </x-slot:actions>
    </x-nav>
    <x-main with-nav full-width>
        <x-slot:content class="max-w-screen-md">
            {{ $slot }}
            <footer class="flex justify-between p-5 mt-10" >
                <div class="flex items-center gap-2" >
                    <span>&copy; 2024</span>
                    <span class="font-bold" >zaiimrq</span>
                    <span>All rights reserved</span>
                </div>
                <a href="" class="link" >Terms & Conditions</a>
            </footer>
        </x-slot:content>

    </x-main>

    @persist('toast')
        <x-toast />
    @endpersist
    @livewireScriptConfig()
</body>

</html>
