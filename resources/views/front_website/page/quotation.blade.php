@extends('front_website.layout.app') 

@section('content')

<style>
    .get-mob-vw {
        padding: 40px;
    }

    @media only screen and (max-width:767.99px) {
        .get-mob-vw {
            padding: 5px;
        }
    }
</style>
<div class="get-mob-vw" style="background-image: url({{asset('public/front_website/images/background/15.png')}});">
    <div class="bg-white box-bg">
        <div class="col-md-12">

            <div class="text-center">
                <h5><b>Get Quotation</b></h5>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{route('quotationstore')}}" class="mt-4">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="fname" class="form-label mt-3 label-heading">First Name</label>
                        <input type="text" name="fname" class="form-control form-holder" id="fname" placeholder="First Name" oninput="this.value = this.value.replace(/[^A-Za-z+.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                    <div class="col-md-6">
                        <label for="lname" class="form-label mt-3 label-heading">Last Name</label>
                        <input type="text" name="lname" class="form-control form-holder" id="lname" placeholder="Last Name" oninput="this.value = this.value.replace(/[^A-Za-z+.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
              <div class="col-md-6">
                <label for="email" class="form-label label-heading mt-3">Email</label>
                <input type="email" name="email" class="form-control form-holder" id="email" placeholder="user@example.com">
              </div>
            
                    <div class="col-md-6">
                        <label for="phone" class="form-label label-heading mt-2">Phone</label>
                        <div class="d-flex">
                        <!-- <div class="input-group mb-3"> -->
                            <select class="form-control form-holder" name="code" id="code" style="width:100%;max-width:55px">
                                <option value="India">+91</option>
                                @foreach($phoneCode as $phoneCode)
                                <option value="{{$phoneCode->nicename}}">+{{$phoneCode->phonecode}}</option>
                                @endforeach

                            </select>
                            <input type="text" name="phone" min="1" class="form-control form-holder ms-2" id="phone" placeholder="Enter your number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9+.]/g, '').replace(/(\..*?)\..*/g, '$1');">

                        <!-- </div> -->
                        </div>
                    </div>


                 

                    <div class="col-md-6">
                        <label for="mainservice" class="form-label label-heading mt-3">Main Service</label>
                        <select class="form-control form-holder" name="mainservice" id="mainservice">
                            @foreach($mainServise as $mainServise)
                            <option value="{{$mainServise->name}}">{{$mainServise->name}}</option>
                            @endforeach
                        </select>
                        
                        
                    </div>
                    <div class="col-md-6">
                        <label for="service" class="form-label label-heading mt-3">Sub Service</label>
                        <select class="form-control form-holder" name="service" id="service">
                            @foreach($servise as $servise)
                            <option value="{{$servise->title}}">{{$servise->title}}</option>
                            @endforeach
                        </select>


                    </div>
                    <!-- <div class="col-md-6">
                        <label for="duration" class="form-label label-heading mt-3">Start Duration</label>
                        <input type="date" name="duration" min="1" class="form-control form-holder" id="duration" placeholder="1">
                    </div> -->
<!-- 
                    <div class="col-md-6">
                        <label for="endduration" class="form-label label-heading mt-3">End Duration</label>
                        <input type="date" name="endduration" min="1" class="form-control form-holder" id="endduration" placeholder="1">
                    </div> -->
                
                    <div class="col-md-12">
                <label for="description" class="form-label label-heading mt-3">Description</label>
                <textarea name="description" id="description" cols="10" rows="4" placeholder="Description" class="form-control form-holder"></textarea>
              </div>
                <!-- <label for="" class="form-label label-heading mt-3">Upload your hand written notes</label>
                <input type="file" class="form-control form-holder" id=""> -->
                <button class="sign-button w-100 px-5 py-2 mt-3">Submit <i class="bi bi-arrow-right"></i></button>
              </div>
            </form>
        </div>
    </div>
</div>

@endsection