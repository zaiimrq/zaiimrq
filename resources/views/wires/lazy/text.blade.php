<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Lazy, Computed};

new

#[Lazy]
class extends Component {
    public string $label = "";
    public string $class = "";
    public string $lazyClass = "";

    #[Computed]
    public function placeholder()
    {
        return <<<HTML
            <div class="skeleton w-full h-4 {$this->lazyClass}" ></div>
        HTML;
    }
}; ?>

<div>
    <div class="{{ $class }}" >{{ $label }}</div>
</div>
