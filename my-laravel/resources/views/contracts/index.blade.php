<x-layout>
    <x-slot:heading>
        Accounts Page
    </x-slot:heading>

    <h1>{{ __('general.Search Results') }}</h1>

    <!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
-->

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Number</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Balance</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Last Transaction</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Active</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($contracts as $contract)
                <tr>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $contract->number }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $contract->name }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $contract->balance }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $contract->last_transaction_at }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $contract->active }}</td>
                    <td class="whitespace-nowrap px-4 py-2">
                        <a href="#"
                            class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


</x-layout>