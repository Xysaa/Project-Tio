@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Transactions</h2>

    <a href="{{ route('transactions.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Add New Transaction
    </a>

    @if($transactions->count() > 0)
        <table class="w-full bg-white">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Item</th>
                    <th class="p-3 text-left">Type</th>
                    <th class="p-3 text-left">Quantity</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="border-b">
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $transaction->item->name }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 text-white rounded
                                {{ $transaction->type === 'in' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ ucfirst($transaction->type) }}
                            </span>
                        </td>
                        <td class="p-3">{{ $transaction->quantity }}</td>
                        <td class="p-3">{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                        <td class="p-3">
                            <a href="{{ route('transactions.edit', $transaction) }}" class="text-blue-500 mr-2">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $transactions->links() }}
        </div>
    @else
        <p class="text-gray-600">No transactions found.</p>
    @endif
</div>
@endsection
