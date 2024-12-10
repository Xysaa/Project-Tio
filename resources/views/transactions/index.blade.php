<x-app-layout>
    <div class="max-w-7xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Transactions</h1>
        <a href="{{ route('transactions.create') }}" class="px-4 py-2 bg-blue-500 text-white mb-4 inline-block">Add Transaction</a>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Item</th>
                    <th class="border border-gray-300 px-4 py-2">Type</th>
                    <th class="border border-gray-300 px-4 py-2">Quantity</th>
                    <th class="border border-gray-300 px-4 py-2">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaction->item->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span class="px-2 py-1 text-white rounded
                                {{ $transaction->type === 'in' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ ucfirst($transaction->type) }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaction->quantity }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $transactions->links() }}
        </div>
        
    </div>
</x-app-layout>
