<x-layout>
    <x-slot:heading>
        {{ __('general.Customer Details') }}
    </x-slot:heading>

    <x-customer-info :customer="$customer" />

    <x-customer-contracts :contracts="$contracts" />

</x-layout>
