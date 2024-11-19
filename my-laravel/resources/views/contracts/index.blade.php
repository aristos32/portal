<x-layout>
    <x-slot:heading>
        Accounts Page
    </x-slot:heading>

    <h1>All Accounts</h1>

    <div class="space-y-4">
        <!-- present contracts in a table -->
              
        <table class="table-auto">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Balance</th>
                    <th>Last Transaction</th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contracts as $contract)
                    <tr>
                        <td>{{ $contract->number }}</td>
                        <td>{{ $contract->name }}</td>
                        <td>{{ $contract->balance }}</td>
                        <td>{{ $contract->last_transaction_at }}</td>
                        <td>{{ $contract->active }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>    

        <!-- Pagination -->
        <div>
        </div>
    </div>
</x-layout>