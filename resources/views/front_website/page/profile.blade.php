<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="{{url('front_website/css/profile.css')}}">
    <title>user profile page</title>
    <link rel="icon" type="image/x-icon" href="https://ahitechno.com/public/front_website/images/ahitnewfabicon.png">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="dstop-profile-vws">
              <div class="order-list-fltrsshow">
                 <div class="d-flex">
                    <div><img src="{{url('front_website/images/profile.png')}}" alt="user-icon" class="img-fluid"></div>
                    <div class="profile-icons-box">
                        <p>Hello,</p>
                        <h6>{{ Auth::user()->fname ?? ''}} {{ Auth::user()->lname ?? ''}}</h6>
                    </div>
                 </div>
              </div>

              <div class="order-list-fltrsshow mt-3">
               <a href="{{route('userOrder')}}" class="text-decoration-none"><div class="d-flex justify-content-between">
                   <h6 class="account-stgs-fntsz"><i class="bi bi-box-fill text-primary fs-5"></i> ORDERS</h6>
                   <i class="bi bi-chevron-right fs-5 text-dark"></i>
                </div></a> <br>
               <a href="{{route('userWishlist')}}" class="text-decoration-none"><div class="d-flex justify-content-between">
                   <h6 class="account-stgs-fntsz"><i class="bi bi-box-fill text-primary fs-5"></i> WISHLIST</h6>
                   <i class="bi bi-chevron-right fs-5 text-dark"></i>
                </div></a> 
                <hr class="mt-4">
                <div style="cursor: pointer;">
                    <h6 class="account-stgs-fntsz"><i class="bi bi-person-circle text-primary fs-5"></i> ACCOUNT SETTINGS</h6>
                    
                    <div class="profile-acnt-infos tab">
                        <h6 class="tablinks" onclick="openProfile(event, 'profile')" id="defaultOpen">Profile Information</h6>
                        <!-- <h6 class="tablinks" onclick="openProfile(event, 'address')">Manage Addresses</h6>
                        <h6 class="tablinks" onclick="openProfile(event, 'pancard')">PAN Card Information</h6> -->
                    </div>
                 </div>
                 <!-- <hr class="mt-4">
                 <div style="cursor: pointer;">
                    <h6 class="account-stgs-fntsz"><i class="bi bi-wallet-fill text-primary fs-5"></i> PAYMENTS</h6>
                    
                    <div class="profile-acnt-infos">
                        <h6>Gift Cards</h6>
                        <h6>Saved UPI</h6>
                        <h6>Saved Cards</h6>
                    </div>
                 </div> -->

                 <!-- <hr class="mt-4">
                 <div style="cursor: pointer;">
                    <h6 class="account-stgs-fntsz"><i class="bi bi-bag-fill text-primary fs-5"></i> MY STUFF</h6>
                    
                    <div class="profile-acnt-infos">
                        <h6>Coupons</h6>
                        <h6>Reviews & Ratings</h6>
                        <h6>Notifications</h6>
                        <h6>Wishlist</h6>
                    </div>
                 </div> -->
                 <hr class="mt-4">

                 <div style="cursor: pointer;">
                  <form action="{{route('logout')}}" method="POST">
                    @csrf
                   <button style="border: none; background: white" type="submit"><h6 class="account-stgs-fntsz"><i class="bi bi-box-arrow-left text-primary fs-5"></i> LOG OUT</h6></button>
                  </form>
                 </div>

             </div>



             
            </div>
            
            <div class="moble-view-profile">
                <div class="order-list-fltrsshow d-flex justify-content-between">
                    <div class="d-flex" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                       <div><img src="{{url('front_website/images/profile.png')}}" alt="user-icon" class="img-fluid"></div>
                       <div class="profile-icons-box">
                           <p>Hello,</p>
                           <h6>{{ Auth::user()->fname ?? ''}} {{ Auth::user()->lname ?? ''}}</h6>
                       </div>
                    </div>
                    <div class="mt-2" style="cursor: pointer;">
                      <form action="{{ route('logout') }}" method="POST">
                        @csrf
                       <button style="border: none; background: white" type="submit"><h6  class="account-stgs-fntsz">LOG OUT <i class="bi bi-box-arrow-right text-primary fs-5"></i> </h6></button>
                      </form>
                     </div>

                 </div>

                 <!-- -----------------------Offcanvas start---------------------------------- -->
                 <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Profile Information</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <a href="{{route('userOrder')}}" class="text-decoration-none"><div class="d-flex justify-content-between">
                            <h6 class="account-stgs-fntsz"><i class="bi bi-box-fill text-primary fs-5"></i> ORDERS</h6>
                            <i class="bi bi-chevron-right fs-5 text-dark"></i>
                         </div></a> <br>

                        <a href="{{route('userWishlist')}}" class="text-decoration-none"><div class="d-flex justify-content-between">
                            <h6 class="account-stgs-fntsz"><i class="bi bi-box-fill text-primary fs-5"></i> WISHLIST</h6>
                            <i class="bi bi-chevron-right fs-5 text-dark"></i>
                         </div></a> 

                         <hr class="mt-4">
                         <div style="cursor: pointer;">
                             <h6 class="account-stgs-fntsz"><i class="bi bi-person-circle text-primary fs-5"></i> ACCOUNT SETTINGS</h6>
                             
                             <div class="profile-acnt-infos tab">
                                 <h6 class="tablinks" onclick="openProfile(event, 'profile')" id="defaultOpen">Profile Information</h6>
                                 <!-- <h6 class="tablinks" onclick="openProfile(event, 'address')">Manage Addresses</h6>
                                 <h6 class="tablinks" onclick="openProfile(event, 'pancard')">PAN Card Information</h6> -->
                             </div>
                          </div>
                    </div>
                  </div>
                 <!-- ----------------------------Offcanvas end------------------------------------------------- -->
            </div>

            </div>
            <div class="col-md-8 mt-3">
                <div class="order-list-fltrsshow">
                   <div id="profile" class="tabcontent">
                    <form action="{{url('update-profile/'.Auth::user()->id)}}" method="POST">
                      {{csrf_field() }}
            @method('PUT')
                        <h5>Personal Information  <i class="bi bi-pencil-square text-primary" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></h5>
                        <div class="row">
                            <label for="" class="radio-label-info mt-4">Full Name</label>
                            <div class="col col-sm-6 mt-2">
                              <input type="text" value="{{ Auth::user()->fname ?? ''}}" class="persnl-info-dtls" readonly>
                            </div>
                            <div class="col col-sm-6 mt-2">
                                <input type="text" value="{{ Auth::user()->lname ?? ''}}" class="persnl-info-dtls" readonly>
                              </div>

                              <div class="col-md-12 mt-4">
                                <label for="" class="radio-label-info">Your Gender</label>
                                 <div class="d-flex mt-2">
                               
                                  <div class="form-check ms-4">
                                    <input class="form-check-input" name="gender" value="Male" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                    <label class="form-check-label radio-label-info text-muted" for="flexRadioDefault2">
                                      
                                      {{ Auth::user()->gender ?? 'Select You Gender'}}
                                     
                                    </label>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12 mt-4">
                                <label for="" class="radio-label-info">Email addess</label>
                                <input type="text" value="{{ Auth::user()->email ?? ''}}" class="persnl-info-dtls mt-2" readonly>
                              </div>

                              <div class="col-md-12 mt-4">
                                <label for="" class="radio-label-info">Mobile Number</label>
                                <input type="text" value="{{ Auth::user()->phone ?? 'Enter your phone number'}}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9+.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="persnl-info-dtls mt-2" readonly>
                              </div>
                        </div>
                    </form>

                </div>

                <div id="address" class="tabcontent">
                   hello
                    </div>

                    <div id="pancard" class="tabcontent">
                         there
                    </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form  action="{{url('update-profile/'.Auth::user()->id)}}" method="POST" >
            {{csrf_field() }}
            @method('PUT')
            <div class="row">
                <label for="" class="radio-label-info mt-4">Full Name</label>
                <div class="col-md-6 mt-2">
                  <input type="text" name="fname" value="{{ Auth::user()->fname ?? ''}}" class="persnl-info-dtls">
                </div>
                <div class="col-md-6 mt-2">
                    <input type="text" name="lname" value="{{ Auth::user()->lname ?? ''}}" class="persnl-info-dtls">
                  </div>

                  <div class="col-md-12 mt-4">
                    <label for="" class="radio-label-info">Your Gender</label>
                     <div class="d-flex mt-2">
                    <div class="form-check">
                        <input class="form-check-input" name="gender" value="Female" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label radio-label-info text-muted" for="flexRadioDefault1">
                         Female
                        </label>
                      </div>
                      <div class="form-check ms-4">
                        <input class="form-check-input" name="gender"  value="Male" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label radio-label-info text-muted" for="flexRadioDefault2">
                         Male
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 mt-4">
                    <label for="" class="radio-label-info">Email addess</label>
                    <input type="text" name="email" value="{{ Auth::user()->email ?? ''}}" class="persnl-info-dtls mt-2">
                  </div>

                  <div class="col-md-12 mt-4">
                    <label for="" class="radio-label-info">Mobile Number</label>
                    <input type="text" name="phone" value="{{ Auth::user()->phone ?? ''}}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9+.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="persnl-info-dtls mt-2">
                  </div>
            </div>
            <div class="mt-4">
                <button class="px-5 py-2 bg-primary text-white border-0 rounded w-100">Submit</button>
            </div>
          </form>
        </div>  

      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function openProfile(evt, cityName) {
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
</body>
</html>