<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Models\PhonePay;
use App\Http\Controllers\Controller;
use Redirect;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Order;
use Illuminate\Support\Facades\Validator;
use Mail;

class PhonePayController extends Controller
{
    public function makePhonePePayment(Request $request)
    {
        // require('vendor/autoload.php');
        // Retrieve the amount from the request
        $amount = $request->input('amount');

        Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'apartment' => 'required',
            'pincode' => 'required',
            'phone' => 'required'
    
    
        ],
        [
            'fname.required' => 'The First Name field is required.',
            'lname.required' => 'The Last Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'address.required' => 'The Address field is required.',
            'apartment.required' => 'The Apartment field is required.',
            'pincode.required' => 'The Pincode field is required.',
            'phone.required' => 'The Phone field is required.'
        ]
        )->validate();

      
       
        $data = [
            'merchantId' => env('PHONEPE_MERCHANT_KEY'),  // PHONEPE_MERCHANT_KEY=PGTESTPAYUAT86        // Access merchant key from .env
            'merchantTransactionId' => uniqid(),
            'merchantUserId' => 'MUID123',
            'amount' => $amount * 100, // Convert amount to the smallest currency unit
            'redirectUrl' => route('payment_callback'),
            'redirectMode' => 'POST',
            'callbackUrl' => route('payment_callback'),
            'mobileNumber' => '9999999999',
            'param1' => "Aavesh",
            'paymentInstrument' => [
                'type' => 'PAY_PAGE',
            ],
        ];


    
        // Encode the data as JSON
        $encode = base64_encode(json_encode($data));
    
        // Access the secret key from the .env file
        $secretKey = env('PHONEPE_SECRET_KEY'); // //PHONEPE_SECRET_KEY=96434309-7796-489d-8924-ab56988a6076
    
        // Calculate the final X-VERIFY header
        $string = $encode . '/pg/v1/pay' . $secretKey;
        $sha256 = hash('sha256', $string);
        $finalXHeader = $sha256 . '###1';
    
        // PhonePe API endpoint URL
        $url = env('PHONEPE_API_URL');
    
        // Initialize the Guzzle client
        $client = new Client();
    
        // Make the POST request to PhonePe's API
        $response = $client->request('POST', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-VERIFY' => $finalXHeader,
            ],
            'json' => ['request' => $encode],
        ]);



        $datass=[
            'fname'=>$request->fname,
            'email'=>$request->email,
            
            ];
            
            $user['to'] =  "{$datass['email']}";
            
                     
            Mail::send('email/order', $datass, function ($message) use ($user) {
                $message->to($user['to']);
                $message->from('orders@ahitechno.com','AHIT');
                        $message->cc('orders@ahitechno.com', 'AHIT');
                        $message->subject('Notification Regarding Your Order');
                
            });

    
        // Decode the response JSON
        $rData = json_decode($response->getBody());

        $user_name = Auth::user()->id;
        $order = new Order;
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->apartment = $request->apartment;
        $order->country = $request->country;
        $order->state = $request->state;
        $order->city = $request->city;

// Set the user_id to the authenticated user's ID
        $order->user_id = $user_name;
        $order->products = $request->products;

        $order->pincode = $request->pincode;
        $order->phone = $request->phone;
        $order->amount = $request->amount;
      
        $order->save();
    
    
        // Redirect the user to the PhonePe payment page
        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
    }


    public function phonePeCallback(Request $request)
    {
    
        $input = $request->all();
        $saltKey = env('PHONEPE_SECRET_KEY'); //PHONEPE_SECRET_KEY=96434309-7796-489d-8924-ab56988a6076
        $saltIndex = 1;
    
    
        $finalXHeader = hash('sha256', '/pg/v1/status/' . $input['merchantId'] . '/' . $input['transactionId'] . $saltKey) . '###' . $saltIndex;
    
    
        // PhonePe API endpoint URL
        $url = 'https://api.phonepe.com/apis/hermes/pg/v1/status/' . $input['merchantId'] . '/' . $input['transactionId'];
      
        // Initialize the Guzzle client with headers
        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'accept' => 'application/json',
                'X-VERIFY' => $finalXHeader,
                'X-MERCHANT-ID' => $input['transactionId'],
            ],
        ]);

        
    
        // Make the GET request to PhonePe's API
        $response = $client->request('GET', $url);
        // Decode the response JSON
        $responseData = json_decode($response->getBody(), true);
        // Dump the response data
      return redirect('/');
    }
    
}
