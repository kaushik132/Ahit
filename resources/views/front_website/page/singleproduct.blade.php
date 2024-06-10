@extends('front_website.layout.app')

@section('content')

    <style>
        @media only screen and (max-width:767.99px) {
            .hide-tabbox-mobvw {
                display: none
            }
        }
    </style>





    <div class="form-back-drop"></div>
    <section class="hidden-bar">

        <div class="inner-box">

            <div class="cross-icon"><span class="fa fa-times"></span></div>

            <div class="about-sec">

                <div class="logo">

                    <a href="{{ route('home') }}"><img src="{{ asset('public/front_website/images/logo-2.png') }}"
                            alt="" title="" /></a>

                </div>

                <div class="title">
                    <h2>About Us</h2>
                </div>

                <p>

                    The argument in favor of using filler text goes something like this: If you use real content in the
                    Consulting Process, anytime you reach a review point you’ll end up reviewing and negotiating the content
                    itself

                    and not the design.

                </p>

                <a href="{{ route('about-us') }}" class="theme-btn btn-style-one"><span class="txt">Learn More</span></a>

            </div>

            <div class="contact-info-box">

                <ul class="info-list">

                    <li>sola@example.com</li>

                    <li>+(123) 456 7890</li>

                </ul>

                <ul class="social-links">

                    <li>

                        <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>

                    </li>

                    <li>

                        <a href="javascript:void(0)"><i class="fab fa-pinterest-p"></i></a>

                    </li>

                    <li>

                        <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>

                    </li>

                    <li>

                        <a href="javascript:void(0)"><i class="fab fa-dribbble"></i></a>

                    </li>

                </ul>

            </div>

        </div>

    </section>

    <section class="page-title" style="background-image: url({{ asset('public/front_website/images/bgimg.jpg') }});">

        <div id="stars"></div>

        <div id="stars2"></div>

        <div id="stars3"></div>

        <div class="auto-container">

            <div class="inner-container clearfix">

                <div class="title-box">

                    <h1>Product Detail</h1>

                    <ul class="bread-crumb clearfix">

                        <li><a href="{{ route('home') }}">Home</a></li>

                        <li><a href="{{ route('products') }}">Product</a></li>

                        <li class="text-white">Product Detail</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>





    <div class="single-dtl-page-box">
        <div class="container-fluid">
            <div class="row row-view-dirtn">
                <div class="col-md-8 mt-4">
                    <div class="single-main-dtlvw">

                        <div class="main-hdg-prdct-page mb-4">
                            <h1 class="heading-fontszvw" style="margin-top:3px">{{ $blogData->title }}</h1>
                            <div class="ms-3">
                                <img src="{{ asset('storage/' . $blogData->productCategory['image']) }}"
                                    alt="icon" class="img-fluid" style="width:30px;height:30px;">
                            </div>
                        </div>


                        {!! $blogData->description !!}

                        <?php   if($blogData->pro_question!=null){   ?>

                        <div class='faq'>
                            <!-- <div class="global-label">
                    <div class="global-label-text text-center">
                        FAQs
                    </div>
                </div> -->

                            <?php 

                   $questions = explode("__",$blogData->pro_question);
                   $answers = explode("__",$blogData->pro_answer);

                     foreach ($questions as $key => $value) { 

                        $mainEntity[$key]['@type'] ='Question';
                        $mainEntity[$key]['name'] =$value.'?';
                        $mainEntity[$key]['acceptedAnswer']['@type'] ='Answer';
                        $mainEntity[$key]['acceptedAnswer']['text'] =$answers[$key].'.'; 

                    ?>

                            <div class="faq-container mt-2">
                                <div class="faq-label">
                                    <div class="faq-label-text">
                                        {!! $value !!}?
                                    </div>
                                    <div class="faq-label-icon">
                                        <span class="material-icons">
                                            <i class="bi bi-chevron-down"></i>
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



                        <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity":@php  echo json_encode($mainEntity,JSON_UNESCAPED_SLASHES);  @endphp
    }
    </script>

                        <?php } ?>






                    </div>

                </div>

                <div class="col-md-4">
                    <a href="https://api.whatsapp.com/send?phone=8005779031" target="_blank"><button class="w-100 connect-team-btn">Connect Our Team</button></a>
                    <div class="row mt-3">
                        <div class="col-md-6 mt-2">
                            <div class="single-serv-box" style="height:50px">
                                <select id="pageSelect" style="width:100%;border:none;font-size:18px !important">

                                    @if ($blogData->page_1)
                                        Error
                                    @else
                                        <option   value="1">Price</option>
                                        <option id="hiddenOption" value="{{ $blogData->another_value1 }}">{{ $blogData->another_page1 }}</option>
                                        <option id="hiddenOption1" value="{{ $blogData->another_value2 }}">{{ $blogData->another_page2 }}</option>
                                        <option id="hiddenOption2" value="{{ $blogData->another_value3 }}">{{ $blogData->another_page3 }}</option>
                                        <option id="hiddenOption3" value="{{ $blogData->another_value4 }}">{{ $blogData->another_page4 }}</option>
                                        <option id="hiddenOption4" value="{{ $blogData->another_value5 }}">{{ $blogData->another_page5 }}</option>
                                        <option id="hiddenOption5" value="{{ $blogData->another_value6 }}">{{ $blogData->another_page6 }}</option>
                                        <option id="hiddenOption6" value="{{ $blogData->another_value7 }}">{{ $blogData->another_page7 }}</option>
                                        <option id="hiddenOption7" value="{{ $blogData->another_value8 }}">{{ $blogData->another_page8 }}</option>
                                        <option id="hiddenOption8" value="{{ $blogData->another_value9 }}">{{ $blogData->another_page9 }}</option>
                                        <option id="hiddenOption9" value="{{ $blogData->another_value10 }}">{{ $blogData->another_page10 }}</option>
                                    @endif





                                    @if ($blogData->page_1)
                                    <?php
                                        $dis_1 = $blogData->discount_1 / 100;
                                        $page_1 = $blogData->page_1 * $dis_1 ;
                                        
                                        ?>
                                        <option value="<?php echo $page_1; ?>">
                                            {{ $blogData->page_name }} {{ $blogData->page_1 }} </option>
                                    @else
                                        <p></p>
                                    @endif
                                    @if ($blogData->page_2)
                                    <?php
                                        $dis_2 = $blogData->discount_2 / 100;
                                        $page_2 = $blogData->page_2 * $dis_2 ;
                                        
                                        ?>
                                        <option value="<?php echo $page_2; ?>">
                                            {{ $blogData->page_name }} {{ $blogData->page_2 }}</option>
                                    @else
                                        <p></p>
                                    @endif
                                    @if ($blogData->page_3)
                                    <?php
                                        $dis_3 = $blogData->discount_3 / 100;
                                        $page_3 = $blogData->page_3 * $dis_3 ;
                                        
                                        ?>
                                        <option value="<?php echo $page_3; ?>">
                                            {{ $blogData->page_name }} {{ $blogData->page_3 }}</option>
                                    @else
                                        <p></p>
                                    @endif
                                    @if ($blogData->page_4)
                                    <?php
                                        $dis_4 = $blogData->discount_4 / 100;
                                        $page_4 = $blogData->page_4 * $dis_4 ;
                                        
                                        ?>
                                        <option value="<?php echo $page_4; ?>">
                                            {{ $blogData->page_name }} {{ $blogData->page_4 }}</option>
                                    @else
                                        <p></p>
                                    @endif
                                    @if ($blogData->page_5)
                                    <?php
                                        $dis_5 = $blogData->discount_5 / 100;
                                        $page_5 = $blogData->page_5 * $dis_5 ;
                                        
                                        ?>
                                        <option value="<?php echo $page_5; ?>">
                                            {{ $blogData->page_name }} {{ $blogData->page_5 }}</option>
                                    @else
                                        <p></p>
                                    @endif
                                    @if ($blogData->page_6)
                                    <?php
                                        $dis_6 = $blogData->discount_6 / 100;
                                        $page_6 = $blogData->page_6 * $dis_6 ;
                                        
                                        ?>
                                        <option value="<?php echo $page_6; ?>">
                                            {{ $blogData->page_name }} {{ $blogData->page_6 }}</option>
                                    @else
                                        <p></p>
                                    @endif
                                    @if ($blogData->page_7)
                                    <?php
                                        $dis_7 = $blogData->discount_7 / 100;
                                        $page_7 = $blogData->page_7 * $dis_7 ;
                                        
                                        ?>
                                        <option value="<?php echo $page_7; ?>">
                                            {{ $blogData->page_name }} {{ $blogData->page_7 }}</option>
                                    @else
                                        <p></p>
                                    @endif

                                    @if ($blogData->page_8)
                                    <?php
                                        $dis_8 = $blogData->discount_8 / 100;
                                        $page_8 = $blogData->page_8 * $dis_8 ;
                                        
                                        ?>
                                        <option value="<?php echo $page_8; ?>">
                                            {{ $blogData->page_name }} {{ $blogData->page_8 }}</option>
                                    @else
                                        <p></p>
                                    @endif
                                    @if ($blogData->page_9)
                                        <?php
                                        $dis_9 = $blogData->discount_9 / 100;
                                        $page_9 = $blogData->page_9 * $dis_9 ;
                                        
                                        ?>
                                        <option value="<?php echo $page_9; ?>">
                                            {{ $blogData->page_name }} {{ $blogData->page_9 }}</option>
                                    @else
                                        <p></p>
                                    @endif
                                    @if ($blogData->page_10)
                                        <?php
                                         $dis_10 = $blogData->discount_10 / 100;
                                        $page_10 = $blogData->page_10 * $dis_10;
                                        
                                        ?>
                                        <option value="<?php echo $page_10; ?>">{{ $blogData->page_name }}
                                            {{ $blogData->page_10 }} </option>
                                    @else
                                        <p></p>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="single-serv-box" style="height:50px">
                                <h6 style="font-size:16px !important" id="price">Price: {!! $blogData->amt !!}</h6>
                            </div>
                        </div>
                    </div>


                    <div class="single-serv-box mt-4 text-center">
                        <div class="d-flex justify-content-between">
                            <a class="add-cart-pro-dtl-btn" href="{{ route('cart', $blogData->id) }}"><span
                                    class="fa fa-cart-plus"></span> Add To Cart</a>
                            <a href="{{ route('add-to-cart') }}" class="buyvw-pro-dtl-btn"><span
                                    class="fa fa-money"></span> Go Cart</a>
                        </div>
                    </div>

                    <div class="single-serv-box mt-4 hide-tabbox-mobvw">
                        <h5 class="text-center" style="color:#028AA2"><b>Our IT Products</b></h5>
                        <div class="sgl-topline"></div>
                        @foreach ($blogCategory as $item)
                            <a href="{{ route('products', $item->slug) }}">
                                <p class="sgl-serve-link"><i class="bi bi-chevron-right"></i>{{ $item->name }}
                                    <span>({{ $item->itproject_count }})</span></p>
                            </a>
                        @endforeach

                    </div>

                    <a href="tel:+919876543210">
                        <div class="single-serv-box mt-4 text-center hide-tabbox-mobvw">
                            <img src="../front_website/images/servphone.png" alt="icon" class="img-fluid mt-4">
                            <p class="mt-3">+91 - 9876543210</p>
                            <p class="text-muted">Phone Number</p>
                        </div>
                    </a>

                  <a href="mailto:ahit@gmail.com">  <div class="single-serv-box mt-4 text-center hide-tabbox-mobvw">
                    <img src="../front_website/images/servmail.png" alt="icon" class="img-fluid mt-4">
                    <p class="mt-3">ahit@gmail.com</p>
                    <p class="text-muted">Email Address</p>
                </div></a>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-5 mb-4">
        <h4 class="mt-3 mb-4 text-center"><b>Technologies that we majorly use for <span class=""
                    style="color:#028AA2">Website & App Development</span></b></h4>
        <div class="customer-logos slider">
            <div class="slide"><img src="https://miro.medium.com/v2/resize:fit:1400/1*x0d41ns8PTQZz4a3VbMrBg.png"></div>
            <div class="slide"><img src="https://miro.medium.com/v2/resize:fit:860/1*OvMKzmKvumNzJoNTT7d-uA.png"></div>
            <div class="slide"><img src="https://www.vectorlogo.zone/logos/w3_css/w3_css-ar21.png"></div>
            <div class="slide"><img src="https://logos-world.net/wp-content/uploads/2022/07/Java-Logo.jpg"></div>
            <div class="slide"><img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Node.js_logo.svg/2560px-Node.js_logo.svg.png">
            </div>
            <div class="slide"><img src="https://logos-world.net/wp-content/uploads/2023/02/JavaScript-Symbol.png"></div>
            <div class="slide"><img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1280px-PHP-logo.svg.png">
            </div>

        </div>
    </div>


    <div class="container mt-5 mb-5">
        <h3 class="mt-3 mb-4 text-center"><b>Testimonial</b></h3>
        <div class="testimonial-slider slider">
            @foreach ($testimonial as $test)
                <div class="slide">
                    <div class="testimonial-card-box">
                        <div><img src="{{ asset('storage/' . $test->image) }}" alt="{{ $test->alt_tag }}"
                                class="img-fluid test-user-imgvw"></div>

                        <h6 class="test-user-title">{{ $test->name }}</h6>
                        <p class="test-user-subtitle">{{ $test->designation }}</p>
                        <p class="test-user-content">{!! Str::limit($test->about, 65) !!}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    <!-- -------------------------------------Related Products--------------------------------------------- -->

    <div class="container-fluid mt-5 mb-5">
        <h3 class="mt-3 mb-4 text-center"><b>Related Products</b></h3>
        <div class="related-product slider">

            @foreach ($itproject as $project)
                <div class="slide">
                    <div class="">


                        <div class="inner-box newbox-view">
                            <div class="lower-content">
                                <p class="pro-smcode-fnt text-center"><b>Product Code : {{ $project->pro_code }}</b></p>
                                <!-- <div class="text-center">
                              <button class="cutout">Product Code : AHIT_SMM</button>
                              </div>  -->
                                <h3 class="mt-3 pro-sm-main-heading">{{ $project->productCategory['name'] }}</h3>
                                <p class="pro-dtl-main-vw"><span style="color:black !important">Product Name :</span>
                                    {{ $project->title }}</p>
                                <p class="pro-dtl-main-vw"><span style="color:black !important">Product Type :</span>
                                    {{ $project->pro_type }}</p>
                                <p class="pro-dtl-main-vw"><span style="color:black !important">Duration :</span>
                                    {{ $project->duration }}</p>
                                <div class="d-flex justify-content-between flex-wrap mt-3">
                                    <p class="pro-dtl-main-vw"><span style="color:black !important">AMT :</span> <span
                                            style="font-size:20px;font-weight:600"><i
                                                class="bi bi-currency-rupee"></i>{{ $project->amt }}</span></p>
                                    <p class="pro-dtl-main-vw"><span style="color:black !important">GST :</span>
                                        {{ $project->gst }}</p>
                                </div>

                                <hr>
                                <div class="clearfix mt-3 d-flex justify-content-between">
                                    <!-- <div class="pull-left"> -->
                                    <a class="add-cart" href="#"><span class="fa fa-cart-plus"></span>Add To
                                        Cart</a>
                                    <a href="{{ route('single-product', $project->slug) }}" class="view-dtls-btn">View
                                        details <span class="fa fa-arrow-right"></span></a>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            @endforeach

        </div>
    </div>


    <script>
        // Get references to the select element and the price display element
        var pageSelect = document.getElementById('pageSelect');
        var priceDisplay = document.getElementById('price');

        // Define the price per page
        var pricePerPage = {{ $blogData->amt }};

        // Add an event listener to the select element to update the price when the selection changes
        pageSelect.addEventListener('change', function(e) {
            // Get the selected number of pages
            // console.log("function value----->>>",e.target.value);
            var selectedPages = parseInt(pageSelect.value);
            // console.log("----->>>",selectedPages);

            // Calculate the total price
            var totalPrice = selectedPages * pricePerPage;

            // Update the price display
            priceDisplay.textContent = 'Rs. ' + totalPrice;
        });
    </script>
    <script>
        // JavaScript code to hide the option with id "hiddenOption" if its value is empty
        document.addEventListener('DOMContentLoaded', function() {
            var hiddenOption = document.getElementById('hiddenOption');
            if (hiddenOption && hiddenOption.value === '') {
                hiddenOption.style.display = 'none';
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var hiddenOption = document.getElementById('hiddenOption1');
            if (hiddenOption && hiddenOption.value === '') {
                hiddenOption.style.display = 'none';
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var hiddenOption = document.getElementById('hiddenOption2');
            if (hiddenOption && hiddenOption.value === '') {
                hiddenOption.style.display = 'none';
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var hiddenOption = document.getElementById('hiddenOption3');
            if (hiddenOption && hiddenOption.value === '') {
                hiddenOption.style.display = 'none';
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var hiddenOption = document.getElementById('hiddenOption4');
            if (hiddenOption && hiddenOption.value === '') {
                hiddenOption.style.display = 'none';
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var hiddenOption = document.getElementById('hiddenOption5');
            if (hiddenOption && hiddenOption.value === '') {
                hiddenOption.style.display = 'none';
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var hiddenOption = document.getElementById('hiddenOption6');
            if (hiddenOption && hiddenOption.value === '') {
                hiddenOption.style.display = 'none';
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var hiddenOption = document.getElementById('hiddenOption7');
            if (hiddenOption && hiddenOption.value === '') {
                hiddenOption.style.display = 'none';
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var hiddenOption = document.getElementById('hiddenOption8');
            if (hiddenOption && hiddenOption.value === '') {
                hiddenOption.style.display = 'none';
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var hiddenOption = document.getElementById('hiddenOption9');
            if (hiddenOption && hiddenOption.value === '') {
                hiddenOption.style.display = 'none';
            }
        });
    </script>
@endsection
