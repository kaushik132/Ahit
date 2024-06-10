 

<?php $__env->startSection('javascript'); ?>


<script src="<?php echo e(asset('public/front_website/js/jquery.validate.min.js'), false); ?>"></script>

<script type="text/javascript">
 $(document).ready(function () {
  $("#contact-form").validate({
   rules: {
    username: {
     required: true,
    },

    email: {
     required: true,

     email: true,
    },

    phone: {
     required: true,
    },

    message: {
     required: true,
    },
   },
  });
 });
</script>
<?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>

<style type="text/css">
 .error {
  color: red !important;
 }
 .inner{
  background-color:#ffffff;
  box-shadow:2px 2px 10px 2px #d6d6d6;
  padding:15px;
  border-radius:5px;
  border:solid 1px #cccccc;
 }
 .contact-page-section{
  margin-top:-80px;
 }
 .now-esy-box-vw{
  padding-top:-50px
 }
</style>

<section class="page-title" style="background-image: url(<?php echo e(asset('public/front_website/images/bgimg.jpg'), false); ?>);">
 <div id="stars"></div>

 <div id="stars2"></div>

 <div id="stars3"></div>

 <div class="auto-container">
  <div class="inner-container clearfix">
   <div class="title-box">
    <h1>Contact Us</h1>

    <ul class="bread-crumb clearfix">
     <li><a href="<?php echo e(route('home'), false); ?>">Home</a></li>

     <li style="color: #fff;">Contact Us</li>
    </ul>
   </div>
  </div>
 </div>
</section>

<section class="contact-page-section">
 <div class="auto-container">

    <div class="contact-info">
        <div class="row">
            <div class="info-block col-lg-4 col-md-4 col-sm-12 mt-3">
             <div class="inner">
              <div class="icon-box"><i class="flaticon flaticon-stopwatch"></i></div>
        
              <div class="text-box">
               <h4>Time</h4>
        
               <p>
                10:00am to 6:00pm <br />
        
                Sunday Closed
               </p>
              </div>
             </div>
            </div>
        
            <div class="info-block col-lg-4 col-md-4 col-sm-12 mt-3">
             <div class="inner">
              <div class="icon-box"><i class="flaticon flaticon-pin"></i></div>
        
              <div class="text-box">
               <h4>Location</h4>
        
               <p>31 Arjun Colony,Amer Road, Behind Brahmpuri,Jaipur</p>
              </div>
             </div>
            </div>
        
            <div class="info-block col-lg-4 col-md-4 col-sm-12 mt-3">
             <div class="inner">
              <div class="icon-box"><i class="flaticon flaticon-call"></i></div>
        
              <div class="text-box">
               <h4>Email / Phone</h4>
        
               <p><a href="tel:+918005779031">Call: +91 8005779031</a></p>
        
               <p><a href="javascript:void(0)">ahitpvtltd@gmail.com</a></p>
              </div>
             </div>
            </div>
           </div>

  </div>

 </div>
</section>

<section class="now-esy-box-vw">
<div class="container-fluid">
<div class="row">
    <div class="form-column col-lg-12 col-md-12 col-sm-12">
        <div class="inner-column">
         <div class="sec-title text-center">
          <h6 class="subtitle mt-3">Now Very Easy</h6>
    
          <h2>
           Don’t hesitate to contact <br />
    
           with us now
          </h2>
         </div>
    
         <div class="row">
          <div class="col-lg-6">
           <div class="inner-column">
            <div class="image-box">
             <figure class="alphabet-img wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"><img src="<?php echo e(asset('public/front_website/images/contactimg.png'), false); ?>" alt="about img" /></figure>
            </div>
           </div>
          </div>
    
          <div class="col-lg-6">
           <div class="contact-form bg-white shadow" style="border-radius: 15px; padding: 20px;border:solid 1px #cccccc">
            <form class="" action="<?php echo e(route('contacfrom'), false); ?>" id="contact-form" method="POST">
             <?php echo csrf_field(); ?>
    
             <div class="row">
              <div class="form-group col-lg-6 col-md-12 col-sm-12">
               <input type="text" name="name" name="name" placeholder="Name" required="" style="border:solid 1px #028AA2" />
              </div>
    
              <div class="form-group col-lg-6 col-md-12 col-sm-12"><input type="text" name="phone" placeholder="Phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9+.]/g, '').replace(/(\..*?)\..*/g, '$1');" required="" style="border:solid 1px #028AA2" /></div>
    
              <div class="form-group col-lg-6 col-md-12 col-sm-12"><input type="text" name="company" placeholder="Company" style="border:solid 1px #028AA2" /></div>
    
              <div class="form-group col-lg-6 col-md-12 col-sm-12"><input type="email" name="email" placeholder="Email" required="" style="border:solid 1px #028AA2" /></div>
    
              <div class="form-group col-lg-12 col-md-12 col-sm-12"><textarea name="message" placeholder="Massage" style="border:solid 1px #028AA2"></textarea></div>
    
              <div class="form-group col-lg-12 col-md-12 col-sm-12 text">
               <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="txt">Submit</span></button>
              </div>
             </div>
            </form>
           </div>
          </div>
    
          <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
            <div class="inner-column">
             <div class="map-outer">

              <div class="mapouter mb-5"><div class="gmap_canvas"><iframe width="100%" height="539" id="gmap_canvas" src="https://maps.google.com/maps?q=AHIT%2C+Old+Ramgarh+mod%2C+Bus+stand%2C+Plot+No.+57%2C+Gurukripa+Enclave%2C+Amer+Rd%2C+near+Indusind+Bank%2C+Nagar+Nigam+Colony%2C+Jaipur%2C+Rajasthan+302002&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.analarmclock.com/"></a><br><a href="https://www.onclock.net/"></a><br><style>.mapouter{position: relative;text-align: right;height: 539px;width: 100%;}</style><a href="https://www.ongooglemaps.com">embedding maps in website</a><style>.gmap_canvas{overflow: hidden;background: none !important;height: 539px;width: 100%;}</style></div></div>

               
             </div>
            </div>
        
           </div>
    
         </div>
        </div>
       </div>
</div>
</div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front_website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/agroupso/ahitechno.com/resources/views/front_website/page/contact-us.blade.php ENDPATH**/ ?>