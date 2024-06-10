<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <?php if(isset($seo_data['seo_title'])): ?>
   <title><?php echo e($seo_data['seo_title'], false); ?></title>
   <?php endif; ?>
   <?php if(isset($seo_data['keywords'])): ?>
   <meta name="keywords" content="<?php echo e($seo_data['keywords'], false); ?>" />
   <?php endif; ?>
   <?php if(isset($seo_data['description'])): ?>
   <meta name="description" content="<?php echo e($seo_data['description'], false); ?>" />
   <?php endif; ?>
   <?php if(isset($canocial)): ?>
   <link rel="canonical" href="<?php echo e($canocial, false); ?>" />
   <?php endif; ?>
   <?php if(isset($seo_data['seo_title'])): ?>
   <meta property="og:title" content="<?php echo e($seo_data['seo_title'], false); ?>">
   <?php endif; ?>

   <?php if(isset($seo_data['description'])): ?>
   <meta property="og:description" content="<?php echo e($seo_data['description'], false); ?>">
   <?php endif; ?>
   <?php if(isset($seo_data['keywords'])): ?>
   <meta property="og:keywords" content="<?php echo e($seo_data['keywords'], false); ?>">
   <?php endif; ?>
   <meta property="og:site_name" content="Ahitechno">
   <?php if(isset($canocial)): ?>
   <meta property="og:url" content="<?php echo e($canocial, false); ?>">
   <?php endif; ?>
   <meta property="og:type" content="website">
   <meta property="og:image" content="https://ahitechno.com/storage/mediafile/651b71aabed768c396ead4d64c7a3bf7.jpg">



   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link href="<?php echo e(asset('public/front_website/css/bootstrap.css'), false); ?>" rel="stylesheet">
   <link href="<?php echo e(asset('public/front_website/css/style.css'), false); ?>" rel="stylesheet">
   <link href="<?php echo e(asset('public/front_website/css/mouse-style.css'), false); ?>" rel="stylesheet">
   <link href="<?php echo e(asset('public/front_website/css/responsive.css'), false); ?>" rel="stylesheet">
   <link href="<?php echo e(asset('public/front_website/css/color-switcher-design.css'), false); ?>" rel="stylesheet">
   <link id="theme-color-file" href="<?php echo e(asset('public/front_website/css/color-themes/default-theme.css'), false); ?>" rel="stylesheet">

   <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" rel="stylesheet"> -->
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ret="stylesheet">

   <link href="<?php echo e(asset('public/front_website/csss/project.css'), false); ?>" rel="stylesheet" />
   <link href="<?php echo e(asset('public/front_website/csss/addtocart.css'), false); ?>" rel="stylesheet" />
   <link href="<?php echo e(asset('public/front_website/csss/buynow.css'), false); ?>" rel="stylesheet" />
   <link href="<?php echo e(asset('public/front_website/csss/signup.css'), false); ?>" rel="stylesheet" />
   <link href="//kenwheeler.github.io/slick/slick/slick.css" rel="stylesheet" />

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
   


   

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   <a href="https://api.whatsapp.com/send?phone=8005779031" class="float" target="_blank">
      <i class="fa fa-whatsapp my-float"></i>
   </a>


   <div class="g-review-fixed" id="review-fixed">
      <a href="https://www.google.com/maps/place/AHIT/@26.9435346,75.8382529,15z/data=!4m6!3m5!1s0x396db1e7df1a454b:0xb3adbed6fbff8677!8m2!3d26.9435346!4d75.8382529!16s%2Fg%2F11rsrf40wl?entry=ttu" target="_blank">
         <img src="<?php echo e(url('front_website/images/google-review.png'), false); ?>" alt="google review">
      </a>
   </div>


   <link rel="shortcut icon" href="https://ahitechno.com/public/front_website/images/ahitnewfabicon.png" type="image/x-icon">
   <link rel="icon" type="image/x-icon" href="https://ahitechno.com/public/front_website/images/ahitnewfabicon.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <!-- <?php echo $__env->yieldContent('headtab'); ?> -->
   <?php echo toastr_css(); ?>

   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-QK03YWMJ0Z"></script>
   <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
         dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'G-QK03YWMJ0Z');
   </script>
   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6703126866134752" crossorigin="anonymous"></script>

   <style>
      .user-hm-logo {
         width: 35px;
         height: 35px;
      }

      .drop-menu-typ {
         margin-left: -100px;
      }

      a {
         text-decoration: none !important;
      }

      .footer-heading-pptfnt {
         font-size: 17px;
         font-weight: 500;
         letter-spacing: 0.75px;
      }

      .footer-para-fnt {
         color: white !important;
         font-size: 14px;
         font-weight: 400;
         letter-spacing: 0.75px
      }

      .footer-bgclr {
         /* background-image: linear-gradient(135deg, #0045FF 0%, #BD29F2 100%); */
         background-color:#1a3f71;
         padding: 40px;
         color: white;
         height: 100%;
      }

      .footer-box-icon {
         width: 35px;
         height: 35px;
         background-color: white;
         padding: 3px;
         border-radius: 5px;
      }

      .footer-box-icon:hover {
         background-color: lightgrey
      }

      .footer-list-fnt a {
         color: white;
         font-size: 15px;
         font-weight: 400;
         letter-spacing: 0.75px;
         margin-top: 13px;
      }

      .footer-bottom-box {
         display: flex;
         justify-content: space-between;
      }

      .footer-topline {
         border-top: solid 1px white;
         margin-top: 20px;
         margin-bottom: 10px;
      }

      .chatbot-box {
         background-color: white;

         padding: 8px;

      }

      .chatbot-header {
         background-color: #5bb5f5;
         padding: 10px;
         border-radius: 5px
      }


      .chat {
         box-shadow: 0px 4px 30px 0px rgba(97, 168, 240, 0.50);
         border-radius: 5px;
         width: 100%;
         /* max-width: 800px; */
         height: 300px;
         /* min-height: 100%; */
         padding: 15px 30px;
         margin: 0 auto;
         overflow-y: scroll;
         background-color: #fff;
         transform: rotate(180deg);
         direction: rtl;
      }

      .chat__wrapper {
         display: -webkit-box;
         display: -ms-flexbox;
         display: flex;
         -webkit-box-orient: vertical;
         -webkit-box-direction: normal;
         -ms-flex-direction: column-reverse;
         flex-direction: column-reverse;
         -webkit-box-pack: end;
         -ms-flex-pack: end;
         justify-content: flex-end;
      }

      .chat__message {
         font-size: 15px;
         font-weight: 500;
         letter-spacing: 0.75px;
         padding: 10px 20px;
         border-radius: 25px;
         color: #000;
         background-color: #e6e7ec;
         max-width: 600px;
         width: -webkit-fit-content;
         width: -moz-fit-content;
         width: fit-content;
         position: relative;
         margin: 15px 0;
         word-break: break-all;
         transform: rotate(180deg);
         direction: ltr;
      }

      .chat__message:after {
         content: "";
         width: 20px;
         height: 12px;
         display: block;
         background-image: url("https://stageviewcincyshakes.firebaseapp.com/icon-gray-message.e6296433d6a72d473ed4.png");
         background-repeat: no-repeat;
         background-position: center;
         background-size: contain;
         position: absolute;
         bottom: -2px;
         left: -5px;
      }

      .chat__message-own {
         color: #fff;
         margin-left: auto;
         background-color: #00a9de;
      }

      .chat__message-own:after {
         width: 19px;
         height: 13px;
         left: inherit;
         right: -5px;
         background-image: url("https://stageviewcincyshakes.firebaseapp.com/icon-blue-message.2be55af0d98ee2864e29.png");
      }

      .chat__form {
         background-color: #e0e0e0;
         padding: 5px;
         margin-top: 5px;
         border-radius: 5px;
      }

      .chat__form form {
         max-width: 800px;
         margin: 0 auto;
         height: 50px;
         display: -webkit-box;
         display: -ms-flexbox;
         display: flex;
         -webkit-box-align: center;
         -ms-flex-align: center;
         align-items: center;
      }

      .chat__form input {
         height: 40px;
         font-size: 14px;
         min-width: 90%;
         padding-left: 15px;
         background-color: #fff;
         border-radius: 15px;
         border: none;
         font-weight: 500;
         letter-spacing: 0.75px;
      }

      .chat__form button {
         width: 10%;
         height: 100%;
         font-size: 16px;
         background-color: transparent;
         border: none;
         text-align: center;
         text-transform: uppercase;
         cursor: pointer;
      }

      .chat__form button:hover {
         font-weight: bold;
      }

      .main-header {

         position: sticky;
         top: 0;
         background-color: white;
         z-index: 100;
      }

      @media  only screen and (max-width:767.98px) {
         .drop-menu-typ {
            margin-left: 0px;
         }

         .footer-bgclr {
            background-color: #028AA2;
            padding: 10px;
            color: white
         }

         .footer-bottom-box {
            display: block;
            justify-content: space-between;
         }

         .desk-logovw {
            margin-top: -10px !important;
         }
      }
   </style>

   <?php

   use Illuminate\Support\Facades\Auth;

   use App\User;
   use App\ItProductCart;
   use App\ItServices;
   $addtocart = ItProductCart::where('user_id');
   $itServices = ItServices::all();
   $totalItem = 0;

   ?>
</head>



<body>


   <div class="cursor"></div>
   <div class="cursor-follower"></div>
   <header class="main-header header-style-three" style="box-shadow: 0 0 15px rgba(var(--black-opicity),.10);z-index:3000;">
      <div class="container-fluid">
         <div class="row">
            <div class="header-lower">
               <div class="main-box clearfix">
                  <div class="logo-box desk-logovw">
                     <div class="logo"><a href="<?php echo e(route('home'), false); ?>"><img src="<?php echo e(url('public/front_website/images/ahitlogo.png'), false); ?>" alt="logo" title="" class="img-fluid" style="width:100px;"></a></div>
                  </div>
                  <div class="nav-outer clearfix">
                     <div class="mobile-nav-toggler"><span class="icon flaticon flaticon-menu"></span></div>
                     <nav class="main-menu navbar-expand-md ">
                        <div class="collapse show navbar-collapse clearfix" id="navbarSupportedContent">
                           <ul class="navigation clearfix">
                              <li class="mt-2">
                                 <a href="<?php echo e(route('home'), false); ?>">Home</a>
                              </li>
                              <li class="mt-2">
                                 <a href="<?php echo e(route('about-us'), false); ?>">About</a>
                              </li>
                              <li class="dropdown mt-2">
                                 <a href="javascript:void(0)" onclick="myService()">IT Services </a>
                                 <ul>
                                 <!-- <li><a href="">All Services</a></li> -->
                                    <?php $__currentLoopData = $itServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(url('it-services/' . $services->slug), false); ?>"><?php echo e($services->name, false); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                 </ul>
                              </li>


                              <li class="mt-2">
                                 <a href="<?php echo e(route('products'), false); ?>">IT Product </a>

                              </li>

                              <li class="mt-2">
                                 <a href="<?php echo e(route('projects'), false); ?>">Projects</a>
                              </li>

                              <li class="mt-2">
                                 <a href="<?php echo e(route('blogs'), false); ?>">Blogs </a>
                              </li>

                              <li class="mt-2"><a href="<?php echo e(route('contact-us'), false); ?>">Contact</a></li>

                              <li class="header-btn mt-2">
                                 <a href="<?php echo e(route('quotation'), false); ?>">Get Quotation</a>
                              </li>



                              <?php $__currentLoopData = $addtocart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                              <?php



                              $totalItem += $item->no;


                              ?>


                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              <li class="mt-2">
                                 <a href="<?php echo e(route('add-to-cart'), false); ?>"><span class="fa fa-cart-plus header-icn-vw " style="position:relative"></span>
                                    <p class="cart-count" style="position:absolute;top:-12px;left:28px;color:#00a9de;"></p>
                                 </a>
                              </li>

                              <li class="dropdown">

                                 <?php if(Auth::check()): ?>
                                 <a href="javascript:void(0)"><img src="<?php echo e(url('front_website/images/user.png'), false); ?>" alt="User" class="user-hm-logo" /></a>
                                 <h6 style="cursor:pointer;font-size:15px;font-weight:500"><?php echo e(Auth::user()->fname ?? "", false); ?> <?php echo e(Auth::user()->lname ?? "", false); ?></h6>
                                 <ul class="drop-menu-typ">
                                <a href="<?php echo e(url('profile/'.Auth::user()->id), false); ?>"><button class=""  style="background:#1e748f;border:none; padding:10px;font-size:16px;color:white;width:100%">Profile</button></a>
                                    <form action="<?php echo e(route('logout'), false); ?>" method="POST" class="d-flex" role="search">
                                       <?php echo csrf_field(); ?>
                                       <button class="" type="submit" style="background:#1e748f;border:none; padding:10px;font-size:16px;color:white;width:100%">Logout</button>
                                    </form>
                                 </ul>
                                 <?php else: ?>
                                 <a href="javascript:void(0)"><img src="<?php echo e(url('front_website/images/user.png'), false); ?>" alt="User" class="user-hm-logo" /></a>
                                 <ul class="drop-menu-typ">
                                 <li><a href="<?php echo e(route('loginpage'), false); ?>">Login</a></li>
                                 <li><a href="<?php echo e(route('signpage'), false); ?>">Sign Up</a></li>
                                 </ul>
                                 <?php endif; ?>

                              </li>


                           </ul>
                        </div>
                     </nav>

                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="mobile-menu">
         <div class="menu-backdrop"></div>
         <div class="close-btn"><span class="icon fas fa-times"></span></div>
         <nav class="menu-box">
            <div class="nav-logo"><a href="<?php echo e(route('home'), false); ?>"><img src="<?php echo e(asset('public/front_website/images/logo.png'), false); ?>" alt="" title=""></a></div>
            <div class="menu-outer"></div>

         </nav>
      </div>
   </header>

   <?php echo $__env->yieldContent('content'); ?>
   <footer class="footer-bgclr">
      <div class="scroll-to-top scroll-to-target theme-btn btn-style-one" data-target="html">
         <span class="txt"><i class="fas fa-arrow-up"></i></span>
      </div>

      <div class="container-fluid">
         <div class="row">
            <div class="col-md-3">

               <ul class="footer-list-fnt">
                  <li class="mt-3">
                     <a href="<?php echo e(route('about-us'), false); ?>"><i class="bi bi-chevron-right"></i>About Us</a>
                  </li>
                  <li class="mt-3"> <a href="<?php echo e(route('contact-us'), false); ?>"><i class="bi bi-chevron-right"></i>Contact Us</a></li>
                  <li class="mt-3"> <a href="<?php echo e(route('privacy'), false); ?>"><i class="bi bi-chevron-right"></i>Privacy Policy</a></li>
                  <li class="mt-3"><a href="<?php echo e(route('terms'), false); ?>"><i class="bi bi-chevron-right"></i>Terms & Conditions</a></li>
                  <li class="mt-3"><a href="<?php echo e(route('shipping'), false); ?>"><i class="bi bi-chevron-right"></i>Shipping Policy</a></li>
                  <li class="mt-3"><a href="<?php echo e(route('cancellation'), false); ?>"><i class="bi bi-chevron-right"></i>Cancellation & Refund Policy</a></li>

               </ul>

            </div>

            <div class="col-md-3">
               <ul class="footer-list-fnt">
                  <li class="mt-3">
                     <a href="<?php echo e(url('it-services/web-design'), false); ?>"><i class="bi bi-chevron-right"></i>Web Design</a>
                  </li>
                  <li class="mt-3"> <a href="<?php echo e(url('it-services/graphic-design'), false); ?>"><i class="bi bi-chevron-right"></i>Graphic Design</a></li>
                  <li class="mt-3"> <a href="<?php echo e(url('it-services/web-development'), false); ?>"><i class="bi bi-chevron-right"></i>Web Development</a></li>
                  <li class="mt-3"><a href="<?php echo e(url('it-services/digital-marketing'), false); ?>"><i class="bi bi-chevron-right"></i>Digital Marketing</a></li>
                  <li class="mt-3"><a href="<?php echo e(url('it-services/e-commerce'), false); ?>"><i class="bi bi-chevron-right"></i>E-Commerce</a></li>
                  <li class="mt-3"><a href="<?php echo e(url('it-services/photography'), false); ?>"><i class="bi bi-chevron-right"></i>Photography</a></li>



               </ul>
            </div>
            <div class="col-md-3">
               <ul class="footer-list-fnt">
                  <li class="mt-3">
                     <a href="<?php echo e(route('products'), false); ?>"><i class="bi bi-chevron-right"></i>IT Product</a>
                  </li>
                  <li class="mt-3"> <a href="<?php echo e(route('projects'), false); ?>"><i class="bi bi-chevron-right"></i>Projects</a></li>
                  <li class="mt-3"> <a href="<?php echo e(route('blogs'), false); ?>"><i class="bi bi-chevron-right"></i>Blogs</a></li>
                  <li class="mt-3"><a href="<?php echo e(route('quotation'), false); ?>"><i class="bi bi-chevron-right"></i>Get Quotation</a></li>

               </ul>
            </div>

            <div class="col-md-3 mt-4">
               <h5>Newsletter</h5>
               <p style="font-size:14px;font-weight:500;color:#ededed">Sign up for alerts, our latest blogs, thoughts, and insights.</p>

               <input type="email" class="nws-letter-inputbox" placeholder="Your Email address">
               <div><button class="nws-letter-iconsz"><i class="bi bi-arrow-right fs-4"></i></button></div>
            </div>
         </div>
         <div class="footer-topline"></div>
         <div class="footer-bottom-box">
            <p style="margin-bottom:0px;color:white;font-size:13px;font-weight:400;letter-spacing:0.75px">Copyright © <?php echo e(date('Y'), false); ?> AHIT <a href="javascript:void(0)"></a> All right reserved</p>
            <a href="https://www.dmca.com/r/x1ylr5m" target="blank" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca_protected_sml_120o.png?ID=f5d0ffbb-3fbb-4691-8d48-bfcf63b3c864"  alt="DMCA.com Protection Status" class="mb-2"/></a>
            <div>
               <a href="https://api.whatsapp.com/send?phone=8005779031" target="blank"><img src="/public/front_website/images/whatsapp.png" alt="icon" class="footer-box-icon"></a>
               <a href="https://www.facebook.com/AHITechno/" target="blank"><img src="/public/front_website/images/facebook.png" alt="icon" class="footer-box-icon"></a>
               <a href="https://www.instagram.com/ahitechno/" target="blank"><img src="/public/front_website/images/instagram.png" alt="icon" class="footer-box-icon"></a>
               <a href="https://www.youtube.com/channel/UCe04ZgE5RehKAfEGq4soldg" target="blank"><img src="/public/front_website/images/youtube.png" alt="icon" class="footer-box-icon"></a>
               <a href="https://in.pinterest.com/ahitpvtltd" target="blank"><img src="/public/front_website/images/pinterest.png" alt="icon" class="footer-box-icon"></a>
               <a href="https://twitter.com/AH_InfoTech" target="blank"><img src="/public/front_website/images/twitter.png" alt="icon" class="footer-box-icon"></a>
             
            </div>
         </div>

      </div>
   </footer>








   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
   <script src="<?php echo e(asset('public/front_website/js/jquery.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/popper.min.js'), false); ?>"></script>
   <!-- <script src="<?php echo e(asset('public/front_website/js/bootstrap.min.js'), false); ?>"></script>  -->

   <!-- <script src="<?php echo e(asset('public/front_website/js/bootstrap.bundle.min.js'), false); ?>"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

   <script src="<?php echo e(asset('public/front_website/js/jquery.fancybox.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/appear.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/jquery.mCustomScrollbar.concat.min.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/nav-tool.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/jquery-ui.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/parallax.min.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/tilt.jquery.min.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/jquery.paroller.min.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/owl.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/mixitup.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/wow.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/script.js'), false); ?>"></script>
   <script src="<?php echo e(asset('public/front_website/js/color-settings.js'), false); ?>"></script>

   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->
   <script src="//kenwheeler.github.io/slick/slick/slick.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
   <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>


   <script>
      <?php echo toastr_js(); ?>
      <?php echo app('toastr')->render(); ?>
      <?php echo $__env->yieldContent('javascript'); ?>
   </script>

   <script type="text/javascript">
      var cursor = $(".cursor"),
         follower = $(".cursor-follower");

      var posX = 0,
         posY = 0;
      var mouseX = 0,
         mouseY = 0;


      $(document).on("mousemove", function(e) {
         mouseX = e.pageX;
         mouseY = e.pageY;
      });

      $(".link").on("mouseenter", function() {
         cursor.addClass("active");
         follower.addClass("active");
      });

      $(".link").on("mouseleave", function() {
         cursor.removeClass("active");
         follower.removeClass("active");
      });
   </script>

   <script>
      let faqLabel = document.querySelectorAll(".faq-label");

      faqLabel.forEach(item => item.onclick = () => {
         //selektuje Answer
         item.nextElementSibling.classList.toggle('active');


         let labelIcon = item.lastElementChild;
         let icons = labelIcon.lastElementChild;
         icons.classList.toggle('rotate');


      })
   </script>
   <script>
      var fixmeTop = $('.fixme').offset().top;
      $(window).scroll(function() {
         var currentScroll = $(window).scrollTop();
         if (currentScroll >= fixmeTop) {
            $('.fixme').css({
               position: 'fixed',
               top: '120px',
               right: '4%',
               width: '400px'
            });
         } else {
            $('.fixme').css({
               position: 'static'
            });
         }
      });
   </script>

   <script>
      $(document).ready(function() {
         $("#news-slider").owlCarousel({
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [980, 2],
            itemsMobile: [600, 1],
            navigation: true,
            navigationText: ["", ""],
            pagination: true,
            autoPlay: true
         });
      });
   </script>

   <script>
      $(document).ready(function() {
         "use strict";

         //------- Initialising Slick Slider
         $('.item-slider').slick({
            arrows: false,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            slidesToShow: 4,
            autoplay: true,
            responsive: [{
                  breakpoint: 1024,
                  settings: {
                     slidesToShow: 3
                  }
               },
               {
                  breakpoint: 900,
                  settings: {
                     slidesToShow: 2
                  }
               },
               {
                  breakpoint: 480,
                  settings: {
                     slidesToShow: 1
                  }
               }
            ]
         });

         //------- Custom Arrows click functionality
         $(document).on('click', '.prevSlide', function() {
            $('.item-slider').slick('slickPrev');
         });

         $(document).on('click', '.nextSlide', function() {
            $('.item-slider').slick('slickNext');
         });

         //------- Click to filter slides according to user's choice

         $(document).on('click', '.filter-option li a', function() {
            $('.filter-option li a').removeClass('active');
            $(this).addClass('active');

            var cat = $(this).attr('data-category');

            if (cat !== 'all') {
               $('.item-slider').slick('slickUnfilter');

               $('.item-slider li').each(function() {
                  $(this).removeClass('slide-shown');
               });

               $('.item-slider li[data-match=' + cat + ']').addClass('slide-shown');

               $('.item-slider').slick('slickFilter', '.slide-shown');
            } else {
               $('.item-slider li').each(function() {
                  $(this).removeClass('slide-shown');
               });
               $('.item-slider').slick('slickUnfilter');
            }
         });

      });
   </script>

   <script>
      $(document).ready(function() {
         $(".SlickCarousel").slick({
            rtl: false, // If RTL Make it true & .slick-slide{float:right;}
            autoplay: true,
            autoplaySpeed: 5000, //  Slide Delay
            speed: 800, // Transition Speed
            slidesToShow: 3, // Number Of Carousel
            slidesToScroll: 1, // Slide To Move 
            pauseOnHover: false,
            //  appendArrows:$(".Container .Head .Arrows"), 
            prevArrow: '<span class="Slick-Prev"></span>',
            nextArrow: '<span class="Slick-Next"></span>',
            easing: "linear",

            responsive: [{
                  breakpoint: 801,
                  settings: {
                     slidesToShow: 3,
                  }
               },
               {
                  breakpoint: 641,
                  settings: {
                     slidesToShow: 2,
                  }
               },
               {
                  breakpoint: 481,
                  settings: {
                     slidesToShow: 1,
                  }
               },
            ],
         })
      })
   </script>

   <script>
      $(document).ready(function() {
         $(".SlickCarousel-card").slick({
            rtl: false, // If RTL Make it true & .slick-slide{float:right;}
            autoplay: true,
            autoplaySpeed: 5000, //  Slide Delay
            speed: 800, // Transition Speed
            slidesToShow: 2, // Number Of Carousel
            slidesToScroll: 1, // Slide To Move 
            pauseOnHover: false,
            //  appendArrows:$(".Container .Head .Arrows"), 
            prevArrow: '<span class="Slick-Prev"></span>',
            nextArrow: '<span class="Slick-Next"></span>',
            easing: "linear",

            responsive: [{
                  breakpoint: 801,
                  settings: {
                     slidesToShow: 2,
                  }
               },
               {
                  breakpoint: 641,
                  settings: {
                     slidesToShow: 2,
                  }
               },
               {
                  breakpoint: 481,
                  settings: {
                     slidesToShow: 1,
                  }
               },
            ],
         })
      })
   </script>




   <script>
      $(document).ready(function() {
         $(".SlickCarousel-card1").slick({
            rtl: false, // If RTL Make it true & .slick-slide{float:right;}
            autoplay: true,
            autoplaySpeed: 6000, //  Slide Delay
            speed: 800, // Transition Speed
            slidesToShow: 2, // Number Of Carousel
            slidesToScroll: 1, // Slide To Move 
            pauseOnHover: false,
            //  appendArrows:$(".Container .Head .Arrows"), 
            prevArrow: '<span class="Slick-Prev"></span>',
            nextArrow: '<span class="Slick-Next"></span>',
            easing: "linear",

            responsive: [{
                  breakpoint: 801,
                  settings: {
                     slidesToShow: 2,
                  }
               },
               {
                  breakpoint: 641,
                  settings: {
                     slidesToShow: 2,
                  }
               },
               {
                  breakpoint: 481,
                  settings: {
                     slidesToShow: 1,
                  }
               },
            ],
         })
      })
   </script>


   <script>
      $(document).ready(function() {
         $(".main-Carousel-card").slick({
            rtl: false, // If RTL Make it true & .slick-slide{float:right;}
            autoplay: true,
            autoplaySpeed: 6000, //  Slide Delay
            speed: 800, // Transition Speed
            slidesToShow: 4, // Number Of Carousel
            slidesToScroll: 1, // Slide To Move 
            pauseOnHover: false,
            //  appendArrows:$(".Container .Head .Arrows"), 
            prevArrow: '<span class="Slick-Prev"></span>',
            nextArrow: '<span class="Slick-Next"></span>',
            easing: "linear",

            responsive: [{
                  breakpoint: 801,
                  settings: {
                     slidesToShow: 3,
                  }
               },
               {
                  breakpoint: 641,
                  settings: {
                     slidesToShow: 2,
                  }
               },
               {
                  breakpoint: 481,
                  settings: {
                     slidesToShow: 1,
                  }
               },
            ],
         })
      })
   </script>


   <script>
      $(document).ready(function() {
         $(".blogmain-Carousel-card").slick({
            rtl: false, // If RTL Make it true & .slick-slide{float:right;}
            autoplay: true,
            autoplaySpeed: 5000, //  Slide Delay
            speed: 1000, // Transition Speed
            slidesToShow: 2, // Number Of Carousel
            slidesToScroll: 1, // Slide To Move 
            pauseOnHover: false,
            //  appendArrows:$(".Container .Head .Arrows"), 
            prevArrow: '<span class="Slick-Prev"></span>',
            nextArrow: '<span class="Slick-Next"></span>',
            easing: "linear",

            responsive: [{
                  breakpoint: 801,
                  settings: {
                     slidesToShow: 2,
                  }
               },
               {
                  breakpoint: 641,
                  settings: {
                     slidesToShow: 1,
                  }
               },
               {
                  breakpoint: 481,
                  settings: {
                     slidesToShow: 1,
                  }
               },
            ],
         })
      })
   </script>



   <script>
      $(document).ready(function() {
         $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,

            pauseOnHover: false,
            responsive: [{
               breakpoint: 768,
               settings: {
                  slidesToShow: 4
               }
            }, {
               breakpoint: 520,
               settings: {
                  slidesToShow: 3
               }
            }]
         });
      });
   </script>

   <script>
      $(document).ready(function() {
         $('.testimonial-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,

            pauseOnHover: false,
            responsive: [{
               breakpoint: 768,
               settings: {
                  slidesToShow: 2
               }
            }, {
               breakpoint: 520,
               settings: {
                  slidesToShow: 1
               }
            }]
         });
      });
   </script>

   <script>
      $(document).ready(function() {
         $('.related-product').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            dots: false,

            pauseOnHover: false,
            responsive: [{
               breakpoint: 768,
               settings: {
                  slidesToShow: 2
               }
            }, {
               breakpoint: 520,
               settings: {
                  slidesToShow: 1
               }
            }]
         });
      });
   </script>

   <script>
      function openProject(evt, cityName) {
         var i, tabcontent, tablinks;
         tabcontent = document.getElementsByClassName("tabcontent");
         for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
         }
         tablinks = document.getElementsByClassName("tablinks");
         for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
         }
         document.getElementById(cityName).style.display = "block";
         evt.currentTarget.className += " active";
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
   </script>
   <script>
      var buttonPlus = $(".qty-btn-plus");
      var buttonMinus = $(".qty-btn-minus");

      var incrementPlus = buttonPlus.click(function() {
         var $n = $(this)
            .parent(".qty-container")
            .find(".input-qty");
         $n.val(Number($n.val()) + 1);
      });

      var incrementMinus = buttonMinus.click(function() {
         var $n = $(this)
            .parent(".qty-container")
            .find(".input-qty");
         var amount = Number($n.val());
         if (amount > 1) {
            $n.val(amount - 1);
         }
      });
   </script>


   <script>
      document.addEventListener("DOMContentLoaded", function() {
         var reviewFixed = document.getElementById('review-fixed');

         // Show the element initially
         reviewFixed.style.display = 'block';

         // Hide the element after 30 seconds
         setTimeout(function() {
            reviewFixed.style.display = 'none';
         }, 15000); // 30 seconds in milliseconds
      });
   </script>

   <script>
      const customSelect = document.querySelector(".custom-select");
      const selectBtn = document.querySelector(".select-button");

      const selectedValue = document.querySelector(".selected-value");
      const optionsList = document.querySelectorAll(".select-dropdown li");

      // add click event to select button
      selectBtn.addEventListener("click", () => {
         // add/remove active class on the container element
         customSelect.classList.toggle("active");
         // update the aria-expanded attribute based on the current state
         selectBtn.setAttribute(
            "aria-expanded",
            selectBtn.getAttribute("aria-expanded") === "true" ? "false" : "true"
         );
      });

      optionsList.forEach((option) => {
         function handler(e) {
            // Click Events
            if (e.type === "click" && e.clientX !== 0 && e.clientY !== 0) {
               selectedValue.textContent = this.children[1].textContent;
               customSelect.classList.remove("active");
            }
            // Key Events
            if (e.key === "Enter") {
               selectedValue.textContent = this.textContent;
               customSelect.classList.remove("active");
            }
         }

         option.addEventListener("keyup", handler);
         option.addEventListener("click", handler);
      });
   </script>


<script>

   $(document).ready(function (){

      loadcart()
$.ajaxSetup({
   headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
})

   });
   function loadcart(){
      $.ajax({
         method: "GET",
         url: "/load-cart-data",
         success: function (response){
            $('.cart-count').html('');
            $('.cart-count').html(response.count);
         // console.log(response.count)

         }
      });
   }
</script>

<script>
   jQuery('.faq__accordian-heading').click(function(e){
        e.preventDefault();
        if (!jQuery(this).hasClass('active')) {
            jQuery('.faq__accordian-heading').removeClass('active');
            jQuery('.faq__accordion-content').slideUp(500);
            jQuery(this).addClass('active');
            jQuery(this).next('.faq__accordion-content').slideDown(500);
        }
        else if (jQuery(this).hasClass('active')) {
            jQuery(this).removeClass('active');
            jQuery(this).next('.faq__accordion-content').slideUp(500);
        }
    });
   </script>

<script>
   const items = document.querySelectorAll('.accordion button');

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach((item) => item.addEventListener('click', toggleAccordion));

   </script>

<script>
function myService() {
  location.replace("<?php echo e(url('it-service'), false); ?>")
}
</script>

</body>

</html><?php /**PATH /home/agroupso/ahitechno.com/resources/views/front_website/layout/app.blade.php ENDPATH**/ ?>