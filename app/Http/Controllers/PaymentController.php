<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Itsmurumba\Mpesa\Mpesa;
use Illuminate\Support\Facades\Log;

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

    protected $mpesa;
    public function __construct(){
    $this->mpesa = new Mpesa();
}
    private function initiatePayment($phoneNumber, $amount)
    {
        // Define dynamic values for account reference and transaction description
    $accountReference = 'XWaste'; // Replace with your dynamic value
    $transactionDescription = 'Payment of Subscription'; // Replace with your dynamic value

    // Call expressPayment method with dynamic values
    $response = $this->mpesa->expressPayment($amount, $phoneNumber, $accountReference, $transactionDescription);

        // Handle response
        // Example:
        if ($response['ResponseCode'] == '0') {
            return redirect()->route('payment.confirmation');
        } else {
            
        }
        // $mpesa = new Mpesa();
        // $BusinessShortCode = '174379';
        // $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        // $TransactionType = 'CustomerPayBillOnline';
        // $PartyA = $phoneNumber;
        // $PartyB = '174379';
        // $CallBackURL = 'https://yourdomain.com/mpesa/confirmation';
        // $AccountReference = 'AccountReference';
        // $TransactionDesc = 'TransactionDesc';
        // $Remarks = 'Remarks';

        // $response = $mpesa->STKPushSimulation(
        //     $BusinessShortCode,
        //     $LipaNaMpesaPasskey,
        //     $TransactionType,
        //     $amount,
        //     $PartyA,
        //     $PartyB,
        //     $phoneNumber,
        //     $CallBackURL,
        //     $AccountReference,
        //     $TransactionDesc,
        //     $Remarks
        // );

        // Log::info('Mpesa STK Push Simulation Response', ['response' => $response]);
    }
}