<?php $__env->startSection('content'); ?>

<style>

   /* .pro-smcode-fnt:hover{
    border:solid 1px grey;
    border-radius:5px;
    
   } */

   .pagination{
      justify-content: center !important;
   }
</style>
<section class="page-title" style="background-image: url(<?php echo e(asset('public/front_website/images/bgimg.jpg'), false); ?>);">
   <div id="stars"></div>
   <div id="stars2"></div>
   <div id="stars3"></div>
   <div class="auto-container">
      <div class="inner-container clearfix">
         <div class="title-box">
            <h1>IT Products</h1>
            <ul class="bread-crumb clearfix">
               <li><a href="<?php echo e(route('home'), false); ?>">Home</a></li>
               <li style="color: #fff;">IT Products</li>
            </ul>
         </div>
      </div>
   </div>
</section>

  
<?php if(session('success')): ?>
<div class="alert alert-success">
  <?php echo e(session('success'), false); ?>

</div> 
<?php endif; ?>
<div class="sidebar-page-container">
   <div class="auto-container">
      <div class="row clearfix">
         <div class="content-side col-xl-12 col-lg-12 col-md-12">
            <div class="our-shop">
               <div class="row clearfix">
                  <?php $__currentLoopData = $itproject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="shop-item col-xl-3 col-lg-6 col-md-6 col-sm-12">
                     <div class="inner-box newbox-view">
                        <div class="lower-content">
                           <p class="pro-smcode-fnt text-center"><b>Product Code : <?php echo e($project->pro_code, false); ?></b></p>
                          <!-- <div class="text-center">
                          <button class="cutout">Product Code : AHIT_SMM</button>
                          </div>  -->
                          <div class="d-flex justify-content-between">
                          <h3 class="mt-3 pro-sm-main-heading"><?php echo e($project->productCategory['name'], false); ?></h3>
                          <a href="<?php echo e(route('wishlist',$project->id), false); ?>" class="mt-3"><div style="border:solid 1px #444;border-radius:50%;width:30px;height:30px;text-align:center"><i class="bi bi-heart-fill"></i></div></a>
                          </div>
                          
                           <p class="pro-dtl-main-vw"><span style="color:black !important">Product Name :</span> <?php echo e($project->title, false); ?></p>
                           <p class="pro-dtl-main-vw"><span style="color:black !important">Product Type :</span> <?php echo e($project->pro_type, false); ?></p>
                           <p class="pro-dtl-main-vw"><span style="color:black !important">Duration :</span> <?php echo e($project->duration, false); ?></p>
                           <div class="d-flex justify-content-between flex-wrap mt-3">
                           <p class="pro-dtl-main-vw"><span style="color:black !important">AMT :</span> <span style="font-size:20px;font-weight:600"><i class="bi bi-currency-rupee"></i><?php echo e($project->amt, false); ?></span></p>
                           <p class="pro-dtl-main-vw"><span style="color:black !important">GST :</span> <?php echo e($project->gst, false); ?></p>
                           </div>
                         
                           <hr>
                           <div class="clearfix mt-3 d-flex justify-content-between">
                              <!-- <div class="pull-left"> -->
                              <a class="add-cart" href="<?php echo e(route('cart',$project->id), false); ?>"><span class="fa fa-cart-plus"></span>Add To Cart</a>
                              
                              <a href="<?php echo e(route('single-product',$project->slug), false); ?>" class="view-dtls-btn">View details <span class="fa fa-arrow-right"></span></a>
                              <!-- </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         


           
               </div>

              

               
               <!-- <div class="styled-pagination">
                  <ul class="clearfix">
                     <li class="prev-post">
                        <a href="javascript:void(0)"><span class="fa fa-angle-left"></span></a>
                     </li>
                     <li><a href="javascript:void(0)">1</a></li>
                     <li class="active"><a href="javascript:void(0)">2</a></li>
                     <li><a href="javascript:void(0)">3</a></li>
                     <li class="next-post">
                        <a href="javascript:void(0)"><span class="fa fa-angle-right"></span> </a>
                     </li>
                  </ul>
                 

               </div> -->
               <div class="mt-3">
               <?php echo e($itproject->links(), false); ?>

               </div>
              
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front_website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/agroupso/ahitechno.com/resources/views/front_website/page/products.blade.php ENDPATH**/ ?>