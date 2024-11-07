@props([
    'size' => 'base',
    'tag' => ''
])

@php
    $classes = 'font-medium inline-block rounded-full bg-white/10 transition hover:bg-white/20 ';
    if($size == 'sm') {
        $classes .= 'p-1 px-2 text-xs';
    }
    else {
        $classes .= 'py-1 px-3 text-sm';
    }
@endphp

<a href="/tags/{{ strtolower($tag) }}"
    {{ $attributes(['class' => $classes]) }}
    >{{ $tag }}</a
>
