<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
<link rel="stylesheet" href="{{url('front_website/css/profile.css')}}">
    <title>Order list page</title>
    <link rel="icon" type="image/x-icon" href="https://ahitechno.com/public/front_website/images/ahitnewfabicon.png">

    <style>
      .user-main-prdct-sclr{
        height:400px
      }
      .user-main-prdct-sclr:hover{
        overflow-y: scroll;
      }

      .user-scrl-titlevw{
        font-size:15px;
        font-weight: 500;
      }
      .user-scrl-paravw{
        font-size:13px;
        font-weight: 500;
      }
      .user-scrl-mainimg{
        width:80px
      }
      </style>
  </head>
  <body>
    <?php

$user_name = Auth::user()->id;

?>
    
<div class="container">
  <p class="page-linktabsvws">Home / <a href="{{url('profile/'.Auth::user()->id ?? '' )}}" style="text-decoration: none">My Account</a> / My Orders</p>
  <div class="row">
    <div class="col-md-3 mt-2">
      <div class="dstop-profile-vws">

        <div class="order-list-fltrsshow">
            <div class="d-flex">
               <div><img src="{{url('front_website/images/profile.png')}}" alt="user-icon" class="img-fluid"></div>
               <div class="profile-icons-box">
                   <p>Hello,</p>
                   <h6>{{ Auth::user()->fname ?? ''}} {{ Auth::user()->lname ?? ''}}</h6>
               </div>
            </div>
         </div>


        <div class="order-list-fltrsshow mt-3">
            <a href="{{route('userOrder')}}" class="text-decoration-none"><div class="d-flex justify-content-between">
                <h6 class="account-stgs-fntsz"><i class="bi bi-box-fill text-primary fs-5"></i> ORDERS</h6>
                <i class="bi bi-chevron-right fs-5 text-dark"></i>
             </div></a> <br>

            <a href="{{route('userWishlist')}}" class="text-decoration-none"><div class="d-flex justify-content-between">
                <h6 class="account-stgs-fntsz"><i class="bi bi-box-fill text-primary fs-5"></i> WISHLIST</h6>
                <i class="bi bi-chevron-right fs-5 text-dark"></i>
             </div></a> 
             <hr class="mt-4">
             <div style="cursor: pointer;">
                 <h6 class="account-stgs-fntsz"><i class="bi bi-person-circle text-primary fs-5"></i> ACCOUNT SETTINGS</h6>
                 
                 <div class="profile-acnt-infos tab">
                     <a href="{{url('profile/'.Auth::user()->id ?? '' )}}" style="text-decoration: none"><h6 class="tablinks" onclick="openProfile(event, 'profile')" id="defaultOpen">Profile Information</h6></a>
                     <!-- <h6 class="tablinks" onclick="openProfile(event, 'address')">Manage Addresses</h6>
                     <h6 class="tablinks" onclick="openProfile(event, 'pancard')">PAN Card Information</h6> -->
                 </div>
              </div>
              <!-- <hr class="mt-4">
              <div style="cursor: pointer;">
                 <h6 class="account-stgs-fntsz"><i class="bi bi-wallet-fill text-primary fs-5"></i> PAYMENTS</h6>
                 
                 <div class="profile-acnt-infos">
                     <h6>Gift Cards</h6>
                     <h6>Saved UPI</h6>
                     <h6>Saved Cards</h6>
                 </div>
              </div> -->

              <!-- <hr class="mt-4">
              <div style="cursor: pointer;">
                 <h6 class="account-stgs-fntsz"><i class="bi bi-bag-fill text-primary fs-5"></i> MY STUFF</h6>
                 
                 <div class="profile-acnt-infos">
                     <h6>Coupons</h6>
                     <h6>Reviews & Ratings</h6>
                     <h6>Notifications</h6>
                     <h6>Wishlist</h6>
                 </div>
              </div> -->
              <hr class="mt-4">

              <div style="cursor: pointer;">
               <form action="{{route('logout')}}" method="POST">
                 @csrf
                <button style="border: none; background: white" type="submit"><h6 class="account-stgs-fntsz"><i class="bi bi-box-arrow-left text-primary fs-5"></i> LOG OUT</h6></button>
               </form>
              </div>

          </div>
      {{-- <div class="order-list-fltrsshow">
          <h4 class="list-fltsshow-title">Filters</h4>
          <h6 class="order-list-fntsz mb-3">ORDER STATUS</h6>
          <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label order-dtls-list-vw" for="">On the way</label>
          </div>

          <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label order-dtls-list-vw" for="">Delivered</label>
          </div>

          <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label order-dtls-list-vw" for="">Cancelled</label>
          </div>
          <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label order-dtls-list-vw" for="">Returned</label>
          </div>

          <h6 class="order-list-fntsz mb-3">ORDER TIME</h6>
          <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label order-dtls-list-vw" for="">Last 30 days</label>
          </div>

          <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label order-dtls-list-vw" for="">2023</label>
          </div>

          <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label order-dtls-list-vw" for="">2022</label>
          </div>
          <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label order-dtls-list-vw" for="">2021</label>
          </div>

          <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label order-dtls-list-vw" for="">2020</label>
          </div>

          <div class="mb-2 form-check">
            <input type="checkbox" class="form-check-input" id="">
            <label class="form-check-label order-dtls-list-vw" for="">Older</label>
          </div>

      </div> --}}




      
       </div>

       {{-- <div class="moble-view-profile">
       <h5 class="static-fltr-box" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="bi bi-funnel-fill"></i> Filter</h5>
       </div> --}}
    </div>
    
    <div class="col-md-9 mt-2">
      <div class="order-searchboxves">
          <form method="get" action="/search" class="d-flex">
            <input type="search" name="search" placeholder="Search your order here" value="{{isset($search) ? $search : ''}}" class="order-list-searchbx">
            <div><button type="submit" class="order-srchbtns-vw">Search</button></div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-8">
          @foreach ($addtocart as $details)
        @if ($details->user_id == $user_name)
      <div class="order-searchboxves mt-3">
        <div class="orders-listshow">
           <div class="d-flex">
            <div><img src="https://ahitechno.com/public/front_website/images/orderpicture.png" alt="order-image" class="img-fluid order-image-img"></div>
            <div class="ms-3 order-delvry-dtlssz">
              <h6 class="text-dark">Product quantity : {{ $details['products']}}</h6>
              {{-- <p><b>Color : {{ $details['amount'] }}</b></p> --}}
            </div>
          </div>
@php

    $productid = $details->user_id;
    $productorderdate = $details->created_at;
    
@endphp

          

          <h5 class="mt-3"><i class="bi bi-currency-rupee"></i>{{ $details['amount']}}</h5>

          <div class="order-delvry-dtlssz">
            <h6 style="color:rgb(51, 151, 84);">Select on {{ date('M j', strtotime($details['created_at'])) }}</h6>

            <p></p>
          </div>
        </div>
        
      </div>

      @endif

      @endforeach
          </div>

          <div class="col-md-4">
           
          <div class="order-searchboxves mt-3 user-main-prdct-sclr">
         
            @foreach ($orderproduct as $item)
          
                
                @if ($item->user_id == $productid)
         @if ($item->status  == 1)
             
         
           
            <div class="d-flex">
              <div><img src="https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?cs=srgb&dl=pexels-madebymath-90946.jpg&fm=jpg" alt="product" class="img-fluid user-scrl-mainimg"></div>

              <div class="ms-2">
                 <h6 class="user-scrl-titlevw">{{$item['title']}}</h6>
                 <p class="user-scrl-paravw"><i class="bi bi-currency-rupee"></i>{{($item['fixprice'] * $item['quantity']) /2 }}</p>
                 <p class="user-scrl-paravw" style="margin-top:-10px">Date : {{ $productorderdate->format('d M, Y') }}</p>
              </div>
            </div>
           

            <hr>
            @endif
            @endif
            @endforeach
       </div>
            </div>
        </div>


      
      {{-- <div class="order-searchboxves mt-3">
        <div class="orders-listshow">
           <div class="d-flex">
            <div><img src="https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?cs=srgb&dl=pexels-madebymath-90946.jpg&fm=jpg" alt="order-image" class="img-fluid order-image-img"></div>
            <div class="ms-3 order-delvry-dtlssz">
              <h6 class="text-dark">Lorem, ipsum dolor.</h6>
              <p><b>Color : Black</b></p>
            </div>
          </div>

          <h5 class="mt-3"><i class="bi bi-currency-rupee"></i>5,034</h5>

          <div class="order-delvry-dtlssz">
            <h6 style="color:rgb(173, 1, 1);margin-top:20px">Cancelled on March 3</h6>
          </div>
        </div>
        
      </div> --}}


    </div>

  </div>
</div>


<!-- -----------------Offcanvas------------------------ -->
{{-- <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filters</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <h6 class="order-list-fntsz mb-3">ORDER STATUS</h6>
    <div class="mb-2 form-check">
      <input type="checkbox" class="form-check-input" id="">
      <label class="form-check-label order-dtls-list-vw" for="">On the way</label>
    </div>

    <div class="mb-2 form-check">
      <input type="checkbox" class="form-check-input" id="">
      <label class="form-check-label order-dtls-list-vw" for="">Delivered</label>
    </div>

    <div class="mb-2 form-check">
      <input type="checkbox" class="form-check-input" id="">
      <label class="form-check-label order-dtls-list-vw" for="">Cancelled</label>
    </div>
    <div class="mb-2 form-check">
      <input type="checkbox" class="form-check-input" id="">
      <label class="form-check-label order-dtls-list-vw" for="">Returned</label>
    </div>

    <h6 class="order-list-fntsz mb-3">ORDER TIME</h6>
    <div class="mb-2 form-check">
      <input type="checkbox" class="form-check-input" id="">
      <label class="form-check-label order-dtls-list-vw" for="">Last 30 days</label>
    </div>

    <div class="mb-2 form-check">
      <input type="checkbox" class="form-check-input" id="">
      <label class="form-check-label order-dtls-list-vw" for="">2023</label>
    </div>

    <div class="mb-2 form-check">
      <input type="checkbox" class="form-check-input" id="">
      <label class="form-check-label order-dtls-list-vw" for="">2022</label>
    </div>
    <div class="mb-2 form-check">
      <input type="checkbox" class="form-check-input" id="">
      <label class="form-check-label order-dtls-list-vw" for="">2021</label>
    </div>

    <div class="mb-2 form-check">
      <input type="checkbox" class="form-check-input" id="">
      <label class="form-check-label order-dtls-list-vw" for="">2020</label>
    </div>

    <div class="mb-2 form-check">
      <input type="checkbox" class="form-check-input" id="">
      <label class="form-check-label order-dtls-list-vw" for="">Older</label>
    </div>

  </div>
</div> --}}

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>


  </body>
</html>
