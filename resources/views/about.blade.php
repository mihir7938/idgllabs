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
            <div class="row g-5 mt-4">
                <div class="col-xl-9 wow fadeInLeft order" data-wow-delay="0.3s">
                    <p class="mb-4">When jewellery arrives at the International Diamond & Gem Laboratory (IDGL), it means a secured submission of diamond /gemstone /jewellery for:</p>
                    <ol>
                        <li>authentication</li>
                        <li>grading</li>
                        <li>quality analysis</li>
                        <li>certification</li>
                    </ol>
                    <p class="mb-4">This is not casual handling—it is part of a controlled scientific process where the article becomes an official “lab submission.”</p>
                </div>
                <div class="col-xl-3 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="bg-light">
                        <img src="img/about-1.jpeg" class="img-fluid w-100 rounded" alt="About Us">
                    </div>
                </div>
            </div>
            <div class="row g-5 mt-4">
                <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-light">
                        <img src="img/about-2.jpeg" class="img-fluid w-100 rounded" alt="About Us">
                    </div>
                </div>
                <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.3s">
                    <h6 class="mb-4">Reception Handling of Jewellery Package (Step-by-Step)</h6>
                    <h4 class="mb-4">1. Physical Receipt of Package</h4>
                    <p class="mb-2">When the package reaches reception:</p>
                    <p class="mb-2">It is accepted from courier / client / authorized representative</p>
                    <p class="mb-2">Reception checks:</p>
                    <ol>
                        <li>Sender name</li>
                        <li>Company/client details</li>
                        <li>Number of article received</li>
                    </ol>
                    <h4 class="mb-4">2. Entry in Receiving Register / Software</h4>
                    <p class="mb-2">Reception staff creates a submission entry:</p>
                    <ol>
                        <li>Date & time of arrival</li>
                        <li>Client name & contact</li>
                        <li>Type of submission (loose diamonds / jewellery / gemstones)</li>
                        <li>Declared number of items</li>
                    </ol>
                    <p>Each parcel gets a temporary intake number or client name</p>
                </div>
            </div>
            <div class="row g-5 mt-4">
                <div class="col-xl-9 wow fadeInLeft order" data-wow-delay="0.3s">
                    <p class="mb-4">Jewellery examination and grading at International Diamond and Gem Laboratory (IDGL) involves a precise and professional evaluation process to ensure authenticity and quality. Experts begin with basic checks such as verifying metal purity ( for gold, silver, or platinum), assessing craftsmanship, and identifying any damage or alterations.</p>
                    <p class="mb-4">Gemstones are then analyzed using advanced machines and tools to determine their characteristics especially for diamonds, the 4Cs: cut, color, clarity, and carat weight. IDGL also checks for natural vs. synthetic and any treatments applied. This detailed grading process provides reliable certification, helping customers make informed decisions with complete trust and confidence.</p>
                </div>
                <div class="col-xl-3 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="bg-light">
                        <img src="img/about-3.jpeg" class="img-fluid w-100 rounded" alt="About Us">
                    </div>
                </div>
            </div>
            <div class="row g-5 mt-4">
                <div class="col-xl-4 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="bg-light">
                        <img src="img/about-4.jpeg" class="img-fluid w-100 rounded" alt="About Us">
                    </div>
                </div>
                <div class="col-xl-8 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="mb-4">
                        <p class="text-primary h6 mb-3"><i class="fas fa-hand-point-right text-secondary me-2"></i> Environment is standardized to ensure accurate grading results</p>
                        <p class="text-primary h6 mb-3"><i class="fas fa-hand-point-right text-secondary me-2"></i> Important accurate machines tools are using for checking</p>
                        <p class="text-primary h6 mb-3"><i class="fas fa-hand-point-right text-secondary me-2"></i> lab has accurate advance testers (for diamond / diamond jewellery / gemstones)</p>
                    </div>
                    <h6 class="mb-4">Imaging System</h6>
                    <p class="mb-4">High-resolution camera Captures:</p>
                    <h6 class="mb-4">Computer & Software System</h6>
                    <ol class="mb-4">
                        <li>Displays real-time data</li>
                        <li>Stores grading results</li>
                        <li>Generates reports</li>
                    </ol>
                </div>
            </div>
            <div class="row g-5 mt-4">
                <div class="col-xl-6 wow fadeInLeft order" data-wow-delay="0.3s">
                    <p class="mb-2">This moment represents completion of the certification process where the customer has both:</p>
                    <ol class="mb-4">
                        <li>The physical jewellery / diamond</li>
                        <li>The official grading certificate</li>
                    </ol>
                    <h5>1. What the Customer Receives</h5>
                    <p class="mb-4">The Jewellery / Loose Diamond</p>
                    <h6>Returned in:</h6>
                    <ol class="mb-2">
                        <li>Zip beg or seal packet (for loose diamonds)</li>
                        <li>Secure jewellery box (for rings, necklaces, etc.)(as Coustamer provide)</li>
                    </ol>
                    <h6>Condition:</h6>
                    <ol class="mb-2">
                        <li>Same as submitted (verified by lab)</li>
                        <li>Cleaned and properly packed</li>
                    </ol>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="bg-light">
                        <img src="img/about-5.jpeg" class="img-fluid w-100 rounded" alt="About Us">
                    </div>
                </div>
            </div>
            <div class="row g-5 mt-2">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.3s">
                    <h6>The IDGL Certificate</h6>
                    <p>This is the most important document, containing:</p>
                    <h6>For Diamonds:</h6>
                    <ol>
                        <li>Carat weight</li>
                        <li>Color grade</li>
                        <li>Clarity grade</li>
                        <li>Measurements</li>
                        <li>Fluorescence</li>
                    </ol>
                    <h6>For Jewellery:</h6>
                    <p>* Type of jewellery</p>
                    <ol>
                        <li>Metal details (gold/platinum purity)</li>
                        <li>Stone description</li>
                        <li>Total weight</li>
                    </ol>
                    <h6>For Gemstones:</h6>
                    <ol>
                        <li>Gem type</li>
                        <li>Natural or synthetic</li>
                        <li>Treatment status</li>
                    </ol>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.1s">
                    <h5>2. What the Customer Should Check Immediately</h5>
                    <p>* When holding both items, the customer should verify:</p>
                    <h6>Matching Details</h6>
                    <ol class="mb-4">
                        <li>Certificate number matches packaging</li>
                        <li>Description matches actual item</li>
                        <li>Weight and specifications align</li>
                    </ol>
                    <h6>Physical Matching</h6>
                    <p>* Look at:</p>
                    <ol class="mb-4">
                        <li>Shape and size of diamond</li>
                        <li>Number of stones in jewellery(if provided)</li>
                        <li>Visible inclusions (if any)</li>
                    </ol>
                </div>
            </div>
            <div class="row g-5 mt-2">
                <div class="col-xl-6 wow fadeInLeft order" data-wow-delay="0.3s">
                    <h6 class="mb-4">Online Verification Process (Using Smartphone)</h6>
                    <h5>1. What you need before starting</h5>
                    <p>* To verify a report online, you typically need:</p>
                    <ol class="mb-4">
                        <li>Report / Certificate Number (unique ID)</li>
                        <li>OR QR code printed on the certificate</li>
                        <li>Sometimes additional info like weight or shape</li>
                    </ol>
                    <p class="mb-4">This information comes with the certified jewellery or loose diamond</p>
                    <h5>2. Open the official verification platform</h5>
                    <p>* On your phone:</p>
                    <ol class="mb-4">
                        <li>Open browser (Chrome, Safari, etc.)</li>
                        <li>Visit the official IDGL website verification page</li>
                    </ol>
                    <p>Always ensure:</p>
                    <ol class="mb-4">
                        <li>Correct website URL</li>
                        <li>Secure connection (HTTPS)</li>
                    </ol>
                    <p class="mb-4">* to avoid fake verification sites</p>

                    <h5>3. Enter verification details</h5>
                    <p>*  Option A: Manual Entry</p>
                    <ol class="mb-4">
                        <li>Type the certificate/report number</li>
                        <li>Tap Search / Verify</li>
                    </ol>
                    <p>* Option B: QR Code Scan (Faster)</p>
                    <ol class="mb-4">
                        <li>Open phone camera</li>
                        <li>Scan QR code on certificate</li>
                        <li>It automatically redirects to the report page</li>
                    </ol>
                    <p class="mb-4">QR method reduces typing errors</p>
                </div>
                <div class="col-xl-6 wow fadeInRight text-end about-mobile" data-wow-delay="0.1s">
                    <img src="img/about-6.jpeg" class="img-fluid rounded" alt="About Us" width="250">
                    <div class="bg-light mt-4">
                        <img src="img/about-7.jpeg" class="img-fluid w-100 rounded" alt="About Us">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<style>
    @media (max-width: 1199px) {
        .about-mobile {
            text-align: center !important;
        }
    }
</style>
@endsection