@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Transaction</h2>

    <form action="{{ route('transactions.update', $transaction) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="item_id" class="block text-gray-700">Item</label>
            <select name="item_id" id="item_id" class="w-full p-2 border rounded">
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $transaction->item_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-gray-700">Type</label>
            <select name="type" id="type" class="w-full p-2 border rounded">
                <option value="in" {{ $transaction->type == 'in' ? 'selected' : '' }}>In</option>
                <option value="out" {{ $transaction->type == 'out' ? 'selected' : '' }}>Out</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="w-full p-2 border rounded" value="{{ $transaction->quantity }}">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
