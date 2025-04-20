<x-layout>
    <x-slot:heading>
        {{__('general.Find Users') }}
    </x-slot:heading>

    <h1>{{ $customer->name }}</h1>
    <p>Email: {{ $customer->email }}</p>
    <p>Phone: {{ $customer->phone }}</p>


</x-layout>