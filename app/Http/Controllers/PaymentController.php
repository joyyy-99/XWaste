<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Mpesa;

class PaymentController extends Controller
{
    public function create()
    {
        return view('payment.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|numeric',
            'subscription' => 'required|numeric',
            'paymentDate' => 'required|date',
            'method' => 'required|string',
        ]);
        $payment = new Payment();
        $payment->phone_number = $request->input('phone_number');
        $payment->amount = $request->input('subscription');
        $payment->paymentDate = $request->input('paymentDate');
        $payment->method = $request->input('method');
        $payment->save();

        $this->initiatePayment($payment->phone_number, $payment->amount);

        return redirect()->route('payment.confirmation');
    }

    public function confirmation()
    {
        return view('payment.confirmation');
    }

    private function initiatePayment($phoneNumber, $amount)
    {
        $mpesa = new \Safaricom\Mpesa\Mpesa();
        $BusinessShortCode = '174379';
        $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType = 'CustomerPayBillOnline';
        $PartyA = $phoneNumber;
        $PartyB = '174379';
        $CallBackURL = 'https://yourdomain.com/mpesa/confirmation';
        $AccountReference = 'AccountReference';
        $TransactionDesc = 'TransactionDesc';
        $Remarks = 'Remarks';

        $stkPushSimulation = $mpesa->STKPushSimulation(
            $BusinessShortCode,
            $LipaNaMpesaPasskey,
            $TransactionType,
            $amount,
            $PartyA,
            $PartyB,
            $phoneNumber,
            $CallBackURL,
            $AccountReference,
            $TransactionDesc,
            $Remarks
        );
    }
}