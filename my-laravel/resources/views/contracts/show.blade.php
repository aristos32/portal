<x-layout>
    <x-slot:heading>
        {{ __('Contract Details') }}
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{$contract->name}}</h2>

    <p>
        This contract is for {{ $contract->customer->name }}
    </p>
</x-layout>
