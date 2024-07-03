<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use Stripe\Payout;

class PaymentController extends Controller
{
    public function create(Request $request)
    {
        // Assuming you have the user ID 
        $userId = auth()->id(); // Example: Retrieve authenticated user ID

        // Query subscriptions directly using Subscription model
        $subscriptions = Subscription::where('user_id', $userId)->latest()->get();

        foreach ($subscriptions as $subscription) {
        $plan = $subscription->plan;
        }
        $cost = $request->input('cost');
        return view('payment.create', compact('plan', 'cost'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'subscription' => 'required|numeric',
            'paymentDate' => 'required|date',
            'method' => 'required|string',
        ]);

    // Assuming you have the user ID 
    $userId = auth()->id(); // Example: Retrieve authenticated user ID

    // Query subscriptions directly using Subscription model
    $subscriptions = Subscription::where('user_id', $userId)->latest()->get();

    foreach ($subscriptions as $subscription) {
        $plan = $subscription->plan;
        $subscriptionId = $subscription->id;
    }

    // Create a new payment instance
    Payment::create([  
        'user_id' => $userId,
        'subscription_id' => $subscriptionId,
        'amount' => $request->input('subscription'),
        'paymentDate' => $request->input('paymentDate'),
        'method' => $request->input('method'),
    ]);


        if ($request->method == 'card') {
            // Redirect to Stripe payment page with the cost parameter
            return redirect()->route('stripe', ['cost' => $request->input('subscription')]);
        } else {
            return redirect()->back()->with('success', 'Payment processed successfully. Please pay the cash during pickup.');
        }
    }

    public function confirmation()
    {
        return view('payment.confirmation');
    }
    public function index()
    {
        
        $payment = Payment::all();
        Log::info($payment);
        
        return view('payment.index', compact('payment'));
    }
}