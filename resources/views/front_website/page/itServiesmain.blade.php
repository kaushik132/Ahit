@extends('front_website.layout.app')

@section('content')
<style>
        .served-content-boxvws{
            cursor:pointer;
            /* background-color:#fff;
          box-shadow:2px 2px 10px 2px #dbd9d9;
          border-radius:1px 35px 1px 1px; */
           
        }
        .served-content-boxvws img{
            border-radius:0px 45px 1px 0px; 
            width:100%;
            height:210px;
        }
        .served-content-dtlsvw{
            padding:13px;
        }
    .served-content-dtlsvw h5{
       font-size:22px;
       font-weight:700;
       margin-top:23px;
    }

    .served-content-dtlsvw p{
       font-size:16.5px;
       font-weight:500;
       margin-top:8px;
       text-align:justify;
       color:#595858;
    }

    .served-content-dtlsvw a h6{
       font-size:16.5px;
       font-weight:500;
       margin-top:15px;
    }

    @media only screen and (max-width:767.99px){
        .served-content-boxvws img{
            height:auto;
        }
        .page-title {
            margin-bottom:0px !important;
        }
    }
    </style>
<section class="page-title" style="background-image: url({{asset('public/front_website/images/background/about-us-banner.jpg')}});">
    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1 class="padding-top:-20px">Services</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="text-white">All Services</li>
                </ul>
            </div>
        </div>
    </div>
</section>


    <div class="container mt-3 mb-5">
        <div class="row">

        @foreach($allitservices as $allServices)
            <div class="col-md-4 mt-3">
                <div class="served-content-boxvws">
                <div><img src="{{url('storage/'. $allServices->page_image)}}" alt="Service Image" class="img-fluid"></div>
              <div class="served-content-dtlsvw">
                <h5>{{$allServices->name}}</h5>
                <p>{!! Str::limit($allServices->short_description, 250) !!}</p>
               

                <!-- <p>{!!$allServices->short_description!!}</p> -->
                <a href="{{url('it-services/'. $allServices->slug)}}" class="text-decoration-none"><h6>Read More <i class="bi bi-arrow-right"></i></h6></a>
              </div>
                </div>

            </div>
            @endforeach



        </div>
    </div>


@endsection