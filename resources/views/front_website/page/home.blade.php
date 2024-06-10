@extends('front_website.layout.app') @section('content')

<script type="application/ld+json">
 {
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "AHIT",
  "address": {
   "@type": "PostalAddress",
   "addressLocality": "Jaipur,Rajasthan",
   "postalCode": "302002",
   "addressRegion": "India",
   "streetAddress": "31, Amer Rd, behind Brahampuri, Arjun Colony, Brahampuri"
  },
  "alternateName": "AHIT",
  "url": "{{url('/')}}",
  "logo": "https://ahitechno.com/public/front_website/images/ahitnewlastlogo.png",
  "sameAs": ["https://www.facebook.com/AHITechno/", "https://in.pinterest.com/ahitpvtltd/", "https://www.youtube.com/channel/UCe04ZgE5RehKAfEGq4soldg", "https://www.instagram.com/ahitechno/"]
 }
</script>
<script type="application/ld+json">
 {
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Digital Marketing Services | Digital Marketing Agency in India - ahitechno.com",
  "description": "Digital Marketing Agency is a web marketing agency that offers SEO services, PPC services, social media marketing services, web design services, web development services.",
  "publisher": {
   "@type": "Organization",
   "name": "AHIT",
   "logo": {
    "@type": "ImageObject",
    "url": "https://ahitechno.com/public/front_website/images/ahitnewlastlogo.png",
    "width": 240,
    "height": 35
   }
  }
 }
</script>
<script type="application/ld+json">
 {
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "Digital Marketing Services",
  "aggregateRating": {
   "@type": "AggregateRating",
   "ratingValue": "5.0",
   "ratingCount": "19"
  },
  "offers": {
   "@type": "AggregateOffer",
   "lowPrice": "555.99",
   "highPrice": "1000.99",
   "priceCurrency": "USD"
  }
 }
</script>

<style>
    .slider-wrapper {
        text-align: center; /* Center align the items */
    }
</style>

<style>
.tablinks{
  cursor:pointer;
}
.botman-widget-container {
      font-family: Merriweather, serif; /* Change the font here */
  }
  </style>


<!-- ---------------------------------------Banner Slider--------------------------------------------- -->
<section style="background-image:url('../front_website/images/background/1.png');background-repeat:no-repeat;background-size:100% 100%;">
<div class="banner-area-bkgrnd content-mainvw-bg circle-shape-vw">
      <div class="bg" style="background-image: url(/public/front_website/images/video.gif);z-index:1000"></div> 
          <div class="container">
              <div class="row align-center">
             
                  <div class="col-lg-7 offset-lg-5">
                      <div class="contentvw">
                        
                          <h2 class="wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;">{!! $homepage->home_page_title !!}</h2>
                          <p class="wow fadeInLeft mt-2" style="visibility: visible; animation-name: fadeInDown;">
                          {!! $homepage->home_page_description !!}
                          </p>
                    
                        </div>
                 </div>
                 
          </div>
      </div>
  </div>
  </section>



<!-- --------------------------------------IT Products------------------------------------------------ -->

<section class="it-product-bgrund-vw">
  <div class="container">
  <div class="sec-title text-center">
     <h6 class="subtitle">Best IT Products Provider</h6>
 
     <h2>IT Products We Provide</h2>
    </div>
   
    <div class="SlickCarousel">

        @foreach ($itproduct as $itproduct)
        
        <a href="{{route('single-product',$itproduct->slug)}}">
        <div class="it-prdct-card-box">
         <div class="prd-box-img-styl"><img src="{{ asset('storage/' . $itproduct->productCategory['image']) }}" alt="icon" class="img-fluid"></div>
          <h4 class="prdct-title-sz">{{$itproduct->productCategory['name']}}</h4>
          <h6 class="prdct-para-sz-fnt">{!! Str::limit($itproduct->title,28) !!}</h6>
            <h6 style="margin-top:40px;"><i class="bi bi-arrow-right-circle fs-4"></i></h6>
        </div>
        </a>
        @endforeach
     </div>
 </div>
 </section>


<section class="project-background-bgvw">
    <div class="auto-container mt-5">
      <div class="sec-title text-center">
      
    
       <h2>
        Completed Projects
       </h2>
      </div>
     </div>

     <div class="container-fluid">
        <div class="slider-wrapper mt-4">
          <ul class="item-slider">
            @foreach ($projectList as $category)
         <li data-match="design">
            <a href="{{ route('projectdetails', $category->slug) }}">
             <div class="project-web-fltr {{$category->category_id}}">
              <div class="project-fltr-imgbox"><img src="{{ asset('storage/' . $category->image) }}" alt="image" class="img-fluid"></div>
              <div class="pro-web-parafnt">
              <p class="text-dark">{{ $category->projectCategory['name'] }}</p>
              <a href="{{ route('projectdetails', $category->slug) }}"><h6 class="text-dark">{!! Str::limit($category->title,22) !!}</h6></a>
              </div>
             
             </div>
             </a> 
           </li>
          
            @endforeach
            </ul>
            <div class="slider-controls"><span class="prevSlide"><i class="fa fa-long-arrow-left"></i></span><span class="nextSlide"><i class="fa fa-long-arrow-right"></i></span></div>

            <a href="{{route('projects')}}"><div class="mt-4"><button class="blg-post-mainbtn">All Projects</button></div></a>
        </div>
        </div>
   </section>



<section class="it-serv-bgdply mt-5">
<div class="container">
  <div class="row">
    <div class="col-md-5 mt-5 mb-5">
    <h6 class="subtitle" style="color:#E7CFB1;font-size:14px;">Best Service Provider</h6>
         <h2 class="mt-2" style="color:#E7CFB1">Services We Provide</h2>
        <p class="text-white">"Thank you for visiting AHIT! We appreciate you entering our arena of creativity and innovation.
At AHIT, we're all about creating beautiful websites, enhancing your online visibility, and giving each project our special touch.
With our proficiency in digital marketing, web design, web development, and graphic design, your website will not only look great but also draw a tonne of visitors. You can rely on AHIT to use creativity and expertise to boost your online success."</p>
        
    </div>

<div class="col-md-7">
  <div class="row">

  <div class="SlickCarousel-card">

    <div class="col-md-6 mt-4">
      <a href="https://ahitechno.com/it-servies/web-design">
      <div class="serv-devlp-box">
        <div class="serv-box-icnvws"><img src="../front_website/images/web-design.png" alt="icon" class="img-fluid icon-dvlp-size"></div>
        <h5 class="serv-main-title">WEB DESIGN</h5>
        <p class="serv-mainpara">Craft Your Unique Online Canvas</p>
      </div>
    </a>
    </div>

    <div class="col-md-6 mt-4">
      <a href="https://ahitechno.com/it-servies/graphic-design">
      <div class="serv-devlp-box">
      <div class="serv-box-icnvws"><img src="../front_website/images/graphic-design.png" alt="icon" class="img-fluid icon-dvlp-size"></div>
        <h5 class="serv-main-title">GRAPHIC DESIGN</h5>
        <p class="serv-mainpara">Turn Ideas into Beautiful Designs</p>
      </div>
    </a>
    </div>

    <div class="col-md-6 mt-4">
      <a href="https://ahitechno.com/it-servies/web-development">
      <div class="serv-devlp-box">
      <div class="serv-box-icnvws"><img src="../front_website/images/web-develop.png" alt="icon" class="img-fluid icon-dvlp-size"></div>
        <h5 class="serv-main-title">WEB DEVELOPMENT</h5>
        <p class="serv-mainpara">Enhance Your Website's Performance
</p>
      </div>
    </a>
    </div>

    <div class="col-md-6 mt-4">
      <a href="https://ahitechno.com/it-servies/digital-marketing">
      <div class="serv-devlp-box">
      <div class="serv-box-icnvws"><img src="../front_website/images/digital-marketing.png" alt="icon" class="img-fluid icon-dvlp-size"></div>
        <h5 class="serv-main-title">DIGITAL MARKETING</h5>
        <p class="serv-mainpara">Boost Your Online Presence with Purpose</p>
      </div>
    </a>
    </div>
  </div>


  <div class="SlickCarousel-card1">

    <div class="col-md-6 mt-4">
      <a href="https://ahitechno.com/it-servies/web-design">
      <div class="serv-devlp-box">
        <div class="serv-box-icnvws"><img src="../front_website/images/web-design.png" alt="icon" class="img-fluid icon-dvlp-size"></div>
        <h5 class="serv-main-title">WEB DESIGN</h5>
        <p class="serv-mainpara">Craft Your Unique Online Canvas</p>
      </div>
    </a>
    </div>

    <div class="col-md-6 mt-4">
      <a href="https://ahitechno.com/it-servies/graphic-design">
      <div class="serv-devlp-box">
      <div class="serv-box-icnvws"><img src="../front_website/images/graphic-design.png" alt="icon" class="img-fluid icon-dvlp-size"></div>
        <h5 class="serv-main-title">GRAPHIC DESIGN</h5>
        <p class="serv-mainpara">Turn Ideas into Beautiful Designs</p>
      </div>
    </a>
    </div>

    <div class="col-md-6 mt-4">
      <a href="https://ahitechno.com/it-servies/web-development">
      <div class="serv-devlp-box">
      <div class="serv-box-icnvws"><img src="../front_website/images/web-develop.png" alt="icon" class="img-fluid icon-dvlp-size"></div>
        <h5 class="serv-main-title">WEB DEVELOPMENT</h5>
        <p class="serv-mainpara">Enhance Your Website's Performance
</p>
      </div>
    </a>
    </div>

    <div class="col-md-6 mt-4">
      <a href="https://ahitechno.com/it-servies/digital-marketing">
      <div class="serv-devlp-box">
      <div class="serv-box-icnvws"><img src="../front_website/images/digital-marketing.png" alt="icon" class="img-fluid icon-dvlp-size"></div>
        <h5 class="serv-main-title">DIGITAL MARKETING</h5>
        <p class="serv-mainpara">Boost Your Online Presence with Purpose</p>
      </div>
    </a>
    </div>
  </div>



</div>
</div>
  </div>
</div>

</section>


<section class="experince-sec">
  <div class="upper-box">
    <div class="auto-container">
     <div class="sec-title text-center">
      <h2 class="text-primary">Our Blogs</h2>
     </div>
    </div>
   </div>
  
   <div class="container-fluid">
   <div class="blogmain-Carousel-card">



   @foreach ($blogs as $blogs)
   <a href="{{ route('blogdetails', ['id' => $blogs->slug]) }}">
    <div class="blog-card-boxvws">
      <div class="row">
     <div class="col-md-3"><img src="{{ asset('storage/'.$blogs->image) }}" alt="Image" class="img-fluid blog-post-imgvw" /></div>
     <div class="col-md-9">
     <div class="blg-card-dtlsvws">
      <p class="blg-post-date">{{ date('F d,Y',strtotime($blogs->created_at)) }}</p>
       <h5 class="blog-post-titlevw">{!! Str::limit($blogs->title,70) !!}</h5>
       <p class="blog-post-paradtls">{!! Str::limit($blogs->description, 150) !!}</p>
  
       <div><button class="blg-post-mainbtn">Read More</button></div>
     </div>
     </div>
     </div>
    </div>   
  </a>
    @endforeach
  

   

  

  
    </div>
   </div>
  </section>


<section class=" over_page">


 <div class="auto-container">
  <div class="sec-title text-center">
   <h6 class="subtitle">Our Specialists Worker</h6>

   <h2>
    Meet our expert team works <br />

    for your business
   </h2>
  </div>


  <div class="row mb-5">
  <div class="main-Carousel-card">


 
    @foreach ($expert_list as $expert)
 <div class="col-md-3 mt-4">

   <div class="zoom content-overviw">
   <div class="content-overlay"></div>
   <img src="{{ asset('storage/'.$expert->profile_pic) }}" alt="Image" class="img-fluid content-image" />
   
   <div class="content-details fadeIn-top fadeIn-left">
      <p>This is a short description</p>
    </div>
 </div>
 
   <div class="our-team-fnt">
    <h4 class="">{{$expert->name}}</h4>
    <p class="">{{$expert->department}}</p>
   </div>
         
  </div>
  @endforeach

</div>


</div>

 </div>
</section>







<section  class="style-three over_page m-3">
<div class="sponsors-outer mb-3" style="box-shadow: 0 0 10px rgba(var(--black-opicity),0.1);border-radius:20px;padding-top:40px;padding-bottom:40px">
<h3 style="color:#0269b8;font-size:23px;text-align:center;margin-bottom:35px"><b>Our Ventures</b></h3>
<div class="slider">
	<div class="slide-track">
  @foreach($brand_lists as $brand)

		<div class="slide">
      <a href="{{$brand->url}}">
			<img src="{{ asset('storage/'.$brand->logo) }}" alt="logo" class="img-fluid brand-logo-img"/>
      </a>
		</div>
    @endforeach

	</div>
</div>
</div>
</section>






<section class="fun-fact-and-image over_page">
 <div class="pattern-layer-one">
  <img src="{{asset('public/front_website/images/main-banner/cross-icon.png')}}" />
 </div>

 <div class="pattern-layer-two">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-5.png')}}" />
 </div>

 <div class="pattern-layer-three">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-6.png')}}" />
 </div>

 <div class="pattern-layer-four">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon.png')}}" />
 </div>

 <div class="pattern-layer-five">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-1.png')}}" />
 </div>

 <div class="pattern-layer-six">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-2.png')}}" />
 </div>

 <div class="pattern-layer-seven">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-8.png')}}" />
 </div>

 <div class="pattern-layer-eight">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-7.png')}}" />
 </div>

 <div class="pattern-layer-nine">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-10.png')}}" />
 </div>

 <div class="pattern-layer-ten">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-9.png')}}" />
 </div>

 <div class="pattern-layer-eleven">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-3.png')}}" />
 </div>

 <div class="pattern-layer-tweleve">
  <img src="{{asset('public/front_website/images/main-banner/cross-icon.png')}}" />
 </div>

 <div class="auto-container">
  <div class="row">
   <div class="image-column col-lg-6 col-md-12">
    <div class="image-box parallax-scene-3 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="100ms">
     <div class="image" data-depth="0.30"><img src="{{asset('public/front_website/images/resource/fact-1.png')}}" alt="Fact Image" /></div>
    </div>
   </div>

   <div class="counter-colum col-lg-6 col-md-12">
    <div class="counter-box">
     <div class="count-box wow fadeInUp" data-wow-delay="100ms" data-wow-duration="100ms">
      <div class="count"><span class="count-text" data-speed="5000" data-stop="140">0</span><i>m</i></div>

      <h5 class="counter-title">Digital Global Audience Reach</h5>
     </div>

     <div class="count-box wow fadeInUp" data-wow-delay="400ms" data-wow-duration="400ms">
      <div class="count"><span class="count-text" data-speed="5000" data-stop="74">0</span><i>%</i></div>

      <h5 class="counter-title">Of the audience is under 34 years</h5>
     </div>

     <div class="count-box wow fadeInUp" data-wow-delay="700ms" data-wow-duration="700ms">
      <div class="count"><span class="count-text" data-speed="5000" data-stop="1720">0</span></div>

      <h5 class="counter-title">Content pieces produced everyday</h5>
     </div>

     <div class="count-box wow fadeInUp" data-wow-delay="1000ms" data-wow-duration="1000ms">
      <div class="count"><span class="count-text" data-speed="5000" data-stop="96">0</span><i>%</i></div>

      <h5 class="counter-title">Employee worldwide Satisfy</h5>
     </div>
    </div>
   </div>
  </div>
 </div>
</section>



<section class="contact-section over_page">
 <div class="pattern-layer-one">
  <img src="{{asset('public/front_website/images/main-banner/cross-icon.png')}}" />
 </div>

 <div class="pattern-layer-two">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-5.png')}}" />
 </div>

 <div class="pattern-layer-three">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-6.png')}}" />
 </div>

 <div class="pattern-layer-four">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon.png')}}" />
 </div>

 <div class="pattern-layer-five">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-1.png')}}" />
 </div>

 <div class="pattern-layer-six">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-2.png')}}" />
 </div>

 <div class="pattern-layer-seven">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-8.png')}}" />
 </div>

 <div class="pattern-layer-eight">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-7.png')}}" />
 </div>

 <div class="pattern-layer-nine">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-10.png')}}" />
 </div>

 <div class="pattern-layer-ten">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-9.png')}}" />
 </div>

 <div class="pattern-layer-eleven">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-3.png')}}" />
 </div>

 <div class="pattern-layer-tweleve">
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-4.png')}}" />
 </div>

 <div class="auto-container">
  <div class="row cont-flex-dply">
   <div class="form-column col-md-7">
    <div class="inner-column">
     <div class="sec-title text-left">
      <h6 class="subtitle">Get in Touch</h6>

      <h2>Get Contact us?</h2>
     </div>


     <div class="contact-form bg-white shadow" style="border-radius:20px;padding:20px;border:solid 1px #028AA2">
     @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $errors }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
      <form method="POST" action="{{route('contacfrom')}}">
        @csrf
       <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 form-group"><input type="text" name="name" placeholder="Name" oninput="this.value = this.value.replace(/[^A-Za-z+.]/g, '').replace(/(\..*?)\..*/g, '$1');" required /></div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-group"><input type="email" name="email" placeholder="Email" required /></div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-group"><input type="url" name="company" placeholder="Your Website" required /></div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-group"><textarea name="message" placeholder="Massage"></textarea></div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-group text-left">
         <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="txt">Send Now</span></button>
        </div>
       </div>
      </form>
     </div>
    </div>
   </div>

   <div class="image-column col-md-5 cont-info-cardbox">
 
    <div class="contact-card-box  mt-5">
      <div class="cnt-box-iconvws"><img src="../front_website/images/phoneicon.png" alt="icon" class="img-fluid"></div>
      <div class="ms-3">
        <h5 style="font-size:17px;font-weight:600;color:black">Phone / EMail :</h5>
        <p style="font-size:15px;font-weight:500;color:#333332;">+91 8005779031</p>
        <p style="font-size:15px;font-weight:500;color:#333332;">ahitpvtltd@gmail.com</p>
      </div>
    </div>

    <div class="contact-card-box mt-4">
    <div class="cnt-box-iconvws"><img src="../front_website/images/locationicon.png" alt="icon" class="img-fluid"></div>
      <div class="ms-3">
        <h5 style="font-size:17px;font-weight:600;color:black">Location :</h5>
        <p style="font-size:15px;font-weight:500;color:#333332;">31 Arjun Colony,Amer Road, <br>Behind Brahmpuri,Jaipur</p>
      </div>
    </div>

    <div class="contact-card-box mt-4">
    <div class="cnt-box-iconvws"><img src="../front_website/images/timericon.png" alt="icon" class="img-fluid"></div>
      <div class="ms-3">
        <h5 style="font-size:17px;font-weight:600;color:black">Time :</h5>
        <p style="font-size:15px;font-weight:500;color:#333332;">10:00am to 6:00pm</p>
        <p style="font-size:15px;font-weight:500;color:#333332;">Sunday Closed</p>
      </div>
    </div>

   </div>
  </div>
 </div>
</section>


<!-- ----------------------------Why Choose use Box---------------------------------- -->
<div class="container mt-5">
  <div class="row faq-row-clmns">
    <div class="col-md-6 mt-3">
         <h3 class="why-chse-heading">Why Choose Us?</h3><br>
         <p>AHIT has successfully helped thousands of businesses achieve their goals, providing effective branding strategies. </p>
         <p class="chse-btm-line"></p>



         <div class="faq__accordian-main-wrapper mt-4" id="faq__accordian-main-wrapper">
					<div class="faq__accordion-wrapper">
						<h6 class="faq__accordian-heading active">Expert Industry Knowledge</h6>
						<div class="faq__accordion-content" style="display: block;">
							<p>AHIT is known as Jaipur's best because we deeply understand our industries, especially in digital marketing and IT solutions. This expertise allows us to create strategies that work, ensuring your business stays competitive and successful in today's market with both fixed and custom solutions.</p>
						</div>
					</div>
					<div class="faq__accordion-wrapper">
						<h6 class="faq__accordian-heading">Tailored Solutions</h6>
						<div class="faq__accordion-content" style="display: none;">
							<p>AHIT specializes in making solutions that fit exactly what you need. Our extensive knowledge in digital marketing and IT enables us to craft personalized strategies that address your unique challenges and goals, helping your business grow and succeed.</p>
						</div>
					</div>
					<div class="faq__accordion-wrapper">
						<h6 class="faq__accordian-heading">Proven Success</h6>
						<div class="faq__accordion-content" style="display: none;">
							<p>AHIT has a strong history of making clients happy. Our track record shows we consistently achieve great results and go beyond expectations, making us a trusted partner for businesses seeking tangible outcomes in digital marketing and IT solutions.</p>
						</div>
					</div>

					<div class="faq__accordion-wrapper">
						<h6 class="faq__accordian-heading">Clear Communication</h6>
						<div class="faq__accordion-content" style="display: none;">
							<p>At AHIT, we believe in keeping things simple and clear. We make sure you always understand what's happening and can make smart decisions, fostering open and effective communication throughout our partnership in digital marketing and IT solutions.</p>
						</div>
					</div>

					<div class="faq__accordion-wrapper">
						<h6 class="faq__accordian-heading">Cutting-Edge Technology</h6>
						<div class="faq__accordion-content" style="display: none;">
							<p>AHIT stays ahead with the latest technology. We leverage advanced tools to create innovative solutions that keep your business ahead of the competition, combining expertise in digital marketing and IT solutions.</p>
						</div>
					</div>


          <p>AHIT integrates IT solutions with comprehensive digital marketing expertise to propel your business growth and success.</p>

				</div>









    </div>

    <div class="col-md-6 mt-3 text-center">
   <div><img src="https://byteinfotech.co/assets/images/why-choose-us.png" alt="choose-image" class="img-fluid"></div>
</div>
  </div>
</div>


<section class="testimonial-section over_page">
 <div class="auto-container">
  <div class="row reverse_column">
   <div class="image-column col-lg-6 col-md-12 col-sm-12">
    <div class="image-box">
     {{-- <figure><img src="{{asset('public/front_website/images/resource/testimonial.png')}}" alt="Testimonial Image" /></figure> --}}
     <figure><img src="{{asset('public/front_website/images/resource/testimonial.png')}}" alt="Testimonial Image" /></figure>
     {{-- <a title="Customer reviews of ahitechno.com" href="https://www.webwiki.com/ahitechno.com"><img src="https://www.webwiki.com/etc/rating/widget/1407011283/ahitechno-com-rating-full-180.png" alt="Reviews of ahitechno.com" class="w-50" /></a> --}}
    </div>
   </div>

   <div class="testimonial-column col-lg-6 col-md-12 col-sm-12">
    <div class="sec-title">
     <h6 class="subtitle mt-4">Testimonials</h6>

     <h2>
      What clients are saying <br />

      for our work
     </h2>
    </div>

    <div class="testimonial-carousel owl-carousel owl-theme">
     @foreach($testimonial_list as $testimonial)

     <div class="testimonial-block">
      <div class="inner-box">
       <div class="text">
        “{{$testimonial->about}}”
       </div>

       <div class="icon-quote"><i class="flaticon flaticon-quote"></i></div>

       <div class="info-box">


        <div class="text-box">

        </div>
       </div>
      </div>
     </div>

     @endforeach
    </div>
   </div>
  </div>
 </div>
</section>

<!-- --------------------FAQ Box------------------------------- -->
<section>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 mt-3">
      <div class="">
      <h3 class="mb-3">Frequently Asked Questions</h3>
      <div class="accordion">

@foreach($faq as $faq)
        <div class="accordion-item mt-2">
          <button id="accordion-button-1" aria-expanded="true">
            <span class="accordion-title">{{$faq->question}}</span>
            <span class="icon" aria-hidden="true"></span>
          </button>
          <div class="accordion-content">
            <p>
              {{$faq->answer}}
            </p>
          </div>
        </div>
    
  @endforeach
    
 
      </div>
    </div>
      </div>

      <div class="col-md-6 mt-3 text-center main-faq-imagevws">
      <div><img src="https://cdni.iconscout.com/illustration/premium/thumb/faq-5941165-4921546.png" alt="choose-image" class="img-fluid"></div>
   </div>
    </div>
  </div>
</section>

<section class="news-section-three over_page">
 @foreach($brand_list as $brand)

 <div class="pattern-layer-one">
  <a href="{{$brand->url}}"></a>
  <!-- <img src="{{ asset('storage/'.$brand->logo) }}" alt="{{$testimonial->name}}" />  -->
  <img src="{{asset('public/front_website/images/main-banner/banner-icon-1.png')}}" />
  <!-- </a> -->
 </div>

 @endforeach
</section>




<section  class="style-three over_page m-3">
<div class="sponsors-outer mb-3" style="box-shadow: 0 0 10px rgba(var(--black-opicity),0.1);border-radius:20px;padding-top:40px;padding-bottom:40px">
<h3 style="color:#0269b8;font-size:23px;text-align:center;margin-bottom:35px"><b>Our Clients</b></h3>
<div class="slider">
	<div class="slide-track">
  @foreach($brand_lists as $brand)

		<div class="slide">
    <a href="{{$brand->url}}">
			<img src="{{ asset('storage/'.$brand->logo) }}" alt="logo" class="img-fluid brand-logo-img"/>
    </a>
		</div>
    @endforeach

	</div>
</div>
</div>
</section>







 <!-- <script>
    var botmanWidget = {
        title: 'Ahit ChatBot',

introMessage: "Hello! How can I assist you today?",
mainColor: "#5BB4F5",
aboutText: "Powered by Ahit",
aboutLink: 'https://ahitechno.com/'

};
</script>  -->
<!-- 
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> -->





@endsection
