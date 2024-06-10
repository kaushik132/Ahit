<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Carbon;


class ForgetPasswordController extends Controller
{
    public function forgetPassword(){
        return view('front_website.page.forgetpassword');
    }


    public function forgetPasswordPost(Request $request){
        $request->validate([
            'email' => "required|email|exists:users",
       ]);
       $data=[
        
        'email'=>$request->email,
        'number'=>$token
      
        ];
        
        $user['to'] =  "{$data['email']}";
        
                 
        Mail::send('front_website/page/email/forgetPassword', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->from('contacts@bbsmituni.com','BBSMIT');
                    $message->cc('contacts@bbsmituni.com', 'BBSMIT');
                    $message->subject('Confirmation: Your Message Received by BBSMIT');
            
        });
      
   
       // Generate a token
       $token = Str::random(64);
   
       // Store the token in the password_resets table
       DB::table('password_resets')->insert([
           'email' => $request->email,
           'token' => $token, 
           'created_at' => Carbon::now()
    ]);
    
   
       // Send reset link to user's email





   
       return redirect('forget-password')->with("success", "We have send email to reset password");

    }


    public  function resetPassword($token){
        return view('front_website.page.newpassword',compact('token'));

    }


    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|string|min:6|confirmed",
            "password_confirmation" => "required"

        ]);

        $updatePassword = DB::table('password_resets')
        ->where([
            "email" =>$request->email,
            "token" => $request->token
        ])->first();

        if (!$updatePassword) {
         return redirect()->to(route("resetPassword"))->with("error", "Invalid");
        }


        User::where("email", $request->email)
        ->update(["password" => Hash::make($request->password)]);

        DB::table('password_resets')->where(["email" => $request->email])->delete();

         return redirect('')->to(route("loginpage"))->with("success", "Password reset success");

    }
}
