<x-layout>
    <x-slot:heading>
        {{ __('general.Find Users') }}
    </x-slot:heading>

    <!-- Display users -->
    @if(isset($users) && count($users) > 0)
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
                    @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->identity_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->address }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-nav-link :href="'/users/'.$user->id" type='anchor'>View</x-nav-link>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <p class="text-gray-500">No users found.</p>
    @endif

    <x-back-button />

</x-layout>