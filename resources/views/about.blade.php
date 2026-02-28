@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-3" style="max-width: 900px;">
            <h3 class="text-white display-5 mb-3 wow fadeInDown" data-wow-delay="0.1s">About Us</h1>
            <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-secondary">About Us</li>
            </ol>    
        </div>
    </div>
    <div class="container-fluid overflow-hidden py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-light">
                        <img src="img/about-page.webp" class="img-fluid w-100 rounded" alt="About Us">
                    </div>
                </div>
                <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                    <h1 class="display-6 mb-4">IDGL - International Diamond & Gem Laboratory</h1>
                    <p class="mb-4">Authentication testing of Jewellery, loose diamonds, Synthetic diamonds, and Lab-grown Gemstones. Adding value and luxury with unique identification to your Jewellery. Having 30 years of experience & expertise in the Diamond market. Being at the front and the end of the Industry, we have contributed towards making services.</p>
                    <p class="mb-4">Happy and satisfied client is our mission. IDGL commits to being at the upgraded level of technology and skilled professionals. Our mission is to contribute and to maintain trustworthy services in the industry of Gemstone. Providing and protecting our clients with accurate and relevant information about the products. Personalized reports & QR Codes for verification of certificates, and laser inscription codes on Jewellery to verify the reports and certificates online.</p>
                    <div class="mb-4">
                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Diamond Jewellery grading report</p>
                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Lab grown Diamond Jewellery grading report</p>
                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> CVD - HPHT. Screening.</p>
                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Gemstones Indentification.</p>
                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Fast track service also available.</p>
                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> Online report verification for our valued customer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection