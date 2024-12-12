@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Suppliers</h2>
    
    <a href="{{ route('suppliers.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Add New Supplier
    </a>

    @if($suppliers->count() > 0)
        <table class="w-full bg-white">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Phone</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr class="border-b">
                    <td class="p-3">{{ $supplier->name }}</td>
                    <td class="p-3">{{ $supplier->email }}</td>
                    <td class="p-3">{{ $supplier->phone }}</td>
                    <td class="p-3">
                        <a href="{{ route('suppliers.edit', $supplier) }}" class="text-blue-500 mr-2">Edit</a>
                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $suppliers->links() }}
    @else
        <p class="text-gray-600">No suppliers found.</p>
    @endif
</div>
@endsection