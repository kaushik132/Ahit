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
        "name": "<?php echo e($blog->blogCategory->name, false); ?>",
        "item": "<?php echo e(route('blogs',$blog->blogCategory->slug), false); ?>"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "<?php echo e($blog->title, false); ?>",
        "item": "<?php echo e($canocial, false); ?>"
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
    "Url" :"<?php echo e($canocial, false); ?>",
    "name":"<?php echo e($seo_data['seo_title'], false); ?>",
    "description":"<?php echo e($seo_data['description'], false); ?>",
    "publisher":{"@type":"Organization","name":"Ahit Techno"},
    "keywords":"<?php echo e($seo_data['keywords'], false); ?>"}
    </script>


 <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://ahitechno.com/blog/<?php echo e($blog->slug, false); ?>"
  },
  "headline": "<?php echo e($blog->title, false); ?>",
  "description": "<?php echo e($blog->description, false); ?>",
  "image": "<?php echo e(asset('storage/'.$blog->image), false); ?>",  
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
  "datePublished": "<?php echo e(date('Y-m-d',strtotime($blog->created_at)), false); ?>",
  "dateModified": "<?php echo e(date('Y-m-d',strtotime($blog->updated_at)), false); ?>"
}
</script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<section class="page-title" style="background-image: url(<?php echo e(asset('public/front_website/images/bgimg.jpg'), false); ?>);">
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
                            <figure class="image"><img src="<?php echo e(asset('storage/'.$blog->image), false); ?>" alt="<?php echo e($blog->alt, false); ?>"> </figure>

                        </div>
                        <div class="caption-box">
                            <ul class="category">
                                <li><a href="<?php echo e(route('blogs',$blog->blogCategory->slug), false); ?>"><?php echo e($blog->blogCategory->name, false); ?></a></li>

                            </ul>
                            <ul class="info">
                                <li><i class="fas fa-calendar-alt"></i><?php echo e(date('d-F-Y',strtotime($blog->created_at)), false); ?></li>
                                <li>|</li>
                                <li><i class="fas fa-user-alt"></i>By Admin</li>
                            </ul>
                            <h4 style="text-align: justify"><?php echo $blog->title; ?></h4>
                            <div class="blg-dtl-main-vw" style="text-align: justify">
                                <?php echo $blog->content; ?>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-side col-lg-4 col-md-12 col-sm-12 side_content">
            <aside class="sidebar default-sidebar" style="margin-top:0px">
            

                <div class="sidebar-widget categories">
                <div class="sidebar-title mb-3"><h5 style="color:#007bff"><b>Catagories</b></h5></div>
                    <ul class="cat-list">
                        <?php $__currentLoopData = $blogcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('blogs',$cat_value->slug), false); ?>"><i class="fas fa-angle-double-right"></i><?php echo e($cat_value->name, false); ?><span><?php echo e($cat_value->blogs_count, false); ?></span></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="sidebar-widget latest-news " style="position:sticky !important">
                    <div class="sidebar-title"><h5 style="color:#007bff"><b>Recent Post</b></h5></div>
                    <div class="widget-content">
                        <?php $__currentLoopData = $similarblog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <article class="post">
                            <div class="post-thumb">
                                <a href="javascript:void(0)"><img src="<?php echo e(asset('storage/'.$similar_value->image), false); ?>" alt="" /></a>
                            </div>
                            <h3><a href="<?php echo e(route('blogdetails', ['id' => $similar_value->slug]), false); ?>"><?php echo e($similar_value->title, false); ?></a></h3>
                            <div class="post-info"><?php echo e(date('d-M-Y',strtotime($similar_value->created_at)), false); ?></div>
                        </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
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
                        <?php echo $value; ?>?
                    </div>
                    <div class="faq-label-icon">
                        <span class="material-icons">
                            expand_more
                        </span>
                    </div>
                </div>
                <div class="faq-answer ">
                    <div class="faq-answer-content">
                        <?php echo $answers[$key]; ?>.
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
      "mainEntity":<?php  echo json_encode($mainEntity,JSON_UNESCAPED_SLASHES);  ?>
    }
    </script>

 <?php } ?>


</div>



<!-- -------------------------------------Related Blogs--------------------------------------------- -->
<div class="container-fluid mt-5 mb-5">
    <h3 class="mt-3 mb-4 text-center"><b>Related Blogs</b></h3>
    <section class="related-product slider">

        <?php $__currentLoopData = $relatedBlog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="slide">
            <div class="">


                <div class="inner-box newbox-view">
                    <div class="lower-content">
                        <div class="image-box">
                            <figure class="image">
                                <a href="<?php echo e(route('blogdetails', ['id' => $project->slug]), false); ?>">
                                    <img src="<?php echo e(asset('storage/'.$project->image), false); ?>" alt="<?php echo e($project->alt, false); ?>" height="100" width="200">
                                </a>
                            </figure>
                        </div>
                        <div class="caption-box">

                            <h5 class="category">

                                <li><a href="<?php echo e(route('blogs',$project->blogCategory['slug']), false); ?>"><?php echo e($project->blogCategory['name'], false); ?></a></li>

        </h5>

                            <ul class="info mt-1 mb-1" style="font-size: 12px;">
                                <li><i class="fas fa-calendar-alt"></i> <?php echo e(date('F d,Y',strtotime($project->created_at)), false); ?></li>
                            </ul>

                            <h6 style="margin-bottom: 30px; font-size: 12px;"><a href="<?php echo e(route('blogdetails', ['id' => $project->slug]), false); ?>"><?php echo Str::limit($project->title, 10); ?></a></h6>

                            <a href="<?php echo e(route('blogdetails', ['id' => $project->slug]), false); ?>" class="theme-btn btn-style-one"><span class="txt">Read More</span></a>
                        </div>




                    </div>
                </div>


            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






    </section>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('front_website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/agroupso/ahitechno.com/resources/views/front_website/page/single.blade.php ENDPATH**/ ?>