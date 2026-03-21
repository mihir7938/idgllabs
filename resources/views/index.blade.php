@extends('layouts.app')
@section('content')
    <div class="carousel-header desktop-block">
        <div id="carouselDesktop" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselDesktop" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselDesktop" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselDesktop" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="img/slide-1.png" class="img-fluid" alt="slide-1">
                </div>
                <div class="carousel-item">
                    <img src="img/slide-2.png" class="img-fluid" alt="slide-2">
                </div>
                <div class="carousel-item">
                    <img src="img/slide-3.png" class="img-fluid" alt="slide-3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselDesktop" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-secondary wow fadeInLeft" data-wow-delay="0.2s" aria-hidden="false"></span>
                <span class="visually-hidden-focusable">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselDesktop" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-secondary wow fadeInRight" data-wow-delay="0.2s" aria-hidden="false"></span>
                <span class="visually-hidden-focusable">Next</span>
            </button>
        </div>
    </div>
    <div class="carousel-header mobile-block">
        <div id="carouselMobile" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselMobile" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselMobile" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselMobile" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="img/mob-1.png" class="img-fluid d-block w-100" alt="slide-1">
                </div>
                <div class="carousel-item">
                    <img src="img/mob-2.png" class="img-fluid d-block w-100" alt="slide-2">
                </div>
                <div class="carousel-item">
                    <img src="img/mob-3.png" class="img-fluid d-block w-100" alt="slide-3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselMobile" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-secondary wow fadeInLeft" data-wow-delay="0.2s" aria-hidden="false"></span>
                <span class="visually-hidden-focusable">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselMobile" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-secondary wow fadeInRight" data-wow-delay="0.2s" aria-hidden="false"></span>
                <span class="visually-hidden-focusable">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    <div class="container-fluid about-home py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="rounded">
                        <img src="img/about-us.jpeg" class="img-fluid w-100 border-bottom border-5 border-primary" style="border-top-right-radius: 300px; border-top-left-radius: 300px;" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.3s">
                    <h5 class="sub-title pe-3">About the company</h5>
                    <h1 class="display-5 mb-4">International Diamond & Gem Laboratory</h1>
                    <p class="mb-4 text-justify">Authentication testing of Jewellery, loose diamonds, Synthetic diamonds, and Lab-grown Gemstones. Adding value and luxury with unique identification to your Jewellery. Having 30 years of experience & expertise in the Diamond market. Being at the front and the end of the Industry, we have contributed towards making services.</p>
                    <div class="row gy-4">
                        <div class="col-4 col-md-3">
                            <div class="bg-light text-center rounded p-3">
                                <div class="mb-2">
                                    <i class="fas fa-ticket-alt fa-4x text-primary"></i>
                                </div>
                                <h1 class="display-5 fw-bold mb-2">30</h1>
                                <p class="text-muted mb-0">Years of Experience</p>
                            </div>
                        </div>
                        <div class="col-8 col-md-9">
                            <div class="mb-5">
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Diamond Jewellery grading report</p>
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Lab grown Diamond Jewellery grading report</p>
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> CVD - HPHT. Screening.</p>
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Gemstones Indentification.</p>
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Fast track service also available.</p>
                                <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Online report verification for our valued customer</p>
                            </div>
                            <a class="btn btn-primary border-secondary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.1s" href="{{route('about')}}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid service overflow-hidden">
        <div class="container py-5">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Achievement</h5>
                </div>
                <h3 class="display-6 mb-4">Diamond ring listed in Guinness book of world record is certified by IDGL</h3>
            </div>
            <div class="row g-4">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-image">
                                <img src="img/guinness-world-record.webp" class="img-fluid w-100 rounded" alt="guinness-world-record">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-image">
                                <img src="img/color-stone.webp" class="img-fluid w-100 rounded" alt="color-stone">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid country overflow-hidden py-5">
        <div class="container">
            <div class="section-title text-center wow fadeInUp" data-wow-delay="0.1s" style="margin-bottom: 70px;">
                <div class="sub-style">
                    <h5 class="sub-title text-primary px-3">Future Branches</h5>
                </div>
                <h3 class="display-6 mb-4">Bringing our expertise to new locations soon</h3>
            </div>
            <div class="row g-4 text-center my-4 justify-content-center">
                <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="country-item">
                        <div class="rounded overflow-hidden">
                            <img src="img/usa-city.jpg" class="img-fluid w-100 rounded" alt="USA">
                        </div>
                        <div class="country-flag">
                            <img src="img/usa.jpg" class="img-fluid rounded-circle" alt="usa">
                        </div>
                        <div class="country-name">
                            <a href="javascript:void(0);" class="text-white fs-4">USA</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 mb-5 mb-xl-0 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="country-item">
                        <div class="rounded overflow-hidden">
                            <img src="img/canada-city.jpg" class="img-fluid w-100 rounded" alt="Canada">
                        </div>
                        <div class="country-flag">
                            <img src="img/canada.jpg" class="img-fluid rounded-circle" alt="canada">
                        </div>
                        <div class="country-name">
                            <a href="javascript:void(0);" class="text-white fs-4">Canada</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection