@props([
    'job'
])
<x-panel class="flex gap-2.5 bg-white/5 p-3">
    <section>
        <div>
            <img alt="" class="h-[88px] w-[88px] border bg-white/40" src="" />
        </div>
    </section>
    <section class="flex-grow">
        <div class="flex justify-between">
            <small>{{ $job->employer->name }}</small>
            <div>
                <x-tag size='sm' tag="tag" />
            </div>
        </div>
        <div class="mb-6">
            <h3 class="text-2xl font-normal group-hover:text-blue-600">{{ $job->title }}</h3>
        </div>
        <div class="flex justify-between">
            <small>{{ $job->schedule }} - From {{ $job->salary }}</small>
            <div>
                @foreach ($job->tags as $tag)
                    <x-tag size='sm' :tag="$tag->name" />
                @endforeach
            </div>
        </div>
    </section>
</x-panel>
