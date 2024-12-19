<x-layout>
    <x-slot:heading>
        Adresses Page
    </x-slot:heading>

    <h1>All Addresses</h1>

    <!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
-->

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Type</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Street</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">City</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">State</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Area Code</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Country</th>
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