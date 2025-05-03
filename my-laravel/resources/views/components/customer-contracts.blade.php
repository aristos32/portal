@props(['contracts'])


<section class="mt-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Customer Contracts') }}
        </h2>
    </header>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Number</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Balance</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">End</th>
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
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $contract->expiry_date }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $contract->status }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-right">
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

</section>