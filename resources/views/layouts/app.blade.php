<!DOCTYPE html>
<html lang="en">
<head>
    <title>IDGL</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('img/favicon.ico')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('lib/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
	@yield('header')
</head>
<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="loader">
        <div class="loader-inner">
            <img src="{{asset('img/loading.gif')}}" alt="" style="width: 100%;">
        </div>
    </div>
    <div class="container-fluid bg-primary px-5 d-none d-lg-block">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                <div class="d-flex">
                    <a href="mailto:idglinternationallab@gmail.com" class="text-white me-4"><i class="fas fa-envelope text-secondary me-2"></i>idglinternationallab@gmail.com</a>
                    <a href="tel:+919313385613" class="text-white me-0"><i class="fas fa-phone-alt text-secondary me-2"></i>+91 9313385613</a>
                </div>
            </div>
            <div class="col-lg-6 text-lg-end mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    {{--<a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal text-secondary"></i></a>--}}
                    <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href="https://www.facebook.com/share/18TwmCFURZ/?mibextid=wwXIfr" target="_blank"><i class="fab fa-facebook-f fw-normal text-secondary"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href="https://www.instagram.com/idgllabs?igsh=c253eGJlNWV2aG54" target="_blank"><i class="fab fa-instagram fw-normal text-secondary"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href="https://www.linkedin.com/in/drashtikapadia19?utm_source=share_via&utm_content=profile&utm_medium=member_ios" target="_blank"><i class="fab fa-linkedin-in fw-normal text-secondary"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-square rounded-circle me-2" href="https://share.google/J3WcWbD19fzA8Og6X" target="_blank"><i class="fab fa-google fw-normal text-secondary"></i></a>
                    {{--<a class="btn btn-sm btn-outline-light btn-square rounded-circle" href=""><i class="fab fa-youtube fw-normal text-secondary"></i></a>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid nav-bar p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
            <a href="{{route('index')}}" class="navbar-brand p-0">
                <img src="{{asset('img/logo.png')}}" alt="Logo">
            </a>
            <a href="" class="btn btn-primary border-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0 mobile-block">Verify Report</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('index')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'index' ? 'active' : '' }}">Home</a>
                    <a href="{{route('about')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">About</a>
                    <a href="{{route('services')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'services' ? 'active' : '' }}">Service</a>
                    <a href="{{route('contact')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">Contact</a>
                </div>
                <a href="{{route('view.report')}}" class="btn btn-primary border-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0 desktop-block">Verify Report</a>
            </div>
        </nav>
    </div>
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title text-secondary mb-0" id="exampleModalLabel">Search by keyword</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-secondary mb-4">About Company</h4>
                        <p class="text-white text-justify mb-0">Authentication testing of Jewellery, loose diamonds, Synthetic diamonds, and Lab-grown Gemstones. Adding value and luxury with unique identification to your Jewellery. Having 30 years of experience & expertise in the Diamond market. Being at the front and the end of the Industry, we have contributed towards making services.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-secondary mb-4">Contact Info</h4>
                        <a href="javascript:void(0);"><i class="fa fa-map-marker-alt me-2"></i> 6/860, Chhaparia Sheri, Mahidharpura, SURAT-3. (INDIA)</a>
                        <a href="javascript:void(0);"><i class="fa fa-map-marker-alt me-2"></i> 578 Ridge Road, North Arlington NJ 07031, United States</a>
                        <a href="mailto:idglinternationallab@gmail.com"><i class="fas fa-envelope me-2"></i> idglinternationallab@gmail.com</a>
                        <a href="tel:+919313385613"><i class="fas fa-phone me-2"></i> +91 9313385613</a>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-share fa-2x text-secondary me-2"></i>
                            <a class="btn mx-1" href="https://www.facebook.com/share/18TwmCFURZ/?mibextid=wwXIfr" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn mx-1" href="https://www.instagram.com/idgllabs?igsh=c253eGJlNWV2aG54" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a class="btn mx-1" href="https://www.linkedin.com/in/drashtikapadia19?utm_source=share_via&utm_content=profile&utm_medium=member_ios" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn mx-1" href="https://share.google/J3WcWbD19fzA8Og6X" target="_blank"><i class="fab fa-google"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-secondary mb-4">Quick Links</h4>
                        <a href="{{route('index')}}" class=""><i class="fas fa-angle-right me-2"></i> Home</a>
                        <a href="{{route('about')}}" class=""><i class="fas fa-angle-right me-2"></i> About Us</a>
                        <a href="{{route('services')}}" class=""><i class="fas fa-angle-right me-2"></i> Our Services</a>
                        <a href="{{route('contact')}}" class=""><i class="fas fa-angle-right me-2"></i> Contact Us</a>
                        <a href="{{route('terms')}}" class=""><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-12 text-center mb-md-0">
                    <span class="text-white">Copyright © 2026 <a href="{{route('index')}}" class="text-primary">IDGL - International Diamond & Gem Laboratory.</a> All rights reserved. | Powered by <a href="https://strongservices.in/" target="_blank" class="text-primary">Strong Services</a></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @yield('footer')
</body>
</html>