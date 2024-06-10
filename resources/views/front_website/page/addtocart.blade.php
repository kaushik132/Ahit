@extends('front_website.layout.app')

@section('content')

<?php

$user_name = Auth::user()->id;

?>

@php
$totalAmount = 0;
$totalItem = 0;
$totalDescount = 0;



@endphp






<style>
  .add-to-cart-box {
    background: white;
    border: solid 1px #bebec2;
    border-radius: 3px;
    padding: 10px;
    /* box-shadow:2px 2px 3px 1px #ebecf0;  */
    display: flex;
    justify-content: space-between;
  }

  .addcart-Heading {
    font-size: 17px;
    font-weight: 600;
    color: black;
    width:200px;
  }

  .cart-para-fnt {
    font-size: 14px;
    font-weight: 500;
    color: #333;
  }

  .pro-cart-img {
    width: 100%;
    max-width: 120px;
    height: 120px;
  }

  .qty-container {
    display: flex;
    /* align-items: center;
  justify-content: center; */
    margin-top: 10px;
  }

  .qty-container .input-qty {
    text-align: center;
    padding: 3px 5px;
    border: 1px solid #d4d4d4;
    max-width: 50px;
    height: 30px;
  }

  .qty-container .qty-btn-minus,
  .qty-container .qty-btn-plus {
    border: 1px solid #d4d4d4;
    padding: 1px 10px;
    font-size: 10px;
    height: 30px;
    width: 30px;
    transition: 0.3s;
  }

  .qty-container .qty-btn-plus {
    margin-left: -1px;
  }

  .qty-container .qty-btn-minus {
    margin-right: -1px;
  }

  .add-cart-pricedtl {
    background: white;
    border: solid 1px #bebec2;
    border-radius: 3px;
    padding: 10px;
    /* box-shadow:2px 2px 3px 1px #ebecf0;  */
    position: sticky !important;
    top: 75px !important;

  }

  .plc-ordr-btnvw {
    background-color: #007BFF;
    padding-left: 25px;
    padding-right: 25px;
    padding-top: 5px;
    padding-bottom: 5px;
    color: white;
    width: 100%;
    margin-top: 25px;
    border-radius: 3px;
    border: solid 1px #007BFF;
  }

  .sel-number-box {
    font-size: 17px;
    font-weight: 600;
    border: solid 1px grey;
    border-radius: 50%;
    padding: 5px;
    width: 50px;
    height: 48px;
    text-align: center;
    cursor: pointer;
    margin-top: 13px;
    margin-left: 10px;
  }
  button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }
</style>


<div class="container">
  <div class="row mb-3">
    <div class="col-md-8 mt-4 mb-3">
      <div class="d-flex justify-content-between">



        <h6>Items Selected </h6>


        <h6>Clear all</h6>




      </div>
      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif





      <meta name="csrf-token" content="{{ csrf_token() }}">


      @foreach ($addtocart as $details)
      @if ($details->user_id == $user_name)
          
     
      <div class="add-to-cart-box mt-4">
        <div class="d-flex">
          <img src="{{asset('public/front_website/images/services/17.png')}}" alt="image" class="img-fluid pro-cart-img">
          <div class="ms-2">
            <h6 class=""><b>{{ $details['category_name'] }}</b></h6>
            <p class="addcart-Heading">{{ $details['title']}}</p>
            <div class="d-flex mt-1">
              <p class="text-dark"><b><i class="bi bi-currency-rupee"></i>{{ $details['fixprice'] /2 * $details['quantity'] }}</b> <span style="text-decoration:line-through;font-size:13.5px;font-weight:500;color:grey;"><i class="bi bi-currency-rupee"></i>{{ $details['fixprice'] * $details['quantity'] }}</span></p>
              <p class="text-primary ms-2">50% OFF</p>
            </div>
            <div class="d-flex">
              <p class="mt-2"><b>Qty:</b></p>

             
              <input type="text" value="{{ $details['quantity'] }}" style="width: 50px; text-align: center;" readonly class="mt-2">
              <a href="{{url('edit/'. $details->id)}}" class="mt-2"><i class="bi bi-pencil-square text-danger cart_remove" style="font-size:17px"></i></a>
              
            </div>
            <p class="" style="font-size:11px;font-weight:500;margin-top:5px"><i class="bi bi-arrow-return-left" style="font-size:15px"></i> <b>7 days</b> return available</p>
            <p class="" style="font-size:11px;font-weight:500;margin-top:-7px"><i class="bi bi-check-lg text-success" style="font-size:15px"></i>Delivery by <b>16 Mar 2024</b></p>
          </div>
        </div>
        <div>
        <a href="{{url('delete/'. $details->id)}}"><i class="bi bi-trash3-fill fs-4 text-primary cart_remove" style="cursor:pointer"></i></a>
        
       </div>
      </div>
      
          
     
          
      @endif

      @endforeach
      <!-- ---------------------------Modal------------------------------------- -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="exampleModalLabel">Select Quantity</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{-- <div class="" style="display:flex;flex-wrap:wrap">
                <div class="sel-number-box">
                  <p>1</p>
                </div>
                <div class="sel-number-box">
                  <p>2</p>
                </div>
                <div class="sel-number-box">
                  <p>3</p>
                </div>
                <div class="sel-number-box">
                  <p>4</p>
                </div>
                <div class="sel-number-box">
                  <p>5</p>
                </div>
                <div class="sel-number-box">
                  <p>6</p>
                </div>
                <div class="sel-number-box">
                  <p>7</p>
                </div>
                <div class="sel-number-box">
                  <p>8</p>
                </div>
                <div class="sel-number-box">
                  <p>9</p>
                </div>
                <div class="sel-number-box">
                  <p>10</p>
                </div>
              </div>

              <div><button class="px-5 py-1 w-100 mt-4 bg-info text-white shadow-sm">Done</button></div> --}}

              {{-- <form action="{{ url('updatecart/'.$addtocart->id) }}" method="POST" id="updateCartForm">
                {{ csrf_field() }}
                @method('PUT')
                <div class="add-to-cart-box mt-4">
                    <div class="d-flex">
                        <img src="{{ asset('public/front_website/images/services/17.png') }}" alt="image" class="img-fluid pro-cart-img">
                        <div class="ms-2">
                            <h6 class="addcart-Heading"><b>{{ $addtocart['category_name'] }}</b></h6>
                            <p class="cart-para-fnt">{{ $addtocart['title'] }}</p>
                            <div class="d-flex mt-1">
                                <input type="hidden" class="bi bi-currency-rupee" name="amt" value="{{ $addtocart['fixprice']/2 * $addtocart['quantity'] }}" >
                              
                            </div>
                            <div class="d-flex">
                                <p class="mt-2"><b>Qty:</b></p>
                                <div class="qty-container ms-2">
                                    <button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
                                    <input type="text" name="qty" value="{{ $addtocart['quantity'] }}" class="input-qty quantity cart_update" min="1"  />
                                    <button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Cart</button>
                        </div>
            
                
                    </div>
                </div>
            </form> --}}
            </div>

          </div>
        </div>
      </div>

     








      @foreach($addtocart as $item)
      @if ($item->user_id == $user_name)
          
      
      @php
      $totalAmount += $item['fixprice'] * $item['quantity'];
      $totalItem += $item['no'];

      $totalDescount += $item['fixprice'] / 2 * $item['quantity'];
      @endphp
      @endif
      @endforeach


    </div>

    @if ( $totalItem != 0)
    <div class="col-md-4 mt-4">
      <div class="add-cart-pricedtl">
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
        <a href="{{route('buy-now')}}">
          <div><button class="plc-ordr-btnvw">Buy Now</button></div>
        </a>
      </div>


    </div>

    @endif

  </div>
 
</div>



@endsection