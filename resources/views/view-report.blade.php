@extends('layouts.app')
@section('content')
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-3" style="max-width: 900px;">
            <h3 class="text-white display-5 mb-3 wow fadeInDown" data-wow-delay="0.1s">Report</h1>
            <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{route('index')}}" class="text-white">Home</a></li>
                <li class="breadcrumb-item active text-secondary">Report</li>
            </ol>    
        </div>
    </div>
    <div class="container-fluid features overflow-hidden py-5">
        <div class="container">
            <form id="summary-form" name="summary-form" action="{{route('fetch.details')}}" method="POST">
                @csrf
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
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-12 col-lg-6">
                        <div class="form-floating">
                            <input type="text" class="form-control mt-2" id="summary_no" name="summary_no" placeholder="Summary No" value="{{ $summary_no ? $summary_no : '' }}">
                            <label for="name">Summary No</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-2 text-center">
                        <button type="submit" class="btn btn-primary border-secondary py-3 px-5 mt-2" id="btnsubmit" name="btnsubmit">Submit</button>
                    </div>
                </div>
            </form>
            <div id="search_result" class="my-5 {{ $summary_no ? 'd-block' : '' }}">
                @include('search-result', ['certificate' => $certificate])
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
    #search_result {
        display: none;
    }
    .w-20 {
        width: 20%;
    }
    .w-80 {
        width: 80%;
    }
    .print-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background: #ffffff;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        border-radius: 10px;
        overflow: hidden;
    }
    .print-container img {
        width: 70%;
    }
    .print-header {
        color: #555574;
        text-align: center;
    }
    .print-header h4 {
        font-weight: bold;
        font-family: "Open Sans",sans-serif;
    }
    .print-body {
        margin-top: 20px;
        font-size: 0.8rem;
        font-weight: bold;
        color: #003a66;
    }
    .print-body span {
        font-size: 0.8rem !important;
    }
    .print-body img {
        width: 100%;
    }
    .print-body label {
        font-weight: bold;
        font-size: 0.8rem;
        font-family: "Poppins",sans-serif;
        text-transform: uppercase;
        color: #003a66;
    }
    .print-body p {
        margin: 0;
    }
    .print-body .left {
        width: 116px;
    }
    .print-body .center {
        margin: 0 10px;
    }
    .print-body .right {
        width: calc(100% - 140px);
    }
    .print-body .image {
        width: 20%;
    }
    .gemstones .print-body .image {
        width: 20%;
        display: flex;
        align-items: center;
    }
    .loosedi .print-body .image {
        width: 20%;
        display: flex;
        align-items: center;
    }
    .print-body .image_hoz {
        margin-top: 5px;
        width: 40%;
    }
    .print-body .image_hoz img {
        height: 85px;
    }
    .print-body .image_ver {
        width: 18%;
        display: flex;
        align-items: center;
    }
    .print-body .image img,
    .print-body .image_hoz img,
    .print-body .image_ver img {
        width: 100%;
    }
    .print-body .bottom {
        width: 78%;
    }
    .print-body .bottom_hoz {
        width: 58%;
    }
    .print-body .bottom_ver {
        width: 80%;
    }
    @media (max-width: 580px) {
        .print-header h4 {
            font-size: 16px;
            line-height: normal;
        }
        .print-container {
            padding: 10px;
        }
        .print-container img {
            width: 70%;
        }
        .print-body {
            font-size: 0.7rem;
            margin-top: 10px;
        }
        .print-body span {
            font-size: 0.7rem !important;
        }
        .print-body img {
            width: 100%;
        }
        .print-body label {
            font-size: 0.7rem;
        }
        .print-body .left {
            width: 80px;
        }
        .print-body .right {
            width: calc(100% - 104px);
        }
        .print-body .w-20 {
            width: 25%;
        }
        .print-body .w-80 {
            width: 75%;
        }
    }
</style>
<script type="text/javascript">
    $(function(){
        $('#summary-form').validate({
            rules:{
                summary_no: {
                    required: true,
                }
            },
            messages:{
                summary_no:{
                    required: "Please enter summary no."
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.parent());
            },
            submitHandler: function (form) {
                url = "{{ route('fetch.details') }}";
                var append = url.indexOf("?") == -1 ? "?" : "&";
                var finalURL = url + append + $('#summary-form').serialize();
                $('.loader').show();
                $.get(finalURL, function(data) {
                    $('.loader').hide();
                    $("#search_result").show();
                    $("#search_result").html('');
                    $('#search_result').append(data);
                });
            }
        });
    });
</script>
@endsection