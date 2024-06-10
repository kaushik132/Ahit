@extends('front_website.layout.app')

@section('content')

<!-- <div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h6 class="sign-heading mt-5">Sign-up and apply
                in less than 2 minutes</h6>
                
        </div> -->
        <style>
    .get-mob-vw{
        padding:40px;
    }
    @media only screen and (max-width:767.99px){
        .get-mob-vw{
        padding:5px;
    } 
    }
    </style>

<div class="get-mob-vw"style="background-image: url({{asset('public/front_website/images/background/11.png')}});">
        <div class="bg-white box-bg mt-4 mb-5">
        <div class="col-md-12">

            @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
                {{-- <div class="d-flex flex-bg">
                    <img src="{{url('front_website/imagess/google.png')}}" alt="Google" class="img-fluid google-icon">
                   <p class="ms-2 sign-text">Sign up with Google</p>
                </div> --}}
                {{-- <div class="d-flex flex-bg mt-2">
                    <img src="{{url('front_website/imagess/facebook.png')}}" alt="facebook" class="img-fluid google-icon">
                   <p class="ms-2 sign-text">Sign up with Facebook</p>
                </div> --}}
                {{-- <div class=""><h6 class="hr-lines mt-4">Or</h6></div> --}}

                <form action="{{ route('login') }}" method="POST" class="mt-4">
                    @csrf
                    <label for="email" class="form-label label-heading">Email</label>
                    <input type="email" name="email" class="form-control form-holder" id="email" placeholder="jhon@example.com">
                    <label for="password" class="form-label mt-3 label-heading">Password</label>
                    <input type="password" name="password" class="form-control form-holder" id="password" placeholder="Must be atleast 8 characters">
                    <!-- <div class="row">
                    <div class="col-md-6">
                        <label for="fname" class="form-label mt-3 label-heading">First Name</label>
                    <input type="text" class="form-control form-holder" id="fname" placeholder="Jhon">
                    </div>
                    <div class="col-md-6">
                        <label for="lname" class="form-label mt-3 label-heading">Last Name</label>
                    <input type="text" class="form-control form-holder" id="lname" placeholder="Doe">
                    </div>
                </div> -->

                <!-- <div><a href="{{route('forgetPassword')}}">Forget Password</a></div> -->
                <p class="term-text mt-3 text-muted">By signing up, you agree to our <span class="text-primary"><a href="{{route('terms')}}">Terms and Conditions</a></span>.</p>
                <button class="sign-button w-100 px-5 py-2 mt-2">Log In<i class="bi bi-arrow-right"></i></button>
                <p class="text-center mt-4 text-muted">Sign up first?<span class="text-primary"><a href="{{route('signpage')}}"> Sign Up</a></span></p>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
