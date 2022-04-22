<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketing Comparator</title>
    <link rel="stylesheet" href="{{ URL::asset('homeAssets/assets/css/style.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('homeAssets/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @yield('css')

    <!-- Styles -->

</head>
<body>
<!-- ////////////////////////////////////////////////////////////////////////////////////////
                               START SECTION 1 - THE NAVBAR SECTION  
/////////////////////////////////////////////////////////////////////////////////////////////-->
<nav class="navbar navbar-expand-lg navbar-dark menu fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">
        Logo
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="/">Contact us</a></li>
        </ul>
        <button type="button" class="rounded-pill btn-rounded">
          +39 123 456 789 
          <span>
            <i class="fas fa-phone-alt"></i>
          </span>
        </button>
      </div>
    </div>
  </nav>

  @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    @yield('js')
   

   <!-- ///////////////////////////////////////////////////////////////////////////////////////////
                           START SECTION 9 - THE FOOTER  
///////////////////////////////////////////////////////////////////////////////////////////////-->
<footer class="footer">
  <div class="container">
    <div class="row">
      <!-- CONTENT FOR THE MOBILE NUMBER  -->
      <div class="col-md-4 col-lg-4 contact-box pt-1 d-md-block d-lg-flex d-flex">
        <div class="contact-box__icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" viewBox="0 0 24 24" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
            <path d="M15 7a2 2 0 0 1 2 2" />
            <path d="M15 3a6 6 0 0 1 6 6" />
          </svg>
        </div>
        <div class="contact-box__info">
          <a style="color: white; font-size: 1.4rem;">Phone</a>
          <p class="contact-box__info--subtitle">  Mon-Fri 9am-6pm</p>
        </div>
      </div>  
      <!-- CONTENT FOR EMAIL  -->
      <div class="col-md-4 col-lg-4 contact-box pt-1 d-md-block d-lg-flex d-flex">
        <div class="contact-box__icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-opened" viewBox="0 0 24 24" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <polyline points="3 9 12 15 21 9 12 3 3 9" />
            <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" />
            <line x1="3" y1="19" x2="9" y2="13" />
            <line x1="15" y1="13" x2="21" y2="19" />
          </svg>
        </div>
        <div class="contact-box__info">
          <a style="color: white; font-size: 1.4rem;">Email</a>
          <p class="contact-box__info--subtitle">Online support</p>
        </div>
      </div>
      <!-- CONTENT FOR LOCATION  -->
      <div class="col-md-4 col-lg-4 contact-box pt-1 d-md-block d-lg-flex d-flex">
        <div class="contact-box__icon">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" viewBox="0 0 24 24" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="18" y1="6" x2="18" y2="6.01" />
            <path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5" />
            <polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15" />
            <line x1="9" y1="4" x2="9" y2="17" />
            <line x1="15" y1="15" x2="15" y2="20" />
          </svg>
        </div>
        <div class="contact-box__info">
          <a style="color: white; font-size: 1.4rem;">Alberobello, BA</a>
          <p class="contact-box__info--subtitle">Bari</p>
        </div>
      </div>
    </div>
  </div>

  <!-- START THE SOCIAL MEDIA CONTENT  -->
  <div class="footer-sm" style="background-color: #212121;">
    <div class="container">
      <div class="row py-4 text-center text-white">
        <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
          connect with us on social media
        </div>
        <div class="col-lg-7 col-md-6">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-github"></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- START THE CONTENT FOR THE CAMPANY INFO -->
  <div class="container mt-5">
    <div class="row text-white justify-content-center mt-3 pb-3">
      <div class="col-12 col-sm-6 col-lg-6 mx-auto">
        <h5 class="text-capitalize fw-bold">Campany name</h5>
        <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
        <p class="lh-lg">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem ex obcaecati blanditiis reprehenderit ab mollitia voluptatem consectetur?
        </p>
      </div>
      <div class="col-12 col-sm-6 col-lg-2 mb-4 mx-auto">
        <h5 class="text-capitalize fw-bold">Products</h5>
        <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
        <ul class="list-inline campany-list">
          <li><a href="#">Lorem ipsum</a></li>
          <li><a href="#">Lorem ipsum</a></li>
          <li><a href="#">Lorem ipsum</a></li>
          <li><a href="#">Lorem ipsum</a></li>
        </ul>
      </div>
      <div class="col-12 col-sm-6 col-lg-2 mb-4 mx-auto">
        <h5 class="text-capitalize fw-bold">useful links</h5>
        <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
        <ul class="list-inline campany-list">
          <li><a href="#"> Your Account</a></li>
          <li><a href="#">Become an Affiliate</a></li>
          <li><a href="#">create an account</a></li>
          <li><a href="#">Help</a></li>
        </ul>
      </div>
      <div class="col-12 col-sm-6 col-lg-2 mb-4 mx-auto">
        <h5 class="text-capitalize fw-bold">contact</h5>
        <hr class="bg-white d-inline-block mb-4" style="width: 60px; height: 2px;">
        <ul class="list-inline campany-list">
          <li><a href="#">Lorem ipsum</a></li>
          <li><a href="#">Lorem ipsum</a></li>
          <li><a href="#">Lorem ipsum</a></li>
          <li><a href="#">Lorem ipsum</a></li>
        </ul>
      </div>
    </div>
  </div>

 
</footer>





   
    <script src="{{ URL::asset('homeAssets/assets/vendors/js/glightbox.min.js') }}"></script>

     <script src="{{ URL::asset('homeAssets/assets/vendors/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
</body>

</html>
