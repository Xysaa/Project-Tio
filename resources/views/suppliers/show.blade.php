@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Supplier Details</h2>
    
    <div class="space-y-4">
        <div>
            <strong class="text-gray-700">Name:</strong>
            <p class="text-gray-900">{{ $supplier->name }}</p>
        </div>

        <div>
            <strong class="text-gray-700">Email:</strong>
            <p class="text-gray-900">{{ $supplier->email }}</p>
        </div>

        <div>
            <strong class="text-gray-700">Phone:</strong>
            <p class="text-gray-900">{{ $supplier->phone ?? 'N/A' }}</p>
        </div>

        <div>
            <strong class="text-gray-700">Address:</strong>
            <p class="text-gray-900">{{ $supplier->address ?? 'N/A' }}</p>
        </div>

        <div>
            <strong class="text-gray-700">Contact Person:</strong>
            <p class="text-gray-900">{{ $supplier->contact_person ?? 'N/A' }}</p>
        </div>

        <div>
            <strong class="text-gray-700">Status:</strong>
            <span class="px-2 py-1 rounded {{ $supplier->status == 'active' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                {{ ucfirst($supplier->status) }}
            </span>
        </div>

        <div class="pt-4">
            <a 
                href="{{ route('suppliers.edit', $supplier) }}" 
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2"
            >
                Edit Supplier
            </a>
            <a 
                href="{{ route('suppliers.index') }}" 
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded"
            >
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection