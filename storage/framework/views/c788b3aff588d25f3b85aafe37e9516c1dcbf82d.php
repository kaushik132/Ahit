<?php $__env->startSection('content'); ?>


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

    
         @media  only screen and (max-width:767.99px){
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

   <section class="page-title" style="background-image: url(<?php echo e(asset('public/front_website/images/bgimg.jpg'), false); ?>);">

                <div id="stars"></div>

                <div id="stars2"></div>

                <div id="stars3"></div>

                <div class="auto-container">

                    <div class="inner-container clearfix">

                    <div class="title-box">
                <h1>Blogs</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?php echo e(route('home'), false); ?>">Home</a></li>
                    <li class="text-white">Blogs</li>
                </ul>
            </div>

                    </div>

                </div>

            </section>

            <section class="news-section-three alternate">

                <div class="pattern-layer-one" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/cross-icon.png'), false); ?>);"></div>

                <div class="pattern-layer-two" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon-5.png'), false); ?>);"></div>

                <div class="pattern-layer-three" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon-6.png'), false); ?>);"></div>

                <div class="pattern-layer-four" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon.png'), false); ?>);"></div>

                <div class="pattern-layer-five" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon-1.png'), false); ?>);"></div>

                <div class="pattern-layer-six" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon-2.png'), false); ?>);"></div>

                <div class="pattern-layer-seven" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon-8.png'), false); ?>);"></div>

                <div class="pattern-layer-eight" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon-7.png'), false); ?>);"></div>

                <div class="pattern-layer-nine" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon-10.png'), false); ?>);"></div>

                <div class="pattern-layer-ten" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon-9.png'), false); ?>);"></div>

                <div class="pattern-layer-eleven" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon-3.png'), false); ?>);"></div>

                <div class="pattern-layer-tweleve" style="background-image: url(<?php echo e(asset('public/front_website/images/main-banner/banner-icon-4.png'), false); ?>);"></div>

                <div class="auto-container">

                  

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <div class="row">
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="news-block style-three col-md-6"> 
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                         <a href="<?php echo e(route('blogdetails', ['id' => $blog->slug]), false); ?>"> 
                                            <img src="<?php echo e(asset('storage/'.$blog->image), false); ?>" alt="<?php echo e($blog->alt, false); ?>" height="100" width="200">
                                          </a>
                                       </figure>
                                    </div> 
                                    <div class="caption-box">

                                    <ul class="category">

                                        <li><a href="<?php echo e(route('blogs',$blog->blogCategory['slug']), false); ?>"><?php echo e($blog->blogCategory['name'], false); ?></a></li>
                                    
                                     </ul>

                                    <ul class="info"> 
                                        <li><i class="fas fa-calendar-alt"></i><?php echo e(date('F d,Y',strtotime($blog->created_at)), false); ?></li>
                                    </ul>

                                    <h4><a href="<?php echo e(route('blogdetails', ['id' => $blog->slug]), false); ?>"><?php echo Str::limit($blog->title, 25); ?></a></h4>

                                    <a href="<?php echo e(route('blogdetails', ['id' => $blog->slug]), false); ?>" class="theme-btn btn-style-one"><span class="txt">Read More</span></a>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
      
                        <div class="col-md-4">


                        
                          
<!--                        

                    <center>
                           <form action="search" method="GET">
                            
                       
                            <input type="text"  name="search"/>
                           
                               <button type="submit">Search</button>
                            </span>
                              
                         </form> 
                    </center> -->
                            <!-- <form action="<?php echo e(url('search'), false); ?>" method="GET" class="">
                                <input type="search" class="form-control" name="search" placeholder="Search..." style="position:relative;"  value="<?php echo e(isset($search) ? $search : '', false); ?>">
                              <i class="bi bi-search blg-srch-icn"></i>
                            </form> -->
                        

                        <div class="sidebar-widget categories">
                    <div class="sidebar-title mb-3"><h5 style="color:#007bff"><b>Categories</b></h5></div>
                    <ul class="cat-list">
                        <?php $__currentLoopData = $blogcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('blogs',$cat_value->slug), false); ?>"><i class="fas fa-angle-double-right"></i><?php echo e($cat_value->name, false); ?><span><?php echo e($cat_value->blogs_count, false); ?></span></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                        </div>

                       
                    </div>
                      
                </div>
             
                            
                                <div class="page-list-vw text-center">
                                   
                                    <?php echo e($blogs->links(), false); ?>

                        </div>



            </section>


            

<?php $__env->stopSection(); ?>

 
<?php echo $__env->make('front_website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/agroupso/ahitechno.com/resources/views/front_website/page/blogs.blade.php ENDPATH**/ ?>