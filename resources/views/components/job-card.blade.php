@props(['job'])
<x-panel class="flex flex-col rounded-xl bg-white/5 p-4 text-center font-medium">
    <div class="text-left text-sm">{{ $job->employer->name }}</div>
    <div class="p-8">
        <h3 class="group-hover:text-blue-600 text-xl font-bold">{{ $job->title }}</h3>
        <p class="text-sm mt-4">{{ $job->schedule }} - From {{ $job->salary }} </p>
    </div>
    <div class="flex items-center justify-between">
        <div>
            @foreach ($job->tags as $tag )
            <x-tag :tag="$tag->name" size='sm' />
            @endforeach
        </div>
        <img alt="" class="h-[43px] w-[43px] bg-gray-600" src="{{ $job->url }}" />
    </div>
</x-panel>
