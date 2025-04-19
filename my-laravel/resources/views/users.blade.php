<x-layout>
    <x-slot:heading>
        {{ __('general.Find Customers') }}
    </x-slot:heading>

    <!-- Display users -->
    @if(isset($customers) && count($customers) > 0)
    <div class="overflow-hidden shadow sm:rounded-md">
        <div class="overflow-hidden shadow sm:rounded-md">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{
                            __('general.Name') }}</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{
                            __('general.State Id') }}</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{
                            __('general.Address') }}</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{
                            __('general.Email') }}</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{
                            __('general.Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($customers as $customer)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $customer->first_name }} {{ $customer->last_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $customer->identity_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$customer->getFirstAddress()}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $customer->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap"></td>
                        <x-nav-link :href="'/users/'.$customer->id" type='anchor'>View</x-nav-link>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <p class="text-gray-500">No customers found.</p>
    @endif

    <x-back-button />

</x-layout>