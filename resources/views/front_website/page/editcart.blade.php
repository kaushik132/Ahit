@extends('front_website.layout.app')

@section('content')


<style>
.add-to-cart-box{
    width:100%;
    max-width:600px;
    margin:auto;
    border:solid 1px rgb(55, 113, 167);
    padding:10px;
    border-radius:5px
}
.pro-cart-img{
    width:100%;
    max-width:100px;
    height:100px;
}
.cart_update, .btn-light{
    width:30px;
    text-align: center;
    border:solid 1px rgb(196, 196, 196);
    margin:0px;
    border-radius:5px
}
.cart-para-fnt{
    font-size:17px;
    font-weight: 600;
    letter-spacing: 0.75px
}
</style>
<div class="container">
<form action="{{ url('updatecart/'.$addtocart->id) }}" method="POST" id="updateCartForm">
    {{ csrf_field() }}
    @method('PUT')
    <div class="add-to-cart-box mt-5 mb-5">
        <div class="d-flex">
            <img src="{{ asset('public/front_website/images/services/17.png') }}" alt="image" class="img-fluid pro-cart-img">
            <div class="ms-2">
                <h6 class="addcart-Heading"><b>{{ $addtocart['category_name'] }}</b></h6>
                <h6 class="cart-para-fnt">{{ $addtocart['title'] }}</h6>
                <div class="d-flex mt-1">
                    <input type="hidden" class="bi bi-currency-rupee" name="amt" value="{{ $addtocart['fixprice']/2 * $addtocart['quantity'] }}" >
                  
                </div>
                <div class="d-flex">
                    <p class="mt-2"><b>Qty:</b></p>
                    <div class="qty-container ms-4 mt-2">
                        <button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
                        <input type="text" name="qty" value="{{ $addtocart['quantity'] }}" class="input-qty quantity cart_update" min="1"  />
                        <button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center"><button class="btn btn-primary mt-2" type="submit">Update Cart</button></div>
    </div>
</form>
</div>


@endsection
