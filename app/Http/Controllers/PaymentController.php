<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function create(Request $request)
    {
        $plan = $request->input('plan');
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
        $payment = new Payment();
        $payment->amount = $request->input('subscription');
        $payment->paymentDate = $request->input('paymentDate');
        $payment->method = $request->input('method');
        $payment->save();

        if ($request->method == 'card') {
            // Redirect to Stripe payment page with the cost parameter
            return redirect()->route('stripe', ['cost' => $request->input('subscription')]);
        } else {
            return redirect()->back()->with('success', 'Payment processed successfully. Please pay the cash during pickup.');
        }

        return redirect()->route('payment.confirmation');
    }

    public function confirmation()
    {
        return view('payment.confirmation');
    }
}