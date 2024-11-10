@props(['show' => true])

@if ($show)
    <footer class="flex flex-col items-center justify-center mt-10 text-sm md:gap-2 md:justify-between md:text-md sm:flex-row">
        <div class="flex items-center gap-2">
            <span>&copy; 2024</span>
            <span class="font-bold">zaiimrq</span>
            <span>All rights reserved</span>
        </div>
        <a href="" class="link">Terms & Conditions</a>
    </footer>
@endif
