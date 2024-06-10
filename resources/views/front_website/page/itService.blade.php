@extends('front_website.layout.app')

@section('content')


<style>
   .tabs{
   display:flex;
   }
   .tabs h5{
   color:#000000;
   font-size:20px;
   font-weight:600;
   letter-spacing:0.75px;
   /* margin-left:15px; */
   border-bottom:solid 2px white;
   padding:5px;
   }
   .tabs h5.active{
   color:#d41904;
   border-bottom:solid 2px #0549a1;
   }
   .tablinksvw{
   cursor:pointer;
   }
   .serv-main-boximg{
   width:100%;
   height:360px;
   }
   .accordion-button{
   font-size:17px;
   font-weight:600;
   letter-spacing:0.75px;
   color:black;
   }
   .accordion-body p{
   font-size:15.5px;
   font-weight:500;
   letter-spacing:0.75px;
   /* color:black; */
   }
   .it-prdct-card-box{
   height:400px
   }
   .serv-main-boximg{
   height:auto;
   }
   @media only screen and (max-width:767.99px){
   .tabs{
   overflow-x:scroll;
   }
   .page-linksvws-tab{
   overflow-x: scroll;
   }
   .page-tablinks{
   width:120px
   }
   .all-categry-bgvw{
   display: none;
   }
   }
</style>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
   <div class="carousel-inner">
     
      <div class="carousel-item active">
         <img src="{{ asset('storage/'.$projectList[0]->servicename['home_banner1']) }}" class="d-block service-banner-size" alt="banner1">
      </div>

      <div class="carousel-item">
         <img src="{{ asset('storage/'.$projectList[0]->servicename['home_banner2']) }}" class="d-block service-banner-size" alt="banner2">
      </div>
      
      <div class="carousel-item">
         <img src="{{ asset('storage/'.$projectList[0]->servicename['home_banner3']) }}" class="d-block service-banner-size" alt="banner3">
      </div>
   </div>
   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   <span class="visually-hidden">Previous</span>
   </button>
   <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="visually-hidden">Next</span>
   </button>
</div>
<div class="link-tabs-vws-box">
   <div class="container">
      <div class="page-linksvws-tab">
         <a href="#tab1-box" class="text-decoration-none">
            <p class="text-white page-tablinks">Overview</p>
         </a>
         <a href="#tab2-box" class="text-decoration-none">
            <p class="text-white page-tablinks">Case Studies</p>
         </a>
         <a href="#tab3-box" class="text-decoration-none">
            <p class="text-white page-tablinks">Solutions</p>
         </a>
         <a href="#tab4-box" class="text-decoration-none">
            <p class="text-white page-tablinks">Benefits</p>
         </a>
         <a href="#tab5-box" class="text-decoration-none">
            <p class="text-white page-tablinks">Why Choose Us</p>
         </a>
      </div>
   </div>
</div>
<div id="tab1-box">
   <div class="container mb-3">
      <div class="row">
         <div class="col-md-7 mt-4">
            <p class="serv-page-dtlsvw">{!!$projectList[0]->servicename['short_description'] !!}</p>
         </div>
         <div class="col-md-5 mt-4">
            <div>
               <img src="{{ asset('storage/'.$projectList[0]->servicename['home_image']) }}" alt="image" class="img-fluid">
            </div>
         </div>
      </div>
   </div>
</div>
<div id="tab4-box">
   <div class="container mt-4 mb-4">
      <div class="row">
         <div class="col-md-8 mt-4">
            <h4 class="mt-3"><b>{{$projectList[0]->it_services_name}}</b></h4>
            <p class="mt-3">{!!$projectList[0]->servicename['full_description'] !!} </p>
            <div><img src="{{ asset('storage/'.$projectList[0]->servicename['page_image']) }}" alt="service-image" class="img-fluid serv-main-boximg"></div>
         </div>
         <div class="col-md-4 mt-4">
            <div class="all-categry-bgvw">
               <h4><b>All Services</b></h4>
               <div style="border-bottom:solid 2px #d61702;width:60px;margin-top:5px;"></div>
               @foreach ($allsurvies as $allsurvies)
               <div class="d-flex justify-content-between mt-3">
                  <p class="text-dark" style="font-size:16px;font-weight:600"><a href="https://ahitechno.com/it-servies/{{$allsurvies->slug}}">{{$allsurvies->name}}   (<span>{{$allsurvies->subservicename_count}}</span>)</a></p>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
<div id="tab3-box" class="mt-4">
   <div class="container mt-5">
      <div class="tabs">
         <h5 class="tablinksvw" onclick="openService(event, 'tab1')" id="defaultOpen">{{$projectList[0]->it_services_name}}</h5>
      </div>
      <div class="bg-contain-tabbox">
         <div id="tab1" class="tabcontentvw">
            <div class="row">
               @foreach ($projectList as $item)
               <div class="col-md-3 mt-4 mb-4">
                  <div class="serv-dtls-tabmain-box">
                     <div><img src="{{ asset('storage/'.$item->icon) }}" alt="icon" class="img-fluid"></div>
                     <h5 class="srv-dtls-headingtb mt-4"><b>{{$item->title}}</b></h5>
                     <p class="srv-dtlstb-paravw">{{$item->short_description}}</p>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
<div id="tab2-box">
   <section>
      <div class="container mt-4">
         <div class="sec-title text-center">
            <h3 class="text-center"><b>Our Projects</b></h3>
            <p class="text-center">Explore our diverse portfolio showcasing a spectrum of innovative projects spanning various industries and domains.</p>
         </div>
         <div class="SlickCarousel">
            @foreach ($allproject as $allproject)
            
            <div class="it-prdct-card-box" >
            <a href="{{ route('projectdetails', ['id' => $allproject->slug]) }}">
               <div class="prd-box-img-styl"><img src="{{ asset('storage/'.$allproject->image) }}" alt="icon" class="img-fluid"></div>
               <h4 class="prdct-title-sz">{{$allproject->title}}</h4>
               <p class="prdct-para-sz-fnt">{!! Str::limit($allproject->description,80) !!}</p>
               <a href="{{ route('projectdetails', ['id' => $allproject->slug]) }}">
                  <h6 style="margin-top:40px;"><i class="bi bi-arrow-right-circle fs-4"></i></h6>
               </a>
            </a>   
            </div>
            @endforeach
         </div>
      </div>
   </section>
</div>
<div id="tab5-box">
<div class="container-fluid mt-4">
   <div class="row">
      <div class="col-md-6 mt-4">
         <div><img src="https://byteinfotech.co/assets/images/why-choose-us.png" alt="choose-image" class="img-fluid"></div>
      </div>
      <div class="col-md-6 mt-4">
         <p class="text-primary"><b>WHY CHOOSE US</b></p>
         <div style="border-bottom:solid 2px #d61702;width:100px;margin-top:5px;"></div>
         <h3 class="mt-3 text-dark"><b>Transforming Business Success through Technology Innovation</b></h3>
         <p class="mt-2" style="font-size:15.5px;font-weight:500;color:#696969">Experience unparalleled expertise and personalized solutions tailored to your needs. Our proven track record for exceptional results.</p>
         <div class="d-flex justify-content-between mt-4">
            <p style="font-size:14px;font-weight:700 !important;color:#474747">SOFTWARE DEVELOPMENT</p>
            <p style="font-size:14px;font-weight:700 !important;color:#474747">92%</p>
         </div>
         <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height:0.6rem;border-radius:0px">
            <div class="progress-bar" style="width:92%;background-color:#03129c"></div>
         </div>
         <div class="d-flex justify-content-between mt-4">
            <p style="font-size:14px;font-weight:700 !important;color:#474747">WEB DEVELOPMENT/DESIGNING</p>
            <p style="font-size:14px;font-weight:700 !important;color:#474747">85%</p>
         </div>
         <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height:0.6rem;border-radius:0px">
            <div class="progress-bar" style="width:85%;background-color:#03129c"></div>
         </div>
         <div class="d-flex justify-content-between mt-4">
            <p style="font-size:14px;font-weight:700 !important;color:#474747">SEO ANALYSIS</p>
            <p style="font-size:14px;font-weight:700 !important;color:#474747">95%</p>
         </div>
         <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height:0.6rem;border-radius:0px">
            <div class="progress-bar" style="width:95%;background-color:#03129c"></div>
         </div>
         <div class="d-flex justify-content-between mt-4">
            <p style="font-size:14px;font-weight:700 !important;color:#474747">DIGITAL MARKETING</p>
            <p style="font-size:14px;font-weight:700 !important;color:#474747">90%</p>
         </div>
         <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height:0.6rem;border-radius:0px">
            <div class="progress-bar" style="width:90%;background-color:#03129c"></div>
         </div>
      </div>
   </div>
</div>
</div>
   <div class="container mt-5 mb-5">
      <div class="row">
         <div class="col-md-6 mt-4">
            <div class="" style="background-color:white;box-shadow:2px 2px 10px 3px #e8e4e3"><img src="https://cdn.shopify.com/app-store/listing_images/a2018d9586ea443095f7f6d3f8ec6e69/promotional_image/CISH26vH6PcCEAE=.png?height=720&width=1280" alt="FAQ-image" class="img-fluid"></div>
         </div>
         <div class="col-md-6 mt-4">
            <h3><b>FAQ</b></h3>
            <div style="border-bottom:solid 2px #d61702;width:30px;margin-top:5px;"></div>
            <div class="accordion mt-3" id="accordionExample">
               <div class="accordion-item">
                  <h2 class="accordion-header">
                     <h5 class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {!!$projectList[0]->servicename['qua1'] !!}
                     </h5>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                     <div class="accordion-body">
                        <p> {!!$projectList[0]->servicename['ans1'] !!}</p>
                     </div>
                  </div>
               </div>
               <div class="accordion-item">
                  <h2 class="accordion-header">
                     <h5 class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        {!!$projectList[0]->servicename['qua2'] !!}
                     </h5>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                     <div class="accordion-body">
                        <p> {!!$projectList[0]->servicename['ans2'] !!}</p>
                     </div>
                  </div>
               </div>
               <div class="accordion-item">
                  <h2 class="accordion-header">
                     <h5 class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        {!!$projectList[0]->servicename['qua3'] !!}
                     </h5>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                     <div class="accordion-body">
                        <p> {!!$projectList[0]->servicename['ans3'] !!}</p>
                     </div>
                  </div>
               </div>
               <div class="accordion-item">
                  <h2 class="accordion-header">
                     <h5 class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        {!!$projectList[0]->servicename['qua4'] !!}
                     </h5>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                     <div class="accordion-body">
                        <p> {!!$projectList[0]->servicename['ans4'] !!}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<script>
   function openService(evt, servName) {
     var i, tabcontent, tablinks;
     tabcontent = document.getElementsByClassName("tabcontentvw");
     for (i = 0; i < tabcontent.length; i++) {
       tabcontent[i].style.display = "none";
     }
     tablinks = document.getElementsByClassName("tablinksvw");
     for (i = 0; i < tablinks.length; i++) {
       tablinks[i].className = tablinks[i].className.replace(" active", "");
     }
     document.getElementById(servName).style.display = "block";
     evt.currentTarget.className += " active";
   }
   
   // Get the element with id="defaultOpen" and click on it
   document.getElementById("defaultOpen").click();
</script>
@endsection