@extends('front_website.layout.app')

@section('content')

<style>
        .abt-tagline{
            border-top:solid 2px #06488f;
            width:60px;
            margin-top:0px
        }
        .abt-main-tlt{
            font-size:23px;
            font-weight: 600;
            letter-spacing: 0.75px;
            margin-top:15px;
        }
        .abot-subheading-fnt{
            font-size:15px;
            font-weight: 600;
        }
        .abt-main-paradtls{
            font-size:15px;
            font-weight: 500;
            letter-spacing: 0.75px;
            margin-top:15px;
            color:rgb(71, 71, 71);
            line-height: 28px;
            text-align: justify;
        }
        .misn-abt-tlt{
            font-size:17px;
            font-weight: 700;
            letter-spacing: 0.75px;
        }
        .req-cont-boxvw{
            border:solid 1px #f0140c;
            padding-left:20px;
            padding-right:20px;
            padding-top:17px;
            padding-bottom:15px;
            border-radius: 5px;
        }
        .abt-cont-fntsz{
            font-size:18px;
            font-weight: 500;
            /* margin-top:15px; */
        }
        .abt-call-btns{
            font-size:16px;
            font-weight: 500;
            color:white;
            border:solid 1px #028AA2;
            background-color: #028AA2;
            padding-left:30px;
            padding-right: 30px;
            padding-top:10px;
            padding-bottom:10px;
            box-shadow:2px 2px 10px 2px rgb(223, 223, 223);
            border-radius:10px;
        }
    /* .accordion-button{
        font-size:17px;
        font-weight: 600;
     
    } */
    .abt-column-boxvw{
        margin-top:45px
    }
    @media only screen and (max-width:767.99px){
        .page-title {
            padding: 40px 0 100px;
        }
        .abt-column-boxvw{
        margin-top:-50px
    }
    .abt-call-btns{
           margin-top:20px;
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
                <h1 class="padding-top:-20px">About Us</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="text-white">About Us</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container">
  <div class="row">
      <div class="col-md-5 abt-column-boxvw" >
      <a href="#"  class=""><img src="/public/front_website/images/aboutimg1.png" alt="digital" border="0" class="img-fluid" style="border-radius:25px"></a>
  </div>
      <div class="col-md-7 mt-4">
        <p class="abot-subheading-fnt">WHO WE ARE</p>
        <div class="abt-tagline"></div>
        {{-- <h1 class="abt-main-tlt"></h1> --}}
       <p class="abt-main-paradtls">AHIT is your digital hub – a lively place where young minds thrive with new ideas and technical skills. We're a passionate team, fueled by creativity and a love for everything digital. From web design to graphic design to development, it's what we do best. We create, we code, we plan – all to make your digital dreams come true. Innovation is our thing, and making you happy is what drives us. We're not just about making websites; we're about building connections. Welcome to AHIT, where your vision becomes our top priority.</p>
  </div>
      <div class="col-md-7 mt-4">
        <p class="abot-subheading-fnt">WHY CHOOSE US</p>
        <div class="abt-tagline"></div>
        {{-- <h1 class="abt-main-tlt"></h1> --}}
       <p class="abt-main-paradtls">We craft personalised solutions based on your goals, using our digital expertise. We're easy to collaborate with and have abundant resources. At AHIT, we collaborate closely with you. We grasp your needs and leverage our skills to achieve results. That's why we focus on building trust. By understanding how our clients prefer to work. Check out our projects to see how we've assisted other businesses like yours online. Partner with AHIT today and let's make your digital vision a reality together. Experience the AHIT difference – where innovation meets excellence.</p>
   </div>
   <div class="col-md-5 mt-5">
      <a href="#"  class=""><img src="/public/front_website/images/aboutimg2.png" alt="digital" border="0" class="img-fluid" style="border-radius:25px"></a>
  </div>

          <div class="col-md-3 mt-5 text-center">
              <div><img src="../front_website/images/goalicon.png" alt="icon" class="img-fluid"></div>
            <h6 class="misn-abt-tlt mt-3">Our Mission</h6>
            <p class="abt-main-paradtls text-center">Our mission is to empower businesses through the power of digital solutions.</p>
          </div>

          <div class="col-md-3 mt-5 text-center">
              <div><img src="../front_website/images/valuesicon.png" alt="icon" class="img-fluid"></div>
              <h6 class="misn-abt-tlt mt-3">Our Values</h6>
              <p class="abt-main-paradtls text-center">Our values drive us to deliver impactful solutions through creativity, collaboration, and quality.</p>
            </div>

            <div class="col-md-3 mt-5 text-center">
              <div><img src="../front_website/images/growth.png" alt="icon" class="img-fluid"></div>
            <h6 class="misn-abt-tlt mt-3">Our Growth</h6>
            <p class="abt-main-paradtls text-center">We're always learning, staying current on trends, and evolving to offer effective solutions.</p>
          </div>

          <div class="col-md-3 mt-5 text-center">
            <div><img src="../front_website/images/vision.png" alt="icon" class="img-fluid"></div>
          <h6 class="misn-abt-tlt mt-3">Our Vision</h6>
          <p class="abt-main-paradtls text-center">Our vision is to be the leading provider of IT solutions for businesses of all sizes.</p>
        </div>

      </div>
</div>

    <div class="container mt-5 mb-5">
        <div class="req-cont-boxvw">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="abt-cont-fntsz mt-3">Get in touch with our team today and see how AHIT can help your business flourish online. <a href="#" class="text-danger">Request A Quote</a></h3>
                </div>
                <div class="col-md-4">
                  
                        <div class="text-center ms-2"><button class="abt-call-btns"><a href="tel:+918005779031" target="_blank" style="color: white">+91 - 8005779031</a></button></div>
                </div>
            </div>    
        </div>
    </div>


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

<section class=" over_page mt-5">
 <!-- <div class="team-bg wow fadeInRight">
  <img src="{{asset('public/front_website/images/background/3.png')}}" />
 </div> -->

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


    <div class="container mb-5 mt-3">
  <div class="row">
      <div class="col-md-5 mt-4">
          <div><img src="../front_website/images/abt-faqimg.jpg" alt="faq image" class="img-fluid"></div>
      </div>

      <div class="col-md-7 mt-4">

          <div class="accordion-column">
            <div class="inner-column">
                <div class="sec-title">
                    <h6 class="subtitle">Why Choose Us</h6>
                    <h2>
                        Work with a dedicated <br />
                        SEO company
                    </h2>
                </div>
                <ul class="accordion-box">
                    <li class="accordion block">
                        <div class="acc-btn">
                            Keyword & Market Research
                            <div class="icon fa fa-arrow-circle-up"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content"><p>To find the most relevant and impactful terms and keywords for your business, AHIT is known for doing market research and keyword research.</p></div>
                        </div>
                    </li>
                    <li class="accordion block active-block">
                        <div class="acc-btn active">
                            Designing & Interactive Content
                            <div class="icon fa fa-arrow-circle-up"></div>
                        </div>
                        <div class="acc-content current">
                            <div class="content"><p>AHIT has a team of experienced content writers and designers, so they will ensure that your audience receives interesting and captivating information.</p></div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            Social Media Promotion
                            <div class="icon fa fa-arrow-circle-up"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content"><p>AHIT offers professional social media promotion to boost your brand's visibility on a variety of platforms.</p></div>
                        </div>
                    </li>
                    <li class="accordion block">
                        <div class="acc-btn">
                            Digital PR & Penalty Recovery
                            <div class="icon fa fa-arrow-circle-up"></div>
                        </div>
                        <div class="acc-content">
                            <div class="content"><p>AHIT specializes in digital advertising strategies that improve your online reputation and presence.</p></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
       

      </div>
  </div>
</div>


@endsection