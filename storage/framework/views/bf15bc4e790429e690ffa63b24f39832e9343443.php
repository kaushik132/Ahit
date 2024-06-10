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
        "name": "Projects",
        "item": "https://ahitechno.com/project_details"
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

.form-main-select{
    width:100%;
    max-width:300px;
    border:solid 1px grey;
    padding:10px;
    border-radius:6px;
}

    </style>

   <section class="page-title" style="background-image: url(<?php echo e(asset('public/front_website/images/bgimg.jpg'), false); ?>);">

                <div id="stars"></div>

                <div id="stars2"></div>

                <div id="stars3"></div>

                <div class="auto-container">

                    <div class="inner-container clearfix">

                    <div class="title-box">
                <h1>Projects</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="<?php echo e(route('home'), false); ?>">Home</a></li>
                    <li class="text-white">Projects</li>
                </ul>
            </div>

                    </div>

                </div>

            </section>

            <!-- ------------------Filter Start--------------------------- -->
            <div class="container mt-4">
    <form action="" class="text-end">
        <select name="filter" id="filter" class="form-main-select">
            <option value="" style="margin-top:15px !important">Filter</option>
            <?php $__currentLoopData = $projectfullter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hello): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e(route('projects',$hello->slug), false); ?>" style="margin-top:15px !important"><?php echo e($hello->name, false); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </form>
</div>

            <!-- ------------------Filter End--------------------------- -->

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
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="news-block style-three col-lg-4 col-md-6 col-sm-12"> 
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                         <a href="<?php echo e(route('projectdetails', ['id' => $project->slug]), false); ?>"> 
                                            <img src="<?php echo e(asset('storage/'.$project->image), false); ?>" alt="<?php echo e($project->alt, false); ?>" height="100" width="200">
                                          </a>
                                       </figure>
                                    </div> 
                                    <div class="caption-box">

                                    <ul class="category">

                                        <li><a href="<?php echo e(route('projects',$project->projectCategory['slug']), false); ?>"><?php echo e($project->projectCategory['name'], false); ?></a></li>
                                    
                                     </ul>

                                    <ul class="info"> 
                                        <li><i class="fas fa-calendar-alt"></i><?php echo e(date('F d,Y',strtotime($project->created_at)), false); ?></li>
                                    </ul>

                                    <h4><a href="<?php echo e(route('projectdetails', ['id' => $project->slug]), false); ?>"><?php echo Str::limit($project->title, 25); ?></a></h4>

                                    <a href="<?php echo e(route('projectdetails', ['id' => $project->slug]), false); ?>" class="theme-btn btn-style-one"><span class="txt">Read More</span></a>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3 py-5">
                                <?php echo e($projects->onEachSide(1)->links(), false); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <script>
    // Get the select element
    const selectElement = document.getElementById('filter');

    // Add event listener to detect changes
    selectElement.addEventListener('change', function() {
        // Get the selected option's value
        const selectedValue = selectElement.value;

        // Do whatever you want with the selected value
        console.log(selectedValue); // For example, log the value to the console
        // Or you can automatically redirect to the selected route
        window.location.href = selectedValue; // Redirect to the selected route
    });
</script>


           
<?php $__env->stopSection(); ?>

 
<?php echo $__env->make('front_website.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/agroupso/ahitechno.com/resources/views/front_website/page/project.blade.php ENDPATH**/ ?>