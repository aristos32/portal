<x-layout>
    <x-slot:heading>
        {{ __('general.Dashboard') }}
    </x-slot:heading>

    <div class="p-6 max-w-7xl mx-auto space-y-8">
        <!-- Welcome Box -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-md rounded-2xl p-6">
            <h2 class="text-3xl font-semibold">Welcome, {{ Auth::user()->first_name }} 👋</h2>
            <p class="text-white/80 mt-2 text-lg">Here’s what’s happening today.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Recently Created Customers -->
            <div class="bg-white shadow-lg rounded-2xl p-5 transition hover:shadow-xl">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M8 9a3 3 0 100-6 3 3 0 000 6zm4.5 2h-9A2.5 2.5 0 001 13.5v.5A2.5 2.5 0 003.5 16h9a2.5 2.5 0 002.5-2.5v-.5A2.5 2.5 0 0012.5 11z" />
                    </svg>
                    Recently Created Customers
                </h3>

                <x-customers.list :customers="$recentlyCreatedCustomers" />

            </div>

            <!-- Recently Updated Customers -->
            <div class="bg-white shadow-lg rounded-2xl p-5 transition hover:shadow-xl">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M8 9a3 3 0 100-6 3 3 0 000 6zm4.5 2h-9A2.5 2.5 0 001 13.5v.5A2.5 2.5 0 003.5 16h9a2.5 2.5 0 002.5-2.5v-.5A2.5 2.5 0 0012.5 11z" />
                    </svg>
                    Recently Updated Customers
                </h3>

                <x-customers.list :customers="$recentlyUpdatedCustomers" />

            </div>

            <!-- Recently Created Contracts -->
            <div class="bg-white shadow-lg rounded-2xl p-5 transition hover:shadow-xl">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M17.414 2.586A2 2 0 0016 2H4a2 2 0 00-2 2v12a2 2 0 002 2h8l6-6V4a2 2 0 00-.586-1.414zM14 14.5V10a1 1 0 011-1h4.5L14 14.5z" />
                    </svg>
                    Recently Created Contracts
                </h3>
                <ul class="divide-y divide-gray-200">
                    @forelse($recentlyCreatedContracts as $contract)
                    <li class="py-3">
                        <div class="font-medium text-gray-900">{{ $contract->number ?? 'Untitled Contract' }}</div>
                        <div class="text-sm text-gray-500">Created {{ $contract->created_at->diffForHumans() }}</div>
                    </li>
                    @empty
                    <li class="py-3 text-gray-500 italic">No contracts created recently.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-layout>