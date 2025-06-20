<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class ExhibitionPaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:fapa_international_awards,id',
            'payment_status' => 'required|in:paid,unpaid',
        ]);

        $payment = Payment::create([
            'fapa_international_award_id' => $request->client_id,
            'status' => $request->payment_status,
        ]);

        return response()->json([
            'success' => true,
            'payment' => $payment,
        ]);
    }
}
