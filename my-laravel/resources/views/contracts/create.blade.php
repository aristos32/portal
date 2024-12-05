<x-layout>
    <x-slot:heading>
        New contract
    </x-slot:heading>

    <form method="POST" action="/contract">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a new contract</h2>
                <p class="mt-1 text-sm/6 text-gray-600">We just need a handfull of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-test.form-field>
                        <x-test.form-label for="title"> Number </x-test.form-label>
                        <div class="mt-2">
                            <x-test.form-input type="text" name="number" id="number" placeholder="HIC-123" required />
                            <x-test.form-error name="number" />
                        </div>
                    </x-test.form-field>

                    <x-test.form-field>
                        <x-test.form-label for="title"> Description </x-test.form-label>
                        <div class="mt-2">
                            <x-test.form-input type="text" name="description" id="description"
                                placeholder="Brief description" required />
                            <x-test.form-error name="description" />
                        </div>
                    </x-test.form-field>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <x-test.form-button>Save</x-test.button>
            </div>
    </form>

</x-layout>