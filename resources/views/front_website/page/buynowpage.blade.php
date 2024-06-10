@extends('front_website.layout.app')

@section('content')

<?php

$user_name = Auth::user()->id;

?>


@php
$totalAmount = 0;
$totalDescount = 0;
$totalItem =0;

$totalPrice= 0;
$totalProduct= 0;

@endphp




<style>
.buy-now-boxvw{

}
    </style>





<!-- <style>
    .get-mob-vw{
        padding:40px;
    }
    @media only screen and (max-width:767.99px){
        .get-mob-vw{
        padding:5px;
    } 
    }
    </style>

<div class="get-mob-vw"style="background-image: url({{asset('public/front_website/images/background/11.png')}});background-size:cover">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h6 class="sign-heading mt-5 del-address-bg">Delivery Address</h6>
                
        </div>

        <div class="bg-white box-bg mt-4">
        <div class="col-md-12">
                <form class="mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="fname" class="form-label mt-3 label-heading">Full Name</label>
                        <input type="text" class="form-control form-holder" id="fname" placeholder="Jhon">
                        </div>
                        <div class="col-md-6">
                            <label for="phonenumber" class="form-label mt-3 label-heading">Mobile Number</label>
                        <input type="tel" class="form-control form-holder" id="phonenumber" placeholder="10-digit mobile number">
                        </div>
                        <div class="col-md-6">
                            <label for="pincode" class="form-label mt-3 label-heading">Pincode</label>
                        <input type="tel" class="form-control form-holder" id="pincode" placeholder="Pincode">
                        </div>
                        <div class="col-md-6">
                            <label for="locality" class="form-label mt-3 label-heading">Locality</label>
                        <input type="text" class="form-control form-holder" id="locality" placeholder="Locality">
                        </div>
                    </div>

                    <label for="email" class="form-label label-heading mt-3">Email</label>
                    <input type="email" class="form-control form-holder" id="email" placeholder="jhon@example.com">
                    <label for="address" class="form-label mt-3 label-heading">Address (Address and Street)</label>
                    <textarea  class="form-control form-holder" id="address"  rows="4">
                       
                        </textarea>
                    <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label mt-3 label-heading">City/District/Town</label>
                    <select class="form-select form-holder">
                        <option value="1">Jaipur</option>
                        <option value="2">Ajmer</option>
                        <option value="3">Delhi</option>
                        <option value="4">Kota</option>
                        <option value="5">Mumbai</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label mt-3 label-heading">Select State</label>
                        <select class="form-select form-holder">
                            <option value="1">Rajasthan</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                    </div>

                    <div class="col-md-6">
                        <label for="landmark" class="form-label mt-3 label-heading">Landmark (Optional)</label>
                    <input type="text" class="form-control form-holder" id="landmark" placeholder="Landmark">
                    </div>

                    <div class="col-md-6">
                        <label for="altnumber" class="form-label mt-3 label-heading">Alternate Phone (Optional)</label>
                    <input type="text" class="form-control form-holder" id="altnumber" placeholder="Alternate Phone Number">
                    </div>
                </div>
                <p class="term-text mt-3 text-muted">By signing up, you agree to our <span class="text-primary">Terms and Conditions</span>.</p>
                <button class="sign-button w-100 px-5 py-2 mt-2">Save and Deliver Here</button>
               
                </form>
            </div>
        </div>
    </div>
</div>
</div> -->


<style>
    .input-box-bdr{
        border:solid 1px grey;
        margin-top:13px;
        border-radius:7px;
        font-size:14px;
        font-weight:500;
        padding:8px;
        width:100%;
        /* color:grey; */
    }
    .input-box-bdr:focus{
        box-shadow:none !important;
        border:solid 1px #007BFF;
    }
    .add-cart-pricedtl{
  background:white;
  border:solid 1px #bebec2;
  border-radius:3px;
      padding:10px;
       /* box-shadow:2px 2px 3px 1px #ebecf0;  */
       /* position:sticky !important;
       top:75px !important; */
     
}

.plc-ordr-btnvw{
  background-color:#007BFF;
  padding-left:25px;
  padding-right:25px;
  padding-top:5px;
  padding-bottom:5px;
  color:white;
  width:100%;
  margin-top:25px;
  border-radius:3px;
  border:solid 1px #007BFF;
}
@media only screen and (max-width:767.99px){
    .main-bxshw-first{
    flex-direction:column-reverse;
}
}
    </style>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

<div class="container mb-4">
    <div class="row main-bxshw-first">
        <div class="col-md-8 mt-3">
         <!-- <p class="text-end">Have an account? <span class="text-primary">Log In</span></p> -->

         <h5 class="mb-2"><b>Shipping address</b></h5>
         <form action="{{ route('payment/process') }}" method="post">
          @csrf
            <div class="row">
                <div class="col-md-6">
                <input type="text" name="fname" value="{{old('fname')}}"  placeholder="First Name" oninput="this.value = this.value.replace(/[^A-Za-z+.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="input-box-bdr form-control">
                <span class="text-danger">
                  @error('fname')
                    {{$message}}
                  @enderror 

                </span>
                </div>
                <div class="col-md-6">
                <input type="text" name="lname" value="{{old('lname')}}" placeholder="Last Name" oninput="this.value = this.value.replace(/[^A-Za-z+.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="input-box-bdr form-control">
                <span class="text-danger">
                  @error('lname')
                    {{$message}}
                  @enderror 

                </span>
                </div>
                <div class="col-md-12">
                <input type="email" name="email" value="{{old('email')}}" placeholder="Email address" class="input-box-bdr form-control">
                <span class="text-danger">
                  @error('email')
                    {{$message}}
                  @enderror 

                </span>
               </div>
               <div class="col-md-12">
                <input type="text" name="address" value="{{old('address')}}" placeholder="Address" class="input-box-bdr form-control">
                <span class="text-danger">
                  @error('address')
                    {{$message}}
                  @enderror 

                </span>
               </div>
               <div class="col-md-12">
                <input type="text" name="apartment"  value="{{old('apartment')}}" placeholder="Apartment, suite, etc. (optional)" class="input-box-bdr form-control">
                <span class="text-danger">
                  @error('apartment')
                    {{$message}}
                  @enderror 

                </span>
                </div>
                <div class="col-md-12">
                <select name="country" id="country-dd" class="input-box-bdr form-control">
                  <option value="">Select Country</option>
                  @foreach($counteries as $data)
                      <option value="{{$data->id}}">{{$data->name}}</option>
                  @endforeach
                   
                </select>
      
                <span class="text-danger">
                  @error('country')
                    {{$message}}
                  @enderror 

                </span>
               </div>
              
                <div class="col-md-4">
                <select name="states" id="state-dd"  class="input-box-bdr form-control">
                
                 
                </select>
                <span class="text-danger">
                  @error('states')
                    {{$message}}
                  @enderror 

                </span>
                </div>

                <div class="col-md-4">
                  <select name="city" id="city-dd" class="input-box-bdr form-control">
                  
                  </select>
                  <span class="text-danger">
                    @error('city')
                      {{$message}}
                    @enderror 
  
                  </span>
                  </div>

                <div class="col-md-4">
                <input type="text" name="pincode" value="{{old('pincode')}}" placeholder="Pin Code" maxlength="6" oninput="this.value = this.value.replace(/[^0-9+.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="input-box-bdr form-control">
                <span class="text-danger">
                  @error('pincode')
                    {{$message}}
                  @enderror 

                </span>
                </div>
                <div class="col-md-12">
                <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9+.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="input-box-bdr form-control">
                <span class="text-danger">
                  @error('phone')
                    {{$message}}
                  @enderror 

                </span>
              </div>

              @foreach($addtocart as $lo)
              @if ($lo->user_id == $user_name)
                  
              
              @php
             
          
              $totalPrice += $lo['fixprice'] / 2 * $lo['quantity'];
              $totalProduct += $lo['quantity'];
              @endphp
              @endif
          @endforeach
              <div class="col-md-12 mt-3">
                <input type="hidden" name="amount" value="{{$totalPrice}}">
                <input type="hidden" name="products" value="{{$totalProduct}}">
             
              </div>
            </div>
            
            <div><button class="plc-ordr-btnvw w-100 mt-3">Place Order</button></div>
          </form>

          {{-- <h5 class="mb-2 mt-3"><b>Payment options</b></h5>

          <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
       Pay with UPI ID
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div>
            <form action="">
                <div class="">
                    <input type="text" placeholder="Enter your UPI ID" class="input-box-bdr form-control">
                    <button class="text-white bg-primary border-0 rounded shadow-sm px-5 py-1 mt-3 w-100">Submit</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
      Pay with scanner
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="text-center">
            <img src="/public/front_website/images/fakeQR.png" alt="qr code" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
      Enter your Card Details
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <form action="">
        <div class="row">
            <div class="col-md-6 mt-2">
                <label for="">Card Number</label>
            <input type="number" placeholder="Card Number" class="input-box-bdr form-control" style="margin-top:0px">
            </div>
            <div class="col-md-6 mt-2">
            <label for="">Card Holder's Name</label>
            <input type="text" placeholder="Card Holder's Name" class="input-box-bdr form-control" style="margin-top:0px">
            </div>
            <div class="col-md-6 mt-2">
            <label for="">Expiry date</label>
            <input type="date" class="input-box-bdr form-control" style="margin-top:0px">
            </div>
            <div class="col-md-6 mt-2">
            <label for="">CVC</label>
            <input type="text" placeholder="CVC" class="input-box-bdr form-control" style="margin-top:0px">
            </div>
            <div class="col-md-12 mt-3">
               <button class="text-white bg-primary px-5 py-2 border-0 rounded w-100 shadow-sm">Submit</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div> --}}

        </div>

        <div class="col-md-4 mt-3">
       
          @foreach ($addtocart as $details)
          @if ($details->user_id == $user_name)
              
          
          <div class="d-flex justify-content-between mt-3">
             <div>
                <img src="/public/front_website/images/gallery/1.jpg" alt="product" class="img-fluid" style="width:100%;max-width:100px;height:70px">
             </div>
             <p>{{ $details['title'] }}</p>
             <p><i class="bi bi-currency-rupee"></i>{{ $details['fixprice'] * $details['quantity']}}</p>
          </div>
          @endif
          @endforeach
        

          @foreach($addtocart as $item)
          @if ($item->user_id == $user_name)
              
        
          @php
          $totalAmount += $item['fixprice'] * $item['quantity'];
          $totalItem   += $item['no'];
      
          $totalDescount += $item['fixprice'] / 2 * $item['quantity'];
          @endphp
            @endif
      @endforeach

          <div class="add-cart-pricedtl mt-4">
              <p class="cart-para-fnt">Price details({{$totalItem}} Items)</p>
              <div class="d-flex justify-content-between">
                <p style="font-size:13.5px;font-weight:500;">Total MRP</p>
                  <p style="font-size:13.5px;font-weight:500;"><i class="bi bi-currency-rupee"></i> {{ $totalAmount }}</p>
              </div>

              <div class="d-flex justify-content-between">
                <p style="font-size:13.5px;font-weight:500;">Discount on MRP</p>
                  <p style="font-size:13.5px;font-weight:500;"><i class="bi bi-currency-rupee"></i>{{ $totalDescount}}</p>
              </div>

              <div class="d-flex justify-content-between">
                <p style="font-size:13.5px;font-weight:500;">Shipping Fee</p>
                  <p class="text-primary" style="font-size:13.5px;font-weight:500;">Free</p>
              </div>
                 <hr>
              <div class="d-flex justify-content-between">
                <p style="font-size:15px;font-weight:700;">Total Amount</p>
                  <p style="font-size:15px;font-weight:700;"><i class="bi bi-currency-rupee"></i>{{ $totalAmount - $totalDescount }}</p>
              </div>
            
         </div>
        
       </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
  $('#country-dd').change(function(event) {
      var idCountry = this.value;
      $('#state-dd').html('');

      $.ajax({
      url: "/api/fetch-state",
      type: 'POST',
      dataType: 'json',
      data: {country_id: idCountry,_token:"{{ csrf_token() }}"},
      success:function(response){
          $('#state-dd').html('<option value="">Select State</option>');
          $.each(response.states,function(index, val){
          $('#state-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
          });
          $('#city-dd').html('<option value="">Select City</option>');
      }
      })
  });
  $('#state-dd').change(function(event) {
      var idState = this.value;
      $('#city-dd').html('');
      $.ajax({
      url: "/api/fetch-cities",
      type: 'POST',
      dataType: 'json',
      data: {state_id: idState,_token:"{{ csrf_token() }}"},
      success:function(response){
          $('#city-dd').html('<option value="">Select State</option>');
          $.each(response.cities,function(index, val){
          $('#city-dd').append('<option value="'+val.name+'"> '+val.name+' </option>')
          });
      }
      })
  });
  });
</script>










@endsection