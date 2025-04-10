<x-layout>
    <x-slot:heading>
        {{ __('general.Addresses') }}
    </x-slot:heading>

    <!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
-->

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ __('address.Type') }}</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ __('address.Street') }}</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ __('address.City') }}</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ __('address.State') }}</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ __('address.Area Code') }}</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ __('address.Country') }}</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($addresses as $address)
                <tr>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $address->type }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $address->street }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $address->city }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $address->state }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $address->area_code }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $address->country }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


</x-layout>