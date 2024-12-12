<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'contact_person' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive'
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier created successfully.');
    }

    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,'.$supplier->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'contact_person' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive'
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier deleted successfully.');
    }
}