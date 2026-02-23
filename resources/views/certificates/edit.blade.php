@extends('layouts.admin-app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Certificates</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('certificates.update.save')}}" class="form" id="edit-certificates-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$certificate->id}}" />
                        @include('shared.alert')
                        @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Certificate</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="certificate_date">Date*</label>
                                            <input type="text" class="form-control" id="certificate_date" name="certificate_date" placeholder="Date" value="{{Carbon\Carbon::parse($certificate->certificate_date)->format('d/m/Y')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="summary_no">Summary No*</label>
                                            <input type="text" class="form-control" id="summary_no" name="summary_no" placeholder="Summary No" value="{{$certificate->summary_no}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company">Company Name*</label>
                                            <select id="company" name="company" class="form-control select2">
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}" @if($certificate->client_id == $company->id) selected @endif>{{$company->company_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="client_info" style="display: block;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="client_name">Client Name*</label>
                                                <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Client Name" value="{{ $certificate->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gst_no">GST No.</label>
                                                <input type="text" class="form-control" id="gst_no" name="gst_no" placeholder="GST No." value="{{ $certificate->gst_no }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" id="address" name="address" rows="4" cols="50" placeholder="Address">{{ $certificate->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="shape_id">Shape/Cut</label>
                                            <select id="shape_id" name="shape_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Shape/Cut">
                                                @foreach($shapes as $shape)
                                                    <option value="{{$shape->id}}" {{ in_array($shape->id, $selectedShapes) ? 'selected' : '' }}>{{$shape->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="color_id">Color</label>
                                            <select id="color_id" name="color_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Color">
                                                <option value="">Select Color</option>
                                                @foreach($colors as $color)
                                                    <option value="{{$color->id}}" {{ in_array($color->id, $selectedColors) ? 'selected' : '' }}>{{$color->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="clarity_id">Clarity</label>
                                            <select id="clarity_id" name="clarity_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Clarity">
                                                <option value="">Select Clarity</option>
                                                @foreach($clarities as $clarity)
                                                    <option value="{{$clarity->id}}" {{ in_array($clarity->id, $selectedClarities) ? 'selected' : '' }}>{{$clarity->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="weight">Total EST WT</label>
                                            <input type="text" class="form-control" id="weight" name="weight" placeholder="Total EST WT" value="{{ $certificate->weight }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="refractive_index">Refractive Index</label>
                                            <input type="text" class="form-control" id="refractive_index" name="refractive_index" placeholder="Refractive Index" value="{{ $certificate->refractive_index }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="specific_gravity">Specific Gravity</label>
                                            <input type="text" class="form-control" id="specific_gravity" name="specific_gravity" placeholder="Specific Gravity" value="{{ $certificate->specific_gravity }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="hardness">Hardness</label>
                                            <input type="text" class="form-control" id="hardness" name="hardness" placeholder="Hardness" value="{{ $certificate->hardness }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="origin">Origin</label>
                                            <input type="text" class="form-control" id="origin" name="origin" placeholder="Origin" value="{{ $certificate->origin }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="measure">Measure</label>
                                            <input type="text" class="form-control" id="measure" name="measure" placeholder="Measure" value="{{ $certificate->measure }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="4" cols="50" placeholder="Description">{{ html_entity_decode($certificate->description) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="comment">Comments</label>
                                            <textarea class="form-control" id="comment" name="comment" rows="4" cols="50" placeholder="Comments">{{ html_entity_decode($certificate->comment) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="identification">Identification</label>
                                            <textarea class="form-control" id="identification" name="identification" rows="4" cols="50" placeholder="Identification">{{ html_entity_decode($certificate->identification) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Image (allowed only JPG,JPEG &amp; PNG files)</label>
                                            <div class="input-group image_div">
                                                <div class="custom-file">             
                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>              
                                            </div>
                                            @if($certificate->image)
                                                <a href="{{asset('assets/'.$certificate->image)}}" data-toggle="lightbox" data-gallery="gallery1">
                                                    <img src="{{asset('assets/'.$certificate->image)}}" class="mt-2 d-block" width="150px" />
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="active">Active</label>
                                            <div class="group">
                                                <input type="radio" id="yes" name="active" value="1" @if($certificate->status == 1) checked @endif>
                                                <label for="yes">Yes</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="no" name="active" value="0" @if($certificate->status == 0) checked @endif>
                                                <label for="no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btnsubmit" name="btnsubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<script>
    $(function () {
        $('.select2').select2({
            width: 'resolve'
        });
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
        bsCustomFileInput.init();
        $(document).on('change', '#company', function(){
            $('.loader').show();
            $.ajax({
                url: "{{ route('clients.details.fetch') }}",
                method: "POST",
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                  'company_id' : $(this).val(),
                },
                success: function (data) {
                  $('.loader').hide();
                  $(".client_info").html('');
                  $(".client_info").show();
                  $('.client_info').append(data);
                },
            });
        });
        $('#edit-certificates-form').validate({
            rules:{
                company: {
                    required: true
                },
                client_name: {
                    required: true
                },
                weight: {
                    required: true
                },
                image: {
                    extension: "png|jpg|jpeg",
                    maxsize: 1000000,
                }
            },
            messages:{
                company: {
                    required: "Please select company name."
                },
                client_name: {
                    required: "Please enter client name."
                },
                weight: {
                    required: "Please enter total est weight."
                },
                image: {
                    extension: "Please select valid image.",
                    maxsize: "File size must be less than 1MB."
                }
            },
            errorPlacement: function(error, element) {
                if (element.hasClass('select2-hidden-accessible')) {
                    error.insertAfter(element.next('.select2-container'));
                } else if (element.attr("name") == "image" ) {
                    $(".image_div").after(error);
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>
@endsection