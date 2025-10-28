<x-layout>
    <x-slot:heading>
        {{ __('general.Find Customers') }}
    </x-slot:heading>

    <x-customers :customers="$customers" />

    <x-back-button />

</x-layout>
