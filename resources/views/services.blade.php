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
            {{--<div class="row g-4 justify-content-center text-center">
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
            </div>--}}
            <div class="row g-5 mt-4">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-light">
                        <img src="img/service-1.jpeg" class="img-fluid w-100" alt="Natural diamond jewellery certification report">
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.1s">
                    <h3 class="mb-4">Natural diamond jewellery certification report</h3>
                    <p class="mb-4">Certified assurance of authenticity, quality, and craftsmanship for your diamond jewellery.</p>
                    <p class="mb-4">The Natural Diamond Jewellery Certification Report is an official document that verifies jewellery containing <strong>natural (earth-mined) diamonds.</strong></p>
                    <p class="mb-4">Each piece is carefully examined by expert gemologists to confirm diamond authenticity and provide an accurate assessment of overall quality, including weight, color, clarity, and design characteristics.</p>
                </div>
            </div>
            <div class="row g-5 mt-4">
                <div class="col-xl-6 wow fadeInLeft order" data-wow-delay="0.3s">
                    <h3 class="mb-4">Laboratory grown diamond jewellery certification report</h3>
                    <p class="mb-4">Certified verification of quality and authenticity for jewellery crafted with lab-grown diamonds.</p>
                    <p class="mb-4">The Laboratory Grown Diamond Jewellery Certification Report is an official document that confirms the diamonds used in jewellery are lab-grown (CVD/HPHT) and provides a detailed evaluation of their quality.</p>
                    <p class="mb-4">Each jewellery piece is examined by expert gemologists to ensure accurate identification and grading, offering complete transparency and confidence in your purchase.</p>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="bg-light">
                        <img src="img/service-2.jpeg" class="img-fluid w-100" alt="Laboratory grown diamond jewellery certification report">
                    </div>
                </div>
            </div>
            <div class="row g-5 mt-4">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.5s">
                    <div class="bg-light">
                        <img src="img/natural-loose.png" class="img-fluid w-100" alt="Natural loose diamond certification report">
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.5s">
                    <h3 class="mb-4">Natural loose diamond certification report</h3>
                    <p class="mb-4">A trusted certification that verifies the authenticity and quality of your natural diamond with precise grading and professional evaluation.</p>
                    <p class="mb-4">The Natural Loose Diamond Certification Report is an official document that confirms the diamond is 100% natural (earth-mined) and has been independently evaluated by expert gemologists.</p>
                    <p class="mb-4">This report provides a detailed and unbiased assessment of the diamond’s characteristics, helping buyers, sellers, and jewelers make informed decisions with complete confidence.</p>
                </div>
            </div>
            <div class="row g-5 mt-4">
                <div class="col-xl-6 wow fadeInLeft order" data-wow-delay="0.7s">
                    <h3 class="mb-4">Laboratory grown diamond certification report</h3>
                    <p class="mb-4">A Lab Grown Diamond Certification Report is an official document that provides a detailed assessment of a jewellery piece set with laboratory-created diamonds. This report ensures transparency, authenticity, and quality assurance for both buyers and sellers.</p>
                    <div class="mb-4">
                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> To certify that the diamond is laboratory grown</p>
                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> To provide accurate grading based on international standards</p>
                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> To help customers make informed purchasing decisions</p>
                        <p class="text-primary h6 mb-3"><i class="fa fa-check-circle text-secondary me-2"></i> To ensure trust and credibility in the jewellery industry</p>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.7s">
                    <div class="bg-light">
                        <img src="img/lab-grown.png" class="img-fluid w-100" alt="Laboratory grown diamond certification report">
                    </div>
                </div>
            </div>
            {{--<div class="row g-5 mt-4">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-light">
                        <img src="img/CVD–HPHT.png" class="img-fluid w-100 rounded" alt="Lab grown Diamond Jewellery grading report">
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.3s">
                    <h3 class="mb-4">CVD - HPHT. Screening.</h3>
                    <p class="mb-4">Advanced screening to accurately detect lab-grown diamonds and ensure complete transparency in your inventory.</p>
                    <p class="mb-4"><strong>CVD (Chemical Vapor Deposition)</strong> – A method used to grow diamonds in a lab using gas-based processes.</p>
                    <p class="mb-4"><strong>HPHT (High Pressure High Temperature)</strong> – A technique that replicates natural diamond formation conditions in a controlled environment.</p>
                    <p class="mb-4">Both produce lab-grown diamonds that may visually appear identical to natural diamonds, making screening essential.</p>
                </div>
            </div>--}}
        </div>
    </div>
@endsection
@section('footer')
@endsection