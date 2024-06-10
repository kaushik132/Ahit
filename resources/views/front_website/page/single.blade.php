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
        "name": "{{$blog->blogCategory->name}}",
        "item": "{{ route('blogs',$blog->blogCategory->slug) }}"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "{{$blog->title}}",
        "item": "{{$canocial}}"
      }]
    }
    </script>
   <script type="application/ld+json">
    {"@context":"http://schema.org",
    "@type":"WebPage",
    "speakable":
      {
      "@type": "SpeakableSpecification",
      "xPath": [
        "/html/head/title",
        "/html/head/meta[@name='description']/@content"
      ]
    },
    "Url" :"{{$canocial}}",
    "name":"{{ $seo_data['seo_title'] }}",
    "description":"{{$seo_data['description']}}",
    "publisher":{"@type":"Organization","name":"Ahit Techno"},
    "keywords":"{{$seo_data['keywords']}}"}
    </script>


 <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://ahitechno.com/blog/{{ $blog->slug }}"
  },
  "headline": "{{ $blog->title }}",
  "description": "{{ $blog->description }}",
  "image": "{{ asset('storage/'.$blog->image) }}",  
  "author": {
    "@type": "Organization",
    "name": "https://ahitechno.com/public/front_website/images/logo.png",
     "url": "https://ahitechno.com/contact-us"
  },  
  "publisher": {
    "@type": "Organization",
    "name": "AHIT",
    "logo": {
      "@type": "ImageObject",
      "url": "https://ahitechno.com/public/front_website/images/logo.png"
    }
  },
  "datePublished": "{{ date('Y-m-d',strtotime($blog->created_at)) }}",
  "dateModified": "{{ date('Y-m-d',strtotime($blog->updated_at)) }}"
}
</script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<section class="page-title" style="background-image: url({{asset('public/front_website/images/bgimg.jpg')}});">
    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1>Blog Details</h1>
                
            </div>
        </div>
    </div>
</section>
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="content-side col-lg-8 col-md-12 col-sm-12 mb-3">
                <div class="blog-detail">
                    <div class="news-block style-three">
                        <div class="inner-box">
                            <div class="image-box">
                            <figure class="image"><img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->alt }}"> </figure>

                        </div>
                        <div class="caption-box">
                            <ul class="category">
                                <li><a href="{{ route('blogs',$blog->blogCategory->slug) }}">{{$blog->blogCategory->name}}</a></li>

                            </ul>
                            <ul class="info">
                                <li><i class="fas fa-calendar-alt"></i>{{ date('d-F-Y',strtotime($blog->created_at)) }}</li>
                                <li>|</li>
                                <li><i class="fas fa-user-alt"></i>By Admin</li>
                            </ul>
                            <h4 style="text-align: justify">{!! $blog->title !!}</h4>
                            <div class="blg-dtl-main-vw" style="text-align: justify">
                                {!! $blog->content !!}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-side col-lg-4 col-md-12 col-sm-12 side_content">
            <aside class="sidebar default-sidebar" style="margin-top:0px">
            {{-- <div class="">
                            <form action="" class="">
                                <input type="search" class="form-control" placeholder="Search..." style="position:relative;">
                              <i class="bi bi-search blg-srch-icn"></i>
                            </form>
                        </div> --}}

                <div class="sidebar-widget categories">
                <div class="sidebar-title mb-3"><h5 style="color:#007bff"><b>Catagories</b></h5></div>
                    <ul class="cat-list">
                        @foreach($blogcategory as $cat_value)
                        <li>
                            <a href="{{ route('blogs',$cat_value->slug) }}"><i class="fas fa-angle-double-right"></i>{{$cat_value->name}}<span>{{$cat_value->blogs_count}}</span></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar-widget latest-news " style="position:sticky !important">
                    <div class="sidebar-title"><h5 style="color:#007bff"><b>Recent Post</b></h5></div>
                    <div class="widget-content">
                        @foreach($similarblog as $similar_value)
                         <article class="post">
                            <div class="post-thumb">
                                <a href="javascript:void(0)"><img src="{{ asset('storage/'.$similar_value->image) }}" alt="" /></a>
                            </div>
                            <h3><a href="{{ route('blogdetails', ['id' => $similar_value->slug]) }}">{{$similar_value->title}}</a></h3>
                            <div class="post-info">{{ date('d-M-Y',strtotime($similar_value->created_at)) }}</div>
                        </article>
                        @endforeach
                        
                    </div>


                </div>

                
            </aside>
        </div>
    </div>
</div>

<?php   if($blog->questions!=null){   ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class='faq'>
            <div class="global-label">
                <div class="global-label-text text-center">
                    FAQs
                </div>
            </div>

               <?php 

                   $questions = explode("__",$blog->questions);
                   $answers = explode("__",$blog->answers);

                     foreach ($questions as $key => $value) { 

                        $mainEntity[$key]['@type'] ='Question';
                        $mainEntity[$key]['name'] =$value.'?';
                        $mainEntity[$key]['acceptedAnswer']['@type'] ='Answer';
                        $mainEntity[$key]['acceptedAnswer']['text'] =$answers[$key].'.'; 

                    ?> 
           
            <div class="faq-container">
                <div class="faq-label">
                    <div class="faq-label-text">
                        {!! $value !!}?
                    </div>
                    <div class="faq-label-icon">
                        <span class="material-icons">
                            expand_more
                        </span>
                    </div>
                </div>
                <div class="faq-answer ">
                    <div class="faq-answer-content">
                        {!! $answers[$key] !!}.
                    </div>
                </div>
            </div>
             <?php } ?>
           
        </div>
        </div>
    </div>
</div> 




  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity":@php  echo json_encode($mainEntity,JSON_UNESCAPED_SLASHES);  @endphp
    }
    </script>

 <?php } ?>


</div>



<!-- -------------------------------------Related Blogs--------------------------------------------- -->
<div class="container-fluid mt-5 mb-5">
    <h3 class="mt-3 mb-4 text-center"><b>Related Blogs</b></h3>
    <section class="related-product slider">

        @foreach($relatedBlog as $project)
        <div class="slide">
            <div class="">


                <div class="inner-box newbox-view">
                    <div class="lower-content">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blogdetails', ['id' => $project->slug]) }}">
                                    <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->alt }}" height="100" width="200">
                                </a>
                            </figure>
                        </div>
                        <div class="caption-box">

                            <h5 class="category">

                                <li><a href="{{ route('blogs',$project->blogCategory['slug']) }}">{{ $project->blogCategory['name'] }}</a></li>

        </h5>

                            <ul class="info mt-1 mb-1" style="font-size: 12px;">
                                <li><i class="fas fa-calendar-alt"></i> {{ date('F d,Y',strtotime($project->created_at)) }}</li>
                            </ul>

                            <h6 style="margin-bottom: 30px; font-size: 12px;"><a href="{{ route('blogdetails', ['id' => $project->slug]) }}">{!! Str::limit($project->title, 10) !!}</a></h6>

                            <a href="{{ route('blogdetails', ['id' => $project->slug]) }}" class="theme-btn btn-style-one"><span class="txt">Read More</span></a>
                        </div>




                    </div>
                </div>


            </div>
        </div>

        @endforeach






    </section>
</div>



@endsection