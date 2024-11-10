@props(['label', 'native'])
<a {!! when(!isset($native), 'wire:navigate') !!} {{ $attributes->merge(['class' => 'link']) }}>{{ $label }}</a>
