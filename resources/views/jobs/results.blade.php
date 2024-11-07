<x-layout>
    <x-forms.form action="/search">
        <input
            name="q"
            class="inline-block w-full rounded-xl border border-white/40 bg-white/5 px-4 py-2.5 text-lg outline-none"
            placeholder="Im looking for..." type="search" :value="request('q')" />
    </x-forms.form>
    <div class="mt-6 space-y-3">
        @foreach ($jobs as $job)
            <x-job-card-wide :$job />
        @endforeach
    </div>
</x-layout>
