<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Payment;

class PaymentController extends Controller
{
    private $gateway;

    
    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
       $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'apartment' => 'required|string',
            'city' => 'required|string',
            'states' => 'required|string',
            'pincode' => 'required|string',
            'country' => 'required|string',
            'phone' => 'required|string',
            // Assuming amount should be a non-negative number
        ], [
            'fname.required' => 'First name field is required.', // Custom message for fname
            'lname.required' => 'Last name field is required.', // Custom message for fname
            'email.required' => 'Email field is required.', // Custom message for fname
            'address.required' => 'Address field is required.', // Custom message for fname
            'apartment.required' => 'Apartment, suite, etc. field is required.', // Custom message for fname
            'city.required' => 'City  field is required.', // Custom message for f
            'states.required' => 'States  field is required.', // Custom message for f
            'pincode.required' => 'Pincode  field is required.', // Custom message for f
            'country.required' => 'Country  field is required.', // Custom message for f
            'phone.required' => 'Phone  field is required.', // Custom message for fname
        ]);

        $data = $request->only('fname', 'lname', 'email', 'address', 'apartment', 'city', 'states', 'pincode', 'country', 'phone');

        $request->session()->put("fname", $request->input('fname'));
        $request->session()->put("lname", $request->input('lname'));
        $request->session()->put("email", $request->input('email'));
        $request->session()->put("address", $request->input('address'));
        $request->session()->put("apartment", $request->input('apartment'));
        $request->session()->put("city", $request->input('city'));
        $request->session()->put("states", $request->input('states'));
        $request->session()->put("pincode", $request->input('pincode'));
        $request->session()->put("country", $request->input('country'));
        $request->session()->put("phone", $request->input('phone'));
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

          

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->fname = session('fname');
                $payment->lname = session('lname');
                $payment->email = session('email');
                $payment->address = session('address');
                $payment->apartment = session('apartment');
                $payment->city = session('city');
                $payment->states = session('states');
                $payment->pincode = session('pincode');
                $payment->country = session('country');
                $payment->phone = session('phone');
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

          

                return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';   
    }
}
