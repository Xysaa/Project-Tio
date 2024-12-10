<x-app-layout>
    <div class="max-w-7xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Add Item</h1>
        <form method="POST" action="{{ route('items.store') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" id="name" name="name" class="block w-full mt-1">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea id="description" name="description" class="block w-full mt-1"></textarea>
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-sm font-medium">Stock</label>
                <input type="number" id="stock" name="stock" value="0" class="block w-full mt-1">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white">Save</button>
        </form>
    </div>
</x-app-layout>
