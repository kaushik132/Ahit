<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mail;

use App\Contact; 

use Illuminate\Support\Str;
use File;

class ContactApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
      date_default_timezone_set('Asia/Kolkata');
      if(!isset($request->latitude))
      {
       $request->latitude='0'; 
      }
      if(!isset($request->longitude))
      {
       $request->longitude='0';        
      }
        // echo json_encode($data);
    } 
   

    public function add(Request $request){
             

 
             if(!empty($request->user_id)){

               $validator = Validator::make($request->all(), [
                 
               "full_name"=>"required",                    
               "comment"=>"required",                    
               "email"=>"required",                    
               'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',                     
                 ]);

                if($validator->fails()){
                    
                      return $this->error_message($validator->errors());exit;

                  }else{
                       if(!empty($request->id)){

                        $contact=Contact::where([['id','=',$request->id]])->select('*')->first();
                         if($contact==null){


                           $contact=new Contact;
                           $message="Record Submitted  Successfully";


                         }else{

                           $contact->id=$request->id;
                           $message="Record update  Successfully";

                         }
                        
                        
                       }else{

                          $contact=new Contact;
                          $message="Record Submitted  Successfully";
                        }
                       $contact->name=$request->full_name;
                       $contact->email=$request->email;
                       $contact->phone=$request->mobile;                                       
                       $contact->comment=$request->comment; 
                      
                       $contact->save();
            
                       return response()->json([
                          'otp' => 0,
                          'status' => 200,  
                          'message'  =>$message,          
                          
                               ], 200);
                        exit;
                     }
                  
                  }else{

                 return response()->json([
                    'otp' => 0,
                    'status' => 400,  
                    'message'  =>"Data not Found",          
                      ],200);
                    exit;
                 }
         }

         public function delete(Request $request){
             

 
             if(!empty($request->user_id)){

               $validator = Validator::make($request->all(), [
                 
               "full_name"=>"required",                    
               "id"=>"required",                    
               "email"=>"required",                    
               'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',                     
                 ]);

                if($validator->fails()){
                    
                      return $this->error_message($validator->errors());exit;

                  }else{
        
                       
                         Contact::where('id',$request->id)->delete();

                         return response()->json([
                          'otp' => 0,
                          'status' => 200,  
                          'message'  =>"Record delete  Successfully",          
                          
                               ], 200);
                        exit;
                     }
                  
                  }else{

                 return response()->json([
                    'otp' => 0,
                    'status' => 400,  
                    'message'  =>"Data not Found",          
                      ],200);
                    exit;
                 }
         } 

     public function contact_list(Request $request){

 
             if(!empty($request->user_id)){

               $validator = Validator::make($request->all(), [
                 
               "full_name"=>"required",                    
               "email"=>"required",                    
               'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',                     
                 ]);

                if($validator->fails()){
                    
                      return $this->error_message($validator->errors());

                  }else{

                     $data = Contact::get();
                     
                       return response()->json([
                       'otp' => 0,
                       'status' => 200,
                       'base_url'=>url('/storage'),  
                       'message'  =>"Data  Found",          
                       'data'  =>$data
                             ],200);
                       exit;

                       
                    }
                  
                  }else{

                 return response()->json([
                    'otp' => 0,
                    'status' => 400,  
                    'message'  =>"Data not Found",          
                      ],200);
                    exit;
                 }
           
             } 



            function error_message($errors){

            
                $ers="";
                
                foreach($errors->all() as $vt)
                {

                  if(empty($ers))
                  {
                    $ers=$vt;
                  }
                  else
                  {
                    $ers=$ers.",".$vt;
                  }

                }

                return response()->json([
                 
                   'message'  =>$ers,
                  'status' => 300,
                  'otp'  => 0,
                 
              ], 200);
          
          }

   }
