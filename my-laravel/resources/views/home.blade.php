<x-layout>
    <x-slot:heading>
        {{__('general.Find Users') }}
    </x-slot:heading>

    <x-forms.search />

    @include('customers.customers', ['customers' => $customers])

</x-layout>
