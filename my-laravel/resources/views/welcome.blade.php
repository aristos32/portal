<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <div class="space-y-10">
        <section class="text-center  ">
            <h1 class="font-bold text-4xl">Find your Next Job</h1>

            <form method="POST" action="/search" class="mt-6">
                <input type="text" placeholder="Web Developer..."
                    class="rounded-xl bg-white/5 border-white/10 px-5 py-4 w-full max-w-l">
            </form>
        </section>
        <section class="pt-10">
            <x-section-heading>Latest Jobs</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-4 mt-6">
                <x-job-card />
                <x-job-card />
                <x-job-card />
            </div>

        </section>

        <section>
            <x-section-heading>Hottest Jobs</x-section-heading>

            <div class="mt-6 space-y-6">
                <x-job-card-wide />
                <x-job-card-wide />
                <x-job-card-wide />
            </div>
        </section>

        <section>
            <x-section-heading>Featured Employers</x-section-heading>

            <div class="mt-6 space-x-1">
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
                <x-tag>Tag</x-tag>
            </div>

        </section>

        <section>
            <x-section-heading>About Us</x-section-heading>
        </section>
    </div>
</x-layout>
