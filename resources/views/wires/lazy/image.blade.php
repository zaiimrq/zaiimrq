<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Lazy, Computed};

new
#[Lazy]
class extends Component {
    public string $src = "";
    public string $alt = "";
    public string $lazyClass = "";

    public function mount(string $lazyClass = "")
    {
        $this->lazyClass .= " " . $lazyClass;
    }

    #[Computed]
    public function placeholder()
    {
        return <<<HTML
        <div class="skeleton w-full h-32 {$this->lazyClass}"></div>
        HTML;
    }
}; ?>

<div>
    <img src="{{ $src }}" alt="{{ $alt }}" loading="lazy">
</div>
