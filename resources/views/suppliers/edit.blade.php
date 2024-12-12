@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Supplier</h2>
    
    <form action="{{ route('suppliers.update', $supplier) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name" class="block text-gray-700 font-bold mb-2">Name *</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                value="{{ old('name', $supplier->name) }}" 
                class="w-full px-3 py-2 border rounded-lg @error('name') border-red-500 @enderror"
                required
            >
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-gray-700 font-bold mb-2">Email *</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                value="{{ old('email', $supplier->email) }}" 
                class="w-full px-3 py-2 border rounded-lg @error('email') border-red-500 @enderror"
                required
            >
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
            <input 
                type="text" 
                name="phone" 
                id="phone" 
                value="{{ old('phone', $supplier->phone) }}" 
                class="w-full px-3 py-2 border rounded-lg @error('phone') border-red-500 @enderror"
            >
            @error('phone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
            <textarea 
                name="address" 
                id="address" 
                class="w-full px-3 py-2 border rounded-lg @error('address') border-red-500 @enderror"
            >{{ old('address', $supplier->address) }}</textarea>
            @error('address')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="contact_person" class="block text-gray-700 font-bold mb-2">Contact Person</label>
            <input 
                type="text" 
                name="contact_person" 
                id="contact_person" 
                value="{{ old('contact_person', $supplier->contact_person) }}" 
                class="w-full px-3 py-2 border rounded-lg @error('contact_person') border-red-500 @enderror"
            >
            @error('contact_person')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
            <select 
                name="status" 
                id="status" 
                class="w-full px-3 py-2 border rounded-lg @error('status') border-red-500 @enderror"
            >
                <option value="active" {{ old('status', $supplier->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $supplier->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-4">
            <button 
                type="submit" 
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
            >
                Update Supplier
            </button>
            <a 
                href="{{ route('suppliers.index') }}" 
                class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection