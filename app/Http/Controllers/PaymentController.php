<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function checkout(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1',
    ]);

    // Simulasi pembayaran sukses
    $transactionId = uniqid('trx_');

    // Simpan ke database
    Transaction::create([
        'user_id' => Auth::id(),
        'amount' => $request->amount,
        'transaction_id' => $transactionId,
        'status' => 'succeeded',
    ]);

    return response()->json([
        'message' => 'Simulated payment successful',
        'amount' => $request->amount,
        'status' => 'succeeded',
        'transaction_id' => $transactionId,
    ], 200);
    }
}
