<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Customers; 
 
use App\Sliders; 
use App\Packages; 
use App\PackagesBanners; 
use App\PackagesCategory; 
use App\Foods; 
use App\PackagesServices; 
use App\PackagesTrainers; 
use App\Products; 
use App\Cat; 
use App\ProductsImages; 
use App\Trainers; 
use App\Category; 

use Illuminate\Support\Str;
use File;

class ApiController extends Controller
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
    public function index()
    {
        //
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


     public function product_list(Request $request){

 
             if(!empty($request->user_id)){

               $validator = Validator::make($request->all(), [
                 
               "full_name"=>"required",                    
               "email"=>"required",                    
               'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',                     
                 ]);

                if($validator->fails()){
                      return $this->error_message($validator->errors());
                  }else{
                    $productlist = Products::get();
                    foreach ($productlist as $key => $value) {
                      
                       $productlist[$key]['categoryList'] = Cat::whereIn('id',$value->cate_id)->get();
                       $productlist[$key]['productImage'] = ProductsImages::where('products_pid',$value->pid)->get();

                      }

                    return response()->json([
                     'otp' => 0,
                     'status' => 200,
                     'base_url'=>url('/storage'),  
                     'message'  =>"Data  Found",          
                     'data'  =>$productlist
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
          
    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function home_health(Request $request)
   {
           $json=array();
           if(!empty($request->user_id))
           {
             

 $validator = Validator::make($request->all(), [
       //'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:customers', 
       "full_name"=>"required",                    
       "email"=>"required",                    
        'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',                     
           ]);

      if($validator->fails()){
            // here we return all the errors message

      return response()->json([
           
             'message'  =>"Mobile Not is not valid",
            'status' => 300,
            'otp'  => 0,
           
        ], 200);

            //return response()->json(['error' => $validator->errors(),'status'=>0], 422);
            exit;
        }

              $i=0;
              
                    $upl=new Homehealth;
                    $upl->full_name=$request->full_name;
                    $upl->status=1;
                    $upl->service=$request->service;
                    $upl->email=$request->email;                                       
                    $upl->customers_cid=$request->user_id;                                       
                    $upl->mobile=$request->mobile;                                       
                    $upl->save();
            

return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Record Submitted  ",          
            
                 ], 200);
                exit;
              
           }
  }




public function admin_app_update(Request $request)
 {
             $json=array();
           
 $validator = Validator::make($request->all(), [
       //'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:customers', 
                          
       "app_type"=>"required",                    
       "create_id"=>"required",                                      
           ]);

      if($validator->fails()){
            // here we return all the errors message

      return response()->json([
           
             'message'  =>"Paramters are required",
            'status' => 300,
            'otp'  => 0,
           
        ], 200);

            //return response()->json(['error' => $validator->errors(),'status'=>0], 422);
            exit;
        }

    if($request->app_type=='1')
    {
     $details=$this->get_admin('1',$request->create_id); 
    }  
    if($request->app_type=='2')
    {
     $details=$this->get_admin('2',$request->create_id);
    }
    if($request->app_type=='3')
    {
     $details=$this->get_admin('3',$request->create_id);   
    }
     if($request->app_type=='6')
    {
     $details=$this->get_admin('6',$request->create_id);   
    } 
         if($request->app_type=='7')
    {
     $details=$this->get_admin('7',$request->create_id);   
    } 
//$data=array();
      if($details)
    {
      $data['admin_version']=($details->admin_app_version)?$details->admin_app_version:'0';  
     // $data['admin_version']=($details->admin_app_version)?$details->admin_app_version:'0';  

    }
    else
    {
    $data['admin_version']="1.0";
   // $data['admin_version']=0;
    }
 $data['admin_version']="1.6";
 return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Data Found",          
            'data'  =>$data
                 ], 200);

                exit;

 }
      
 public function app_update(Request $request)
 {
             $json=array();
           
 $validator = Validator::make($request->all(), [
       //'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:customers', 
       "user_id"=>"required",                    
       "app_type"=>"required",                    
       "create_id"=>"required",                                      
           ]);

      if($validator->fails()){
            // here we return all the errors message

      return response()->json([
           
             'message'  =>"Paramters are required",
            'status' => 300,
            'otp'  => 0,
           
        ], 200);

            //return response()->json(['error' => $validator->errors(),'status'=>0], 422);
            exit;
        }

    if($request->app_type=='1')
    {
     $details=$this->get_admin('1',$request->create_id); 
    }  
    if($request->app_type=='2')
    {
     $details=$this->get_admin('2',$request->create_id);
    }
    if($request->app_type=='3')
    {
     $details=$this->get_admin('3',$request->create_id);   
    }
     if($request->app_type=='6')
    {
     $details=$this->get_admin('6',$request->create_id);   
    } 
         if($request->app_type=='7')
    {
     $details=$this->get_admin('7',$request->create_id);   
    } 
//$data=array();
      if($details)
    {
      $data['version']=($details->customer_app_version)?$details->customer_app_version:'0';  

    }
    else
    {
    $data['version']=0;
    }

 return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Data Found",          
            'data'  =>$data
                 ], 200);

                exit;

 }

   public function cms(Request $request)
    {
           $json=array();
           
 $validator = Validator::make($request->all(), [
       //'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:customers', 
       "type"=>"required",                    
       "lang"=>"required",                    
                             
           ]);

      if($validator->fails()){
            // here we return all the errors message

      return response()->json([
           
             'message'  =>"Paramters are required",
            'status' => 300,
            'otp'  => 0,
           
        ], 200);

            //return response()->json(['error' => $validator->errors(),'status'=>0], 422);
            exit;
        }
                  
                  $new=Cms::select('*')->where([['type','=',$request->type],['utype','=',$request->app_type],['source_id','=',$request->create_id]])->first();
                  if(empty($new))
                  {

            $cms=new Cms;
            $cms->type='privacy';
            $cms->utype=$request->app_type;
            $cms->source_id=$request->create_id;
            $cms->save();
            $cms=new Cms;
            $cms->type='terms';
            $cms->utype=$request->app_type;
            $cms->source_id=$request->create_id;
            $cms->save();
            $cms=new Cms;
            $cms->type='about';
            $cms->utype=$request->app_type;
            $cms->source_id=$request->create_id;
            $cms->save(); 



                    $new=Cms::select('*')->where([['type','=',$request->type],['utype','=',$request->app_type],['source_id','=',$request->create_id]])->first();  
                  }
                   if($request->lang=='EN')
                   {
                    $data['content']=($new->content_eng)?$new->content_eng:''; 
                   }
                   if($request->lang=='HN')
                   {
                    $data['content']==($new->content_hindi)?$new->content_hindi:''; 
                   }
                   return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Content Found",          
            'data'  =>$data
                 ], 200);

                exit;
          
    } 
public function test_fcm()
{
    
$this->android_notification("AAAA43R9RSI:APA91bFOLt0TpUnC62U062sdvileAjf6Y-YuzbjqHkOfAf-BHAMv5rFdrWDgeacF9_u8EyBN_Obj4FLziV-KWIhc1Eo6ISTW57WMJobHHKpG080iiuZMxA3oaCbEhRn8T8auV1kN2UGV 
","eJN8q0d-QfqNZXWw5XdYTm:APA91bGGzEb1a-8Adj14I-ctjaN1LrECQR8amFBUTw4-ejuAU2V9V-MzjVv89qeSlR9ytOBgmVuFR9uGRkq0NBzYADnM58_OvurytOK7okJqCeWaQ3moRNUQop2M9_QO_RDyKic-A37e", "mesage","test");
}
 function android_notification($server_key,$token, $title,$message,$ntype,$type,$user_id){
  
    $GOOGLE_API_KEY=trim($server_key);
  
//echo $server_key;
//die;

    $path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';

  $fields = array(
  'to' => $token,
  'notification' => array('title' => $title,'body' => $message,'click_action'=> 'MAIN_ACTIVITY' ),
  'data' => array('title' => $title,'message' => $message,'click_action'=> 'MAIN_ACTIVITY','notification_type'=>$ntype)
  );
  // pr($fields,1);
  $headers = array(
  'Authorization: key='. $GOOGLE_API_KEY,
  'Content-Type:application/json',   
  );    
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $path_to_firebase_cm); 
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 ); 
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields)); 
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
  $result = curl_exec($ch);
  
  ///echo $server_key.'<br/>'.$token.'<br/>';
  //var_dump($result);
  //die; 
  //print_r($result);
  //echo "dddddddddd";
  //echo $result; die;
  curl_close($ch);


  $not=new Notifications;
  $not->title=$title;
  $not->description=$message;
  $not->user_id=$user_id;
  $not->type=$type;
  $not->created_at=date("Y-m-d h:i:s");
  $not->save();



  return $result;
  
    }
 function cust_fcm($token,$title,$des)
{
    $url = "https://fcm.googleapis.com/fcm/send";
    $token=$token;
    //$token = "egygewqNSDGHSDGJDVK_nsfsssnkk-DBjsajnckcz034ndsn";
    $serverKey = 'AAAAGdiMNRA:APA91bGOldQuyisH0Q1rAQC5evVKIqyk883CcgxfbuBqu11ebrdAj5bqRYZh_sGW4CJuW34prwjsW13q3-9jLCZnj4rZnCBJXSRP_H-Ymtw3no_v-HF2mUIua4hkpvv1gb5NORhMopsC';
    $title = $title;
    $body = $des;
    $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    return 1;
    if ($response === FALSE) {
  //  print_r($response);
    //die('FCM Send Error: ' . curl_error($ch));
    }
    else
    {
    return 1;  
    }
   
    curl_close($ch);
}

function get_admin($type,$id)
{
  $doctors=array();
if($type==1)
{
  $doctors=  \DB::table('admin_users')->where([['id','=',$id]])->select('*')->first();
 // $doctors=Doctors::where([['did','=',$id]])->select('*')->first();

}
elseif($type==2)
{
  $doctors=Pharmacy::where([['pid','=',$id]])->select('*')->first();
}
elseif($type==3)
{
  $doctors=Labs::where([['lid','=',$id]])->select('*')->first();
}
elseif($type==6)
{
  $doctors=hhcare::where([['hhid','=',$id]])->select('*')->first();
}
elseif($type==7)
{
  $doctors=Hospitals::where([['hid','=',$id]])->select('*')->first();
}
return $doctors;
}

 public function upload_prescription(Request $request)
   {
           $json=array();
           if(!empty($request->user_id))
           {
             
              $i=0;
              if(!empty($request->file('images')))
              {
                              
          $imageNamet =date('ymdhis').'.'.$request->images->extension();            
          $request->images->move(public_path('prescription'), $imageNamet);
              }
              else
              {
               $imageNamet='';
              }       

              if(isset($_POST['test_id']))
              {
                $test_id=$_POST['test_id'];
              }
              else
              {
                $test_id=0;
              }   
              if(isset($_POST['did']))
              {
                $did=$_POST['did'];
              }
              else
              {
                $did=0;
              }   


                    $upl=new Prescriptions;
                    $upl->files=$imageNamet;
                    $upl->status=1;
                    $upl->customers_cid=$request->user_id;
                    $upl->comment=$request->title;                                
                    $upl->booking_date=$request->booking_date;                                      
                    $upl->booking_time=$request->booking_time; 
                    $upl->type=$request->type;

                    if($request->type=='4' && $request->test_type=='1')
                    {
                      $upl->ttype=1;
                    }
                    if($request->type=='1')
                    {
                      if($did)
                     {
                       $upl->type=1;
                       $upl->doctors_did=$did; 
                       $upl->hospital_hid=$request->for_id;

                     }
                     else
                     {
                       $upl->doctors_did=$request->for_id; 
                     }

                                        
                    }  
                    if($request->type=='2')
                    {
                    $upl->pharmacy_pid=$request->for_id; 
                    }
                    if($request->type=='3')
                    {
                    $upl->labs_lid=$request->for_id; 
                    }   
                    if($request->type=='5')
                    {
                    $upl->tests_tid=$test_id; 
                    $upl->labs_lid=$request->for_id;
                    } 
                    if($request->type=='6')
                    {
                    $upl->homehealthcare_hhid=$request->for_id; 
                    $upl->pack_id=$request->pack_id; 
                    } 
                    if($request->type=='7')
                    {
                     $upl->tests_tid=$test_id; 
                     if($test_id)
                     {
                       $upl->type=3;
                     }
                     
                     $upl->hospital_hid=$request->for_id;
                     
                    }  


                    $upl->save();
            
if($request->type=='5')
{
   $ntype='3';
}
elseif($did!=0)
{
$ntype=7;
}
else
{
 $ntype=$request->type; 
}

$trp=\DB::table('admin_users')->where([['type','=',$ntype]])->select('id');

if($request->type=='1')
    {
      if($did!=0)
{
  $trp->where([['hospital','=',$request->for_id]]); 
}
else
{
  $trp->where([['doctors','=',$request->for_id]]); 
}
    
    }  
    if($request->type=='2')
    {
    $trp->where([['pharmacy','=',$request->for_id]]); 
    }
    if($request->type=='3')
    {
    $trp->where([['labs','=',$request->for_id]]);  
    }
    if($request->type=='5')
    {
    $trp->where([['labs','=',$request->for_id]]);  
    }    
    if($request->type=='6')
    {
    $trp->where([['healthcare','=',$request->for_id]]);  
    }
    if($request->type=='7')
    {
    $trp->where([['hospital','=',$request->for_id]]);  
    }    
$trp=$trp->get();
$details="";
//echo $request->user_id.'erere';

$cus= Customers::where('cid','=',$request->user_id)->first();
//print_r($cus);
//die;   
//echo $request->type;
    if($cus->app_type=='1')
    {
     $details=$this->get_admin('1',$cus->source_id); 
    }  
    if($cus->app_type=='2')
    {
    //echo "ssss";
    //echo $request->source_id;
     $details=$this->get_admin('2',$cus->source_id);
    //print_r($details);
    //echo "sdsds";
    }
    if($cus->app_type=='3')
    {
     $details=$this->get_admin('3',$cus->source_id);   
    }
     if($cus->app_type=='6')
    {
     $details=$this->get_admin('6',$cus->source_id);   
    }   
     if($cus->app_type=='7')
    {
     $details=$this->get_admin('7',$cus->source_id);   
    } 
//print_r($details);
//die;
if($details)
{
  $server_key=$details->server_key;  

$server_key_admin="AAAAn-AhG8M:APA91bESFI7yxZbdiZZwGsf4nIbSInXh924ViFyt-AvLo0zN1zvdEmaIVm6-l8Vw-resETocOY0LIKcjmtwdZ_BhVWlU-LA2EP2ZMRY6lUMgpwQWZU_Dsj_wlrtXDx1QG-s1Vyicpqh4";  
//echo $details->device_token;
//die;
$this->android_notification($server_key_admin,$details->device_token,"New Booking Received","A Booking has been received ","Booking",$cus->app_type,$cus->source_id);
//die;

}
else
{
  $server_key="AAAAn-AhG8M:APA91bESFI7yxZbdiZZwGsf4nIbSInXh924ViFyt-AvLo0zN1zvdEmaIVm6-l8Vw-resETocOY0LIKcjmtwdZ_BhVWlU-LA2EP2ZMRY6lUMgpwQWZU_Dsj_wlrtXDx1QG-s1Vyicpqh4";   
}
  
//$cus= Customers::where('cid','=',$request->user_id)->first();
if($cus)
{
  //echo $cus->device_token.'ryrty';
  //die;
$this->android_notification($server_key,$cus->device_token,"Booking Placed","Your Booking placed Successfully","Booking",'CUSTOMER',$cus->cid);
//die;
}

         if($trp)
         {
    foreach($trp as $vb)
    {
\DB::table('leads_users')->insert([
['lid' => $upl->id, 'admin_users_id' => $vb->id,'created_at'=>date("Y-m-d h:i:s")]
       ]);
    }
   
        }
  if($cus->app_type==2 && $cus->source_id==10 && $request->type!=2)
{

\DB::table('leads_users')->insert([
['lid' => $upl->id, 'admin_users_id' => 13,'created_at'=>date("Y-m-d h:i:s")]
]);
}


return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Prescription Uploaded ",          
            
                 ], 200);
                exit;
              }
           
  }

 public function update_profile(Request $request)
   {
           $json=array();
           if(!empty($request->user_id))
           {
             
                $i=0;
             
 $validator = Validator::make($request->all(), [
       //'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:customers', 
       "first_name"=>"required",                    
       "last_name"=>"required",                    
                             
           ]);

      if($validator->fails()){
            // here we return all the errors message

      return response()->json([
           
             'message'  =>"Paramters are required",
            'status' => 300,
            'otp'  => 0,
           
        ], 200);

            //return response()->json(['error' => $validator->errors(),'status'=>0], 422);
            exit;
        }

                $cus= Customers::where('cid','=',$request->user_id)->first();
                 if(!empty($cus))
                 {

                 $cus->name=$request->first_name.' '.$request->last_name;
                 $cus->update();
                
                }
                else
                {

return response()->json([
            'otp' => 0,
            'status' => 400,  
            'message'  =>"Not Found ",          
            
                 ], 200);
                exit;                  
                }

return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Update Successfully ",          
            
                 ], 200);
                exit;
              }
           }
  
public function check_fcm()
{
    $url = "https://fcm.googleapis.com/fcm/send";
    $token = "egygewqNSDGHSDGJDVK_nsfsssnkk-DBjsajnckcz034ndsn";
    $serverKey = 'AAAAGdiMNRA:APA91bGOldQuyisH0Q1rAQC5evVKIqyk883CcgxfbuBqu11ebrdAj5bqRYZh_sGW4CJuW34prwjsW13q3-9jLCZnj4rZnCBJXSRP_H-Ymtw3no_v-HF2mUIua4hkpvv1gb5NORhMopsC';
    $title = "Notification title";
    $body = "Hello I am from Your php server";
    $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    print_r($response);
    curl_close($ch);
}

public function remove_promocode(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
                                                                                       
           ]);

  if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cart_data=$this->getCartdata($request->user_id);

if($cart_data['status']==303)
{
  $json=new \stdClass();
                return response()->json([           
            'message'  =>'Cart is Empty',
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;    
}

$cartdata=Cart::where([['user_id','=',$request->user_id],['status','=',1]])->first();
//echo $promo['total_amount'];
     $cartdata->promocode=0;
     $cartdata->update();


$json=new \stdClass();
                return response()->json([           
            'message'  =>'Promocode removed Successfully',
            'status' => 200,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit; 


        }


}

public function order_confirm(Request $request)
   {
    $json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'order_id' => 'required',                                         
        'payment_status' => 'required',                                         
                                                 
           ]);

  if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {




        $cartdata=Customerorders::where([['user_id','=',$request->user_id],['oid','=',$request->order_id],['order_status','=','Pending']])->first(); 
       
        if($cartdata)
        {
if($request->payment_id && $cartdata->payment_type==2)
{
  if($request->payment_id !='')
  {
 $pdetails=new Paymentdetails;
$pdetails->oid=$request->order_id;
$pdetails->payment_id=$request->payment_id;
$pdetails->status=$request->payment_status;
$pdetails->created_at=date('Y-m-d h:i:s');
$pdetails->save();   
  }

}



          if($request->payment_status=='1')
          {

                    $upl=new Prescriptions;
                    $upl->files='';
                    $upl->status=1;
                    $upl->customers_cid=$request->user_id;
                    $upl->comment='Online Order';                                
                    $upl->booking_date='';                                      
                    $upl->booking_time=''; 
                    $upl->type=$cartdata->type;
                    $upl->prs_type=1;
                    $upl->oid=$request->order_id;
                    //$upl->oid= $cartdata->files;
                    $upl->files=$cartdata->files;
                    $userdata=$this->get_customer($request->user_id);
                    if($userdata->app_type==7)
                    {
                    $upl->hospital_hid=$userdata->source_id;
                    }
                    else
                    {
                    if($cartdata->type=='1')
                    {
                    $upl->doctors_did=$cartdata->source_id; 
                    }  
                    if($cartdata->type=='2')
                    {
                    $upl->pharmacy_pid=$cartdata->source_id; 
                    }
                    if($cartdata->type=='3')
                    {
                    $upl->labs_lid=$cartdata->source_id;
                    }   
                    if($cartdata->type=='5')
                    {
                    $upl->tests_tid=0; 
                    $upl->labs_lid=$cartdata->source_id;
                    } 
                    if($cartdata->type=='6')
                    {
                    $upl->homehealthcare_hhid=$cartdata->source_id; 
                    $upl->pack_id=0; 
                    }                         
                    }
                                                                           
                    $upl->save();


if($userdata->app_type==7)
                    {
       
$trp=\DB::table('admin_users')->where([['type','=',$userdata->app_type]])->select('id');
                    }
                    else
                    {
         $trp=\DB::table('admin_users')->where([['type','=',$cartdata->type]])->select('id');             
                    }

    if($userdata->app_type==7)
                    {
$trp->where([['hospital','=',$cartdata->source_id]]); 
                    }
                    else
                    {
    if($cartdata->type=='1')
    {
    $trp->where([['doctors','=',$cartdata->source_id]]); 
    }  
    if($cartdata->type=='2')
    {
    $trp->where([['pharmacy','=',$cartdata->source_id]]); 
    }
    if($cartdata->type=='3')
    {
    $trp->where([['labs','=',$cartdata->source_id]]);  
    }
    if($cartdata->type=='5')
    {
    $trp->where([['labs','=',$cartdata->source_id]]);  
    }    
    if($cartdata->type=='6')
    {
    $trp->where([['healthcare','=',$cartdata->source_id]]);  
    }                      
                    }

$trp=$trp->get();
$details="";
//echo $request->user_id.'erere';

  $cus= Customers::where('cid','=',$request->user_id)->first();
//print_r($cus);
//die;   
//echo $request->type;
    if($cus->app_type=='1')
    {
     $details=$this->get_admin('1',$cus->source_id); 
    }  
    if($cus->app_type=='2')
    {
      //echo "ssss";
    //echo $request->source_id;
     $details=$this->get_admin('2',$cus->source_id);
    //print_r($details);
    //echo "sdsds";
    }
    if($cus->app_type=='3')
    {
     $details=$this->get_admin('3',$cus->source_id);   
    }
     if($cus->app_type=='6')
    {
     $details=$this->get_admin('6',$cus->source_id);   
    }   
     if($cus->app_type=='7')
    {
     $details=$this->get_admin('7',$cus->source_id);   
    }  
//print_r($details);
//die;
if($details)
{
  $server_key=$details->server_key;  

$server_key_admin="AAAAn-AhG8M:APA91bESFI7yxZbdiZZwGsf4nIbSInXh924ViFyt-AvLo0zN1zvdEmaIVm6-l8Vw-resETocOY0LIKcjmtwdZ_BhVWlU-LA2EP2ZMRY6lUMgpwQWZU_Dsj_wlrtXDx1QG-s1Vyicpqh4";  
//echo $details->device_token;
//die;
$this->android_notification($server_key_admin,$details->device_token,"New Order  Received","A Order  has been received ","Booking",$cus->app_type,$cus->source_id);
//die;

}
else
{
  $server_key="AAAAn-AhG8M:APA91bESFI7yxZbdiZZwGsf4nIbSInXh924ViFyt-AvLo0zN1zvdEmaIVm6-l8Vw-resETocOY0LIKcjmtwdZ_BhVWlU-LA2EP2ZMRY6lUMgpwQWZU_Dsj_wlrtXDx1QG-s1Vyicpqh4";   
}
  
//$cus= Customers::where('cid','=',$request->user_id)->first();
if($cus)
{
  //echo $cus->device_token.'ryrty';
  //die;
$this->android_notification($server_key,$cus->device_token,"Order Placed","Your Order placed Successfully","Booking",'CUSTOMER',$cus->cid);
//die;
}

         if($trp)
         {
    foreach($trp as $vb)
    {
\DB::table('leads_users')->insert([
['lid' => $upl->id, 'admin_users_id' => $vb->id,'created_at'=>date("Y-m-d h:i:s")]
       ]);
    }
   
        }
  if($cus->app_type==2 && $cus->source_id==10 && $cartdata->source_id!=2)
{

\DB::table('leads_users')->insert([
['lid' => $upl->id, 'admin_users_id' => 13,'created_at'=>date("Y-m-d h:i:s")]
]);
}



$cartdat=Cart::where([['user_id','=',$request->user_id],['status','=',1],['cart_type','=',$cartdata->type],['source_item','=',$cartdata->source_id]])->first();

$cartdat->status=0;
$cartdat->deleted_at=date('Y-m-d h:i:s');

// $cartprd=Cartproduct::where([['cart_id','=',$cartdat->cart_id]])->first();
// $cartprd->status=0;
// $cartprd->deleted_at=date('Y-m-d h:i:s');
// $cartprd->update();


    $cr['deleted_at']=date('Y-m-d h:i:s');
     $cr['status']=0;

 Cartproduct::where([['cart_id','=',$cartdat->cart_id]])->update($cr);


  
$cartdat->update();
$json=array();





$json['order_id']=$request->order_id;

            $cartdata->order_status='Success';
            $cartdata->payment_status=1;

            $cartdata->update();

       return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Order Placed Successfully",          
            'data'  =>$json
                 ], 200);

         exit;

          }
          else
           {
              $cartdata->order_status='Failed';
              $cartdata->payment_status=0; 

$cartdata->update();




$json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Order Failed ",          
            'data'  =>$json
                 ], 200);


           } 
           
        }

        }
   }

public function place_order(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'payment_type' => 'required',                                         
                                                 
           ]);

  if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cart_data=$this->getCartdata($request->user_id);

if($cart_data['status']==303)
{
  $json=new \stdClass();
                return response()->json([           
            'message'  =>'Cart is Empty',
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;    
}

$cartdata=Cart::where([['user_id','=',$request->user_id],['status','=',1]])->first();

 if(!empty($request->file('images')))
              {
                              
          $imageNamet =date('ymdhis').'.'.$request->images->extension();            
          $request->images->move(public_path('prescription'), $imageNamet);
              }
              else
              {
               $imageNamet='';
              }    
$order=new Customerorders;
$order->user_id=$request->user_id;
$order->cart_id=$cartdata->cart_id;
$order->final_amount=$cart_data['final_total'];
$order->gst_amount=$cart_data['tax_amount'];
$order->gst_percentage=8;
$order->delivery_amount=$cart_data['delivery_amount'];
$order->promocode=$cart_data['promo_code'];
$order->promo_amount=$cart_data['promo_amount'];
$order->total_amount=$cart_data['total_amount'];
$order->discount_amount=$cart_data['discounted_amount'];
$order->order_status='Pending';
$order->payment_status=0;
$order->payment_id=$request->payment_type;
$order->source_id=$cartdata->source_item;
$order->type=$cartdata->cart_type;
$order->files=$imageNamet;
$order->save();




foreach($cart_data['products'] as $vl)
{
  $product=new Ordersproduct;
  $product->oid=$order->oid;
  $product->item_id=$vl['mid'];
  $product->item_type=$vl['item_type'];
  if($vl['item_type']==2)
  {
    $product->source_id=$vl['pharmacy_pid'];
    $product->packet_type=$vl['packet_type'];
    $product->packet_quantity=$vl['packet_quantity'];

    $log=explode("medicine/",$vl['logo']);
    
  if(isset($log[1]))
  {
    $product->item_logo=$log[1];
   
  }
  else
  {
     $product->item_logo='';
  }
 
     $product->medicine_type=$vl['medicine_type'];
  }
  
  $product->quantity=$vl['quantity'];
  $product->user_id=$request->user_id;
  $product->item_name=$vl['title'];
  $product->item_actual_price=$vl['actual_price'];
  $product->item_discounted_price=$vl['discounted_price'];
  
  $product->save();
}

  $cust_add=CustomerAddress::where([['customers_cid','=',$request->user_id],['default_add','=',1]])->first();
 $customer=Customers::where([['cid','=',$request->user_id]])->first();
 
  $address=new Orderaddress;
  $address->oid=$order->oid;
  $address->address=$cust_add->address;
  $address->full_address=$cust_add->full_address;
  $address->latitude=$cust_add->latitude;
  $address->longitude=$cust_add->longitude;
  $address->name=$customer->name;
  $address->contact_no=$customer->contact_no;
  $address->email=$customer->email;
  $address->save();


  $json=array();
  $json['order_id']=$order->oid;
                return response()->json([           
            'message'  =>'Order Placed Successfully',
            'status' => 200,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit; 


        }



      }










public function apply_promocode(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'pid' => 'required',                                         
        'type' => 'required',                                         
           ]);

  if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
 
$cart_data=$this->getCartdata($request->user_id);

if($cart_data['status']==303)
{
  $json=new \stdClass();
                return response()->json([           
            'message'  =>'Cart is Empty',
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;    
}

 if($request->type==0)
 {
 $promo=Promocode::where([['pid','=',$request->pid],['status','=',1]])->first();
 }
 else
 {
  $promo=Promocode::where([['code','=',$request->pid],['status','=',1]])->first();
 
 }       

if(empty($promo))
{
    $json=new \stdClass();
                return response()->json([           
            'message'  =>'Invalid Promocode',
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;  
}
else
{
   $cartdata=Cart::where([['user_id','=',$request->user_id],['status','=',1]])->first();
//echo $promo['total_amount'];
   if($cart_data['total_amount'] >= $promo->min_value )
   {
     $cartdata->promocode=$request->pid;
     $cartdata->update();

//    $json=array();
// $cartdata=$this->getCartdata($request->user_id);
// $message=$cartdata['message'];
// $status=$cartdata['status'];

// unset($cartdata['status']);
// unset($cartdata['message']);
// $json=$cartdata;
     $json=new \stdClass();
return response()->json([           
            'message'  =>"Promocode Applied Successfully",
            'status' =>200,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;

   }
   elseif($promo->min_value < 1)   
  {
        $json=new \stdClass();
return response()->json([           
            'message'  =>"Promocode Applied Successfully",
            'status' =>200,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;
  }
   else
   {
    $json=new \stdClass();
                return response()->json([           
            'message'  =>'Minimmum order Amount '.$promo->min_value.' required',
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;      
   }
}

        }


} 

public function promocode_list(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
           ]);

  if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
 
 $customer=Customers::where([['cid','=',$request->user_id]])->first();
 if($customer->app_type==1 && $customer->source_id==120)
 {
 $promo=Promocode::where([['type','=',0],['source_id','=',0],['status','=',1]])->get();
 }
 else
 {
 $promo=Promocode::where([['type','=',$customer->app_type],['source_id','=',$customer->source_id],['status','=',1]])->get();
 
 }
 
 if($promo->isEmpty())
 {
  $json=new \stdClass();
             return response()->json([           
            'message'  =>'Promocode not found',
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;
 }
 else
 {
$json=array();
  foreach($promo as $val)
  {
    $promocodes=array();
    //echo $val->pid;
     if($val->promo_type==1)
     {
      $promocodes['pid']=$val->pid;
      $promocodes['amount']=$val->amount;
      $promocodes['discount_type']=$val->discount_type;
      $promocodes['code']=$val->code;
      $promocodes['min_value']=$val->min_value;
      $promocodes['max_value']=$val->max_value;
      if($val->discount_type==0)
      {
        $promocodes['title']="Get ".$val->amount.' % '." Off.Upto ₹".$val->max_value;
      }
      else
      {
        $promocodes['title']="Get FLAT ₹".$val->amount." Off";
      }
      
      $json[]=$promocodes;
     }
     else
     {
      
      $promo=CustomersPromocode::where([['promocode_pid','=',$val->pid],['customers_cid','=',$request->user_id]])->first();
      if(!empty($promo))
      {
      $promocodes['pid']=$val->pid;
      $promocodes['amount']=$val->amount;
      $promocodes['discount_type']=$val->discount_type;


      $promocodes['code']=$val->code;
      $promocodes['min_value']=$val->min_value;
      $promocodes['max_value']=$val->max_value;
      if($val->discount_type==0)
      {
        $promocodes['title']="Get ". $val->amount.' % '." Off.Upto ₹".$val->max_value;
      }
      else
      {
        $promocodes['title']="Get FLAT ₹".$val->amount." Off";
      }
      


      // $promocodes['title']=$val->max_value;
      $json[]=$promocodes;       
      }
     }
  }


              return response()->json([           
            'message'  =>'Promocode  found',
            'status' => 200,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;
 }

        }


   }


public function lab_list(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cr=array();
        $dar=array();
$trp=Labs::where([['status','=',1]])->select('*',\DB::raw("6371 * acos(cos(radians(" . $request->latitude . ")) 
        * cos(radians(labs.latitude)) 
        * cos(radians(labs.longitude) - radians(" . $request->longitude . ")) 
        + sin(radians(" .$request->latitude. ")) 
        * sin(radians(labs.latitude))) AS distance"))->orderBy('distance', 'ASC')->get();
if(empty($trp))
{
   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>'',                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{
   
           foreach($trp as $vl)
        {
$dar=$vl;
if($vl['discount']=='')
{
$dar['discount']="";

}
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;

array_push($cr,$dar);
        } 

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


}
}
}


public function medicine_details(Request $request)
   {
$json=new \stdClass();
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'mid' => 'required',                                         
                                                
        //'offset' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
      
$medicine=Medicine::where([['medicine.mid','=',$request->mid],['medicine.status','=','1'],['medicine.expiry_date','>',date('Y-m-d')]])->select('medicine.title','medicine.short_description','medicine.packet_type','medicine.medicine_type','medicine.packet_quantity','medicine.logo','medicine.actual_price','medicine.discounted_price','medicine.mid','medicine.prescription_status','medicine.stock_status','medicine.long_description','medicine.pharmacy_pid')
                ->get();

if($medicine->isEmpty())
{
   return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>new \stdClass(),                        
            'message'  =>"Data Not Found",
                 ], 200);
}
else
{
$output=array();
foreach($medicine as $vl)
        {
          $temp=array();

$category = MedicineMCategory::join('mcategory','mcategory.mcatid','m_category_medicine.m_category_mcatid')->select('mcategory.title')->where([['m_category_medicine.medicine_mid','=',$request->mid]])->get();

$title="";

foreach ($category as $value) {
  //echo $value->title;

$title.=$value->title.',';
}
        $temp['discounted_price']=($vl['discounted_price'])?$vl['discounted_price']:'';  
        $temp['actual_price']=($vl['actual_price'])?$vl['actual_price']:'';  
        $temp['category']=rtrim($title,",");  
        $temp['mid']=($vl['mid'])?$vl['mid']:'';  
        $temp['pharmacy_pid']=($vl['pharmacy_pid'])?$vl['pharmacy_pid']:'';  
        $temp['title']=($vl['title'])?$vl['title']:'';  
$temp['short_description']=($vl['short_description'])?$vl['short_description']:'';   
$temp['long_description']=($vl['long_description'])?$vl['long_description']:'';   
$temp['packet_type']=strtolower(($vl['packet_type'])?$vl['packet_type']:'');  
$temp['medicine_type']=strtolower(($vl['medicine_type'])?$vl['medicine_type']:'');  
$temp['packet_quantity']=($vl['packet_quantity'])?$vl['packet_quantity']:'';  
$temp['prescription_status']=(int)$vl['prescription_status'];  
$temp['stock_status']=(int)$vl['stock_status'];  
$temp['cart_status']=$this->check_cart_status($request->user_id,$vl->mid,$vl['pharmacy_pid'],2);  

if($temp['cart_status'])
{
$temp['cart_quantity']=$this->get_cart_quantity($request->user_id,$vl->mid,$vl['pharmacy_pid'],2);  
}
else
{
  $temp['cart_quantity']=0;  
}



if($vl->logo)
{
  $temp['logo']=url('/').'/storage/app/public/'.$vl->logo;

}
else
{
$temp['logo']=url('/').'/public/uploads/user_image/noimage.png';
}


$output[]=$temp; 
        }
  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$output,                        
            'message'  =>"Data  Found",
                 ], 200);
}

}
}

function getCartdata($user_id)
{

  $cartdata=Cart::where([['user_id','=',$user_id],['status','=',1]])->first();
  
//echo $cartdata->cart_id;
  $total_amount=0;
  $dis_amount=0;
  $promo_amount=0;
  $del_amount=50;
  $tax_amount=0;
  $tax_title='';
  $promo_code='';
  $address='';
  $items=array();
  $response=array();
  if(empty($cartdata))
  {
    $response['status']=303;   
    $response['message']='Cart is Empty';  
    $response['total_amount']=strval($total_amount);
    $response['promo_amount']=strval($promo_amount);
    $response['promo_code']=strval($promo_code);
    $response['discounted_amount']=strval($dis_amount);
    $response['delivery_amount']=strval($del_amount);
    $response['tax_amount']=strval($tax_amount);
    $response['tax_title']=strval($tax_title);
    $response['address']=strval($address);
    $response['message']='Cart Item is Empty';
    $response['final_total']="";
    $response['total_item']=0;   
  }
  else
  {


$cartprd=Cartproduct::where([['cart_id','=',$cartdata->cart_id],['user_id','=',$user_id],['status','=',1]])->get();
   
   if(!$cartprd->isEmpty())
   {
   
  foreach($cartprd as $val)
  {
    //echo $val->item_id;
     $product=$this->get_product($val->item_id,$val->item_type,$val->quantity);
    
     if(!empty($product))
     {
    $product['item_type']=$val->item_type;
    $items[]=$product;
    $total_amount=$total_amount+$product['total_amount'];
    $dis_amount=$dis_amount+$product['dis_amount'];      
     }

  }

    $response['status']=200;   
    $response['message']='Item Found'; 
    $response['products']=$items; 


if($cartdata->promocode!=0)
{
$promo=Promocode::where([['pid','=',$cartdata->promocode]])->first();
//echo $promo->promo_type.'zzz';
//die;
if($promo->promo_type=='0')
{
  if($total_amount >= $promo->amount)
  {
   $response['total_amount']=strval($total_amount-$promo->amount);  
  }
  else
  {
    $response['total_amount']=strval(0);
  }
  
  $response['promo_amount']=strval($promo->amount);
  $response['promo_code']=strval($promo->code) ;
}
else
{
  $prct=$total_amount*$promo->amount/100;
  $prct=round($prct, 2);
  if($promo->max_value > 0)
  {

      if($prct <= $promo->max_value)
      {
        $response['total_amount']=strval($total_amount-$prct); 
        $response['promo_amount']=strval($prct);
        $response['promo_code']=strval($promo->code) ;
      }
      else
      {
         $response['total_amount']=strval($total_amount-$promo->max_value); 
        $response['promo_amount']=strval($promo->max_value);
        $response['promo_code']=strval($promo->code);       
      }

  }
  else
  {
    if($total_amount>$prct)
    {
      $response['total_amount']=strval($total_amount-$prct);
    }
    else
    {
      $response['total_amount']=strval(0);
    }
         
        $response['promo_amount']=strval($prct);
        $response['promo_code']=strval($promo->code) ;   
  }
}

}
else
{
        $response['total_amount']=strval($total_amount);
        $response['promo_amount']=strval($promo_amount);
        $response['promo_code']=strval($promo_code);
}



    //$response['total_amount']=strval($total_amount); 
    //$response['promo_amount']=strval($promo_amount);
 


    $response['total_amount']=strval($total_amount);
    $response['delivery_amount']=strval($del_amount);
    $response['tax_amount']=strval($tax_amount);
    $response['tax_title']=strval($tax_title);
    $response['final_total']=strval($total_amount+$del_amount+$tax_amount-$response['promo_amount']);
    $response['discounted_amount']=strval($dis_amount); 
    $response['total_item']=count($items); 

$cust_add=CustomerAddress::where([['customers_cid','=',$user_id],['default_add','=',1]])->first();
if($cust_add)
{
  $response['address']=strval($cust_add->address);
}
else
{
  $response['address']=strval($address);
}


   // $response['address']=strval($address);
  }
  else
  {
     $response['status']=303;   
     $response['products']=$items; 
     $response['promo_amount']=strval($promo_amount);
     $response['promo_code']=strval($promo_code);
     $response['total_amount']=strval($total_amount);
     $response['discounted_amount']=strval($dis_amount);
     $response['delivery_amount']=strval($del_amount);
     $response['tax_amount']=strval($tax_amount);
     $response['tax_title']=strval($tax_title);
     $response['final_total']="";
     $response['message']='Cart Item is Empty'; 
     $response['total_item']=count($items);
     $response['address']=strval($address);
  }



  }
  return $response;
}

function get_product($item_id,$type,$quantity)
{
  if($type==2)
  {
     $medicine=Medicine::where([['medicine.mid','=',$item_id],['medicine.status','=','1'],['medicine.expiry_date','>',date('Y-m-d')]])->select('medicine.title','medicine.packet_type','medicine.medicine_type','medicine.packet_quantity','medicine.logo','medicine.actual_price','medicine.discounted_price','medicine.mid','medicine.prescription_status','medicine.stock_status','medicine.pharmacy_pid','medicine.hospital_hid')->first();


     if(!empty($medicine))
     {
       $res['mid']=$medicine->mid;
       $res['title']=$medicine->title;
       if($medicine->logo)
       {
       //$temp['logo']=url('/').'/storage/app/public/'.$vl->logo;
         $res['logo']=url('/').'/storage/app/public/'.$medicine->logo;
       }
       else
       {
       $res['logo']=url('/').'/public/uploads/user_image/noimage.png';
       }
       $res['packet_type']=$medicine->packet_type;
       $res['quantity']=$quantity;
       $res['packet_quantity']=$medicine->packet_quantity;
       $res['medicine_type']=$medicine->medicine_type;
       $res['actual_price']=$medicine->actual_price;
       $res['discounted_price']=$medicine->discounted_price;
       $res['prescription_status']=$medicine->prescription_status;
       if($medicine->pharmacy_pid)
       {
 $res['pharmacy_pid']=$medicine->pharmacy_pid;
       }
       else
       {
         $res['pharmacy_pid']=$medicine->hospital_hid;
       }
      
       $res['total_amount']=strval($quantity*$medicine->discounted_price);
       $res['dis_amount']=strval(($quantity*$medicine->actual_price)-($quantity*$medicine->discounted_price));
     }
     else
     {
       $res=array();
     }

     return $res;
 
  }
}
public function cartdetails(Request $request)
   {

$json=new \stdClass();
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }


 $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
       // 'item_id' => 'required',                                         
        //'item_type' => 'required',                                         
       // 'item_source_id' => 'required',                                                                                         
        //'offset' => 'required',                                         
           ]);   

 if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
   $json=array();
$cartdata=$this->getCartdata($request->user_id);
$message=$cartdata['message'];
$status=$cartdata['status'];

unset($cartdata['status']);
unset($cartdata['message']);
$json=$cartdata;
return response()->json([           
            'message'  =>$message,
            'status' => $status,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;


        }


   }


public function make_add_default(Request $request)
   {

        $json=new \stdClass();
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'add_id' => 'required',                                                                                 
           ]);   
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
          
      $address=CustomerAddress::where([['add_id','=',$request->add_id],['customers_cid','=',$request->user_id]])->first();
      if($address)
      {

         $cr['default_add']=0;

         CustomerAddress::where([['customers_cid','=',$request->user_id]])->update($cr);

         $address->default_add=1;
         $address->update();

   $json=new \stdClass();
             return response()->json([           
            'message'  =>'Address set default ',
            'status' => 200,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;


      }
      else
      {

  $json=new \stdClass();

             return response()->json([           
            'message'  =>'Address not found',
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;

      }

        }


  }



public function addtocarts(Request $request)
   {

        $json=new \stdClass();
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'item_id' => 'required',                                         
        'item_type' => 'required',                                         
        'item_source_id' => 'required',                                                                                         
        //'offset' => 'required',                                         
           ]);   
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {


if($request->quantity==0)
{
   $cartprd=Cartproduct::where([['item_type','=',$request->item_type],['user_id','=',$request->user_id],['item_id','=',$request->item_id],['status','=',1]])->first();
   
   if(!empty($cartprd))
   {
    $cartprd->deleted_at=date('Y-m-d h:i:s');
    $cartprd->status=0;
    $cartprd->update();

 $cartprd=Cartproduct::where([['user_id','=',$request->user_id],['status','=',1]])->first();
if(empty($cartprd))
   {
    $cr['deleted_at']=date('Y-m-d h:i:s');
     $cr['status']=0;

 Cart::where([['user_id','=',$request->user_id]])->update($cr);
   }

   }



$cartdata=$this->getCartdata($request->user_id);
$message=$cartdata['message'];
$status=$cartdata['status'];

unset($cartdata['status']);
unset($cartdata['message']);
$json=$cartdata;

    // $json=new \stdClass();   
       return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Added to cart",          
            'data'  =>$json
                 ], 200);

         exit;




}

$cartdata=Cart::where([['user_id','=',$request->user_id],['status','=',1]])->first();
if(empty($cartdata))
{
    $newcart=new Cart;
    $newcart->user_id=$request->user_id;
    $newcart->cart_type=$request->item_type;
    $newcart->source_item=$request->item_source_id;
    $newcart->status=1;
    $newcart->save();


    $newcartp=new Cartproduct;
    $newcartp->cart_id=$newcart->cart_id;
    $newcartp->item_id=$request->item_id;
    $newcartp->item_type=$request->item_type;
    $newcartp->source_id=$request->item_source_id;
    $newcartp->user_id=$request->user_id;
    $newcartp->quantity=$request->quantity;
    $newcartp->status=1;
    $newcartp->save();

}
else
{


$cartprd=Cartproduct::where([['cart_id','=',$cartdata->cart_id],['item_type','=',$request->item_type],['user_id','=',$request->user_id],['item_id','=',$request->item_id],['status','=',1]])->first();
   
   if(empty($cartprd))
   {

     $cr['deleted_at']=date('Y-m-d h:i:s');
     $cr['status']=0;

 Cartproduct::where([['user_id','=',$request->user_id],['item_type','=',$request->item_type],['source_id','!=',$request->item_source_id]])->update($cr);


    $newcart=new Cartproduct;
    $newcart->cart_id=$cartdata->cart_id;
    $newcart->item_id=$request->item_id;
    $newcart->user_id=$request->user_id;
    $newcart->item_type=$request->item_type;
    $newcart->source_id=$request->item_source_id;
    $newcart->quantity=$request->quantity;
    $newcart->status=1;
    $newcart->save();
   }
   else
   {
    if($cartprd->source_id==$request->item_source_id)
   {
      $cartprd->quantity=$request->quantity;
      $cartprd->update();
   }


   }

   // if($cartprd->source_id==$request->item_source_id)
   // {
   //   $cartdata->updated_at=date('Y-m-d h:i:s');
   //   $cartdata->update();

   //   $cartproduct=Cartproduct::where([['user_id','=',$request->user_id],['cart_id','=',$cartdata->cart_id],['item_id','=',$request->item_id],['status','=',1]])->first();
   //   if(empty($cartproduct))
   //   {
   //  $newcart=new Cartproduct;
   //  $newcart->cart_id=$cartdata->cart_id;
   //  $newcart->item_id=$request->item_id;
   //  $newcart->user_id=$request->user_id;
   //  $newcart->quantity=1;
   //  $newcart->status=1;
   //  $newcart->save();
   //   }
   //   else
   //   {
   //    $cartproduct->quantity=$cartproduct->quantity+1;
   //    $cartproduct->update();
   //   }
   // }
   // else
   // {

   //   $cartdata->status=0;
   //   $cartdata->deleted_at=date('Y-m-d h:i:s');
   //   $cartdata->update();


   //   $cr['deleted_at']=date('Y-m-d h:i:s');
   //   $cr['status']=0;
  

   //   Cartproduct::where([['user_id','=',$request->user_id],['cart_id','=',$cartdata->cart_id]])->update($cr);


   //  $newcart=new Cart;
   //  $newcart->user_id=$request->user_id;
   //  $newcart->cart_type=$request->item_type;
   //  $newcart->source_item=$request->item_source_id;
   //  $newcart->status=1;
   //  $newcart->save();


   //  $newcarts=new Cartproduct;
   //  $newcarts->cart_id=$newcart->cart_id;
   //  $newcarts->item_id=$request->item_id;
   //  $newcarts->user_id=$request->user_id;
   //  $newcarts->quantity=1;
   //  $newcarts->status=1;
   //  $newcarts->save();

   // }
}

$cartdata=$this->getCartdata($request->user_id);
$message=$cartdata['message'];
$status=$cartdata['status'];

unset($cartdata['status']);
unset($cartdata['message']);
$json=$cartdata;

    // $json=new \stdClass();   
       return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Added to cart",          
            'data'  =>$json
                 ], 200);

         exit;

        }


      }


public function medicine_category(Request $request)
   {
  $json=new \stdClass();
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'pid' => 'required',                                         
                                                
        //'offset' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

          if(!$request->offset)
          {
           $request->offset=0; 
          }
$medicine=MCategory::where([['mcategory.pharmacy_pid','=',$request->pid],['mcategory.status','=','1']])->select('mcategory.mcatid','mcategory.pharmacy_pid','mcategory.title','mcategory.description')->offset($request->offset)
                ->limit(100)->get();

if($medicine->isEmpty())
{
   return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>new \stdClass(),                        
            'message'  =>"Data Not Found",
                 ], 200);
}
else
{
$output=array();
foreach($medicine as $vl)
        {
          $temp=array();
        
        $temp['mcatid']=($vl['mcatid'])?$vl['mcatid']:'';  
        $temp['title']=($vl['title'])?$vl['title']:'';  
          $temp['pid']=($vl['pharmacy_pid'])?$vl['pharmacy_pid']:''; 
$temp['description']=($vl['description'])?$vl['description']:'';   


// if($vl->logo)
// {
//   $temp['logo']=url('/').'/'.$vl->logo;

// }
// else
// {
// $temp['logo']=url('/').'/public/uploads/user_image/noimage.png';
// }


$output[]=$temp; 
        }
  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$output,                        
            'message'  =>"Data  Found",
                 ], 200);
}

}
   }

public function medicine_category_list(Request $request)
   {
$json=new \stdClass();
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'pid' => 'required',                                         
                                                
        //'offset' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

          if(!$request->offset)
          {
           $request->offset=0; 
          }
$medicine=MCategory::where([['mcategory.pharmacy_pid','=',$request->pid],['mcategory.status','=','1']])->select('mcategory.mcatid','mcategory.title','mcategory.description')->offset($request->offset)
                ->limit(100)->get();

if($medicine->isEmpty())
{
   return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>new \stdClass(),                        
            'message'  =>"Data Not Found",
                 ], 200);
}
else
{
$output=array();
foreach($medicine as $vl)
        {
          $temp=array();
        
        $temp['mcatid']=($vl['mcatid'])?$vl['mcatid']:'';  
        $temp['pid']=($vl['pharmacy_pid'])?$vl['pharmacy_pid']:'';  
        $temp['title']=($vl['title'])?$vl['title']:'';  
$temp['description']=($vl['description'])?$vl['description']:'';   


// if($vl->logo)
// {
//   $temp['logo']=url('/').'/'.$vl->logo;

// }
// else
// {
// $temp['logo']=url('/').'/public/uploads/user_image/noimage.png';
// }


$output[]=$temp; 
        }
  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$output,                        
            'message'  =>"Data  Found",
                 ], 200);
}

}
}


function get_cart_quantity($uid,$mid,$source,$type)
{
  $cartprd=Cartproduct::where([['item_type','=',$type],['user_id','=',$uid],['item_id','=',$mid],['status','=',1],['source_id','=',$source]])->first();
   
   if(!empty($cartprd))
   {
    return $cartprd->quantity;
   }
   else
   {
    return 0;
   }
}


function check_cart_status($uid,$mid,$source,$type)
{
  $cartprd=Cartproduct::where([['item_type','=',$type],['user_id','=',$uid],['item_id','=',$mid],['status','=',1],['source_id','=',$source]])->first();
   
   if(empty($cartprd))
   {
    return 0;
   }
   else
   {
    return 1;
   }
}


public function medicine_list(Request $request)
   {
$json=new \stdClass();
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'pid' => 'required',                                         
                                                
        //'offset' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
          

          if(!$request->offset)
          {
           $request->offset=0; 
          }

          if($request->hosp_id)
          {
   $medicine=Medicine::where([['medicine.hospital_hid','=',$request->hosp_id],['medicine.status','=','1'],['medicine.expiry_date','>',date('Y-m-d')]])->select('medicine.title','medicine.short_description','medicine.packet_type','medicine.medicine_type','medicine.packet_quantity','medicine.logo','medicine.actual_price','medicine.discounted_price','medicine.mid','medicine.prescription_status','medicine.stock_status','medicine.pharmacy_pid','medicine.hospital_hid');      
          }
          else
          {
 $medicine=Medicine::where([['medicine.pharmacy_pid','=',$request->pid],['medicine.status','=','1'],['medicine.expiry_date','>',date('Y-m-d')]])->select('medicine.title','medicine.short_description','medicine.packet_type','medicine.medicine_type','medicine.packet_quantity','medicine.logo','medicine.actual_price','medicine.discounted_price','medicine.mid','medicine.prescription_status','medicine.stock_status','medicine.pharmacy_pid','medicine.hospital_hid');           
          }


 



$medicine->leftjoin('m_category_medicine','m_category_medicine.medicine_mid','medicine.mid');

$medicine->leftjoin('mcategory','m_category_medicine.m_category_mcatid','mcategory.mcatid');

 if($request->mcatid)
 {
$medicine->join('m_category_medicine','m_category_medicine.medicine_mid','medicine.mid')->where([['m_category_medicine.m_category_mcatid','=',$request->mcatid]]);
 } 
 if($request->search)
 {
 $search=$request->search;
 $medicine->where(function($medicine) use ($search){
        $medicine->where('medicine.title', 'like', "%$search%")
              ->orWhere('medicine.short_description', 'like', "%$search%")
              ->orWhere('mcategory.title', 'like', "%$search%");
    });
 } 
 $medicine=$medicine->offset($request->offset)->groupBy('medicine.mid')->limit(100)->get();

if($medicine->isEmpty())
{
   return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>new \stdClass(),                        
            'message'  =>"Data Not Found",
                 ], 200);
}
else
{
$output=array();
foreach($medicine as $vl)
        {
          $temp=array();
        $temp['discounted_price']=($vl['discounted_price'])?$vl['discounted_price']:'';  
        $temp['actual_price']=($vl['actual_price'])?$vl['actual_price']:'';  
        $temp['mid']=($vl['mid'])?$vl['mid']:'';  
        $temp['title']=($vl['title'])?$vl['title']:'';  
$temp['short_description']=($vl['short_description'])?$vl['short_description']:'';     $temp['pharmacy_pid']=($vl['pharmacy_pid'])?$vl['pharmacy_pid']:'';
$temp['short_description']=($vl['short_description'])?$vl['short_description']:'';   
if($request->hosp_id)
          {
$temp['pharmacy_pid']=($vl['hospital_hid'])?$vl['hospital_hid']:'';  
            
          }



 // $temp['hospital_hid']=($vl['hospital_hid'])?$vl['hospital_hid']:'';
$temp['packet_type']=strtolower(($vl['packet_type'])?$vl['packet_type']:'');  
$temp['medicine_type']=strtolower(($vl['medicine_type'])?$vl['medicine_type']:'');  
$temp['packet_quantity']=($vl['packet_quantity'])?$vl['packet_quantity']:'';  
$temp['prescription_status']=(int)$vl['prescription_status'];  
$temp['stock_status']=(int)$vl['stock_status'];  
$temp['cart_status']=$this->check_cart_status($request->user_id,$vl->mid,$vl['pharmacy_pid'],2);  

if($vl->logo)
{
  $temp['logo']=url('/').'/storage/app/public/'.$vl->logo;

}
else
{
$temp['logo']=url('/').'/public/uploads/user_image/noimage.png';
}


$output[]=$temp; 
        }
  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$output,                        
            'message'  =>"Data  Found",
                 ], 200);
}

}
}

public function test_list(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'lid' => 'required',                                         
        'type' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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

            $json= new \stdClass();


             return response()->json([           
            'message'  =>$ers,
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cr=array();
$tests=array();
        $dar=array();

if($request->type==1)
{
 $trps=Tests::where([['tests.hospital_hid','=',$request->lid]])->select('tests.*')->get(); 
}
else
{
   $trps=Tests::where([['tests.labs_lid','=',$vl->lid]])->select('tests.*')->get(); 
}



if($trps->isEmpty())
{
$json= new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;

}
else
{
  $prrs=array();
$darrs=array();
           foreach($trps as $vl)
        {

$darrs=$vl;
if($vl->files)
{
$darrs['image']='';
}
else
{
$darrs['image']=url('/').'/storage/app/public/'.$vl->image;

}
$darrs['labname']='';  
$darrs['actual_price']=($vl['actual_price'])?$vl['actual_price']:'';  
$darrs['discounted_price']=($vl['discounted_price'])?$vl['discounted_price']:'';  
//array_push($prrs,$darrs);
$tests[]=$darrs;
  }


      return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Data  Found",          
            'data'  =>$tests
                 ], 200);

         exit;
}
}
}



public function lab_details(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'lid' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cr=array();
        $dar=array();
$trp=Labs::where([['status','=',1],['lid','=',$request->lid]])->select('*')->get();
if(empty($trp))
{
   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>'',                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{
   
           foreach($trp as $vl)
        {
$dar=$vl;
if($vl['discount']=='')
{
 $dar['discount']=""; 
}
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;


$trps=Tests::leftjoin('labs','labs.lid','tests.labs_lid')->where([['tests.labs_lid','=',$vl->lid]])->select('tests.*','labs.name as labname')->get();


if($trps->isEmpty())
{
$prrs=array();;
}
else
{
  $prrs=array();
$darrs=array();
           foreach($trps as $vl)
        {

$darrs=$vl;
if($vl->files)
{
$darrs['image']='';
}
else
{
$darrs['image']=url('/').'/storage/app/public/'.$vl->image;

}
$darrs['labname']=($vl['labname'])?$vl['labname']:'';  
$darrs['actual_price']=($vl['actual_price'])?$vl['actual_price']:'';  
$darrs['discounted_price']=($vl['discounted_price'])?$vl['discounted_price']:'';  
array_push($prrs,$darrs);
  }


}


$dar['tests']=$prrs;


array_push($cr,$dar);
        } 

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);
}  
}
}

public function bookings_logs(Request $request)
   {
$json='';
 if(empty($request->app_type))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'bid' => 'required',                                         
                                                 
                                            
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

//echo $request->bid;
$darr=array();
$lead_data=Leadsdata::where([['leads_data.lid',$request->bid],['leads_data.status',1],['leads_data.fid','!=',21]])
->leftjoin('fields','leads_data.fid','fields.fid')
->leftjoin('admin_users','admin_users.id','leads_data.action_by')
        ->select('leads_data.*','fields.name','admin_users.name as uname')
->orderBy('leads_data.did', 'desc')
        ->get();
$cr=array();
//print_r($lead_data);



$trp=\DB::table('customer_prescription')->where([['id','=',$request->bid]])->select('*')->first();

$od_detail=array();
if($trp->prs_type==1)
{


$add_detail=Orderaddress::where([['oid','=',$trp->oid]])->select('*')->first();

$order_detail=Customerorders::where([['oid','=',$trp->oid]])->select('*')->first();
if($order_detail)
{
  $od_detail['final_amount']=$order_detail->final_amount;
  $od_detail['gst_amount']=$order_detail->gst_amount;
  //$od_detail['gst_title']='';
    $od_detail['payment_type']=$order_detail->payment_id;

  $od_detail['gst_percentage']=$order_detail->gst_percentage;
  $od_detail['promocode']=$order_detail->promocode;
  $od_detail['delivery_amount']=$order_detail->delivery_amount;
  $od_detail['promo_amount']=$order_detail->promo_amount;
  $od_detail['total_amount']=$order_detail->total_amount;
  $od_detail['discount_amount']=$order_detail->discount_amount;
}

$order_detail=Ordersproduct::where([['oid','=',$trp->oid]])->select('*')->get();
if($order_detail->isEmpty())
{

}
else
{
   foreach ($order_detail as $value) {
     $od=array();
     $od['item_type']=$value->item_type;
     $od['quantity']=$value->quantity;
     $od['item_name']=$value->item_name;
     $od['item_actual_price']=$value->item_actual_price;

     $od['item_discounted_price']=$value->item_discounted_price;
     $od['packet_type']=$value->packet_type;

     $od['packet_quantity']=$value->packet_quantity;
     $od['medicine_type']=$value->medicine_type;
      
      if($value->item_logo)
      {
        $od['logo']=url('/').'/storage/app/public/public/upload/medicine/'.$value->item_logo;

      }
      else
      {
      $od['logo']=url('/').'/public/uploads/user_image/noimage.png';
      }

      $od_detail['products'][]=$od;
   }
}
$add_detail=Orderaddress::where([['oid','=',$trp->oid]])->select('*')->first();
$addetail['address']=$add_detail->address;
$addetail['full_address']=$add_detail->full_address;
$addetail['latitude']=$add_detail->latitude;
$addetail['longitude']=$add_detail->longitude;
$addetail['name']=$add_detail->name;
$addetail['contact_no']=$add_detail->contact_no;
$addetail['email']=$add_detail->email;
$od_detail['address']=$addetail;

}
if(empty($od_detail))
{
$od_detail=new \stdClass();
$darr=$od_detail;
}
else
{
  $darr=$od_detail;
}





        if(!$lead_data->isEmpty())
{
  foreach($lead_data as $vb)
  {
    $new=array();

    $new['field_name']=$vb['name'];
    $new['field_value']=$vb['value'];
    $new['update_on']=date('D M Y h:i:s', strtotime($vb['created_at']));
    //$cr[]=$new;
    array_push($cr,$new);
   }



$trp=\DB::table('customer_prescription')->where([['id','=',$request->bid]])->select('customers_cid')->first();

$userdata=$this->get_customer($trp->customers_cid);



$fields=Fields::where([['action_type','=',$userdata->app_type]]);

 $fields=$fields->where(function($fields){
        $fields->where('fields.name', 'like', "%status%")
              ->orWhere('fields.name', 'like', "%booking_status%")
              ->orWhere('fields.name', 'like', "%Booking Status%")
              ->orWhere('fields.name', 'like', "%booking status%")
              ->orWhere('fields.name', 'like', "%lead status%")
              ->orWhere('fields.name', 'like', "%lead_status%");
    });

$trp=\DB::table('admin_users')->where([['type','=',$userdata->app_type]])->select('id');

    if($userdata->app_type=='1')
    {
    $trp->where([['doctors','=',$userdata->source_id]]); 
    }  
    if($userdata->app_type=='2')
    {
    $trp->where([['pharmacy','=',$userdata->source_id]]); 
    }
    if($userdata->app_type=='3')
    {
    $trp->where([['labs','=',$userdata->source_id]]);  
    }
    if($userdata->app_type=='5')
    {
    $trp->where([['labs','=',$userdata->source_id]]);  
    }    
    if($userdata->app_type=='6')
    {
    $trp->where([['healthcare','=',$userdata->source_id]]);  
    }
    if($userdata->app_type=='7')
    {
    $trp->where([['hospital','=',$userdata->source_id]]);  
    }    
$trp=$trp->first();
$sts=0;
if($trp)
{
  $fields=$fields->where([['action_by','=',$trp->id]]);
}


$fields=$fields->select('fid')->first();
$fields=array('1');
if(!empty($fields))
{



$crp=Leadsdata::
join('fields','fields.fid','leads_data.fid')
->where([['leads_data.lid','=',$request->bid]])
;

 $crp=$crp->where(function($crp){
        $crp->where('fields.name', 'like', "%status%")
              ->orWhere('fields.name', 'like', "%booking_status%")
              ->orWhere('fields.name', 'like', "%Booking Status%")
              ->orWhere('fields.name', 'like', "%booking status%")
              ->orWhere('fields.name', 'like', "%lead status%")
              ->orWhere('fields.name', 'like', "%lead_status%");
    });
$crp=$crp->select('leads_data.value')->latest('leads_data.did')->first();



// $crp=Leadsdata::where([['lid','=',$request->bid],['fid','=',$fields->fid]])
// ->select('value')->latest('did')->first();
//echo "sssss";
if($crp)
{
  $sts=$crp->value; 
}
else
{
  $sts=0;
}
}
else
{
$sts=0;
}


// if($sts)
// {
// $booking_status=$sts;  
// }
// else
// {
// $booking_status='Pending';  
// }

$trp=\DB::table('customer_prescription')->where([['id','=',$request->bid]])->select('*')->first();
if($sts)
{
$booking_status=$sts;  
}
else
{

if($trp->prs_type==1)
{
  $booking_status='Order Placed'; 
}
else
{
  $booking_status='Pending'; 
}
 
}







//    $crp=Leadsdata::where([['lid','=',$request->bid],['fid','=',21]])
// ->select('value')->latest('did')->first();

// if($crp)
// {
// $booking_status=$crp->value;  
// } 
// else
// {
// $booking_status='Pending';    
// }

     return response()->json([
            'otp' => 0,
            'status' => 200,
            'booking_status'=>$booking_status,          
            'order_detail'=>$darr,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);

}
else
{
if(empty($darr))
{
$darr=new \stdClass();
}
  $cr=array();
return response()->json([
            'otp' => 0,
            'status' => 400,   
             'order_detail'=>$darr,  
             'booking_status'=>'Pending',       
            'data'=>$cr,                        
            'message'  =>"Data Not Found",
                 ], 200);

}   

        }

      }

//Sehatsahayak@2020
public function my_bookings(Request $request)
   {
$json='';
 if(empty($request->app_type))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'uid' => 'required',                                         
                                                 
                                            
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {



$prr=array();
$darr=array();
$cr=array();
//\DB::enableQueryLog();

$trp=Prescriptions::leftjoin('doctors','doctors.did','customer_prescription.doctors_did')
->leftjoin('pharmacy','pharmacy.pid','customer_prescription.pharmacy_pid')
->leftjoin('hospitals','hospitals.hid','customer_prescription.hospital_hid')
->leftjoin('homehealthcare','homehealthcare.hhid','customer_prescription.homehealthcare_hhid')
->leftjoin('labs','labs.lid','customer_prescription.labs_lid')
->leftjoin('customers','customers.cid','customer_prescription.customers_cid');

$uid=$request->uid;

if($request->app_type==1)
{
  // $trp->where([['customer_prescription.doctors_did','=',$request->uid],['customer_prescription.type','<',4]]);

  $trp->where(function ($query) use ($uid) {
    $query->where([['customer_prescription.doctors_did','=',$uid],['customer_prescription.type','<',4]])
          ->orWhere([['customers.source_id','=',$uid],
            ['customers.app_type','=','1']]);
   });
}

if($request->app_type==2)
{

$trp->where(function ($query) use ($uid) {
    $query->where([['customer_prescription.pharmacy_pid','=',$uid],['customer_prescription.type','<',4]])
          ->orWhere([['customers.source_id','=',$uid],
            ['customers.app_type','=','2']]);
 }); 

}

if($request->app_type==3)
{

$trp->where(function ($query) use ($uid) {
    $query->where([['customer_prescription.labs_lid','=',$uid],['customer_prescription.type','<',4]])
          ->orWhere([['customers.source_id','=',$uid],
            ['customers.app_type','=','3']]);
});

}


if($request->app_type==6)
{

$trp->where(function ($query) use ($uid) {
    $query->where([['customer_prescription.homehealthcare_hhid','=',$uid],['customer_prescription.type','<',4]])
          ->orWhere([['customers.source_id','=',$uid],
            ['customers.app_type','=','6']]);
});

}
if($request->app_type==7)
{

$trp->where(function ($query) use ($uid) {
    $query->where([['customer_prescription.hospital_hid','=',$uid],['customer_prescription.type','<',4]])
          ->orWhere([['customers.source_id','=',$uid]]);
});

}
$trp=$trp->groupBy('customer_prescription.id');

$trp=$trp->select('customer_prescription.*','doctors.name as dname','pharmacy.name as pname','homehealthcare.name as hname','labs.name as lname','customers.name as cname','customers.contact_no as ccontact_no','hospitals.name as hpname')->latest('customer_prescription.id')->get();

//dd(\DB::getQueryLog());
if($trp->isEmpty())
{
  $cr=array();
return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>$cr,                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{

        foreach($trp as $vl)
        {

$darr=$vl;
$darr['dname']=($vl['dname'])?$vl['dname']:'';  
//$darr['deleted_at']='';  
$darr['customer_name']=($vl['cname'])?$vl['cname']:'';  
$darr['customer_mobile']=($vl['ccontact_no'])?$vl['ccontact_no']:'';  
$darr['pname']=($vl['pname'])?$vl['pname']:'';  
$darr['lname']=($vl['lname'])?$vl['lname']:'';  
if($vl->hospital_hid)
{
  $darr['hpname']=($vl['hpname'])?$vl['hpname']:'';  
}
$darr['booking_time']=($vl['booking_time'])?$vl['booking_time']:'';  
$darr['booking_date']=($vl['booking_date'])?$vl['booking_date']:'';  
$darr['title']=($vl['comment'])?$vl['comment']:'';


$userdata=$this->get_customer($vl->customers_cid);



$fields=Fields::where([['action_type','=',$userdata->app_type]]);

 $fields=$fields->where(function($fields){
        $fields->where('fields.name', 'like', "%status%")
              ->orWhere('fields.name', 'like', "%booking_status%")
              ->orWhere('fields.name', 'like', "%Booking Status%")
              ->orWhere('fields.name', 'like', "%booking status%")
              ->orWhere('fields.name', 'like', "%lead status%")
              ->orWhere('fields.name', 'like', "%lead_status%");
    });

$trp=\DB::table('admin_users')->where([['type','=',$userdata->app_type]])->select('id');

    if($userdata->app_type=='1')
    {
    $trp->where([['doctors','=',$userdata->source_id]]); 
    }  
    if($userdata->app_type=='2')
    {
    $trp->where([['pharmacy','=',$userdata->source_id]]); 
    }
    if($userdata->app_type=='3')
    {
    $trp->where([['labs','=',$userdata->source_id]]);  
    }
    if($userdata->app_type=='5')
    {
    $trp->where([['labs','=',$userdata->source_id]]);  
    }    
    if($userdata->app_type=='6')
    {
    $trp->where([['healthcare','=',$userdata->source_id]]);  
    }
    if($userdata->app_type=='7')
    {
    $trp->where([['hospital','=',$userdata->source_id]]);  
    }  

$trp=$trp->first();
$sts=0;
if($trp)
{
  $fields=$fields->where([['action_by','=',$trp->id]]);
}



$fields=$fields->select('fid')->first();
$fields=array('1');
if(!empty($fields))
{
// $crp=Leadsdata::where([['lid','=',$vl['id']],['fid','=',$fields->fid]])
// ->select('value')->latest('did')->first();


$crp=Leadsdata::
join('fields','fields.fid','leads_data.fid')
->where([['leads_data.lid','=',$vl['id']]])
;

 $crp=$crp->where(function($crp){
        $crp->where('fields.name', 'like', "%status%")
              ->orWhere('fields.name', 'like', "%booking_status%")
              ->orWhere('fields.name', 'like', "%Booking Status%")
              ->orWhere('fields.name', 'like', "%booking status%")
              ->orWhere('fields.name', 'like', "%lead status%")
              ->orWhere('fields.name', 'like', "%lead_status%");
    });
$crp=$crp->select('leads_data.value')->latest('leads_data.did')->first();


//echo "sssss";
if($crp)
{
  $sts=$crp->value; 
}
else
{
  $sts=0;
}
}
else
{
$sts=0;
}


if($sts)
{
$darr['booking_status']=$sts;  
}
else
{
if($vl->prs_type==1)
{
  $darr['booking_status']='Order Placed'; 
}
else
{
  $darr['booking_status']='Pending'; 
}
}



if($vl->files)
{
$darr['files']=url('/').'/public/prescription/'.$vl->files;  
}
else
{
  $darr['files']='';
}

  $crs=array();

$darr['logs']=$crs;
array_push($prr,$darr);


        }
$cr=$prr;  

}

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


}
  
}

public function update_sliders(Request $request)
   {

 $json='';
 if(empty($request->app_type))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }

         $validator = Validator::make($request->all(), [
        'image' => 'required',                                          
        'types' => 'required',                                          
        'uid' => 'required',                                          
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
else
{

$cr=array();
if($request->app_type==1)
{
$cr['doctors_did']=$request->uid;
}
if($request->app_type==2)
{
$cr['pharmacy_pid']=$request->uid;
}
if($request->app_type==3)
{
$cr['labs_lid']=$request->uid;
}
if($request->app_type==6)
{
$cr['homehealthcare_hhid']=$request->uid;
}
if($request->app_type==6)
{
$cr['hospitals_hid']=$request->uid;
}
$cr['types']=$request->types;
 if(!empty($request->file('image')))
              {                    
          $imageNamet =date('ymdhis').'.'.$request->image->extension();          
          $request->image->move('storage/app/public/images', $imageNamet);
          $cr['image']='images/'.$imageNamet;
              
              }

  $cr['created_at']=date('Y-m-d h:i:s');
  
  Sliders::create($cr);

  $cr=array();

       return response()->json([
            'otp' => 0,
            'status' => 200,  
            'data' => $cr,  
            'message'  =>"Update Successfully",          
  
                 ], 200);

         exit;
}
}

public function delete_sliders(Request $request)
   {

 $json='';
 if(empty($request->app_type))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }

         $validator = Validator::make($request->all(), [
        'sid' => 'required',                                          
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
else
{

  $cr=array();
  $cr['deleted_at']=date('Y-m-d h:i:s');
  Sliders::where([['sid','=',$request->sid]])->update($cr);

  $cr=array();

       return response()->json([
            'otp' => 0,
            'status' => 200,  
            'data' => $cr,  
            'message'  =>"Delete Successfully",          
  
                 ], 200);

         exit;
}

}








public function admin_sliders(Request $request)
   {

$json='';

 if(empty($request->app_type))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }

         $validator = Validator::make($request->all(), [
        'uid' => 'required',                                          
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
else
{

$cr=array();

  $slid=Sliders::where([['status','=',1]]);
    if($request->app_type==1)
    {
        $slid=$slid->where([['doctors_did','=',$request->uid]]);
    }
    elseif ($request->app_type==2) {
          $slid=$slid->where([['pharmacy_pid','=',$request->uid]]);
    }
    elseif ($request->app_type==3) {
            $slid=$slid->where([['labs_lid','=',$request->uid]]);
    }
    elseif ($request->app_type==6) {
            $slid=$slid->where([['homehealthcare_hhid','=',$request->uid]]);
    }
  elseif ($request->app_type==7) {
            $slid=$slid->where([['hospitals_hid','=',$request->uid]]);
    }   
    $slid=$slid->get();
        foreach($slid as $vl)
        {
$dar['sid']=$vl->sid;
$dar['types']=$vl->types;
$dar['slider']=url('/').'/storage/app/public/'.$vl->image;
array_push($cr,$dar);
        }



       return response()->json([
            'otp' => 0,
            'status' => 200,  
            'data' => $cr,  
            'message'  =>"Data Found Successfully",          
  
                 ], 200);

         exit;

}

}

public function updates_profile(Request $request)
   {

$json='';
 if(empty($request->app_type))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }

         $validator = Validator::make($request->all(), [
        'name' => 'required',                                         
        'address' => 'required',                                         
        'message' => 'required',                                         
        'uid' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
else
{

$cr=array();
 if(!empty($request->file('image')))
              {                    
          $imageNamet =date('ymdhis').'.'.$request->image->extension();          
          $request->image->move('storage/app/public/images', $imageNamet);
            $cr['profile_pic']='images/'.$imageNamet;
              }
$cr['name']=$request->name;
$cr['address']=$request->address;
$cr['message']=$request->message;

if($request->app_type==1)
{
$cr['time_start']=$request->time_start;
$cr['time_end']=$request->time_end;
$cr['fees']=$request->fees;
$cr['experience_details']=$request->experience_details;


Doctors::where([['did','=',$request->uid]])->update($cr);
}
if($request->app_type==2)
{
$cr['time_start']=$request->time_start;
$cr['time_end']=$request->time_end;
$cr['discount']=$request->discount;
Pharmacy::where([['pid','=',$request->uid]])->update($cr);
}
if($request->app_type==3)
{
$cr['discount']=$request->discount;
Labs::where([['lid','=',$request->uid]])->update($cr);

}
if($request->app_type==6)
{
$cr['discount']=$request->discount;
hhcare::where([['hhid','=',$request->uid]])->update($cr);

}

if($request->app_type==1)
{
  $doctors=Doctors::where([['did','=',$request->uid]])->select('*')->first();
}
if($request->app_type==2)
{
  $doctors=Pharmacy::where([['pid','=',$request->uid]])->select('*')->first();
}
if($request->app_type==3)
{
  $doctors=Labs::where([['lid','=',$request->uid]])->select('*')->first();
}
if($request->app_type==6)
{
  $doctors=hhcare::where([['hhid','=',$request->uid]])->select('*')->first();
}
if($request->app_type==7)
{
  $doctors=Hospitals::where([['hid','=',$request->uid]])->select('*')->first();
}
$cr=array();
if($request->app_type==1)
{
$cr['name']=$doctors->name;
$cr['id']=$doctors->did;
$cr['profile_pic']=url('/').'/storage/app/public/'.$doctors->profile_pic;
$cr['time_start']=$doctors->time_start;
$cr['time_end']=$doctors->time_end;
$cr['message']=$doctors->message;
$cr['address']=$doctors->address;
$cr['fees']=$doctors->fees;
$cr['experience_details']=$doctors->experience_details;
$cr['discount']='';
$cr['app_type']=1;
$cr['contact_no']=$doctors->contact_no;
$cr['email']=$doctors->email;
}
if($request->app_type==2)
{
$cr['name']=$doctors->name;
$cr['id']=$doctors->pid;
$cr['profile_pic']=url('/').'/storage/app/public/'.$doctors->profile_pic;
$cr['time_start']=$doctors->time_start;
$cr['time_end']=$doctors->time_end;
$cr['message']=$doctors->message;
$cr['address']=$doctors->address;
$cr['discount']=$doctors->discount;
$cr['fees']='';
$cr['experience_details']='';
$cr['app_type']=2;
$cr['contact_no']=$doctors->contact_no;
$cr['email']=$doctors->email;
}
if($request->app_type==3)
{
$cr['name']=$doctors->name;
$cr['id']=$doctors->lid;
$cr['profile_pic']=url('/').'/storage/app/public/'.$doctors->profile_pic;
$cr['time_start']='';
$cr['time_end']='';
$cr['message']=$doctors->message;
$cr['address']=$doctors->address;
$cr['discount']=$doctors->discount;
$cr['fees']='';
$cr['experience_details']='';
$cr['app_type']=3;
$cr['contact_no']=$doctors->contact_no;
$cr['email']=$doctors->email;
}

if($request->app_type==6)
{
$cr['name']=$doctors->name;
$cr['id']=$doctors->hhid;
$cr['profile_pic']=url('/').'/storage/app/public/'.$doctors->profile_pic;
$cr['time_start']='';
$cr['time_end']='';
$cr['message']=$doctors->message;
$cr['address']=$doctors->address;
$cr['discount']=$doctors->discount;
$cr['fees']='';
$cr['experience_details']='';
$cr['app_type']=6;
$cr['contact_no']=$doctors->contact_no;
$cr['email']=$doctors->email;
}

if($request->app_type==7)
{
$cr['name']=$doctors->name;
$cr['id']=$doctors->hid;
$cr['profile_pic']=url('/').'/storage/app/public/'.$doctors->profile_pic;
$cr['time_start']='';
$cr['time_end']='';
$cr['message']=$doctors->message;
$cr['address']=$doctors->address;
$cr['discount']=$doctors->discount;
$cr['fees']='';
$cr['experience_details']='';
$cr['app_type']=7;
$cr['contact_no']=$doctors->contact_no;
$cr['email']=$doctors->email;
}


//print_r($cr);
       return response()->json([
            'otp' => 0,
            'status' => 200,  
            'data' => $cr,  
            'message'  =>"Update Successfully",          
  
                 ], 200);

         exit;


}

}



public function busers_login(Request $request)
   {

$json='';


//$ser = "AAAAGdiMNRA:APA91bGOldQuyisH0Q1rAQC5evVKIqyk883CcgxfbuBqu11ebrdAj5bqRYZh_sGW4CJuW34prwjsW13q3-9jLCZnj4rZnCBJXSRP_H-Ymtw3no_v-HF2mUIua4hkpvv1gb5NORhMopsC";



//$this->android_notification($ser,"eJN8q0d-QfqNZXWw5XdYTm:APA91bGGzEb1a-8Adj14I-ctjaN1LrECQR8amFBUTw4-ejuAU2V9V-MzjVv89qeSlR9ytOBgmVuFR9uGRkq0NBzYADnM58_OvurytOK7okJqCeWaQ3moRNUQop2M9_QO_RDyKic-A37e","message","title");

//die;

 if(empty($request->app_type))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }

         $validator = Validator::make($request->all(), [
        'mobile' => 'required',                                         
        'password' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
else
{


$request->device_token=($request->device_token)?$request->device_token:'';
$request->device_id=($request->device_id)?$request->device_id:'';
$request->device_type=($request->device_type)?$request->device_type:'';



if($request->app_type==1)
{
  $doctors=Doctors::where([['contact_no','=',$request->mobile],['password','=',$request->password]])->select('*')->first();
}
if($request->app_type==2)
{
  $doctors=Pharmacy::where([['contact_no','=',$request->mobile],['password','=',$request->password]])->select('*')->first();
}
if($request->app_type==3)
{
  $doctors=Labs::where([['contact_no','=',$request->mobile],['password','=',$request->password]])->select('*')->first();
}

if($request->app_type==6)
{
  $doctors=hhcare::where([['contact_no','=',$request->mobile],['password','=',$request->password]])->select('*')->first();
}
if($request->app_type==7)
{
  $doctors=Hospitals::where([['contact_no','=',$request->mobile],['password','=',$request->password]])->select('*')->first();
}
if(empty($doctors))
 {
   $cr=new \stdClass();
   return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>$cr,                        
            'message'  =>"Invalid Username or Password",
                 ], 200);

 }
 else
 {

$cr=array();
if($request->app_type==1)
{

Doctors::where([['did','=',$doctors->did]])->update(['device_token'=>$request->device_token,'device_id'=>$request->device_id,'device_type'=>$request->device_type]);
 
$cr['name']=$doctors->name;
$cr['contact_no']=$doctors->contact_no;
$cr['email']=$doctors->email;
$cr['id']=$doctors->did;
if($doctors->profile_pic)
{
$cr['profile_pic']=url('/').'/storage/app/public/'.$doctors->profile_pic;  
}
else
{
 $cr['profile_pic']='';
}

$cr['time_start']=($doctors->time_start)?$doctors->time_start:'';
$cr['time_end']=($doctors->time_end)?$doctors->time_end:'';
$cr['message']=($doctors->message)?$doctors->message:'';;
$cr['address']=($doctors->address)?$doctors->address:'';;
$cr['fees']=($doctors->fees)?$doctors->fees:'';;
$cr['experience_details']=($doctors->experience_details)?$doctors->experience_details:'';
$cr['discount']='';
$cr['app_type']=1;
}

if($request->app_type==2)
{

Pharmacy::where([['pid','=',$doctors->pid]])->update(['device_token'=>$request->device_token,'device_id'=>$request->device_id,'device_type'=>$request->device_type]);

$cr['name']=$doctors->name;
$cr['id']=$doctors->pid;
$cr['contact_no']=$doctors->contact_no;
$cr['email']=$doctors->email;
if($doctors->profile_pic)
{
$cr['profile_pic']=url('/').'/storage/app/public/'.$doctors->profile_pic;  
}
else
{
 $cr['profile_pic']='';
}
$cr['time_start']=($doctors->time_start)?$doctors->time_start:'';
$cr['time_end']=($doctors->time_end)?$doctors->time_end:'';
$cr['message']=($doctors->message)?$doctors->message:'';;
$cr['address']=($doctors->address)?$doctors->address:'';;
$cr['discount']=($doctors->discount)?$doctors->discount:'';
$cr['fees']='';
$cr['experience_details']='';
$cr['app_type']=2;
}
if($request->app_type==3)
{

Labs::where([['lid','=',$doctors->lid]])->update(['device_token'=>$request->device_token,'device_id'=>$request->device_id,'device_type'=>$request->device_type]);

$cr['name']=$doctors->name;
$cr['id']=$doctors->lid;
$cr['contact_no']=$doctors->contact_no;
$cr['email']=$doctors->email;
if($doctors->profile_pic)
{
$cr['profile_pic']=url('/').'/storage/app/public/'.$doctors->profile_pic;  
}
else
{
 $cr['profile_pic']='';
}
$cr['time_start']='';
$cr['time_end']='';
$cr['message']=($doctors->message)?$doctors->message:'';;
$cr['address']=($doctors->address)?$doctors->address:'';;
$cr['discount']=($doctors->discount)?$doctors->discount:'';
$cr['fees']='';
$cr['experience_details']='';
$cr['app_type']=3;
}


if($request->app_type==6)
{

hhcare::where([['hhid','=',$doctors->hhid]])->update(['device_token'=>$request->device_token,'device_id'=>$request->device_id,'device_type'=>$request->device_type]);

$cr['name']=$doctors->name;
$cr['id']=$doctors->hhid;
$cr['contact_no']=$doctors->contact_no;
$cr['email']=$doctors->email;
if($doctors->profile_pic)
{
$cr['profile_pic']=url('/').'/storage/app/public/'.$doctors->profile_pic;  
}
else
{
 $cr['profile_pic']='';
}
$cr['time_start']='';
$cr['time_end']='';
$cr['message']=($doctors->message)?$doctors->message:'';;
$cr['address']=($doctors->address)?$doctors->address:'';;
$cr['discount']=($doctors->discount)?$doctors->discount:'';
$cr['fees']='';
$cr['experience_details']='';
$cr['app_type']=6;
}


if($request->app_type==7)
{

Hospitals::where([['hid','=',$doctors->hid]])->update(['device_token'=>$request->device_token,'device_id'=>$request->device_id,'device_type'=>$request->device_type]);

$cr['name']=$doctors->name;
$cr['id']=$doctors->hid;
$cr['contact_no']=$doctors->contact_no;
$cr['email']=($doctors->email)?$doctors->email:'';
if($doctors->profile_pic)
{
$cr['profile_pic']=url('/').'/storage/app/public/'.$doctors->profile_pic;  
}
else
{
 $cr['profile_pic']='';
}
$cr['time_start']='';
$cr['time_end']='';
$cr['message']=($doctors->message)?$doctors->message:'';
$cr['address']=($doctors->address)?$doctors->address:'';;
$cr['discount']=($doctors->discount)?$doctors->discount:'';
$cr['fees']='';
$cr['experience_details']='';
$cr['app_type']=7;
}


   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data Found",
                 ], 200);

 } 
}
   }


public function healthcare_list(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cr=array();
        $dar=array();
$trp=hhcare::where([['status','=',1]])->select('*',\DB::raw("6371 * acos(cos(radians(" . $request->latitude . ")) 
        * cos(radians(homehealthcare.latitude)) 
        * cos(radians(homehealthcare.longitude) - radians(" . $request->longitude . ")) 
        + sin(radians(" .$request->latitude. ")) 
        * sin(radians(homehealthcare.latitude))) AS distance"))->orderBy('distance', 'ASC')->get();
if(empty($trp))
{
   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>'',                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{
   
           foreach($trp as $vl)
        {

$dar['hhid']=($vl['hhid'])?$vl['hhid']:'';  
$dar['discount']=($vl['discount'])?$vl['discount']:'';  
$dar['address']=($vl['address'])?$vl['address']:'';  
$dar['name']=($vl['name'])?$vl['name']:'';  
$dar['email']=($vl['email'])?$vl['email']:'';  
$dar['latitude']=($vl['latitude'])?$vl['latitude']:'';  
$dar['longitude']=($vl['longitude'])?$vl['longitude']:'';  
$dar['message']=($vl['message'])?$vl['message']:'';  
$dar['contact_no']=($vl['contact_no'])?$vl['contact_no']:'';  
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;

array_push($cr,$dar);
        } 

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data Found",
                 ], 200);

} 
}
}

public function healthcare_details(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'hhid' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cr=array();
        $dar=array();
$trp=hhcare::where([['hhid','=',$request->hhid]])->select('*')->get();
if(empty($trp))
{
   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>'',                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{
   
           foreach($trp as $vl)
        {

$dar['hhid']=($vl->hhid)?$vl->hhid:'';  
$dar['discount']=($vl->discount)?$vl->discount:'';  
$dar['address']=($vl->address)?$vl->address:'';  
$dar['name']=($vl->name)?$vl->name:'';  
$dar['email']=($vl->email)?$vl->email:'';  
$dar['latitude']=($vl->latitude)?$vl->latitude:'';  
$dar['longitude']=($vl->longitude)?$vl->longitude:'';  
$dar['message']=($vl->message)?$vl->message:'';  
$dar['contact_no']=($vl->contact_no)?$vl->contact_no:'';  
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;

$packages=Homepackages::where([['homehealthcare_hhid','=',$vl->hhid],['status','=',1]])->select('*')->get();

$darg=array();
$dargt=array();
if($packages->isEmpty())
{

$dar['packages']=$dargt;
}

 foreach($packages as $vl)
      {


if($vl->files)
{
$darg['image']='';
}
else
{
$darg['image']=url('/').'/storage/app/public/'.$vl->image;
}
//$darr['labname']=($vl['labname'])?$vl['labname']:'';  
$darg['title']=($vl->title)?$vl->title:'';  
$darg['hhid']=($vl->homehealthcare_hhid)?$vl->homehealthcare_hhid:'0';  
$darg['pack_id']=($vl->pack_id)?$vl->pack_id:'';  
$darg['description']=($vl->description)?$vl->description:'';  
$darg['actual_price']=($vl->actual_price)?$vl->actual_price:'';  
$darg['discounted_price']=($vl->discounted_price)?$vl->discounted_price:'';  
array_push($dargt,$darg);
  }

$dar['packages']=$dargt;
array_push($cr,$dar);
        } 

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data Found",
                 ], 200);

} 
}
}

public function pharmacy_list(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cr=array();
        $dar=array();
        $lat=$request->latitude;
        $lon=$request->longitude;
$trp=Pharmacy::select("*",\DB::raw("6371 * acos(cos(radians(" . $request->latitude . ")) 
        * cos(radians(pharmacy.latitude)) 
        * cos(radians(pharmacy.longitude) - radians(" . $request->longitude . ")) 
        + sin(radians(" .$request->latitude. ")) 
        * sin(radians(pharmacy.latitude))) AS distance"))
        ->where([['status','=',1]])->orderByRaw("distance",'ASC')->get();

if(empty($trp))
{
   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>'',                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{
  // print_r($trp);
           foreach($trp as $vl)
        {
$dar=$vl;
if($vl['discount']=='')
{
$dar['discount']="";

}
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;

array_push($cr,$dar);
        } 

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data Found",
                 ], 200);


}
  
}
}

public function pharmacy_details(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'pid' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cr=array();
$dar=array();

$trp=Pharmacy::where([['status','=',1],['pid','=',$request->pid]])->select('*')->get();
if(empty($trp))
{
   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>'',                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{
   
           foreach($trp as $vl)
        {
$dar=$vl;
if($vl['discount']=='')
{
  $dar['discount']="";
}
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;

array_push($cr,$dar);
        } 

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


}  
}
}

public function hospitals_details(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'hid' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cr=array();
        $dar=array();
$trp=Hospitals::where([['status','=',1],['hid','=',$request->hid]])->select('*')->get();
if(empty($trp))
{
   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>'',                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{
   
           foreach($trp as $vl)
        {
$dar=$vl;
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;

$dar['banner_image']=url('/').'/storage/app/public/'.$vl->banner_image;
$dar['type']=$vl->type;

$prr=array();
$darr=array();

$trp=Doctors::join('doctors_hospitals','doctors_hospitals.doctors_did','doctors.did')->where([['doctors.status','=',1],['doctors_hospitals.hospitals_hid','=',$request->hid]])->select('doctors.*')->get();


if(empty($trp))
{

}
else
{
        foreach($trp as $vl)
        {

$darr=$vl;
$darr['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;
\DB::enableQueryLog();
$spcl=DoctorsSpecialization::join('specialization','doctors_specialization.specialization_sid','specialization.sid')->where([['specialization.status','=',1],['doctors_specialization.doctors_did','=',$vl->did]])->select('specialization.*')->get();
        $special=array();
        $specials=array();
        // dd(
        //     \DB::getQueryLog()
        // );
           foreach($spcl as $vls)
        {

$vls['profile_pic']=url('/').'/storage/app/public/'.$vls->profile_pic;
array_push($specials,$vls);
        }
$darr['special']=$specials;
array_push($prr,$darr);
        }


}
$dar['doctors']=$prr;  
//$cr['doctors']=$prr;
$dar['total_doc']=count($dar['doctors']);
array_push($cr,$dar);
        } 

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


}  
}
}

public function hospitals_doctors(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'hid' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$prr=array();
$darr=array();
$cr=array();

$trp=Doctors::join('doctors_hospitals','doctors_hospitals.doctors_did','doctors.did')->join('specialization','specialization.sid','doctors.specialization_sid')->where([['doctors.status','=',1],['doctors_hospitals.hospitals_hid','=',$request->hid]])->select('doctors.*','specialization.name as spcial_name')->get();

if(empty($trp))
{

}
else
{

           foreach($trp as $vl)
        {
$darr=$vl;
array_push($prr,$darr);
        }
$cr=$prr;  
//$cr['doctors']=$prr;
//$dar['total_doc']=count($dar['doctors']);
//array_push($cr,$dar);
        
}

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);
}
}

public function hospitals_procedures(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'hid' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$prr=array();
$darr=array();
$cr=array();

$trp=HospitalsProcedures::where([['hospitals_procedures.hospitals_hid','=',$request->hid]])->select('*')->get();

if(empty($trp))
{
}
else
{

           foreach($trp as $vl)
        {
$darr=$vl;
array_push($prr,$darr);
        }
$cr=$prr;  
//$cr['doctors']=$prr;
//$dar['total_doc']=count($dar['doctors']);
//array_push($cr,$dar);
       
}

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


} 
}

public function hospitals_offers(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'hid' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
$prr=array();
$darr=array();
$cr=array();

$trp=HospitalsOffers::where([['hospitals_offers.hospitals_hid','=',$request->hid]])->select('*')->get();

if(empty($trp))
{
}
else
{

        foreach($trp as $vl)
        {
$darr=$vl;
$darr['banner_image']=url('/').'/storage/app/public/'.$vl->banner_image;
array_push($prr,$darr);
        }
$cr=$prr;  
//$cr['doctors']=$prr;
//$dar['total_doc']=count($dar['doctors']);
//array_push($cr,$dar);       
}
  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);

}
}


public function view_blogs(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                                                                     
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$prr=array();
$darr=array();
$cr=array();

if($request->did)
{
$trp=Blogs::join('doctors','doctors.did','doctors_blogs.doctors_did')->where([['doctors_blogs.status','=','1'],['doctors_blogs.doctors_did','=',$request->did]])->select('doctors_blogs.title','doctors_blogs.description','doctors_blogs.image','doctors_blogs.video','doctors_blogs.bid','doctors.name as dname','doctors.profile_pic as dimage')->get();

}
else
{
$trp=Blogs::join('doctors','doctors.did','doctors_blogs.doctors_did')->where([['doctors_blogs.status','=','1']])->select('doctors_blogs.title','doctors_blogs.image','doctors_blogs.video','doctors_blogs.description','doctors_blogs.bid','doctors.name as dname','doctors.profile_pic as dimage')->get();

}

if($trp->isEmpty())
{
  $cr=array();
return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>$cr,                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{

           foreach($trp as $vl)
        {

$darr=$vl;
if($vl->image)
{
$darr['image']=url('/').'/storage/app/public/'.$vl->image;
}
else
{
  $darr['image']='';
}

if($vl->video)
{
$darr['video']=url('/').'/storage/app/public/'.$vl->video;
}
else
{
  $darr['video']='';
}

if($vl->dimage)
{
$darr['dimage']=url('/').'/storage/app/public/'.$vl->dimage;
}
else
{
  $darr['dimage']='';
}
if($vl->description)
{
$darr['description']=substr($vl->description, 0, 20);;
}
array_push($prr,$darr);

        }
$cr=$prr;  

}
  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);

}  
}

public function view_records(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
                                            
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
$prr=array();
$darr=array();
$cr=array();

$trp=Prescriptions::where([['customer_prescription.customers_cid','=',$request->user_id],['customer_prescription.type','=',4]])->select('comment as title','files')->get();

if($trp->isEmpty())
{
  $cr=array();
return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>$cr,                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{

           foreach($trp as $vl)
        {

$darr=$vl;
$darr['title']=($vl['title'])?$vl['title']:'';  
if($vl->files)
{
$darr['files']=url('/').'/public/prescription/'.$vl->files;  
}
else
{
  $darr['files']='';
}
array_push($prr,$darr);
        }
$cr=$prr;  

}

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);

} 
}

public function view_bookings(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
                                            
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
$prr=array();
$darr=array();
$cr=array();

$trp=Prescriptions::leftjoin('doctors','doctors.did','customer_prescription.doctors_did')
->leftjoin('pharmacy','pharmacy.pid','customer_prescription.pharmacy_pid')
->leftjoin('labs','labs.lid','customer_prescription.labs_lid')
->leftjoin('homehealthcare','homehealthcare.hhid','customer_prescription.homehealthcare_hhid')
->where([['customer_prescription.customers_cid','=',$request->user_id],['customer_prescription.ttype','=',0]])->select('customer_prescription.*','doctors.name as dname','homehealthcare.name as hname','pharmacy.name as pname','labs.name as lname')->latest('customer_prescription.id')->get();

if($trp->isEmpty())
{
  $cr=array();
return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>$cr,                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{
        foreach($trp as $vl)
        {

$darr=$vl;
$darr['dname']=($vl['dname'])?$vl['dname']:'';  
$darr['pname']=($vl['pname'])?$vl['pname']:'';  
$darr['lname']=($vl['lname'])?$vl['lname']:'';  
$darr['hname']=($vl['hname'])?$vl['hname']:'';  
$darr['booking_time']=($vl['booking_time'])?$vl['booking_time']:'';  
$darr['booking_date']=($vl['booking_date'])?$vl['booking_date']:'';  
$darr['title']=($vl['comment'])?$vl['comment']:'';  



$userdata=$this->get_customer($request->user_id);



$fields=Fields::where([['action_type','=',$userdata->app_type]]);

 $fields=$fields->where(function($fields){
        $fields->where('fields.name', 'like', "%status%")
              ->orWhere('fields.name', 'like', "%booking_status%")
              ->orWhere('fields.name', 'like', "%Booking Status%")
              ->orWhere('fields.name', 'like', "%booking status%")
              ->orWhere('fields.name', 'like', "%lead status%")
              ->orWhere('fields.name', 'like', "%lead_status%");
    });

$trp=\DB::table('admin_users')->where([['type','=',$userdata->app_type]])->select('id');

    if($userdata->app_type=='1')
    {
    $trp->where([['doctors','=',$userdata->source_id]]); 
    }  
    if($userdata->app_type=='2')
    {
    $trp->where([['pharmacy','=',$userdata->source_id]]); 
    }
    if($userdata->app_type=='3')
    {
    $trp->where([['labs','=',$userdata->source_id]]);  
    }
    if($userdata->app_type=='5')
    {
    $trp->where([['labs','=',$userdata->source_id]]);  
    }    
    if($userdata->app_type=='6')
    {
    $trp->where([['healthcare','=',$userdata->source_id]]);  
    }
$trp=$trp->first();

$sts=0;
if($trp)
{
  $fields=$fields->where([['action_by','=',$trp->id]]);
}


$fields=$fields->select('fid')->first();
$fields=array();
if(!empty($fields))
{


$crp=Leadsdata::
join('fields','fields.fid','leads_data.fid')
->where([['leads_data.lid','=',$vl['id']]])
;

 $crp=$crp->where(function($crp){
        $crp->where('fields.name', 'like', "%status%")
              ->orWhere('fields.name', 'like', "%booking_status%")
              ->orWhere('fields.name', 'like', "%Booking Status%")
              ->orWhere('fields.name', 'like', "%booking status%")
              ->orWhere('fields.name', 'like', "%lead status%")
              ->orWhere('fields.name', 'like', "%lead_status%");
    });
$crp=$crp->select('leads_data.value')->latest('leads_data.did')->first();



// $crp=Leadsdata::where([['lid','=',$vl['id']],['fid','=',$fields->fid]])
// ->select('value')->latest('did')->first();

if($crp)
{
  $sts=$crp->value; 
}
else
{
  $sts=0;
}
}
else
{
$sts=0;
}


if($sts)
{
$darr['booking_status']=$sts;  
}
else
{
if($vl->prs_type==1)
{
  $darr['booking_status']='Order Placed'; 
}
else
{
  $darr['booking_status']='Pending'; 
}
}









// $crp=Leadsdata::where([['lid','=',$vl['id']],['fid','=',21]])
// ->select('value')->latest('did')->first();

// if($crp)
// {
// $darr['booking_status']=$crp->value;  
// }
// else
// {
// $darr['booking_status']='Pending';  
// }

if($vl->files)
{
$darr['files']=url('/').'/public/prescription/'.$vl->files;  
}
else
{
  $darr['files']='';
}
array_push($prr,$darr);
}
$cr=$prr;  

}

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);
}
}


public function bookings_details(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'booking_id' => 'required',                                                                                     
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$prr=array();
$darr=array();
$cr=array();

$trp=Prescriptions::leftjoin('doctors','doctors.did','customer_prescription.doctors_did')
->leftjoin('pharmacy','pharmacy.pid','customer_prescription.pharmacy_pid')
->leftjoin('labs','labs.lid','customer_prescription.labs_lid')
->leftjoin('hospitals','hospitals.hid','customer_prescription.hospital_hid')
->leftjoin('homehealthcare','homehealthcare.hhid','customer_prescription.homehealthcare_hhid')  
->where([['customer_prescription.customers_cid','=',$request->user_id],['customer_prescription.ttype','=',0],['customer_prescription.id','=',$request->booking_id]])->select('customer_prescription.*','doctors.name as dname','pharmacy.name as pname','homehealthcare.name as hname','hospitals.name as hpname','labs.name as lname')->get();


if($trp->isEmpty())
{
  $cr=array();
return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>$cr,                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{

           foreach($trp as $vl)
        {

$darr=$vl;
$darr['dname']=($vl['dname'])?$vl['dname']:'';  
$darr['booking_type']=($vl['prs_type'])?$vl['prs_type']:'0';  
$darr['pname']=($vl['pname'])?$vl['pname']:'';  
$darr['lname']=($vl['lname'])?$vl['lname']:'';  
$darr['hname']=($vl['hname'])?$vl['hname']:'';
if($vl->hospital_hid)
{
  $darr['hpname']=($vl['hpname'])?$vl['hpname']:'';
}  
$darr['booking_time']=($vl['booking_time'])?$vl['booking_time']:'';  
$darr['booking_date']=($vl['booking_date'])?$vl['booking_date']:'';  
$darr['title']=($vl['comment'])?$vl['comment']:'';


$userdata=$this->get_customer($request->user_id);



$fields=Fields::where([['action_type','=',$userdata->app_type]]);

 $fields=$fields->where(function($fields){
        $fields->where('fields.name', 'like', "%status%")
              ->orWhere('fields.name', 'like', "%booking_status%")
              ->orWhere('fields.name', 'like', "%Booking Status%")
              ->orWhere('fields.name', 'like', "%booking status%")
              ->orWhere('fields.name', 'like', "%lead status%")
              ->orWhere('fields.name', 'like', "%lead_status%");
    });

$trp=\DB::table('admin_users')->where([['type','=',$userdata->app_type]])->select('id');

    if($userdata->app_type=='1')
    {
    $trp->where([['doctors','=',$userdata->source_id]]); 
    }  
    if($userdata->app_type=='2')
    {
    $trp->where([['pharmacy','=',$userdata->source_id]]); 
    }
    if($userdata->app_type=='3')
    {
    $trp->where([['labs','=',$userdata->source_id]]);  
    }
    if($userdata->app_type=='5')
    {
    $trp->where([['labs','=',$userdata->source_id]]);  
    }    
    if($userdata->app_type=='6')
    {
    $trp->where([['healthcare','=',$userdata->source_id]]);  
    }
     if($userdata->app_type=='7')
    {
    $trp->where([['hospital','=',$userdata->source_id]]);  
    }   
$trp=$trp->first();

$sts=0;
if($trp)
{
  $fields=$fields->where([['action_by','=',$trp->id]]);
}


$fields=$fields->select('fid')->first();
$fields=array('1');
if(!empty($fields))
{


$crp=Leadsdata::
join('fields','fields.fid','leads_data.fid')
->where([['leads_data.lid','=',$vl['id']]])
;

 $crp=$crp->where(function($crp){
        $crp->where('fields.name', 'like', "%status%")
              ->orWhere('fields.name', 'like', "%booking_status%")
              ->orWhere('fields.name', 'like', "%Booking Status%")
              ->orWhere('fields.name', 'like', "%booking status%")
              ->orWhere('fields.name', 'like', "%lead status%")
              ->orWhere('fields.name', 'like', "%lead_status%");
    });
$crp=$crp->select('leads_data.value')->latest('leads_data.did')->first();



// $crp=Leadsdata::where([['lid','=',$vl['id']],['fid','=',$fields->fid]])
// ->select('value')->latest('did')->first();

if($crp)
{
  $sts=$crp->value; 
}
else
{
  $sts=0;
}
}
else
{
$sts=0;
}


if($sts)
{
$darr['booking_status']=$sts;  
}
else
{

if($vl->prs_type==1)
{
  $darr['booking_status']='Order Placed'; 
}
else
{
  $darr['booking_status']='Pending'; 
}
 
}





if($vl->files)
{
$darr['files']=url('/').'/public/prescription/'.$vl->files;  
}
else
{
  $darr['files']='';
}

$crp=BookingLogs::where([['booking_logs.prescriptions_id','=',$request->booking_id]])->select('booking_logs.comment','booking_logs.status as booking_status','booking_logs.updated_on')->get();

if($crp->isEmpty())
{
  $crs=array();
}
else
{
$crs=array();  
     foreach($crp as $vlx)
        {
          $crx=array();  
           $crx['comment']=($vlx['comment'])?$vlx['comment']:'';        
           $crx['booking_status']=$vlx['booking_status'];
           $crx['date_time']=$vlx['updated_on'];

array_push($crs,$crx);
        }

}
$darr['logs']=$crs;

$od_detail=array();
if($vl->prs_type==1)
{


$add_detail=Orderaddress::where([['oid','=',$vl->oid]])->select('*')->first();

$order_detail=Customerorders::where([['oid','=',$vl->oid]])->select('*')->first();
if($order_detail)
{
  $od_detail['final_amount']=$order_detail->final_amount;
  $od_detail['gst_amount']=$order_detail->gst_amount;
  $od_detail['payment_type']=$order_detail->payment_id;
  //$od_detail['gst_title']='';
    $od_detail['download_invoice']=URL('admin/order-pdf/'.$order_detail->oid);
  $od_detail['gst_percentage']=$order_detail->gst_percentage;
  $od_detail['promocode']=$order_detail->promocode;
  $od_detail['delivery_amount']=$order_detail->delivery_amount;
  $od_detail['promo_amount']=$order_detail->promo_amount;
  $od_detail['total_amount']=$order_detail->total_amount;
  $od_detail['discount_amount']=$order_detail->discount_amount;
}

$order_detail=Ordersproduct::where([['oid','=',$vl->oid]])->select('*')->get();
if($order_detail->isEmpty())
{

}
else
{
   foreach ($order_detail as $value) {
     $od=array();
     $od['item_type']=$value->item_type;
     $od['quantity']=$value->quantity;
     $od['item_name']=$value->item_name;
     $od['item_actual_price']=$value->item_actual_price;

     $od['item_discounted_price']=$value->item_discounted_price;
     $od['packet_type']=$value->packet_type;

     $od['packet_quantity']=$value->packet_quantity;
     $od['medicine_type']=$value->medicine_type;
      
      if($value->item_logo)
      {
        $od['logo']=url('/').'/storage/app/public/public/upload/medicine/'.$value->item_logo;

      }
      else
      {
      $od['logo']=url('/').'/public/uploads/user_image/noimage.png';
      }

      $od_detail['products'][]=$od;
   }
}
$add_detail=Orderaddress::where([['oid','=',$vl->oid]])->select('*')->first();
$addetail['address']=$add_detail->address;
$addetail['full_address']=$add_detail->full_address;
$addetail['latitude']=$add_detail->latitude;
$addetail['longitude']=$add_detail->longitude;
$addetail['name']=$add_detail->name;
$addetail['contact_no']=$add_detail->contact_no;
$addetail['email']=$add_detail->email;
$od_detail['address']=$addetail;

}
if(empty($od_detail))
{
$od_detail=new \stdClass();
}
else
{
  $darr['order_detail']=$od_detail;
}



array_push($prr,$darr);
        }
$cr=$prr;  

}

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);

}  
}


public function blogs_detail(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'bid' => 'required',                                         
                                            
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$prr=array();
$darr=array();
$cr=array();

$trp=Blogs::join('doctors','doctors.did','doctors_blogs.doctors_did')->where([['doctors_blogs.status','=',1],['doctors_blogs.bid','=',$request->bid]])->select('doctors_blogs.title','doctors_blogs.image','doctors_blogs.video','doctors_blogs.description')->get();

if(empty($trp))
{
}
else
{

           foreach($trp as $vl)
        {

$darr=$vl;
if($vl->image)
{
$darr['image']=url('/').'/storage/app/public/'.$vl->image;  
}
else
{
  $darr['image']='';
}
if($vl->video)
{
$darr['video']=url('/').'/storage/app/public/'.$vl->video;  
}
else
{
  $darr['video']='';
}
array_push($prr,$darr);
}
$cr=$prr;  

}

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


}  
}

public function view_prescription(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                                                                     
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$prr=array();
$darr=array();
$cr=array();

$trp=Prescriptions::where([['customers_cid','=',$request->user_id]])->select('*')->get();

if(empty($trp))
{
}
else
{

        foreach($trp as $vl)
        {

$darr=$vl;
if($vl->image)
{
$darr['files']=url('/').'/public/prescription'.$vl->files;  
}
else
{
  $darr['files']='';
}
$darr['files']=url('/').'/public/prescription/'.$vl->files;
array_push($prr,$darr);

        }
$cr=$prr;  

}

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);
}  
}

/*
$lat = YOUR_CURRENT_LATTITUDE;
$lon = YOUR_CURRENT_LONGITUDE;
   
DB::table("posts")
    ->select("posts.id"
        ,DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
        * cos(radians(posts.lat)) 
        * cos(radians(posts.lon) - radians(" . $lon . ")) 
        + sin(radians(" .$lat. ")) 
        * sin(radians(posts.lat))) AS distance"))
        ->groupBy("posts.id")
        ->get();
*/



public function packages(Request $request)
{
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'app_type' => 'required',                                         
        'create_id' => 'required',                                         
                                            
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
$prr=array();
$darr=array();
$cr=array();

if($request->hhid)
{
$trp=Homepackages::where([['homehealthcare_hhid','=',$request->hhid],['status','=',1]])->select('*');
}

elseif($request->app_type==2 && $request->create_id=='10')
{
$trp=Homepackages::where([['homehealthcare_hhid','=',-1],['status','=',1]])->select('*');
}
elseif($request->app_type!=6 && $request->hhid=='')
{
$trp=Homepackages::where([['homehealthcare_hhid','=',0],['status','=',1]])->select('*');
}
else
{
$trp=Homepackages::where([['homehealthcare_hhid','=',$request->create_id],['homehealthcare_hhid','!=',0],['status','=',1]])->select('*');
}

$trp=$trp->get();
if($trp->isEmpty())
{
    return response()->json([
            'otp' => 0,
            'status' => 204,          
            'data'=>$cr,                        
            'message'  =>"Data Not Found",
                 ], 200);
}
else
{

           foreach($trp as $vl)
        {

if($vl->files)
{
$darr['image']='';
}
else
{
$darr['image']=url('/').'/storage/app/public/'.$vl->image;
}
//$darr['labname']=($vl['labname'])?$vl['labname']:'';  
$darr['title']=($vl['title'])?$vl['title']:'';  
$darr['hhid']=($vl['homehealthcare_hhid'])?$vl['homehealthcare_hhid']:'0';  
$darr['pack_id']=($vl['pack_id'])?$vl['pack_id']:'';  
$darr['description']=($vl['description'])?$vl['description']:'';  
$darr['actual_price']=($vl['actual_price'])?$vl['actual_price']:'';  
$darr['discounted_price']=($vl['discounted_price'])?$vl['discounted_price']:'';  
array_push($prr,$darr);
  }
$cr=$prr;  
       
}

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);

}
}

public function view_test(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
                                            
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
$prr=array();
$darr=array();
$cr=array();

$trp=Tests::leftjoin('labs','labs.lid','tests.labs_lid')->where([['tests.type','=',$request->type],['tests.labs_lid','=',0]])->select('tests.*','labs.name as labname')->get();


if(empty($trp))
{
}
else
{

           foreach($trp as $vl)
        {

$darr=$vl;
if($vl->files)
{
$darr['image']='';
}
else
{
$darr['image']=url('/').'/storage/app/public/'.$vl->image;

}
$darr['labname']=($vl['labname'])?$vl['labname']:'';  
$darr['actual_price']=($vl['actual_price'])?$vl['actual_price']:'';  
$darr['discounted_price']=($vl['discounted_price'])?$vl['discounted_price']:'';  
array_push($prr,$darr);
  }
$cr=$prr;  
//$cr['doctors']=$prr;
//$dar['total_doc']=count($dar['doctors']);
//array_push($cr,$dar);
        
}

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);

} 
}

public function test_details(Request $request)
   {
  $json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'test_id' => 'required',                                         
                                            
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$prr=array();
$darr=array();
$cr=array();

$trp=Tests::leftjoin('labs','labs.lid','tests.labs_lid')->where([['tests.tid','=',$request->test_id],['tests.labs_lid','=',0]])->select('tests.*','labs.name as labname')->get();

if(empty($trp))
{
}
else
{
        foreach($trp as $vl)
        {

$darr=$vl;
if($vl->files)
{
$darr['image']='';
}
else
{
$darr['image']=url('/').'/storage/app/public/'.$vl->image;
}
$darr['labname']=($vl['labname'])?$vl['labname']:'';  
$darr['type']=($vl['type'])?$vl['type']:'';  
$darr['actual_price']=($vl['actual_price'])?$vl['actual_price']:'';  
$darr['discounted_price']=($vl['discounted_price'])?$vl['discounted_price']:'';  
$darr['services']=($vl['testlist'])?$vl['testlist']:'';  
$darr['description']=($vl['description'])?$vl['description']:'';  
array_push($prr,$darr);

}
$cr=$prr;  
//$cr['doctors']=$prr;
//$dar['total_doc']=count($dar['doctors']);
//array_push($cr,$dar);       
}
  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);

}  
}

public function view_health_record(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
                                            
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
$prr=array();
$darr=array();
$cr=array();
$trp=Homehealth::where([['customers_cid','=',$request->user_id]])->select('*')->get();

if(empty($trp))
{
}
else
{

        foreach($trp as $vl)
        {
$darr=$vl;
array_push($prr,$darr);
        }
$cr=$prr;  
//$cr['doctors']=$prr;
//$dar['total_doc']=count($dar['doctors']);
//array_push($cr,$dar);       
}
  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


} 
}

public function doctors_details(Request $request)
   {
$json='';
 if(empty($request->user_id) || empty($request->did))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'did' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
$cr=array();
$dar=array();

$trp=Doctors::join('specialization','specialization.sid','doctors.specialization_sid')->where([['doctors.status','=',1],['doctors.did','=',$request->did]])->select('doctors.*','specialization.name as spcial_name')->get();

if(empty($trp))
{
   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>'',                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{

        foreach($trp as $vl)
        {
$dar=$vl;
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;
\DB::enableQueryLog();

$spcls=Hospitals::join('doctors_hospitals','hospitals.hid','doctors_hospitals.hospitals_hid')->where([['hospitals.status','=',1],['doctors_hospitals.doctors_did','=',$vl->did]])->select('hospitals.*')->get();

        $special=array();
        $specials=array();

           foreach($spcls as $vls)
        {

$vls['profile_pic']=url('/').'/storage/app/public/'.$vls->profile_pic;
array_push($specials,$vls);

        }
$dar['hospitals']=$specials;
array_push($cr,$dar);
        }

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


}  
}
}


public function product_category(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
            $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
$cr=array();
        $dar=array();
        
$trp=Category::where([['status','=',1],['user_id','=',$request->create_id],['type','=',2]])->select('*')->get();
           
    if($trp->isEmpty())
    {
 $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 400,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;

        
    }
           foreach($trp as $vl)
        {
$dar['cid']=$vl->cid;
$dar['name']=$vl->name;
$dar['image']=url('/').'/storage/app/public/'.$vl->logo;
array_push($cr,$dar);
        } 

   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'category'=>$cr,                        
            'message'  =>"Data Found",
                 ], 200);



}


public function products(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
            $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
        $cr=array();
        $dar=array();
        
          if(!$request->offset)
          {
           $request->offset=0; 
          }
        
        $trp=Products::where([['products.status','=',1],['products.user_id','=',$request->create_id]]);
 
        if($request->cid)
        {
        $trp->join('category_products','category_products.products_pid','products.pid');
        $trp=$trp->where([['category_products.category_cid','=',$request->cid]]);     
        }  
 
           
       if($request->search)
       {
        $search=$request->search;
        $trp=$trp->where([['products.name','LIKE',"%$search%"]]);     
       }   
    
   $trp= $trp->select('*')->offset($request->offset)->limit(100)->get();
    
    if($trp->isEmpty())
    {
 $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 400,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;

        
    }
           foreach($trp as $vl)
        {
$dar['pid']=$vl->pid;
$dar['name']=$vl->name;
$dar['description']=$vl->description;
$dar['actual_price']=$vl->actual_price;
$dar['discounted_price']=$vl->discounted_price;
$dar['logo']=url('/').'/storage/app/public/'.$vl->logo;
array_push($cr,$dar);
        } 

   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'category'=>$cr,                        
            'message'  =>"Data Found",
                 ], 200);



}




public function package_category(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
            $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
$cr=array();
        $dar=array();
        
$trp=Category::where([['status','=',1],['user_id','=',$request->create_id],['type','=',1]])->select('*')->get();
           
    if($trp->isEmpty())
    {
 $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 400,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;

        
    }
           foreach($trp as $vl)
        {
$dar['cid']=$vl->cid;
$dar['name']=$vl->name;
$dar['image']=url('/').'/storage/app/public/'.$vl->logo;
array_push($cr,$dar);
        } 

   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'category'=>$cr,                        
            'message'  =>"Data Found",
                 ], 200);



}










public function package_workouts(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
            $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
        $cr=array();
        $dar=array();
        
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'create_id' => 'required',                                         
        'app_type' => 'required',                                         
        'pid' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
$json=new \stdClass();

             return response()->json([           
            'message'  =>$ers,
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;

        }

$services=PackagesServices::where([['packages_services.packages_pid','=',$request->pid]])->select('*')->get();

if($services->isEmpty())
{
 $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 400,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
}
else
{
    foreach($services as $val)
    {
        $dar=array();
        $dar['workout_name']=$val->service_name;
        $dar['workout_description']=$val->description;
        $dar['workout_file']=url('/').'/public/uploads/'.$val->service_image;
        //$new['trainer_image']=url('/').$val->profile_pic;
       array_push($cr,$dar);
    }
}

           


   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'category'=>$cr,                        
            'message'  =>"Data Found",
                 ], 200);



}



public function package_trainers(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
            $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
        $cr=array();
        $dar=array();
        


         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'create_id' => 'required',                                         
        'app_type' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
$json=new \stdClass();

             return response()->json([           
            'message'  =>$ers,
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;

        }




if($request->pid)
{
 $trainers=PackagesTrainers::join('trainers','trainers.tid','packages_trainers.trainers_tid')
          ->where([['trainers.status','=',1],['packages_trainers.packages_pid','=',$request->pid]])->select('trainers.name','trainers.profile_pic')->get();   
}
else
{
   $trainers=Trainers::where([['trainers.status','=',1],['user_id','=',$request->create_id]])->select('trainers.name','trainers.profile_pic','trainers.experience')->get();   
}
           
    if($trainers->isEmpty())
    {
 $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 400,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;

        
    }
           foreach($trainers as $vl)
        {
//$dar['cid']=$vl->cid;
$dar['trainer_name']=$vl->name;
$dar['experience']=$vl->experience;
$dar['trainer_image']=url('/').'/public/uploads/'.$vl->profile_pic;
array_push($cr,$dar);
        } 

   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'category'=>$cr,                        
            'message'  =>"Data Found",
                 ], 200);



}




public function packages_list(Request $request)
   {

$json='';
 if(empty($request->user_id))
       {
           
           $json=new \stdClass();
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'user_id' => 'required',                                         
        'create_id' => 'required',                                         
        'app_type' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
$json=new \stdClass();

             return response()->json([           
            'message'  =>$ers,
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$cr=array();
$dar=array();
$trp=Packages::join('category_packages','category_packages.packages_pid','packages.pid')
        //->join('category','category.cid','category_packages.category_cid')
       // ->leftjoin('packages_trainers','packages_trainers.packages_pid','packages.pid')
        //->leftjoin('trainers','trainers.tid','packages_trainers.trainers_tid')
       // ->leftjoin('packages_banners','packages_banners.packages_pid','packages.pid')
        //->leftjoin('packages_services','packages_services.packages_pid','packages.pid')
       ->where([['packages.status','=',1],['packages.user_id','=',$request->create_id]])
       ->select('packages.*');
       
 if($request->cid)
 {
     $trp->where('category_packages.category_cid','=',$request->cid);
 }
$trp=$trp->orderBy('packages.pid', 'DESC')->get();
       


if($trp->isEmpty())
{
     $cat=new \stdClass();
   return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>$cat,                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{

  
           foreach($trp as $vl)
        {
$dar['pid']=$vl->pid;
$dar['pack_name']=$vl->pack_name;
$dar['content']=$vl->content;
$dar['no_of_days']=$vl->no_of_days;
$dar['logo']=url('/').'/public/uploads/'.$vl->logo;
$dar['price']=$vl->price;







$category=PackagesCategory::join('category','category.cid','category_packages.category_cid')
          ->where([['category.status','=',1],['category_packages.packages_pid','=',$vl->pid]])->select('category.name','category.logo')->get();
if($category->isEmpty())
{
    $cat=new \stdClass();
    $dar['category']=$cat;
}
else
{
    foreach($category as $val)
    {
        $new=array();
        $new['cat_name']=$val->name;
        $new['cat_image']=url('/').'/public/uploads/'.$val->logo;
        $dar['category'][]=$new;
    }
}


$dar['trainers']=array();
$trainers=PackagesTrainers::join('trainers','trainers.tid','packages_trainers.trainers_tid')
          ->where([['trainers.status','=',1],['packages_trainers.packages_pid','=',$vl->pid]])->select('trainers.name','trainers.profile_pic')->get();

if($trainers->isEmpty())
{
    $cat=array();
    $dar['trainers']=$cat;
}
else
{
    foreach($trainers as $val)
    {
        $new=array();
        $new['trainer_name']=$val->name;
        $new['trainer_image']=url('/').'/public/uploads/'.$val->profile_pic;
        $dar['trainers'][]=$new;
    }
}

$dar['banners']=array();
$banners=PackagesBanners::where([['packages_banners.packages_pid','=',$vl->pid]])->select('images')->get();

if($banners->isEmpty())
{
    $cat=array();
    $dar['banners']=$cat;
}
else
{
    foreach($banners as $val)
    {
        $new=array();
        $new['image']=url('/').'/public/uploads/'.$val->images;
       // $new['trainer_image']=url('/').$val->profile_pic;
        $dar['banners'][]=$new;
    }
}


$dar['workouts']=array();
$services=PackagesServices::where([['packages_services.packages_pid','=',$vl->pid]])->select('*')->get();

if($services->isEmpty())
{
    $cat=array();
    $dar['workouts']=$cat;
}
else
{
    foreach($services as $val)
    {
        $new=array();
        $new['workout_name']=$val->service_name;
        $new['workout_description']=$val->description;
        $new['workout_file']=url('/').'/public/uploads/'.$val->service_image;
        //$new['trainer_image']=url('/').$val->profile_pic;
        $dar['workouts'][]=$new;
    }
}



array_push($cr,$dar);


        }

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


}
  
}
}

public function search_doctors_list(Request $request)
   {

$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'search' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {






$search=$request->search;
$cr=array();
$dar=array();
\DB::enableQueryLog();
$trp=Doctors::join('specialization','specialization.sid','doctors.specialization_sid')->
where([['doctors.status','=',1]])->
where(function ($query) use ($search) {
    $query->where('doctors.name', 'LIKE', "%$search%")
          ->orWhere('specialization.name', 'LIKE', "%$search%");
})->select('doctors.*','specialization.name as spcial_name',\DB::raw("6371 * acos(cos(radians(" . $request->latitude . ")) 
        * cos(radians(doctors.latitude)) 
        * cos(radians(doctors.longitude) - radians(" . $request->longitude . ")) 
        + sin(radians(" .$request->latitude. ")) 
        * sin(radians(doctors.latitude))) AS distance"))->groupBy('doctors.did')->orderBy('distance', 'ASC')->get();

 // dd(
 //             \DB::getQueryLog()
 //         );

if(empty($trp))
{
   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>'',                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{

           foreach($trp as $vl)
        {

$dar=$vl;
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;
\DB::enableQueryLog();


$spcls=Hospitals::join('doctors_hospitals','hospitals.hid','doctors_hospitals.hospitals_hid')->where([['hospitals.status','=',1],['doctors_hospitals.doctors_did','=',$vl->did]])->select('hospitals.*')->get();

        $special=array();
        $specials=array();

           foreach($spcls as $vls)
        {
$vls['profile_pic']=url('/').'/storage/app/public/'.$vls->profile_pic;
array_push($specials,$vls);
        }

$dar['hospitals']=$specials;
array_push($cr,$dar);
        }
  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


}  
}
}

public function search_data(Request $request)
   {

$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
    
         $validator = Validator::make($request->all(), [
        'search' => 'required',                                         
           ]);
                 
          if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {

$search=$request->search;
$userdata=$this->get_customer($request->user_id);
//echo $userdata->app_type;
$cr=array();
$dar=array();
$trp=Doctors::join('specialization','specialization.sid','doctors.specialization_sid')->
where([['doctors.status','=',1]])->
where(function ($query) use ($search) {
    $query->where('doctors.name', 'LIKE', "%$search%")
          ->orWhere('specialization.name', 'LIKE', "%$search%");
})->select('doctors.name','doctors.did','doctors.profile_pic','doctors.address',\DB::raw("6371 * acos(cos(radians(" . $request->latitude . ")) 
        * cos(radians(doctors.latitude)) 
        * cos(radians(doctors.longitude) - radians(" . $request->longitude . ")) 
        + sin(radians(" .$request->latitude. ")) 
        * sin(radians(doctors.latitude))) AS distance"))->groupBy('doctors.did');

    if($userdata->app_type=='1')
    {
        $trp=$trp->where([['doctors.did','=',$userdata->source_id]]);
    }
$trp=$trp->orderBy('distance', 'ASC')->get();
// $labs=Labs::where([['status','=',1]])->select('name','profile_pic','lid');

//     if($userdata->app_type==3)
//     {
//          $labs=$labs->where([['lid','=',$userdata->source_id]]);
//     }
// $labs=$labs->get();

$phr=Pharmacy::where([['status','=',1]])->select('name','profile_pic','pid','address',\DB::raw("6371 * acos(cos(radians(" . $request->latitude . ")) 
        * cos(radians(pharmacy.latitude)) 
        * cos(radians(pharmacy.longitude) - radians(" . $request->longitude . ")) 
        + sin(radians(" .$request->latitude. ")) 
        * sin(radians(pharmacy.latitude))) AS distance"));
    // $query->where('doctors.name', 'LIKE', "%$search%");
    if($userdata->app_type=='2')
    {
        $phr=$phr->where([['pid','=',$userdata->source_id],['name','LIKE',"%$search%"]]);
    }
    else
    {
 $phr=$phr->where([['name','LIKE',"%$search%"]]);     
    }
$phr=$phr->orderBy('distance', 'ASC')->get();
 

$test=Labs::leftjoin('tests','labs.lid','tests.labs_lid');

    if($userdata->app_type=='3')
    {
        $test=$test->where([['labs.lid','=',$userdata->source_id]]);
//echo "sss";

  $test = $test->Where(function($test) use ($search){
        $test->orWhere('labs.name', 'like', '%' . $search . '%')
              ->orWhere('tests.title', 'like', '%' . $search . '%');
    });       
    }
    else
    {
   $test = $test->where(function($test) use ($search) {
        $test->orWhere('labs.name', 'like', '%' . $search . '%')
              ->orWhere('tests.title', 'like', '%' . $search . '%');
    });       
    }  

  //$test=$test->orwhere([['tests.title','LIKE',"%$search%"]]);       
// $test=$test->where([['labs.name','LIKE',"%$search%"]]);   
   // $test=$test->orwhere('tests.labs_lid','=',0);
    $test=$test->select('labs.name','labs.lid','labs.profile_pic','labs.address',\DB::raw("6371 * acos(cos(radians(" . $request->latitude . ")) 
        * cos(radians(labs.latitude)) 
        * cos(radians(labs.longitude) - radians(" . $request->longitude . ")) 
        + sin(radians(" .$request->latitude. ")) 
        * sin(radians(labs.latitude))) AS distance"))->orderBy('distance', 'ASC')->get();
 // dd(
 //             \DB::getQueryLog()
 //         );
if(empty($trp) && empty($test) && empty($phr) )
{
   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>'',                        
            'message'  =>"Data Not Found",
                 ], 200);

}
else
{

           foreach($test as $vl)
        {

$dar['name']=$vl->name;
$dar['id']=$vl->lid;
$dar['address']=$vl->address;
$dar['type']=3;
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;
array_push($cr,$dar);
        
        }


           foreach($phr as $vl)
        {
$dar['address']=$vl->address;
$dar['name']=$vl->name;
$dar['id']=$vl->pid;
$dar['type']=2;
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;
array_push($cr,$dar);
        
        }

//            foreach($labs as $vl)
//         {
// $dar['address']=$vl->address;
// $dar['name']=$vl->name;
// $dar['id']=$vl->lid;
// $dar['type']=3;
// $dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;
// array_push($cr,$dar);
//         }

           foreach($trp as $vl)
        {
$dar['address']=$vl->address;
$dar['name']=$vl->name;
$dar['id']=$vl->did;
$dar['type']=1;
$dar['profile_pic']=url('/').'/storage/app/public/'.$vl->profile_pic;
array_push($cr,$dar);
        }

  return response()->json([
            'otp' => 0,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Data  Found",
                 ], 200);


}
  
}
}

public function specialization(Request $request)
   {
$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
$cr=array();
        $dar=array();
$trp=Specialization::where([['status','=',1],['hospital_hid','=',0]])->select('sid','name','profile_pic')->get();
           foreach($trp as $vl)
        {
$dar['sid']=$vl->sid;
$dar['name']=$vl->name;
$dar['image']=url('/').'/storage/app/public/'.$vl->profile_pic;
array_push($cr,$dar);
        } 

   return response()->json([
            'otp' => 0,
            'status' => 200,          
            'category'=>$cr,                        
            'message'  =>"Data Found",
                 ], 200);



}

 public function home_page(Request $request)
   {

$json='';
 if(empty($request->user_id))
       {
       return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Data Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }

    $userdata=$this->get_customer($request->user_id);


        $ar=array();
        $dar=array();
        $slid=Sliders::where([['status','=',1],['types','=',1]]);
    if($userdata->app_type==1)
    {
        $slid=$slid->where([['doctors_did','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==2) {
          $slid=$slid->where([['pharmacy_pid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==3) {
            $slid=$slid->where([['labs_lid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==6) {
            $slid=$slid->where([['homehealthcare_hhid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==7) {
            $slid=$slid->where([['hospitals_hid','=',$userdata->source_id]]);
    }    
    $slid=$slid->get();
        foreach($slid as $vl)
        {
$dar['sid']=$vl->sid;
$dar['slider']=url('/').'/storage/app/public/'.$vl->image;
array_push($ar,$dar);
        }
$pr=array();
        $dar=array();
        $slid=Sliders::where([['status','=',1],['types','=',2]]);
    
if($userdata->app_type==1)
    {
        $slid=$slid->where([['doctors_did','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==2) {
          $slid=$slid->where([['pharmacy_pid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==3) {
            $slid=$slid->where([['labs_lid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==6) {
            $slid=$slid->where([['homehealthcare_hhid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==7) {
            $slid=$slid->where([['hospitals_hid','=',$userdata->source_id]]);
    }        
$slid=$slid->get();



        foreach($slid as $vl)
        {
$dar['sid']=$vl->sid;
$dar['slider']=url('/').'/storage/app/public/'.$vl->image;
array_push($pr,$dar);
        }      
        $cr=array();
        $dar=array();

$trp=Specialization::where([['status','=',1]])->select('sid','name','profile_pic')->get();
           foreach($trp as $vl)
        {
$dar['sid']=$vl->sid;
$dar['name']=$vl->name;
if($vl->profile_pic)
{
   $dar['image']=url('/').'/storage/app/public/'.$vl->profile_pic;
}
else
{
  $dar['image']='';

}
array_push($cr,$dar);
        } 

        $xr=array();
        $dar=array();
        $slid=Sliders::where([['status','=',1],['types','=',3]]);
        
if($userdata->app_type==1)
    {
        $slid=$slid->where([['doctors_did','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==2) {
          $slid=$slid->where([['pharmacy_pid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==3) {
            $slid=$slid->where([['labs_lid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==6) {
            $slid=$slid->where([['homehealthcare_hhid','=',$userdata->source_id]]);
    }
     elseif ($userdata->app_type==7) {
            $slid=$slid->where([['hospitals_hid','=',$userdata->source_id]]);
    }       
$slid=$slid->get();


        foreach($slid as $vl)
        {
        $dar['sid']=$vl->sid;
        $dar['slider']=url('/').'/storage/app/public/'.$vl->image;
        array_push($xr,$dar);
        } 
        $hr=array();
        $dar=array();
        $slid=Hospitals::where([['status','=',1]])->get();
        foreach($slid as $vl)
        {
        $dar['hid']=$vl->hid;
        $dar['name']=$vl->name;
        if($vl->profile_pic)
        {
        $dar['image']=url('/').'/storage/app/public/'.$vl->profile_pic;
        } 
        else
        {
        $dar['image']='';
        }

        array_push($hr,$dar);
        } 

$bt1=Sliders::where([['status','=',1],['types','=',4]]);
if($userdata->app_type==1)
    {
        $bt1=$bt1->where([['doctors_did','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==2) {
          $bt1=$bt1->where([['pharmacy_pid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==3) {
            $bt1=$bt1->where([['labs_lid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==6) {
            $bt1=$bt1->where([['homehealthcare_hhid','=',$userdata->source_id]]);
    }
        elseif ($userdata->app_type==7) {
            $bt1=$bt1->where([['hospitals_hid','=',$userdata->source_id]]);
    }    
$bt1=$bt1->first();
if(empty($btl))
{
  $b1='';
}
else
{
  $b1=$btl->image;
}
//echo $userdata->source_id;


$bt2=Sliders::where([['status','=',1],['types','=',5]]);

if($userdata->app_type==1)
    {
        $bt2=$bt2->where([['doctors_did','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==2) {
          $bt2=$bt2->where([['pharmacy_pid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==3) {
            $bt2=$bt2->where([['labs_lid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==6) {
            $bt2=$bt2->where([['homehealthcare_hhid','=',$userdata->source_id]]);
    }
    elseif ($userdata->app_type==7) {
            $bt2=$bt2->where([['hospitals_hid','=',$userdata->source_id]]);
    }    
$bt2=$bt2->first();
if(empty($bt2))
{
  $b2='';
}
else
{
  $b2=$bt2->image;
}

$trp=Prescriptions::leftjoin('doctors','doctors.did','customer_prescription.doctors_did')
->leftjoin('pharmacy','pharmacy.pid','customer_prescription.pharmacy_pid')
->leftjoin('labs','labs.lid','customer_prescription.labs_lid')
->leftjoin('hospitals','hospitals.hid','customer_prescription.hospital_hid')
->leftjoin('homehealthcare','homehealthcare.hhid','customer_prescription.homehealthcare_hhid')
->where([['customer_prescription.customers_cid','=',$request->user_id],['customer_prescription.ttype','=',0]])->select('customer_prescription.*','doctors.name as dname','homehealthcare.name as hname','pharmacy.name as pname','labs.name as lname')->latest('customer_prescription.id')
  ->limit(6)
  ->get();

  $book=array();
$prr=array();
if($trp->isEmpty())
{
  $book=array();

}
else
{

           foreach($trp as $vl)
        {

$darr=$vl;
$darr['dname']=($vl['dname'])?$vl['dname']:'';  
$darr['pname']=($vl['pname'])?$vl['pname']:'';  
$darr['lname']=($vl['lname'])?$vl['lname']:'';  

if($vl->hospital_hid)
{
$darr['hpname']=($vl['hpname'])?$vl['hpname']:'';   
}
 
//$darr['hpname']=($vl['hpname'])?$vl['hpname']:'';  
$darr['booking_time']=($vl['booking_time'])?$vl['booking_time']:'';  
$darr['booking_date']=($vl['booking_date'])?$vl['booking_date']:'';  
$darr['title']=($vl['comment'])?$vl['comment']:'';  

// $crp=BookingLogs::where([['booking_logs.prescriptions_id','=',$vl['id']]])
// ->select('booking_logs.comment','booking_logs.status as booking_status','booking_logs.updated_on')->latest('booking_logs.id')->first();

// if($crp)
// {
// $darr['booking_status']=$crp->booking_status;  
// }


//echo $userdata->source_id;
$fields=Fields::where([['action_type','=',$userdata->app_type]]);

 $fields=$fields->where(function($fields){
        $fields->where('fields.name', 'like', "%status%")
              ->orWhere('fields.name', 'like', "%booking_status%")
              ->orWhere('fields.name', 'like', "%Booking Status%")
              ->orWhere('fields.name', 'like', "%booking status%")
              ->orWhere('fields.name', 'like', "%lead status%")
              ->orWhere('fields.name', 'like', "%lead_status%");
    });

$trp=\DB::table('admin_users')->where([['type','=',$userdata->app_type]])->select('id');

    if($userdata->app_type=='1')
    {
    $trp->where([['doctors','=',$userdata->source_id]]); 
    }  
    if($userdata->app_type=='2')
    {
    $trp->where([['pharmacy','=',$userdata->source_id]]); 
    }
    if($userdata->app_type=='3')
    {
    $trp->where([['labs','=',$userdata->source_id]]);  
    }
    if($userdata->app_type=='5')
    {
    $trp->where([['labs','=',$userdata->source_id]]);  
    }    
    if($userdata->app_type=='6')
    {
    $trp->where([['healthcare','=',$userdata->source_id]]);  
    }
    if($userdata->app_type=='7')
    {
    $trp->where([['hospital','=',$userdata->source_id]]);  
    }
$trp=$trp->first();

$sts=0;
if($trp)
{
  $fields=$fields->where([['action_by','=',$trp->id]]);
}
if(isset($_POST['testing']))
{
 // echo $trp->id.'dddd'.$userdata->app_type;
}
$fields=$fields->select('fid')->first();
$fields=array('1');






if(!empty($fields))
{
$crp=Leadsdata::
join('fields','fields.fid','leads_data.fid')
->where([['leads_data.lid','=',$vl['id']]])
->select('leads_data.value')->latest('leads_data.did');

 $crp=$crp->where(function($crp){
        $crp->where('fields.name', 'like', "%status%")
              ->orWhere('fields.name', 'like', "%booking_status%")
              ->orWhere('fields.name', 'like', "%Booking Status%")
              ->orWhere('fields.name', 'like', "%booking status%")
              ->orWhere('fields.name', 'like', "%lead status%")
              ->orWhere('fields.name', 'like', "%lead_status%");
    });
$crp=$crp->first();
if($crp)
{
  $sts=$crp->value; 
}
else
{
  $sts=0;
}
}
else
{
$sts=0;
}


if($sts)
{
$darr['booking_status']=$sts;  
}
else
{
if($vl->prs_type==1)
{
  $darr['booking_status']='Order Placed'; 
}
else
{
  $darr['booking_status']='Pending'; 
}
}
if($vl->files)
{
$darr['files']=url('/').'/public/prescription/'.$vl->files;  
}
else
{
  $darr['files']='';
}
array_push($prr,$darr);

        }
$book=$prr;  

}
return response()->json([
            'otp' => 0,
            'status' => 200,
            'slidertop'=>$ar,          
            'booking'=>$book,          
            'slidermiddle'=>$pr,          
            'category'=>$cr,
            'sliderbottom'=>$xr,             
            'hospitals'=>$hr,             
            'bottom1'=>url('/').'/storage/app/public/'.$b1,             
            'bottom2'=>url('/').'/storage/app/public/'.$b2,             
            'message'  =>"Data Found",
                 ], 200);

   }

    public function view_faq(Request $request)
{
        $json=json_encode(json_decode ('{}'));
         $data=array();

           if(!empty($request->cid))
       {
          $slid=FAQ::where([['status','=',1],['type','=',1]])->get();
          if(!empty($slid[0]))
          {

            return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"FAQ  Found",          
            'data'  =>$slid
                 ], 200);

         exit;
          }
          else
          {
             return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"FAQ Not Found",          
            'data'  =>$slid
                 ], 200);

            exit;
          }
       }
       else
       {
 return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Customer Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
}


public function customer_address_delete(Request $request)
{
         $json=new \stdClass();
         $data=array();
         $ar=array();        
         if(!empty($request->user_id))
       {

     $cus=CustomerAddress::where([['customers_cid','=',$request->user_id],['add_id','=',$request->add_id],['status','=','1']])->first();
     $cus->status='0';
     $cus->deleted_at=date('Y-m-d h:i:s');
     $cus->update();
       return response()->json([
            'otp' => 0,
            'status' => 200,  
            'message'  =>"Address Delete Successfully",          
            'data'  =>$json
                 ], 200);

         exit;



       }
       else
       {
          return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Customer Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
}
  
 
   public function latest_news(Request $request)
   {
         $json=json_encode (json_decode ('{}'));
         $data=array();
         $ar=array();
         if(!empty($request->type))
       {

        if($request->type==1)
        {
          $news=LatestNews::where([['status','=',1]])->select('nid','title_eng','description_eng','image')->get();
          foreach($news as $vals)
          {
            $data['nid']=$vals->nid;
            $data['title']=$vals->title_eng;
            $data['description']=$vals->description_eng;
            $data['image']=url('/').'/news/'.$vals->image;           
            array_push($ar,$data);
          }
        }
        elseif($request->type==2)
        {

          $news=LatestNews::select('nid','title_mlys','description_mlys','image')->where([['status','=',1]])->get(); 
          foreach($news as $vals)
          {
            $data['nid']=$vals->nid;
            $data['title']=$vals->title_mlys;
            $data['description']=$vals->description_mlys;
            if($vals->image!='' || $vals->image!='0')
            {           
            $data['image']=url('/').'/news/'.$vals->image;
            }
            else
            {
             $data['image']=''; 
            }

            array_push($ar,$data);
          }
        }
            return response()->json([
            'otp' => 0,
            'status' => 200,
            'data'=>$ar,          
            'message'  =>"News Found",
                 ], 200);
        

       }
       else
       {
            return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"News Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
        

   } 


   public function view_sliders(Request $request)
   {

       $json=json_encode (json_decode ('{}'));
 if(empty($request->create_id))
       {

        return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Slider Not Found",          
            'data'  =>$json
                 ], 200);

         exit;
       }
   
        $ar=array();
        $dar=array();
        $slid=Sliders::where([['status','=',1],['user_id','=',$request->create_id]])->get();
        
        if($slid->isEmpty())
        {
    $res= new \stdClass();        
         return response()->json([
            'otp' => 0,
            'status' => 300,  
            'message'  =>"Slider Not Found",          
            'data'  =>$res
                 ], 200);

         exit;           
        }
        
        foreach($slid as $vl)
        {
$dar['sid']=$vl->sid;
$dar['slider']=url('/').'/public/uploads/'.$vl->image;
array_push($ar,$dar);
        }    
            return response()->json([
            'otp' => 0,
            'status' => 200,
            'data'=>$ar,          
            'message'  =>"Slider Found",
                 ], 200);
      
   } 
//

public function customer_profile_update(Request $request)
{
     $json=json_encode (json_decode ('{}'));
     if(!empty($request->cid))
       {
             $validator = Validator::make($request->all(), [
        'first_name' => 'required',                                          
        'last_name' => 'required',                                          
        'device_id' => 'required',                                          
        'device_token' => 'required',                                          
        'device_type' => 'required',                                          
        'email' => 'required|email', 
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',                                         
           ]);
                 if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
            $dst=Customers::where([['email','=',$request->email],['cid','!=',$request->cid]])->first();
            if(!empty($dst))
            {
              


  return response()->json([
           
            'message'  =>'Email ID Already Exist',
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);
            exit;
          
            }

             

            $css=Customers::where('cid','=',$request->cid)->first();
            $css->name=$request->first_name.' '.$request->last_name;
            $css->email=$request->email;
            $css->device_token=$request->device_token;
            $css->device_type=$request->device_type;
            $css->device_id=$request->device_id;
           if(!empty($request->image))
        {

        $imageName = date('ymd').''.time().'.'.$request->image->extension();     
        $request->image->move(public_path('images/customers'), $imageName);
          $css->image=$imageName;
        }


            $css->update();
            $new=Customers::where('cid','=',$request->cid)->first();
            $new->image=url('/').'/images/customers/'.$new->image;
             return response()->json([
            'otp' => 0,
            'message'  =>"Update Successfully",
            'status' => 200,            
            'data'  =>$new
                 ], 200);
         }
       }
       else
       {
           return response()->json([
            'otp' => 0,            
            'status'  => 300,
            'message'  => "Customer Not Found",
            'data'  => $json,
        ], 400);
       }

} 

public function customer_updateaddress(Request $request)
{
     $json=json_encode (json_decode ('{}'));
     if(!empty($request->user_id))
       {
             $validator = Validator::make($request->all(), [
        'full_address' => 'required',                                          
        'latitude' => 'required',                                          
        'add_id' => 'required',                                          
        'longitude' => 'required',                                                                                   
           ]);
                 if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
            $cus=CustomerAddress::where([['add_id','=',$request->add_id],['status','=','1']])->first();
            if(!empty($cus))
            {
              
              $cus->full_address=$request->full_address;
              $cus->address=$request->address;
              $cus->latitude=$request->latitude;
              $cus->longitude=$request->longitude;
              $cus->customers_cid=$request->user_id;
              $cus->created_at=date("Y-m-d h:i:s");
              $cus->update();


 $res= new \stdClass();
 return response()->json([
            'otp' => 0,
            'message'  =>"Update Successfully",
            'status' => 200,            
            'data'  =>$res
                 ], 200);

            }
            else
            {
 $new=new \stdClass();
 return response()->json([
            'otp' => 0,
            'message'  =>"Address Not Found",
            'status' => 400,            
            'data'  =>$new
                 ], 200);
            }

             

         
         }
       }
       else
       {
           return response()->json([
            'otp' => 0,            
            'status'  => 300,
            'message'  => "Customer Not Found",
            'data'  => $json,
        ], 400);
       }

} 


public function customer_addaddress(Request $request)
{
     $json=json_encode (json_decode ('{}'));
     if(!empty($request->user_id))
       {
             $validator = Validator::make($request->all(), [
        'full_address' => 'required',                                          
        'address' => 'required',                                          
        'latitude' => 'required',                                          
        'longitude' => 'required',                                                                                   
           ]);
                 if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);
            exit;

        }
        else
        {
            $dst=Customers::where([['cid','=',$request->user_id]])->first();
            if(!empty($dst))
            {


 $cr['default_add']=0;

         CustomerAddress::where([['customers_cid','=',$request->user_id]])->update($cr);

              $cus=  new CustomerAddress; 
              $cus->full_address=$request->full_address;
              $cus->address=$request->address;
              $cus->latitude=$request->latitude;
              $cus->longitude=$request->longitude;
              $cus->customers_cid=$request->user_id;
              $cus->default_add=1;
              $cus->created_at=date("Y-m-d h:i:s");
              $cus->save();


 $new= new \stdClass();
 return response()->json([
            'otp' => 0,
            'message'  =>"Add Successfully",
            'status' => 200,            
            'data'  =>$new
                 ], 200);

            }

             

          
         }
       }
       else
       {
           return response()->json([
            'otp' => 0,            
            'status'  => 300,
            'message'  => "Customer Not Found",
            'data'  => $json,
        ], 400);
       }

} 

 public function view_notification(Request $request)
   {
      $json=json_encode (json_decode ('{}')); 
     if(!empty($request->user_id))
       {



$ar=Notifications::where([['type','=',$request->app_for]])->where('user_id','=',$request->user_id)->orderBy('nid', 'DESC')->get();

$tv=1;
$res=array();
$cr=array();
if($ar->isEmpty())
{
  $res= new \stdClass();
   return response()->json([
            'otp' => 0,
            'status' => 200,
            'data'=>$res,          
            'message'  =>"Notifications Not Found",
                 ], 200);
}
foreach($ar as $vls)
{
$res['title']=($vls->title)?$vls->title:'';  
$res['description']=($vls->description)?$vls->description:'';  
$res['created_at']=date("d-m-Y h:i A", strtotime($vls->created_at)); 


array_push($cr,$res);
}
if(isset($cr))
{
 return response()->json([
            'otp' => 0,
            'status' => 200,
            'data'=>$cr,          
            'message'  =>"Notifications Found",
                 ], 200);
}
else
{
  $res= new \stdClass();
   return response()->json([
            'otp' => 0,
            'status' => 300,
            'data'=>$res,          
            'message'  =>"Notifications Not Found",
                 ], 200);
}

       
       }
        else
       {
       return response()->json([
            'otp'=>0 ,      
            'status'  => 300,
            'message'  => "Customer Not Found",
            "data"=>$json
        ], 400);
       }

   } 
   

   public function view_address(Request $request)
   {
      $json=json_encode (json_decode ('{}')); 
     if(!empty($request->user_id))
       {



$ar=CustomerAddress::where([['status','=','1']])->where('customers_cid','=',$request->user_id)->get();

$tv=1;
$res=array();
$cr=array();
if($ar->isEmpty())
{
  $res= new \stdClass();
   return response()->json([
            'otp' => 0,
            'status' => 300,
            'data'=>$res,          
            'message'  =>"Address Not Found",
                 ], 200);
}
foreach($ar as $vls)
{
$res['full_addres']=($vls->full_address)?$vls->full_address:'';  
$res['address']=($vls->address)?$vls->address:'';  
$res['latitude']=($vls->latitude)?$vls->latitude:'';  
$res['longitude']=($vls->longitude)?$vls->longitude:'';  
$res['add_id']=($vls->add_id)?$vls->add_id:'';  
$res['default_add']=($vls->default_add)?$vls->default_add:'0';  

array_push($cr,$res);
}
if(isset($cr))
{
 return response()->json([
            'otp' => 0,
            'status' => 200,
            'data'=>$cr,          
            'message'  =>"Address Found",
                 ], 200);
}
else
{
   return response()->json([
            'otp' => 0,
            'status' => 300,
            'data'=>$json,          
            'message'  =>"Address Not Found",
                 ], 200);
}

        return response()->json([
            'otp'=>0,
            'message'  =>"Address Found Successfully",
            'status' => 200,            
            'data'  =>$ar,
                 ], 200);
       }
        else
       {
       return response()->json([
            'otp'=>0 ,      
            'status'  => 300,
            'message'  => "Customer Not Found",
            "data"=>$json
        ], 400);
       }

   } 
   
  // $data = array('name'=>$request->first_name.' '.$request->last_name,'subject'=>'New Customer Registration Request','email'=>$request->email,"body" => "Customer Registration Request");
  //     $template= 'emails.trooper_registration';
  //          $to_name = 'Admin';
  //               $to_email = env('MAIL_ADMIN');
  //               Mail::send($template, ['data' => $data], function($message) use ($to_name, $to_email) {
  //                   $message->to(env('MAIL_ADMIN'), 'Admin')->subject('Customer Registration Request');
  //                   $message->from('harshvardhan@officebox.vervelogic.com','Email Verification');
  //               });




  public function save_profile(Request $request)
  {
       $json=array();

       //$json=json_encode (json_decode ('{}'));
if(!empty($request->cid))
       {
        $validator = Validator::make($request->all(), [
       // 'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:customers',                     
        'email' => 'required',                     
        'first_name' => 'required',                     
        'last_name' => 'required',                     
           ]);

     if($validator->fails()){
            // here we return all the errors message
$ers="";
$errors = $validator->errors();
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
            'data'  =>$json
        ], 200);

            exit;
        }
        else
        {
           $cust=Customers::where([['cid','=',$request->cid],['status','=','0'],['app_type','=',$request->app_type],['source_id','=',$request->create_id]])->first();        
               if(!empty($cust))
               {
                 
$cust->name=$request->first_name.' '.$request->last_name;
$cust->email=$request->email;
$cust->device_token=$request->device_token;
$cust->device_id=$request->device_id;
$cust->device_type=$request->device_type;
$cust->gender=$request->gender;
$cust->status=1;

        $cust->save();

                      
           $cust=Customers::where([['cid','=',$request->cid],['status','=','1'],['app_type','=',$request->app_type],['source_id','=',$request->create_id]])->first(); 


 if($cust->app_type=='1')
    {
     $details=$this->get_admin('1',$cust->source_id); 
    }  
    if($cust->app_type=='2')
    {
      //echo "ssss";
    //echo $request->source_id;
     $details=$this->get_admin('2',$cust->source_id);
    //print_r($details);
    //echo "sdsds";
    }
    if($cust->app_type=='3')
    {
     $details=$this->get_admin('3',$cust->source_id);   
    }
     if($cust->app_type=='6')
    {
     $details=$this->get_admin('6',$cust->source_id);   
    }   

     if($cust->app_type=='7')
    {
     $details=$this->get_admin('7',$cust->source_id);   
    }   


$cust['facebook']='';  
$cust['linkedin']='';  
$cust['instagram']='';  
return response()->json([           
            'message'  =>"Data Update Successfully",
            'status' => 200,
            'otp'  =>  12345,
            'data'  =>$cust
            ], 200);




               }
        }


      }
    else
       {


return response()->json([           
            'message'  =>"Sorry No Data Found",
            'status' => 300,
            'otp'  =>  '1',
            'data'  =>''
            ], 200);

       }

  }
public function get_customer($cid)
{
  $sus=Customers::where([['cid','=',$cid]])->first(); 
  return $sus;

}

public function forget_password(Request $request)
  {

       $json=array();
       $json=json_encode (json_decode ('{}'));
       //$json=Customers::where([['mobile','=','xxx']])->first();
       if(!empty($request->mobile))
       {
        $validator = Validator::make($request->all(), [                    
        'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
        'app_type' =>'required'                     
           ]);

      if($validator->fails()){
            // here we return all the errors message

      return response()->json([
           
             'message'  =>"Mobile Not is not valid",
            'status' => 400,
            'otp'  => 0,
            'data'  =>$json
        ], 200);

            //return response()->json(['error' => $validator->errors(),'status'=>0], 422);
            exit;
        }
         if ($validator) {
        
if($request->app_type==1)
{
  $doctors=Doctors::where([['contact_no','=',$request->mobile]])->select('*')->first();
}
if($request->app_type==2)
{
  $doctors=Pharmacy::where([['contact_no','=',$request->mobile]])->select('*')->first();
}

if($request->app_type==3)
{
  $doctors=Labs::where([['contact_no','=',$request->mobile]])->select('*')->first();
}

if($request->app_type==6)
{
  $doctors=Homehealthcare::where([['contact_no','=',$request->mobile]])->select('*')->first();
}
if($request->app_type==7)
{
  $doctors=Hospitals::where([['contact_no','=',$request->mobile]])->select('*')->first();
}
if(empty($doctors))
 {
   $cr=new \stdClass();
   return response()->json([
            'otp' => 0,
            'status' => 400,          
            'data'=>$cr,                        
            'message'  =>"Invalid Mobile Number",
                 ], 200);

 }
 else
 {
        $otp=$doctors->password;
        $mobile=$request->mobile;
        $msg=urlencode('your password for sehatshayak is '.$otp.'.Thanks '); 
             file_get_contents('http://sms.par-ken.com/api/smsapi?key=bf5480b78f149a12d0c01dfd73dd7ef1&route=4&sender=Sehats&number='.$mobile.'&sms='.$msg.'');



   $cr=new \stdClass();
   return response()->json([
            'otp' => $otp,
            'status' => 200,          
            'data'=>$cr,                        
            'message'  =>"Password sent Successfully",
                 ], 200);


 }

        }

  }
  else
  {
       $cr=new \stdClass();
          return response()->json([           
             'message'  =>"Mobile Not is Empty",
            'status' => 400,
            'otp'  => 0,
            'data'  =>$cr
        ], 200);

  }


}

  public function send_otp(Request $request)
  {

       $json=array();
       $json=json_encode (json_decode ('{}'));
       //$json=Customers::where([['mobile','=','xxx']])->first();
       if(!empty($request->mobile))
       {
        $validator = Validator::make($request->all(), [
       // 'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10|unique:customers',                     
        'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',                     
           ]);

      if($validator->fails()){
            // here we return all the errors message

      return response()->json([
           
             'message'  =>"Mobile Not is not valid",
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);

            //return response()->json(['error' => $validator->errors(),'status'=>0], 422);
            exit;
        }
         if ($validator) {
                     $digits = 5;
if($request->mobile==9610026950)
{
 $otp=12345;
}
else
{
  $otp= rand(pow(10, $digits-1), pow(10, $digits)-1);
}

                     

  $sus=Customers::where([['contact_no','=',$request->mobile],['status','=',2],['app_type','=',$request->app_type],['source_id','=',$request->create_id]])->first(); 
  if(!empty($sus))
  {

     return response()->json([
           
             'message'  =>"Account is Suspended",
            'status' => 300,
            'otp'  => 0,
            'data'  =>$json
        ], 200);

       exit;

  }

               $cust=Customers::where([['contact_no','=',$request->mobile],['status','=',1],['app_type','=',$request->app_type],['source_id','=',$request->create_id]])->first();        
               if(!empty($cust))
               {
                    
                
           Customers::where([['contact_no','=',$request->mobile],['app_type','=',$request->app_type],['source_id','=',$request->create_id]])
           ->update(['device_token'=>$request->device_token],['device_type'=>$request->device_type],['app_type'=>$request->app_type],['source_id'=>$request->create_id]);
                     
        
// http://sms.par-ken.com/api/smsapi?key=bf5480b78f149a12d0c01dfd73dd7ef1&route=2&sender=ALERTS&number=9610026950&sms=Message

// print file_get_contents('http://sms.par-ken.com/api/smsapi?key=bf5480b78f149a12d0c01dfd73dd7ef1&route=2&sender=ALERTS&number=9610026950&sms=Message');
$mobile=$request->mobile;
  
if($request->mobile==9610026950)
{

}
else
{
  $msg=urlencode('your otp for gym is '.$otp.'.please use this otp for login.Thanks '); 
           file_get_contents('http://sms.par-ken.com/api/smsapi?key=bf5480b78f149a12d0c01dfd73dd7ef1&route=4&sender=Sehats&number='.$mobile.'&sms='.$msg.'');
        
          

}
        

$new=array();
// $new['cid']=($cust->cid)?$vl->cid:'';  
// $new['name']=($cust->name)?$vl->name:'';  
// $new['message']=($cust->message)?$vl->message:'';  
// $new['address']=($cust->address)?$vl->address:'';  
// $new['device_token']=($cust->device_token)?$vl->device_token:'';  
// $new['device_type']=($cust->device_type)?$vl->device_type:'';  
// $new['device_id']=($cust->device_id)?$vl->device_id:'';  
// $new['app_type']=($cust->app_type)?$vl->app_type:'';  
// $new['source_id']=($cust->source_id)?$vl->source_id:'';  
// $new['contact_no']=($cust->contact_no)?$vl->contact_no:'';  
// $new['email']=($cust->email)?$vl->email:'';  


    if($cust->app_type=='1')
    {
     $details=$this->get_admin('1',$cust->source_id); 
    }  
    if($cust->app_type=='2')
    {
      //echo "ssss";
    //echo $request->source_id;
     $details=$this->get_admin('2',$cust->source_id);
    //print_r($details);
    //echo "sdsds";
    }
    if($cust->app_type=='3')
    {
     $details=$this->get_admin('3',$cust->source_id);   
    }
     if($cust->app_type=='6')
    {
     $details=$this->get_admin('6',$cust->source_id);   
    }   

     if($cust->app_type=='7')
    {
     $details=$this->get_admin('7',$cust->source_id);   
    }   


$cust['facebook']=($details->facebook)?$details->facebook:'';  
$cust['linkedin']=($details->linkedin)?$details->linkedin:'';  
$cust['instagram']=($details->instagram)?$details->instagram:'';  


return response()->json([           
            // 'message'  =>"Your OTP is ".$otp,
             'message'  =>"OTP send Successfully ",
            'status' => 200,
            'otp'  =>  $otp,
            'cust_status'  =>1,
            'data'  =>$cust
            ], 200);

               }
               else
               {



function random_strings($length_of_string) 
{   
    
    $str_result = '0123456789ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghjklmnopqrstuvwxyz';      
    return substr(str_shuffle($str_result),  
                       0, $length_of_string); 
} 
    
    
    $p=1;
    // while($p==1)
    // {
    // $shrcode=random_strings(6); 
    // $exist=Customers::where(['share_code'=>$shrcode])->first();
    // if(empty($exist))
    // {
    //    $p++;        
    // }       
    // }

$mobile=$request->mobile;
        $msg=urlencode('your otp for gym is '.$otp.'.please use this otp for login.Thanks '); 
            $rd=   file_get_contents('http://sms.par-ken.com/api/smsapi?key=bf5480b78f149a12d0c01dfd73dd7ef1&route=4&sender=Sehats&number='.$mobile.'&sms='.$msg.'');

   if($request->tester)
           {
             //print_r($rd);
             ///die;
           }
                     // $ot=new OTP;
                     // $ot->mobile=$request->mobile;
                     // $ot->uid=0;
                     // $ot->type='M';
                     // $ot->user_type="1";
                     // $ot->otp=$otp;
                     // $ot->save();
                  $cust=Customers::where([['contact_no','=',$request->mobile],['status','=','0'],['app_type','=',$request->app_type],['source_id','=',$request->create_id]])->first();        
               if(!empty($cust))
               {
                    
                
           Customers::where([['contact_no','=',$request->mobile],['app_type','=',$request->app_type],['source_id','=',$request->create_id]])
           ->update(['device_token'=>$request->device_token],['device_type'=>$request->device_type],['app_type'=>$request->app_type],['source_id'=>$request->create_id]);



                 
 if($cust->app_type=='1')
    {
     $details=$this->get_admin('1',$cust->source_id); 
    }  
    if($cust->app_type=='2')
    {
      //echo "ssss";
    //echo $request->source_id;
     $details=$this->get_admin('2',$cust->source_id);
    //print_r($details);
    //echo "sdsds";
    }
    if($cust->app_type=='3')
    {
     $details=$this->get_admin('3',$cust->source_id);   
    }
     if($cust->app_type=='6')
    {
     $details=$this->get_admin('6',$cust->source_id);   
    }   
     if($cust->app_type=='7')
    {
     $details=$this->get_admin('7',$cust->source_id);   
    }  


$cust['facebook']='';  
$cust['linkedin']='';  
$cust['instagram']='';  

return response()->json([           
            //'message'  =>"Your OTP is ".$otp,
            'message'  =>"OTP Send Successfully",
            'status' => 200,
            'otp'  =>  $otp,
            'cust_status'  =>0,
            'data'  =>$cust
            ], 200);

           }   
                 $cus=  new Customers;
                 $cus->name='';
                 $cus->contact_no=$request->mobile;
                 
                 $cus->status=0;
                 $cus->device_token=$request->device_token;
                 $cus->device_id=$request->device_id;
                 $cus->device_type=$request->device_type;
                 $cus->app_type=$request->app_type;
                 $cus->source_id=$request->create_id;
                // $cus->gender=$request->gender;
                 
                 $cus->save();

                 $custt=Customers::where('cid','=',$cus->cid)->first();
                     // $custt->image=url('/').'/images/'.$custt->image;

           
   if($custt->app_type=='1')
    {
     $details=$this->get_admin('1',$custt->source_id); 
    }  
    if($custt->app_type=='2')
    {
      //echo "ssss";
    //echo $request->source_id;
     $details=$this->get_admin('2',$custt->source_id);
    //print_r($details);
    //echo "sdsds";
    }
    if($custt->app_type=='3')
    {
     $details=$this->get_admin('3',$custt->source_id);   
    }
     if($custt->app_type=='6')
    {
     $details=$this->get_admin('6',$custt->source_id);   
    }   
     if($custt->app_type=='7')
    {
     $details=$this->get_admin('7',$custt->source_id);   
    }   



$custt['facebook']=($details->facebook)?$details->facebook:'';  
$custt['linkedin']=($details->linkedin)?$details->linkedin:'';  
$custt['instagram']=($details->instagram)?$details->instagram:''; 


return response()->json([           
            'message'  =>"OTP Send Successfully",
            'status' => 200,
            'otp'  =>  $otp,
            'cust_status'  =>0,
            'data'  =>$custt
            ], 200);


                
               }
           }
        
       }
       else
       {


return response()->json([           
            'message'  =>"Sorry No Data Found",
            'status' => 300,
            'otp'  =>  '1',
            'data'  =>''
            ], 200);

       }

  }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
