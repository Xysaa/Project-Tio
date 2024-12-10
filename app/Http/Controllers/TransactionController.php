<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('item')->latest()->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = \App\Models\Item::all();
        return view('transactions.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
        ]);

        $transaction = new \App\Models\Transaction($request->all());
        $transaction->save();

        // Update stok barang
        $item = \App\Models\Item::find($request->item_id);
        if ($request->type === 'in') {
            $item->stock += $request->quantity;
        } elseif ($request->type === 'out') {
            if ($item->stock < $request->quantity) {
                return redirect()->back()->with('error', 'Stock is not sufficient for this transaction.');
            }
            $item->stock -= $request->quantity;
        }
        $item->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction successfully recorded.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
