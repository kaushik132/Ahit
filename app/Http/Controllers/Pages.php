<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\http;
use App\HomePage;
use App\ExpertList;
use App\Testimonial;
use App\Brand_list;
use App\BlogCategory;
use App\Blog;
use App\Contact;
use App\Kaushik;
use App\ItServices;
use App\ItSubServices;
use App\Country;
use App\Project;
use App\ProjectCategory;
use App\Analysis;
use App\ItProduct;
use App\Terms;
use App\Quotation;
use App\ItProductCart;
use App\OrderUser;
use App\City;
use App\Countrys;
use App\State;
use Mail;
use App\User;
use App\ItServiceBanner;
use App\Wishlist;
use App\Order;
use App\Faq;




// use App\ProjectPage;

class Pages extends Controller{

      function __construct() {
        }

    public function index($slug=null){

            Artisan::call('route:clear');
            Artisan::call('view:clear');
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
           $canocial ='https://ahitechno.com';
           
           $homepage = HomePage::first();
           $expert_list = ExpertList::get();
           $testimonial_list = Testimonial::get();
           $brand_list = Brand_list::get();
           $itproduct = ItProduct::get();

           $blogs = Blog::latest()->with('blogCategory')->limit(12)->get();

           $servise = ItServices::latest()->limit(4)->get();

           $mobileServise = ItServices::latest()->limit(4)->get();



           if($slug!=null){
            $projectCategory = ProjectCategory::where('slug',$slug)->first();
            $projectList = Project::latest()->with('projectCategory')->where('category_id',$projectCategory->id)->get();
        }else{
            $projectList = Project::latest()->with('projectCategory')->get();
         }

         $projectCategory = ProjectCategory::withcount('projects')->get();
         $fillproject = Project::with('projectCategory')->get();
         
         $faq = Faq::all();

           $brand_lists = Brand_list::get();
           $seo_data['description'] =$homepage->seo_des_home;
           $seo_data['seo_title'] =$homepage->seo_title_home;
           $seo_data['keywords'] =$homepage->seo_keyword_home;
           return view('front_website.page.home',compact('itproduct','projectList','projectCategory','mobileServise','canocial','servise','blogs','homepage','seo_data','expert_list','testimonial_list','brand_list','brand_lists','fillproject','faq'));

     } 
  
      public function package(){
           $canocial ='https://ahitechno.com/package';
           $seo_data['description'] ="";
           $seo_data['seo_title'] ="";
           return view('front_website.page.package',compact('canocial','seo_data'));
      } 


    public function aboutus(){
          $canocial ='https://ahitechno.com/about-us';
          $homepage = HomePage::select('seo_title_about','seo_des_about','seo_key_about')->first();
          $seo_data['description'] =$homepage->seo_des_about;
          $seo_data['seo_title'] =$homepage->seo_title_about;
          $seo_data['keywords'] =$homepage->seo_key_about;
          $expert_list = ExpertList::get();
          return view('front_website.page.about',compact('canocial','seo_data','expert_list'));

     }  



    public function contactus(){
            $canocial ='https://ahitechno.com/contact-us';
            $homepage = HomePage::select('seo_title_contact','seo_des_contect','seo_key_contact')->first();
            $seo_data['description'] =$homepage->seo_des_contect;
            $seo_data['seo_title'] =$homepage->seo_title_contact;
            $seo_data['keywords'] =$homepage->seo_key_contact;
            return view('front_website.page.contact-us',compact('canocial','seo_data'));

     }

   public function contacfrom(Request $request){

          Contact::create($request->input());
          return redirect()->route('home')->with('success', 'We have received your enquiry and will respond to you within 48 hours.');

     }

    

     public function webdesign(){
           $canocial ='https://ahitechno.com/web-design';
           return view('front_website.page.web-design',compact('canocial'));

     }

    public function graphicdesign(){
             $canocial ='https://ahitechno.com';
        return view('front_website.page.graphic-design',compact('canocial'));

     }

     public function webdevelopment(){
          $canocial ='https://ahitechno.com';
          return view('front_website.page.web-development',compact('canocial'));

     }

     public function digitalmarketing(){
           $canocial ='https://ahitechno.com';
          return view('front_website.page.digital-marketing',compact('canocial'));

     }
     public function terms(){
       
           $canocial ='https://ahitechno.com/terms-&-condition';
           $homepage = HomePage::select('seo_title_terms','seo_des_terms')->first();
           $seo_data['description'] =$homepage->seo_des_terms;
          $seo_data['seo_title'] =$homepage->seo_title_terms;
          return view('front_website.page.termscondition',compact('canocial','seo_data'));

     }
     public function privacy(){
       
           $canocial ='https://ahitechno.com/privacy-&-policy';
           $homepage = HomePage::select('seo_title_privacy','seo_des_privacy')->first();
           $seo_data['description'] =$homepage->seo_des_privacy;
          $seo_data['seo_title'] =$homepage->seo_title_privacy;
          return view('front_website.page.privacypolicy',compact('canocial','seo_data'));

     }
     public function shipping(){
       
           $canocial ='https://ahitechno.com/shipping-&-policy';
           $homepage = HomePage::select('seo_title_shipping','seo_des_shipping')->first();
           $seo_data['description'] =$homepage->seo_des_shipping;
          $seo_data['seo_title'] =$homepage->seo_title_shipping;
          return view('front_website.page.shippingpolicy',compact('canocial','seo_data'));

     }
     public function cancellation(){
         $canocial ='https://ahitechno.com/cancellation-&-refund-policy';
         $homepage = HomePage::select('seo_title_cancellation','seo_des_cancellation')->first();
           $seo_data['description'] =$homepage->seo_des_cancellation;
          $seo_data['seo_title'] =$homepage->seo_title_cancellation;
          return view('front_website.page.cancellationrefundpolicy',compact('canocial','seo_data'));

     }

     public function blogs($category=null){


         
           if($category!=null){

                $BlogCategory = BlogCategory::where('slug',$category)->first();
                $bradcomesname =$BlogCategory->name;
                $blogs = Blog::latest()->with('blogCategory')->where('category_id',$BlogCategory->id)->paginate(15);
                $seo_data['description'] =$BlogCategory->seo_description;
                $seo_data['keywords'] =$BlogCategory->seo_keyword;
                $seo_data['seo_title'] =$BlogCategory->seo_title;
                $canocial ='https://ahitechno.com/blogs/'.$category;

             }else{

                  $bradcomesname ="Blogs";
                  $blogs = Blog::latest()->with('blogCategory')->paginate(15);
                  $homepage = HomePage::select('seo_title_blog','seo_des_blog','seo_key_blog')->first();
                  $seo_data['description'] =$homepage->seo_des_blog;
                  $seo_data['seo_title'] =$homepage->seo_title_blog;
                  $seo_data['keywords'] =$homepage->seo_key_blog;
                $canocial ='https://ahitechno.com/blogs';
            }
           $blogcategory = BlogCategory::withcount('blogs')->get();
           return view('front_website.page.blogs', compact('blogcategory','blogs','seo_data','canocial','bradcomesname'));
        }

        public function blogdetails($slug){


            $relatedBlog = Blog::get();
            $blog = Blog::with('blogCategory')->where('slug', '=', "$slug") ->first();
            $similarblog =Blog::with('blogCategory')->where('id', '!=', $blog->id)->limit(4)->get();
            $blogcategory = BlogCategory::withcount('blogs')->limit(5)->get();
            $seo_data['description'] =strip_tags($blog->description);
            $seo_data['keywords'] =$blog->keywords;
            $seo_data['seo_title'] =$blog->seo_title;
            $canocial ='https://ahitechno.com/blog/'.$slug;
            return view('front_website.page.single',compact('blog','seo_data','blogcategory','canocial','similarblog','relatedBlog'));
        }

   

     
     public function project($category=null){
          if($category!=null){

               $ProjectCategory = ProjectCategory::where('slug',$category)->first();
               $bradcomesname =$ProjectCategory->name;
               $projects = Project::latest()->with('projectCategory')->where('category_id',$ProjectCategory->id)->paginate(6);
               $seo_data['description'] =$ProjectCategory->seo_description;
               $seo_data['keywords'] =$ProjectCategory->seo_keyword;
               $seo_data['seo_title'] =$ProjectCategory->seo_title;
               $canocial ='https://ahitechno.com/project/'.$category;

            }else{

                 $bradcomesname ="Projects";
                 $projects = Project::latest()->with('projectCategory')->paginate(6);
                 $homepage = HomePage::select('seo_title_project','seo_des_project','seo_key_project')->first();
                 $seo_data['description'] =$homepage->seo_des_project;
                 $seo_data['seo_title'] =$homepage->seo_title_project;
                 $seo_data['keywords'] =$homepage->seo_key_project;
               $canocial ='https://ahitechno.com/project';
           }
           $projectfullter = ProjectCategory::get();
          $projectcategory = ProjectCategory::withcount('projects')->get();
          return view('front_website.page.project', compact('projectfullter','projectcategory','projects','seo_data','canocial','bradcomesname'));
       }


       public function products($category=null){
        if($category!=null){

            $ProjectCategory = ProjectCategory::where('slug',$category)->first();
            $bradcomesname =$ProjectCategory->name;
            $itproject = ItProduct::latest()->with('productCategory')->where('category_id',$ProjectCategory->id)->paginate(12);
            $seo_data['description'] =$ProjectCategory->seo_description;
            $seo_data['keywords'] =$ProjectCategory->seo_keyword;
            $seo_data['seo_title'] =$ProjectCategory->seo_title;
           
            $canocial ='https://ahitechno.com/products'.$category;

         }else{

              $bradcomesname ="itproject";
              $itproject = ItProduct::latest()->with('productCategory')->paginate(12);
              $homepage = HomePage::select('seo_title_product','seo_des_product','seo_key_product')->first();
              $seo_data['description'] =$homepage->seo_des_product;
              $seo_data['seo_title'] =$homepage->seo_title_product;
              $seo_data['keywords'] =$homepage->seo_key_product;
              
              $canocial ='https://ahitechno.com/products';
        }
          
        
        return view('front_website.page.products',compact('canocial','itproject','seo_data','bradcomesname'));

  }


public function cart(Request $request,$id){


   

    $user_name = Auth::user()->id;
    $product = ItProduct::findOrFail($id);
    $cart = session()->get('addtocart', []);
    
  
    if(isset($cart[$id])) {
        $cart[$id]['quantity'];
    }  else {
        $cart[$id] = [
            "category_id" => $product->category_id,
            "category_name" =>$product->productCategory['name'],
            "title" => $product->title,
            "duration" => $product->duration,
            "amt" => $product->amt,  
            "quantity" => 1 
        ];
    }
    $data = [
        "category_id" => $product->category_id,
            "category_name" =>$product->productCategory['name'],
            "title" => $product->title,
            "duration" => $product->duration,
            "amt" => $product->amt, 
            "title"  => $product->title,
            "description" => $product->description,
            "user_id" => $user_name,
            "fixprice" => $product->amt,
            "quantity" => 1,
            "no" => 1
           

       
    ];
    $datauser = [
        "category_id" => $product->category_id,
            "category_name" =>$product->productCategory['name'],
            "title" => $product->title,
            "duration" => $product->duration,
            "amt" => $product->amt, 
            "title"  => $product->title,
            "description" => $product->description,
            "user_id" => $user_name,
            "fixprice" => $product->amt,
            "quantity" => 1,
            "no" => 1,
            "status" =>1,
          

           

       
    ];

    ItProductCart::create($data); 
    OrderUser::create($datauser); 
    
    
 


    session()->put('addtocart', $cart );

        return redirect()->back()->with('success', 'Product add to cart successfully!');

}


public function wishlist(Request $request,$id){


   

    $user_name = Auth::user()->id;
    $product = ItProduct::findOrFail($id);
    $cart = session()->get('addtocart', []);
    
  
    if(isset($cart[$id])) {
        $cart[$id]['quantity'];
    }  else {
        $cart[$id] = [
            "category_id" => $product->category_id,
            "category_name" =>$product->productCategory['name'],
            "title" => $product->title,
            "duration" => $product->duration,
            "amt" => $product->amt,  
            "quantity" => 1 
        ];
    }
    $data = [
        "category_id" => $product->category_id,
            "category_name" =>$product->productCategory['name'],
            "title" => $product->title,
            "duration" => $product->duration,
            "amt" => $product->amt, 
           
            // "description" => $product->description,
             "user_id" => $user_name,
             "fixprice" => $product->amt,
            "quantity" => 1,
            "no" => 1
           

       
    ];
    Wishlist::create($data); 
    
 


    session()->put('addtocart', $cart );

        return redirect()->back()->with('success', 'Product add to Wishlist successfully!');

}










public function deletecart($id)
    {
       $addtocart = ItProductCart::find($id);
       $addtocart->delete();
       return redirect()->back()->with('success', 'Product Delete to cart successfully!');

    }


public function edit($id)
    {
      $addtocart = ItProductCart::find($id);
      return view('front_website.page.editcart',compact('addtocart'));

    }


public function updatecart(Request $request,$id){
    $addtocart = ItProductCart::find($id);
    $addtocart->quantity = $request->input('qty');
    $addtocart->amt = $request->input('amt');
    $addtocart->update();
    return redirect('add-to-cart')->with('success', 'Product add to cart successfully!');
}    


public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('addtocart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('addtocart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('addtocart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('addtocart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

       public function projectdetail($slug){

        $relatedproject = Project::all();
     
          $project = Project::with('projectCategory')->where('slug', '=', "$slug") ->first();
          $similarproject =Project::with('projectCategory')->where('id', '!=', $project->id)->limit(4)->get();
          $projectcategory = ProjectCategory::withcount('projects')->limit(5)->get();
          $seo_data['description'] =strip_tags($project->description);
          $seo_data['keywords'] =$project->keywords;
          $seo_data['seo_title'] =$project->seo_title;
          $canocial ='https://ahitechno.com/project_details/'.$slug;
          return view('front_website.page.double',compact('project','seo_data','projectcategory','canocial','similarproject','relatedproject'));
      }



      public function addtocart(){
        
        $addtocart = ItProductCart::all();
          $canocial ='https://ahitechno.com/add-to-cart';
         return view('front_website.page.addtocart',compact('canocial','addtocart'));
     }

      
     public function singleproduct($slug=null){
        $testimonial = Testimonial::get();
        $blogData = ItProduct::with('productCategory')->where('slug',$slug)->first();
        $blogCategory = ProjectCategory::withcount('itproject')->limit(6)->get();
        $itproject = ItProduct::all();

        $seo_data['description'] =strip_tags($blogData->seo_description);
        $seo_data['keywords'] =$blogData->seo_keyword;
        $seo_data['seo_title'] =$blogData->seo_title;

       
          $canocial ='https://ahitechno.com/single-product/'.$slug;
         return view('front_website.page.singleproduct',compact('canocial','seo_data','blogData','blogCategory','testimonial','itproject'));
     }



     public function buynowpage(){
        
        $counteries = Countrys::get(['name','id']);

        $addtocart = ItProductCart::all();
          $canocial ='https://ahitechno.com/buy-now';
         return view('front_website.page.buynowpage',compact('canocial','addtocart','counteries'));
     }

     public function fatchState(Request $request)
     {
         $data['states'] = State::where('country_id',$request->country_id)->get(['name','id']);
  
         return response()->json($data);
     }
  
     public function fatchCity(Request $request)
     {
         $data['cities'] = City::where('state_id',$request->state_id)->get(['name','id']);
  
         return response()->json($data);
     }


      public function blankpage(){
              $canocial ='https://ahitechno.com';
              return view('front_website.blankpage',compact('canocial'));
       }

       public function loginpage(){
           $canocial ='https://ahitechno.com/login_page';
        $homepage = HomePage::select('seo_title_login','seo_des_login')->first();
        $seo_data['description'] =$homepage->seo_des_login;
          $seo_data['seo_title'] =$homepage->seo_title_login;
         
          return view('front_website.page.loginpage',compact('canocial','seo_data'));

    }



    public function loginPost(Request $request)
    {
        
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        $data = Auth::attempt($credetials);
       
 
        if ($data) {
          
            return redirect('/')->with('success', 'Login Success');
        }
 
        return back()->with('error', 'Error Email or Password');
    }

    public function signpage(){
     $canocial ='https://ahitechno.com/sign_up_page';
     $homepage = HomePage::select('seo_title_signup','seo_des_signup')->first();
        $seo_data['description'] =$homepage->seo_des_signup;
          $seo_data['seo_title'] =$homepage->seo_title_signup;
     return view('front_website.page.signup',compact('canocial','seo_data'));

}


public function registerPost(Request $request)
{
    $user = new User();

    $user->fname = $request->fname;
    $user->lname = $request->lname;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    $user->save();

    return redirect('/login_page')->with('success', 'Register successfully');
}



public function quotation(){
     $canocial ='https://ahitechno.com/get-quotation';
     $homepage = HomePage::select('seo_title_quotation','seo_des_quotation')->first();
          $seo_data['description'] =$homepage->seo_des_quotation;
          $seo_data['seo_title'] =$homepage->seo_title_quotation;
   
     $mainServise = ItServices::get();
     $servise = ItSubServices::get();
     $phoneCode = Country::get();
     return view('front_website.page.quotation',compact('canocial','mainServise','servise','phoneCode','seo_data'));

}

public function quotationstore(Request $request)

{

    Validator::make($request->all(), [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'code' => 'required',
        'service' => 'required',
        'mainservice' => 'required',
        
        'description' => 'required'


    ])->validate();

    Kaushik::create([
        'fname' => $request->fname,
        'lname' =>  $request->lname,
        'email' =>  $request->email,
        'phone' =>  $request->phone,
        'code' =>  $request->code,
        'service' =>  $request->service,
        'mainservice' =>  $request->mainservice,
        'description' =>  $request->description,


    ]);

  



     return redirect()->route('quotation')->with('success', 'We have received your enquiry and will respond to you within 48 hours.');
 }



 public function analysis(Request $request)

 {
      // Validate the form data
      $request->validate([
          'username' => 'required',
          'website' => 'required',
          'email' => 'required',
          'message' => 'required',
        
         
          
      ]);
 
      $model = new Analysis([
          'username' => $request->input('username'),
          'website' => $request->input('website'),
          'email' => $request->input('email'),
          'message' => $request->input('message'),
          
          
      ]);
      $model->save();
      return redirect()->route('web-design')->with('success', 'We have received your enquiry and will respond to you within 48 hours.');
  }

    //  public function search(Request $request){

    //     $search= $request->search;

    //     $blogs = Blog::where(function($query) use ($search){

    //            $query->where('title','like',"%$search%");


    //     })
    //     ->get();

    //     return view('front_website.page.blogs',compact('blogs','search'));


         
    //  }





     public function itServies($slug=null){
        if($slug!=null){
            $projectCategory = ItServices::where('slug',$slug)->first();
            $projectList = ItSubServices::latest()->with('servicename')->where('it_services_id',$projectCategory->id)->get();
            $seo_data['description'] =$projectCategory->seo_description;
            $seo_data['keywords'] =$projectCategory->seo_keyword;
            $seo_data['seo_title'] =$projectCategory->seo_title;
            
        }else{
            $projectList = ItSubServices::latest()->with('servicename')->get();
            $homepage = HomePage::select('seo_title_services','seo_des_services','seo_key_services')->first();
            $seo_data['description'] =$homepage->seo_des_services;
            $seo_data['seo_title'] =$homepage->seo_title_services;
            $seo_data['keywords'] =$homepage->seo_key_services;
         }
         $projectCategory = ItServices::withcount('subservicename')->limit(1)->get();
         

        $allsurvies = ItServices::withcount('subservicename')->get();
        $itServiesBanner = ItServiceBanner::all();
        $allproject = Project::all();

        
         
       
        return view('front_website.page.itService',compact('projectList','projectCategory','allsurvies','itServiesBanner','allproject','seo_data'));
     }





     public function PrivacyPolicyArtifyme(){
        return view('front_website.page.Artifyme.privacyPolicy');
     }
     public function PrivacyPolicyAshu(){
        return view('front_website.page.Ashu.privacyPolicy');
     }
     public function PrivacyPolicyTithi(){
        return view('front_website.page.AnotherFolder.privacyPolicy');
     }


     public function cartcount(){
        $cartcount =  ItProductCart::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$cartcount]);

     }

 

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    public function profile($id){
        $profile =  User::find($id);
        return view('front_website.page.profile',compact('profile'));
    }

    public function updateprofile(Request $request,$id){
        $profile = User::find($id);
        $profile->fname = $request->input('fname');
        $profile->lname = $request->input('lname');
        $profile->email = $request->input('email');
        $profile->gender = $request->input('gender');
        $profile->phone = $request->input('phone');
       
    

        $profile->update();
  return redirect('/');

    }

    public function userOrder(){
        $addtocart = Order::all();
        $orderproduct = OrderUser::all();
        return view('front_website.page.userOrder',compact('addtocart','orderproduct'));
    }


    public function search(Request $request){

      
    
        $search = $request->search;
        
        $addtocart = OrderUser::where(function ($query) use ($search) {
    
            $query->where('title','like',"%$search%");
           
           
            
        })
        ->get();
    
        return view('front_website.page.userOrder',compact('addtocart','search'));
    }
    public function searchwishlist(Request $request){

      
    
        $search = $request->search;
        $addtocart = Wishlist::where(function ($query) use ($search) {
    
            $query->where('title','like',"%$search%");
           
            
        })
        ->get();
    
        return view('front_website.page.userWishlist',compact('addtocart','search'));
    }


    public function userWishlist()
    {
        $addtocart = Wishlist::all();
        return view ('front_website.page.userWishlist',compact('addtocart'));
    }


    public function itServiesmain(){
        $allitservices = ItServices::all();
        return view('front_website.page.itServiesmain',compact('allitservices'));
    }


    
  }



