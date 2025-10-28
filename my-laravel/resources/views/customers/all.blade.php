<x-layout>
    <x-slot:heading>
        {{ __('general.Find Customers') }}
    </x-slot:heading>

    @include('customers.customers', ['customers' => $customers])

    <x-back-button />

</x-layout>
