@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-3" style="max-width: 900px;">
            <h3 class="text-white display-5 mb-3 wow fadeInDown" data-wow-delay="0.1s">Our Services</h1>
            <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-secondary">Our Services</li>
            </ol>    
        </div>
    </div>
    <div class="container-fluid features overflow-hidden py-5">
        <div class="container">
            <div class="row g-4 justify-content-center text-center">
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item text-center p-4">
                        <div class="feature-icon p-3 mb-4">
                            <i class="far fa-gem fa-4x text-primary"></i>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-3">Diamond Jewellery<br/>grading report</h5>
                            <p class="mb-3">Diamond Jewellery Grading Report ensures accurate evaluation of cut, color, clarity and carat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="feature-item text-center p-4">
                        <div class="feature-icon p-3 mb-4">
                            <i class="far fa-gem fa-4x text-primary"></i>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-3">Lab grown Diamond<br/>Jewellery grading report</h5>
                            <p class="mb-3">Lab Grown Diamond Jewellery Grading Report provides certified analysis of cut, color, clarity and carat for quality and authenticity assurance.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-item text-center p-4">
                        <div class="feature-icon p-3 mb-4">
                            <i class="far fa-gem fa-4x text-primary"></i>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-3">CVD - HPHT.<br/>Screening.</h5>
                            <p class="mb-3">CVD–HPHT Screening Report verifies diamond growth method and detects lab-grown or treated stones with advanced testing technology.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="feature-item text-center p-4">
                        <div class="feature-icon p-3 mb-4">
                            <i class="far fa-gem fa-4x text-primary"></i>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-3">Gemstones<br/>Indentification.</h5>
                            <p class="mb-3">Gemstones Identification Report confirms the type, origin, and authenticity of gemstones using advanced gemological testing methods.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="feature-item text-center p-4">
                        <div class="feature-icon p-3 mb-4">
                            <i class="far fa-gem fa-4x text-primary"></i>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-3">Fast track service<br/>also available.</h5>
                            <p class="mb-3">Fast Track Service available for priority processing and quicker certification without compromising accuracy or quality.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="1.1s">
                    <div class="feature-item text-center p-4">
                        <div class="feature-icon p-3 mb-4">
                            <i class="far fa-gem fa-4x text-primary"></i>
                        </div>
                        <div class="feature-content d-flex flex-column">
                            <h5 class="mb-3">Online report verification for our valued customer</h5>
                            <p class="mb-3">Online Report Verification allows customers to securely check and confirm the authenticity of their grading reports anytime.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection