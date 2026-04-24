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
    <div class="container-fluid service overflow-hidden py-5">
        <div class="container py-5">
            <div class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h3 class="display-6">Understanding the IDGL Testing & Certification Workflow</h3>
            </div>
            <div class="row g-4 mt-5 justify-content-center">
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="img/about-1.png" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal1" class="h5 text-white mb-0">Where Every Gem Begins Its Journey</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal1">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal1"><h5 class="text-white mb-4 py-3">Where Every Gem Begins Its Journey</h5></a>
                                    <div class="px-4">
                                        <p class="mb-4 text-white">When jewellery arrives at the International Diamond & Gem Laboratory (IDGL), it means a secured submission of diamond /gemstone /jewellery for authentication, grading...</p>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal1" class="btn btn-primary border-secondary rounded-pill py-3 px-5">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="img/about-2.png" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal2" class="h5 text-white mb-0">From Arrival to Assurance</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal2">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal2"><h5 class="text-white mb-4 py-3">From Arrival to Assurance</h5></a>
                                    <div class="px-4">
                                        <p class="mb-4 text-white">When the package reaches reception. It is accepted from courier / client / authorized representative and reception staff creates a submission entry...</p>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal2" class="btn btn-primary border-secondary rounded-pill py-3 px-5">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="img/about-3.png" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal3" class="h5 text-white mb-0">Where Authenticity Meets Accuracy</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal3">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal3"><h5 class="text-white mb-4 py-3">Where Authenticity Meets Accuracy</h5></a>
                                    <div class="px-4">
                                        <p class="mb-4 text-white">Jewellery examination and grading at International Diamond and Gem Laboratory (IDGL) involves a precise and professional evaluation process...</p>
                                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5" href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal3">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="img/about-4.png" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal4" class="h5 text-white mb-0">Natural & CVD Screening</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal4">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal4"><h5 class="text-white mb-4 py-3">Natural & CVD Screening</h5></a>
                                    <div class="px-4">
                                        <p class="mb-4 text-white">Environment is standardized to ensure accurate grading results. Important accurate machines tools are using for checking ...</p>
                                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5" href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal4">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="img/about-5.png" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal5" class="h5 text-white mb-0">From Testing to Your Hands</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal5">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal5"><h5 class="text-white mb-4 py-3">From Testing to Your Hands</h5></a>
                                    <div class="px-4">
                                        <p class="mb-4 text-white">This moment represents completion of the certification process where the customer has both: The physical jewellery / diamond & The official grading certificate...
                                        </p>
                                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5" href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal5">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="img/about-6.png" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal6" class="h5 text-white mb-0">Easy & Secure Online Verification</a>
                                    </div>
                                    <a class="btn bg-light text-secondary rounded-pill py-3 px-5 mb-4" href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal6">Explore More</a>
                                </div>
                                <div class="service-content pb-4">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal6"><h5 class="text-white mb-4 py-3">Easy & Secure Online Verification</h5></a>
                                    <div class="px-4">
                                        <p class="mb-4 text-white">Online Verification Process using Smartphone. What you need before starting, Open the official verification platform & Enter verification details ...</p>
                                        <a class="btn btn-primary border-secondary rounded-pill text-white py-3 px-5" href="#" data-bs-toggle="modal" data-bs-target="#workflow-modal6">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 wow fadeInUp mt-5" data-wow-delay="0.5s">
                    <div class="service-item">
                        <div class="service-inner">
                            <div class="service-img">
                                <img src="img/about-7.jpeg" class="img-fluid w-100 rounded" alt="Image">
                            </div>
                            <div class="service-title">
                                <div class="service-title-name">
                                    <div class="bg-primary text-center rounded p-3 mx-5 mb-4">
                                        <div class="h5 text-white mb-0">Where Certification Meets Satisfaction</div>
                                    </div>
                                </div>
                                <div class="service-content">
                                    <a href="javascript:void(0);"><h5 class="text-white mb-0 py-3">Where Certification Meets Satisfaction</h5></a>
                                </div>
                            </div>
                        </div>
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
<div class="modal fade" id="workflow-modal1" tabindex="-1" role="dialog" aria-labelledby="myWorkFlowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title" id="myWorkFlowModalLabel">Where Every Gem Begins Its Journey</div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-3 gx-4">
                    <div class="col-xl-12">
                        <p class="mb-4">When jewellery arrives at the International Diamond & Gem Laboratory (IDGL), it means a secured submission of diamond /gemstone /jewellery for:</p>
                        <ol>
                            <li>authentication</li>
                            <li>grading</li>
                            <li>quality analysis</li>
                            <li>certification</li>
                        </ol>
                        <p class="mb-4">This is not casual handling—it is part of a controlled scientific process where the article becomes an official “lab submission.”</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-primary text-white py-2 px-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="workflow-modal2" tabindex="-1" role="dialog" aria-labelledby="myWorkFlowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title" id="myWorkFlowModalLabel">From Arrival to Assurance</div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-3 gx-4">
                    <div class="col-xl-12">
                        <h6 class="mb-4">Reception Handling of Jewellery Package (Step-by-Step)</h6>
                        <h5 class="mb-2">1. Physical Receipt of Package</h5>
                        <p class="mb-2">When the package reaches reception:</p>
                        <p class="mb-2">It is accepted from courier / client / authorized representative</p>
                        <p class="mb-2">Reception checks:</p>
                        <ol>
                            <li>Sender name</li>
                            <li>Company/client details</li>
                            <li>Number of article received</li>
                        </ol>
                        <h5 class="mb-2">2. Entry in Receiving Register / Software</h5>
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
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-primary text-white py-2 px-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="workflow-modal3" tabindex="-1" role="dialog" aria-labelledby="myWorkFlowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title" id="myWorkFlowModalLabel">Where Authenticity Meets Accuracy</div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-3 gx-4">
                    <div class="col-xl-12">
                        <p class="mb-4">Jewellery examination and grading at International Diamond and Gem Laboratory (IDGL) involves a precise and professional evaluation process to ensure authenticity and quality. Experts begin with basic checks such as verifying metal purity ( for gold, silver, or platinum), assessing craftsmanship, and identifying any damage or alterations.</p>
                        <p>Gemstones are then analyzed using advanced machines and tools to determine their characteristics especially for diamonds, the 4Cs: cut, color, clarity, and carat weight. IDGL also checks for natural vs. synthetic and any treatments applied. This detailed grading process provides reliable certification, helping customers make informed decisions with complete trust and confidence.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-primary text-white py-2 px-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="workflow-modal4" tabindex="-1" role="dialog" aria-labelledby="myWorkFlowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title" id="myWorkFlowModalLabel">Natural & CVD Screening</div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-3 gx-4">
                    <div class="col-xl-12">
                        <div class="mb-4">
                            <p class="text-primary h6 mb-3"><i class="fas fa-hand-point-right text-secondary me-2"></i> Environment is standardized to ensure accurate grading results</p>
                            <p class="text-primary h6 mb-3"><i class="fas fa-hand-point-right text-secondary me-2"></i> Important accurate machines tools are using for checking</p>
                            <p class="text-primary h6 mb-3"><i class="fas fa-hand-point-right text-secondary me-2"></i> lab has accurate advance testers (for diamond / diamond jewellery / gemstones)</p>
                        </div>
                        <h6 class="mb-4">Imaging System</h6>
                        <p class="mb-4">High-resolution camera Captures:</p>
                        <h6 class="mb-4">Computer & Software System</h6>
                        <ol>
                            <li>Displays real-time data</li>
                            <li>Stores grading results</li>
                            <li>Generates reports</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-primary text-white py-2 px-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="workflow-modal5" tabindex="-1" role="dialog" aria-labelledby="myWorkFlowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title" id="myWorkFlowModalLabel">From Testing to Your Hands</div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-3 gx-4">
                    <div class="col-xl-12">
                        <p class="mb-2">This moment represents completion of the certification process where the customer has both:</p>
                        <ol class="mb-2">
                            <li>The physical jewellery / diamond</li>
                            <li>The official grading certificate</li>
                        </ol>
                        <h5>1. What the Customer Receives</h5>
                        <p class="mb-2">The Jewellery / Loose Diamond</p>
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
                        <h5>2. What the Customer Should Check Immediately</h5>
                        <p>* When holding both items, the customer should verify:</p>
                        <h6>Matching Details</h6>
                        <ol class="mb-2">
                            <li>Certificate number matches packaging</li>
                            <li>Description matches actual item</li>
                            <li>Weight and specifications align</li>
                        </ol>
                        <h6>Physical Matching</h6>
                        <p>* Look at:</p>
                        <ol>
                            <li>Shape and size of diamond</li>
                            <li>Number of stones in jewellery(if provided)</li>
                            <li>Visible inclusions (if any)</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-primary text-white py-2 px-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="workflow-modal6" tabindex="-1" role="dialog" aria-labelledby="myWorkFlowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title" id="myWorkFlowModalLabel">Easy & Secure Online Verification</div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-3 gx-4">
                    <div class="col-xl-12">
                        <h6 class="mb-4">Online Verification Process (Using Smartphone)</h6>
                        <h5>1. What you need before starting</h5>
                        <p>* To verify a report online, you typically need:</p>
                        <ol>
                            <li>Report / Certificate Number (unique ID)</li>
                            <li>OR QR code printed on the certificate</li>
                            <li>Sometimes additional info like weight or shape</li>
                        </ol>
                        <p class="mb-4">This information comes with the certified jewellery or loose diamond</p>
                        <h5>2. Open the official verification platform</h5>
                        <p>* On your phone:</p>
                        <ol>
                            <li>Open browser (Chrome, Safari, etc.)</li>
                            <li>Visit the official IDGL website verification page</li>
                        </ol>
                        <p>Always ensure:</p>
                        <ol>
                            <li>Correct website URL</li>
                            <li>Secure connection (HTTPS)</li>
                        </ol>
                        <p>* to avoid fake verification sites</p>
                        <h5>3. Enter verification details</h5>
                        <p>*  Option A: Manual Entry</p>
                        <ol>
                            <li>Type the certificate/report number</li>
                            <li>Tap Search / Verify</li>
                        </ol>
                        <p>* Option B: QR Code Scan (Faster)</p>
                        <ol>
                            <li>Open phone camera</li>
                            <li>Scan QR code on certificate</li>
                            <li>It automatically redirects to the report page</li>
                        </ol>
                        <p>QR method reduces typing errors</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-primary text-white py-2 px-3" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection