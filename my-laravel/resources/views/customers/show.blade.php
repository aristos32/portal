<x-layout>
    <x-slot:heading>
        {{ __('general.Find Customers') }}
    </x-slot:heading>

    <x-customer-info :customer="$customer" />

    <x-customer-contracts :contracts="$contracts" />

</x-layout>
