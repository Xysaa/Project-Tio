<x-app-layout>
    <div class="max-w-7xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Add Transaction</h1>
        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf
            <div class="mb-4">
                <label for="item_id" class="block text-sm font-medium">Item</label>
                <select id="item_id" name="item_id" class="block w-full mt-1 border border-gray-300 rounded">
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium">Transaction Type</label>
                <select id="type" name="type" class="block w-full mt-1 border border-gray-300 rounded">
                    <option value="in">In (Add Stock)</option>
                    <option value="out">Out (Reduce Stock)</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="block w-full mt-1 border border-gray-300 rounded" min="1" value="1">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
        </form>
    </div>
</x-app-layout>
