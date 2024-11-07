<x-layout>
    <div class="space-y-10">
        <section>
            <div class="m-auto space-y-9 text-center md:w-5/12">
                <h1 class="text-4xl font-semibold">Let us find your next Job</h1>
                <x-forms.form action="/search">
                    <input
                        name="q"
                        class="inline-block w-full rounded-xl border border-white/40 bg-white/5 px-4 py-2.5 text-lg outline-none"
                        placeholder="Im looking for..." type="search" />
                </x-forms.form>
            </div>
        </section>
        <section>
            <x-section-heading class="mb-6">Featured Jobs</x-section-heading>
            <div class="grid gap-4 md:grid-cols-3">
                @foreach ($featuredJobs as $job)
                    <x-job-card :$job />
                @endforeach
            </div>
        </section>
        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-3 space-x-1.5">
                @foreach ($tags as $tag)
                    <x-tag :tag="$tag->name" />
                @endforeach
            </div>
        </section>
        <section>
            <x-section-heading>Resent Jobs</x-section-heading>

            <div class="mt-6 space-y-3">
                @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
