@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-3" style="max-width: 900px;">
            <h3 class="text-white display-5 mb-3 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h1>
            <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-secondary">Contact Us</li>
            </ol>    
        </div>
    </div>
    <div class="container-fluid contact overflow-hidden py-5">
        <div class="container py-5">
            <div class="row g-5 mb-5">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="sub-style mb-5">
                        <h5 class="sub-title text-primary pe-3">Contact Us</h5>
                    </div>
                    <div class="d-flex border-bottom mb-4 pb-4">
                        <i class="fas fa-map-marked-alt fa-4x text-primary bg-light p-3 rounded"></i>
                        <div class="ps-3">
                            <h5>Address</h5>
                            <p>6/860, Chhaparia Sheri, Mahidharpura, SURAT-3. (INDIA)</p>
                        </div>
                    </div>
                    <div class="d-flex border-bottom mb-4 pb-4">
                        <i class="fas fa-map-marked-alt fa-4x text-primary bg-light p-3 rounded"></i>
                        <div class="ps-3">
                            <h5>US Address</h5>
                            <p>578 Ridge Road, North Arlington NJ 07031, United States</p>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-xl-12">
                            <div class="d-flex">
                                <i class="fas fa-tty fa-3x text-primary"></i>
                                <div class="ps-3">
                                    <h5 class="mb-3">Quick Contact</h5>
                                    <div class="mb-3">
                                        <h6 class="mb-0">Phone:</h6>
                                        <a href="tel:+919313385613" class="fs-5 text-primary">+91 9313385613</a>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="mb-0">Email:</h6>
                                        <a href="mailto:idglinternationallab@gmail.com" class="fs-5 text-primary">idglinternationallab@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <div class="me-4">
                            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 90px; height: 90px; border-radius: 10px;"><i class="fas fa-share fa-3x text-primary"></i></div>
                        </div>
                        <div class="d-flex">
                            <a class="btn btn-secondary border-secondary me-2 p-0" href="">facebook <i class="fas fa-chevron-circle-right"></i></a>
                            <a class="btn btn-secondary border-secondary mx-2 p-0" href="">twitter <i class="fas fa-chevron-circle-right"></i></a>
                            <a class="btn btn-secondary border-secondary mx-2 p-0" href="">instagram <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3">
                    <div class="sub-style mb-5">
                        <h5 class="sub-title text-primary pe-3">Send Your Message</h5>
                    </div>
                    <form id="contact-form" name="contact-form" action="{{route('save.contact')}}" method="POST">
                        @csrf
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                        @if(Session::get('message')!='')
                            <div class="alert {{ Session::get('alert-type') }} alert-dismissible fade show shadow-sm">
                                <span>{!! Session::get('message') !!}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            <?php Session::put('message','');
                                Session::put('alert-type',''); ?>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email_id" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="phone" class="form-control" id="phone" name="phone_no" placeholder="Phone">
                                    <label for="phone">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" style="height: 160px"></textarea>
                                    <label for="message">Your Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="office">
                <div class="row g-4 justify-content-center">
                    <div class="col-12 pt-3 wow zoomIn" data-wow-delay="0.1s">
                        <div class="rounded h-100">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.7887024693255!2d72.83216581540398!3d21.20055118726629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f1155f275ad%3A0xedda7b5ca5e1af1d!2sTAKSH%20JEWELLERS!5e0!3m2!1sen!2sin!4v1662985077481!5m2!1sen!2sin" class="rounded w-100" 
                            style="height: 450px;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<style>
    .error {
        color: #f00;
        font-size: 14px;
    }
</style>
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {action: 'contact'}).then(function(token) {
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
</script>
<script>
  (function() {
    $('#contact-form').validate({
      rules: {
        name: {
          required: true
        },
        phone_no: {
          required: true,
          digits: true,
        },
        email_id: {
          required: true,
          maxlength: 155,
        },
        message: {
          required: true
        }
      },
      messages:{
        name: {
          required: "Please enter your name."
        },
        phone_no:{
            required: "Plese enter phone number.",
        },
        email_id:{
          required: "Please enter your email.",
          email: "Please provide a valid email."
        },
        message:{
          required: "Please enter your message."
        }
      },
      errorPlacement: function(error, element) {
        error.insertAfter(element.parent());
      }
    });
  })();
</script>
@endsection