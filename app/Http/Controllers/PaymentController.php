<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    private $clientId;
    private $authToken;
    private $endpoint;

    public function __construct()
    {
        // $this->clientIdLkr = env('PAYCORP_CLIENT_ID_LKR');
        // $this->clientIdUsd = env('PAYCORP_CLIENT_ID_USD');
        // $this->clientId = env('PAYCORP_CLIENT_ID_EUR');
        $this->authToken = env('PAYCORP_AUTH_TOKEN');
        $this->endpoint = env('PAYCORP_ENDPOINT');
    }

    public function showPaymentPage(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'amount' => 'required|numeric|min:200', // Min 200 as per Paycorp docs
            'currency' => 'required|string|size:3',
            'client_reference' => 'nullable|string|max:50',
            'tokenize' => 'nullable|boolean',
            'customer_email' => 'nullable|email',
            'customer_name' => 'nullable|string|max:100'
        ]);

        // Initialize payment with the validated data
        if($validated['currency'] === 'LKR') {
            $this->clientId = env('PAYCORP_CLIENT_ID_LKR');
        } elseif($validated['currency'] === 'USD') {
            $this->clientId = env('PAYCORP_CLIENT_ID_USD');
        } else {
            $this->clientId = env('PAYCORP_CLIENT_ID_EUR');
        }
        $response = $this->initPayment(
            amount: $validated['amount'],
            currency: $validated['currency'],
            clientRef: $validated['client_reference'] ?? 'REF-'.uniqid(),
            tokenize: $validated['tokenize'] ?? false,
            extraData: [
                'customer_email' => $validated['customer_email'] ?? null,
                'customer_name' => $validated['customer_name'] ?? null
            ]
        );

        // Handle response
        if ($response->successful()) {
            $responseData = $response->json();
            return view('payment', [
                'paymentPageUrl' => $responseData['responseData']['paymentPageUrl'],
                'reqId' => $responseData['responseData']['reqid']
            ]);
        }

        // Handle error
        return back()->with('error', 'Payment initialization failed: '.$response->body());
    }

    public function handleReturn(Request $request)
    {
        $reqId = $request->query('reqid');

        // Complete the payment
        $response = $this->completePayment($reqId);

        if ($response->successful()) {
            $responseData = $response->json();

            // Process successful payment
            return view('payment.success', ['data' => $responseData['responseData']]);
        }

        // Handle error
        return redirect()->route('payment.page')->with('error', 'Payment failed');
    }

    public function handleCancel(Request $request)
    {
        // Handle canceled payment
        return redirect()->route('payment.page')->with('error', 'Payment canceled');
    }

    private function initPayment( float $amount, string $currency, string $clientRef = null, bool $tokenize = false, array $extraData = []) {
        $data = [
            'version' => '1.5',
            'msgId' => uniqid(),
            'operation' => 'PAYMENT_INIT',
            'requestDate' => now()->toIso8601String(),
            'validateOnly' => false,
            'requestData' => [
                'clientId' => $this->clientId,
                'transactionType' => 'PURCHASE',
                'transactionAmount' => [
                    'totalAmount' => 0,
                    'paymentAmount' => $amount,
                    'serviceFeeAmount' => 0,
                    'currency' => $currency
                ],
                'redirect' => [
                    'returnUrl' => route('payment.return'),
                    'cancelUrl' => route('payment.cancel'),
                    'returnMethod' => 'GET'
                ],
                'clientRef' => $clientRef,
                'tokenize' => $tokenize,
                'useReliability' => true,
                'extraData' => $extraData
            ]
        ];

        // Add token reference if tokenizing
        if ($tokenize) {
            $data['requestData']['tokenReference'] = 'user-'.auth()->id();
        }

        return Http::withHeaders([
            'AUTHTOKEN' => $this->authToken,
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache'
        ])->post($this->endpoint, $data);
    }
    private function completePayment($reqId)
    {
        $data = [
            'version' => '1.5',
            'operation' => 'PAYMENT_COMPLETE',
            'msgId' => uniqid(),
            'requestDate' => now()->toIso8601String(),
            'validateOnly' => false,
            'requestData' => [
                'clientId' => $this->clientId,
                'reqid' => $reqId
            ]
        ];

        return Http::withHeaders([
            'AUTHTOKEN' => $this->authToken,
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache'
        ])->post($this->endpoint, $data);
    }
}
