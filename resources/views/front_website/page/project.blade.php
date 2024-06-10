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
        "name": "Projects",
        "item": "https://ahitechno.com/project_details"
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

.form-main-select{
    width:100%;
    max-width:300px;
    border:solid 1px grey;
    padding:10px;
    border-radius:6px;
}

    </style>

   <section class="page-title" style="background-image: url({{asset('public/front_website/images/bgimg.jpg')}});">

                <div id="stars"></div>

                <div id="stars2"></div>

                <div id="stars3"></div>

                <div class="auto-container">

                    <div class="inner-container clearfix">

                    <div class="title-box">
                <h1>Projects</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="text-white">Projects</li>
                </ul>
            </div>

                    </div>

                </div>

            </section>

            <!-- ------------------Filter Start--------------------------- -->
            <div class="container mt-4">
    <form action="" class="text-end">
        <select name="filter" id="filter" class="form-main-select">
            <option value="" style="margin-top:15px !important">Filter</option>
            @foreach($projectfullter as $hello)
            <option value="{{ route('projects',$hello->slug) }}" style="margin-top:15px !important">{{ $hello->name }}</option>
            @endforeach
        </select>
    </form>
</div>

            <!-- ------------------Filter End--------------------------- -->

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
                        @foreach($projects as $key => $project)
                        <div class="news-block style-three col-lg-4 col-md-6 col-sm-12"> 
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                         <a href="{{ route('projectdetails', ['id' => $project->slug]) }}"> 
                                            <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->alt }}" height="100" width="200">
                                          </a>
                                       </figure>
                                    </div> 
                                    <div class="caption-box">

                                    <ul class="category">

                                        <li><a href="{{ route('projects',$project->projectCategory['slug']) }}">{{ $project->projectCategory['name'] }}</a></li>
                                    
                                     </ul>

                                    <ul class="info"> 
                                        <li><i class="fas fa-calendar-alt"></i>{{ date('F d,Y',strtotime($project->created_at)) }}</li>
                                    </ul>

                                    <h4><a href="{{ route('projectdetails', ['id' => $project->slug]) }}">{!! Str::limit($project->title, 25) !!}</a></h4>

                                    <a href="{{ route('projectdetails', ['id' => $project->slug]) }}" class="theme-btn btn-style-one"><span class="txt">Read More</span></a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3 py-5">
                                {{$projects->onEachSide(1)->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <script>
    // Get the select element
    const selectElement = document.getElementById('filter');

    // Add event listener to detect changes
    selectElement.addEventListener('change', function() {
        // Get the selected option's value
        const selectedValue = selectElement.value;

        // Do whatever you want with the selected value
        console.log(selectedValue); // For example, log the value to the console
        // Or you can automatically redirect to the selected route
        window.location.href = selectedValue; // Redirect to the selected route
    });
</script>


           
@endsection

 