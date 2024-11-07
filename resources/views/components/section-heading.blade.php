<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-1.5 font-bold text-lg']) }}>
    <span class="bg-white h-2 w-2 inline-block"></span>
    <h3>{{ $slot }}</h3>
</div>
