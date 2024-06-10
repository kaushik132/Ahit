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
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "{{$project->projectCategory->name}}",
            "item": "{{ route('projects',$project->projectCategory->slug) }}"
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "{{$project->title}}",
            "item": "{{$canocial}}"
        }]
    }
</script>
<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "speakable": {
            "@type": "SpeakableSpecification",
            "xPath": [
                "/html/head/title",
                "/html/head/meta[@name='description']/@content"
            ]
        },
        "Url": "{{$canocial}}",
        "name": "{{ $seo_data['seo_title'] }}",
        "description": "{{$seo_data['description']}}",
        "publisher": {
            "@type": "Organization",
            "name": "Ahit Techno"
        },
        "keywords": "{{$seo_data['keywords']}}"
    }
</script>


<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ProjectPosting",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "https://ahitechno.com/project_details/{{ $project->slug }}"
        },
        "headline": "{{ $project->title }}",
        "description": "{{ $project->description }}",
        "image": "{{ asset('storage/'.$project->image) }}",
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
        "datePublished": "{{ date('Y-m-d',strtotime($project->created_at)) }}",
        "dateModified": "{{ date('Y-m-d',strtotime($project->updated_at)) }}"
    }
</script>


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
    .project-main-text h2 {
        font-size: 24px;
        font-weight: 500;
        text-align: start;
    }

    .project-main-text h3 {
        font-size: 22px !important;
        font-weight: 500;
    }

    .project-main-text h4 {
        font-size: 20px !important;
        font-weight: 500;
    }

    .project-main-text h5 {
        font-size: 18px !important;
        font-weight: 500;
    }

    .project-main-text p {
        font-size: 15.5px !important;
        font-weight: 500;
    }
    .project-main-text ul li{
        list-style:disc !important;
    }

    .project-main-text ol li{
        list-style:number !important;
    }
</style>
<section class="page-title" style="background-image: url({{ asset('public/front_website/images/bgimg.jpg') }});">
    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1>{!! $project->title !!}</h1>


            </div>
        </div>
    </div>
</section>
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="blog-detail">
                    <div class="news-block style-three">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->alt }}"> </figure>
                            </div>
                            <div class="caption-box">
                                <ul class="category">
                                    <li><a href="{{ route('projects', $project->projectCategory->slug) }}">{{ $project->projectCategory->name }}</a>
                                    </li>

                                </ul>
                                <ul class="info">
                                    <li><i class="fas fa-calendar-alt"></i>{{ date('d-F-Y', strtotime($project->created_at)) }}
                                    </li>
                                    <li>|</li>
                                    <li><i class="fas fa-user-alt"></i>By Admin</li>
                                </ul>
                                <h4 style="text-align: justify">{!! $project->title !!}</h4>
                                <div class="project-main-text" style="text-align: justify">
                                    {!! $project->content !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12 side_content">


                <aside class="sidebar default-sidebar">
                    <div class="cat-list p-4 d-flex justify-content-evenly flex-wrap project-scl-icnbx">


                        @if ($project->f_image)
                        <a href="{!! $project->f_link !!}"><img src="{{ asset('storage/' . $project->f_image) }}" alt="{{ $project->f_alt }}" class="img-fluid pro-scl-icns"></a>
                        @else
                        <p></p>
                        @endif
                        @if ($project->i_image)
                        <a href="{!! $project->i_link !!}"><img src="{{ asset('storage/' . $project->i_image) }}" alt="{{ $project->i_alt }}" class="img-fluid pro-scl-icns"></a>
                        @else
                        <p></p>
                        @endif

                        @if ($project->p_image)
                        <a href="{!! $project->p_link !!}"><img src="{{ asset('storage/' . $project->p_image) }}" alt="{{ $project->p_alt }}" class="img-fluid pro-scl-icns"></a>
                        @else
                        <p></p>
                        @endif
                        @if ($project->w_image)
                        <a href="{!! $project->w_link !!}"><img src="{{ asset('storage/' . $project->w_image) }}" alt="{{ $project->w_alt }}" class="img-fluid pro-scl-icns"></a>
                        @else
                        <p></p>
                        @endif



                    </div>

                    <div class="row mb-4">
                        {{-- <div class="col-md-12 mt-3 text-center">
                            <div class="cat-list p-3 project-scl-icnbx">
                                <h6><b>Members : </b></h6>
                                <p>{!! $project->totel_mem !!}</p>
                            </div>
                        </div> --}}
                        <div class="col-md-12 mt-3 text-center">
                            <div class="cat-list p-3 project-scl-icnbx">
                                <h6><b>Timings </b></h6>
                                <p>
                                    <center>{!! $project->open_time !!}</center>
                                </p>
                            </div>
                        </div>
                    </div>



                    <div class="sidebar-widget categories">
                        <div class="sidebar-title">
                            <h3 style="color:#007bff"><b>Catagories</b></h3>
                        </div>
                        <ul class="cat-list">
                            @foreach ($projectcategory as $cat_value)
                            <li>
                                <a href="{{ route('projects', $cat_value->slug) }}"><i class="fas fa-angle-double-right"></i>{{ $cat_value->name }}<span>{{ $cat_value->projects_count }}</span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-widget latest-news">
                        <div class="sidebar-title">
                            <h3 style="color:#007bff"><b>Other Projects</b></h3>
                        </div>
                        <div class="widget-content">
                            @foreach ($similarproject as $similar_value)
                            <article class="post">
                                <div class="post-thumb">
                                    <a href="javascript:void(0)"><img src="{{ asset('storage/' . $similar_value->image) }}" alt="" /></a>
                                </div>
                                <h3><a href="{{ route('projectdetails', ['id' => $similar_value->slug]) }}">{{ $similar_value->title }}</a>
                                </h3>
                                <div class="post-info">{{ date('d-M-Y', strtotime($similar_value->created_at)) }}
                                </div>
                            </article>
                            @endforeach

                        </div>


                    </div>


                </aside>
            </div>
        </div>
    </div>

    <?php if ($project->questions != null) {   ?>

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

                        $questions = explode("__", $project->questions);
                        $answers = explode("__", $project->answers);

                        foreach ($questions as $key => $value) {

                            $mainEntity[$key]['@type'] = 'Question';
                            $mainEntity[$key]['name'] = $value . '?';
                            $mainEntity[$key]['acceptedAnswer']['@type'] = 'Answer';
                            $mainEntity[$key]['acceptedAnswer']['text'] = $answers[$key] . '.';

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
                "mainEntity": @php echo json_encode($mainEntity, JSON_UNESCAPED_SLASHES);@endphp
            }
        </script>

    <?php } ?>


</div>


<!-- -------------------------------------Related Projects--------------------------------------------- -->
<section class="mb-5">
<div class="container-fluid">
    <h3 class="mt-3 mb-4 text-center"><b>More Projects</b></h3>
    <div class="related-product">

        @foreach($relatedproject as $project)
        <div class="slide">
            <!-- <div class="">


                <div class="inner-box newbox-view">
                    <div class="lower-content">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('projectdetails', ['id' => $project->slug]) }}">
                                    <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->alt }}" height="100" width="200">
                                </a>
                            </figure>
                        </div>
                        <div class="caption-box">

                            <h5 class="category">

                                <li><a href="{{ route('projects',$project->projectCategory['slug']) }}">{{ $project->projectCategory['name'] }}</a></li>

        </h5>

                            <ul class="info mt-1 mb-1" style="font-size: 12px;">
                                <li><i class="fas fa-calendar-alt"></i> {{ date('F d,Y',strtotime($project->created_at)) }}</li>
                            </ul>

                            <h6 style="margin-bottom: 30px; font-size: 12px; "><a href="{{ route('projectdetails', ['id' => $project->slug]) }}">{!! Str::limit($project->title, 10) !!}</a></h6>

                            <a href="{{ route('projectdetails', ['id' => $project->slug]) }}" class="theme-btn btn-style-one"><span class="txt">Read More</span></a>
                        </div>




                    </div>
                </div>


            </div> -->

           
              <a href="{{ route('projectdetails', ['id' => $project->slug]) }}">
               <div class="project-web-fltr">
                <div class="project-fltr-imgbox"><img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->alt }}" class="img-fluid"></div>
                <div class="pro-web-parafnt">
                <p class="text-dark">WEB</p>
                <a href="{{ route('projectdetails', ['id' => $project->slug]) }}"><h6 class="text-dark">{{ $project->projectCategory['name'] }}</h6></a>
                </div>
               
               </div>
               </a> 
           

        </div>

        @endforeach
    </div>
</div>
</section>

@endsection