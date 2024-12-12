<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <div class="space-y-10">
        <section>
            <x-section-heading>Latest Jobs</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-4 mt-6">
                <x-job-card />
                <x-job-card />
                <x-job-card />
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