@props(['show' => true])

@if ($show)
    <footer class="flex flex-col items-center justify-center mt-10 text-sm md:gap-2 md:justify-between md:text-md sm:flex-row">
        <div class="flex items-center gap-2">
            <span>&copy; 2024</span>
            <x-link href="https://instagram.com/zaiimrq" label="zaiimrq" class="font-bold" target="_blank" native />
            <span>All rights reserved</span>
        </div>
        <x-link label="Terms & Conditions" class="hidden sm:block" />
    </footer>
@endif
