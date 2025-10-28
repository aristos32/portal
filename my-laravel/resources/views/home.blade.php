<x-layout>
    <x-slot:heading>
        {{__('general.Find Users') }}
    </x-slot:heading>

    <x-forms.search />

    <x-customers :customers="$customers" />

</x-layout>
