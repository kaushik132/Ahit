@extends('front_website.layout.app')

@section('content')


    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Ahit Techno",
        "item": "http://ahitechno.com"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "Blogs",
        "item": "https://ahitechno.com/blogs"
      } ]
    }
    </script>

    <style type="text/css">
         .pagination {
            display: flex;
            padding-left: 0px;
            list-style: none;
            border-radius: 0.25rem;
            justify-content: center;
         }

    
         @media only screen and (max-width:767.99px){
          /* .pagin-width-vw{
            padding-left:20px;
            padding-right:20px;
            width:75%;
            margin:auto;
          } */

          .page-list-vw{
            overflow-x:scroll;
            width:100%;
            max-width:400px;
            /* padding-left:30px;
            padding-right:30px; */
            margin-left:30px;
            margin-right:30px;
          }
         }
    </style>

   <section class="page-title" style="background-image: url({{asset('public/front_website/images/bgimg.jpg')}});">

                <div id="stars"></div>

                <div id="stars2"></div>

                <div id="stars3"></div>

                <div class="auto-container">

                    <div class="inner-container clearfix">

                    <div class="title-box">
                <h1>Blogs</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="text-white">Blogs</li>
                </ul>
            </div>

                    </div>

                </div>

            </section>

            <section class="news-section-three alternate">

                <div class="pattern-layer-one" style="background-image: url({{asset('public/front_website/images/main-banner/cross-icon.png')}});"></div>

                <div class="pattern-layer-two" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon-5.png')}});"></div>

                <div class="pattern-layer-three" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon-6.png')}});"></div>

                <div class="pattern-layer-four" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon.png')}});"></div>

                <div class="pattern-layer-five" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon-1.png')}});"></div>

                <div class="pattern-layer-six" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon-2.png')}});"></div>

                <div class="pattern-layer-seven" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon-8.png')}});"></div>

                <div class="pattern-layer-eight" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon-7.png')}});"></div>

                <div class="pattern-layer-nine" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon-10.png')}});"></div>

                <div class="pattern-layer-ten" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon-9.png')}});"></div>

                <div class="pattern-layer-eleven" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon-3.png')}});"></div>

                <div class="pattern-layer-tweleve" style="background-image: url({{asset('public/front_website/images/main-banner/banner-icon-4.png')}});"></div>

                <div class="auto-container">

                  

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <div class="row">
                            @foreach($blogs as $key => $blog)
                        <div class="news-block style-three col-md-6"> 
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                         <a href="{{ route('blogdetails', ['id' => $blog->slug]) }}"> 
                                            <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->alt }}" height="100" width="200">
                                          </a>
                                       </figure>
                                    </div> 
                                    <div class="caption-box">

                                    <ul class="category">

                                        <li><a href="{{ route('blogs',$blog->blogCategory['slug']) }}">{{ $blog->blogCategory['name'] }}</a></li>
                                    
                                     </ul>

                                    <ul class="info"> 
                                        <li><i class="fas fa-calendar-alt"></i>{{ date('F d,Y',strtotime($blog->created_at)) }}</li>
                                    </ul>

                                    <h4><a href="{{ route('blogdetails', ['id' => $blog->slug]) }}">{!! Str::limit($blog->title, 25) !!}</a></h4>

                                    <a href="{{ route('blogdetails', ['id' => $blog->slug]) }}" class="theme-btn btn-style-one"><span class="txt">Read More</span></a>
                                </div>
                            </div>
                        </div>

                        @endforeach
                            </div>
                        </div>
      
                        <div class="col-md-4">

{{-- 
                        <div class="container" style="color: black;">
                            <label for="">Search</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Search Blog Title....">

                            <div id="product_list">

                            </div>
                        </div> --}}
                        
                          
<!--                        

                    <center>
                           <form action="search" method="GET">
                            
                       
                            <input type="text"  name="search"/>
                           
                               <button type="submit">Search</button>
                            </span>
                              
                         </form> 
                    </center> -->
                            <!-- <form action="{{url('search')}}" method="GET" class="">
                                <input type="search" class="form-control" name="search" placeholder="Search..." style="position:relative;"  value="{{  isset($search) ? $search : ''}}">
                              <i class="bi bi-search blg-srch-icn"></i>
                            </form> -->
                        

                        <div class="sidebar-widget categories">
                    <div class="sidebar-title mb-3"><h5 style="color:#007bff"><b>Categories</b></h5></div>
                    <ul class="cat-list">
                        @foreach($blogcategory as $cat_value)
                        <li>
                            <a href="{{ route('blogs',$cat_value->slug) }}"><i class="fas fa-angle-double-right"></i>{{$cat_value->name}}<span>{{$cat_value->blogs_count}}</span></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                        </div>

                       
                    </div>
                      
                </div>
             
                            
                                <div class="page-list-vw text-center">
                                   
                                    {{$blogs->links()}}
                        </div>



            </section>


            

@endsection

 