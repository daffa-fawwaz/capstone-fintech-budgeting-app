<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['message' => 'Get all transactions success.', 'transactions' => Transaction::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), ['amount' => 'required', 'type' => 'required', 'description' => 'string']);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $transaction = Transaction::create(array_merge($request->all(), ['user_id' => 1]));

        return response()->json(['message' => 'Create transaction success.', 'transaction' => $transaction]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return response()->json(['message' => 'Get transaction success.', 'transaction' => $transaction]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validator = validator($request->all(), ['amount' => 'required', 'type' => 'required', 'description' => 'string']);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $updatedTransaction = $transaction->update(array_merge($request->all(), ['user_id' => 1]));

        return response()->json(['message' => 'Create transaction success.', 'transaction' => $updatedTransaction]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json(['message' => 'delete transaction success.']);
    }
}