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
                                                    <option value="{{$company->id}}" data-company="{{$company->company_name}}" data-client="{{$company->client_name}}" @if($certificate->client_id == $company->id) selected @endif>{{$company->company_name}}</option>
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
                                                @foreach($selectedShapes as $sid)
                                                    @php
                                                        $shape = $shapes->firstWhere('id', $sid);
                                                    @endphp
                                                    @if($shape)
                                                        <option value="{{ $shape->id }}" selected>
                                                            {{ $shape->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                                @foreach($shapes as $shape)
                                                    @if(!in_array($shape->id, $selectedShapes))
                                                        <option value="{{ $shape->id }}">
                                                            {{ $shape->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="shape_order" id="shape_order" value="{{ implode(',', $selectedShapes) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="color_id">Color</label>
                                            <select id="color_id" name="color_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Color">
                                                @foreach($selectedColors as $sid)
                                                    @php
                                                        $color = $colors->firstWhere('id', $sid);
                                                    @endphp
                                                    @if($color)
                                                        <option value="{{ $color->id }}" selected>
                                                            {{ $color->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                                @foreach($colors as $color)
                                                    @if(!in_array($color->id, $selectedColors))
                                                        <option value="{{ $color->id }}">
                                                            {{ $color->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="color_order" id="color_order" value="{{ implode(',', $selectedColors) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="clarity_id">Clarity</label>
                                            <select id="clarity_id" name="clarity_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Clarity">
                                                @foreach($selectedClarities as $sid)
                                                    @php
                                                        $clarity = $clarities->firstWhere('id', $sid);
                                                    @endphp
                                                    @if($clarity)
                                                        <option value="{{ $clarity->id }}" selected>
                                                            {{ $clarity->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                                @foreach($clarities as $clarity)
                                                    @if(!in_array($clarity->id, $selectedClarities))
                                                        <option value="{{ $clarity->id }}">
                                                            {{ $clarity->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="clarity_order" id="clarity_order" value="{{ implode(',', $selectedClarities) }}">
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
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="total_weight">Total Weight</label>
                                                    <input type="text" class="form-control" id="total_weight" name="total_weight" placeholder="Total Weight" value="{{ $certificate->total_weight }}">
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="4" cols="50" placeholder="Description">{{ html_entity_decode($certificate->description) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="comment">Comments</label>
                                            <textarea class="form-control" id="comment" name="comment" rows="4" cols="50" placeholder="Comments">{{ html_entity_decode($certificate->comment) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
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
<link rel="stylesheet" href="{{asset('adminlte/css/summernote-bs4.min.css')}}">
<style>
    .note-editable {
        font-family: "Source Sans Pro", Arial, sans-serif !important;
        font-size: 9px !important;
        zoom: 1.3;
        color: #212529 !important;
    }
</style>
<script src="{{asset('adminlte/js/summernote-bs4.min.js')}}"></script>
<script>
    $(function () {
        $('.select2').select2({
            width: 'resolve'
        });
        var summernoteConfig = {
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ],
            fontSizes: [
                '8', '9', '10', '11', '12', '14', '16', '18', '20'
            ],
            fontNames: [
                'Source Sans Pro',
                'Arial',
                'Verdana',
                'Times New Roman',
                'Roboto',
                'Poppins'
            ],
            fontNamesIgnoreCheck: ['Source Sans Pro','Roboto','Poppins'],
            callbacks: {
                onInit: function () {
                    $('.note-editable').css({
                        'font-family': '"Source Sans Pro", Arial, sans-serif',
                        'font-size': '9px',
                        'color': '#212529'
                    });
                }
            }
        };
        $('#description').summernote(summernoteConfig);
        $('#comment').summernote(summernoteConfig);
        $('#identification').summernote(summernoteConfig);
        let selectedShapeOrder = $('#shape_order').val() ? $('#shape_order').val().split(',') : [];
        $('#shape_id').on('select2:select', function (e) {
            let value = e.params.data.id;
            if (!selectedShapeOrder.includes(value)) {
                selectedShapeOrder.push(value);
            }
            updateShapeOrder();
        });
        $('#shape_id').on('select2:unselect', function (e) {
            let value = e.params.data.id;
            selectedShapeOrder = selectedShapeOrder.filter(v => v !== value);
            updateShapeOrder();
        });
        function updateShapeOrder() {
            let select = $('#shape_id');
            selectedShapeOrder.forEach(function(val){
                let option = select.find('option[value="'+val+'"]');
                select.append(option);
            });
            select.trigger('change.select2');
            $('#shape_order').val(selectedShapeOrder.join(','));
        }
        let selectedColorOrder = $('#color_order').val() ? $('#color_order').val().split(',') : [];
        $('#color_id').on('select2:select', function (e) {
            let value = e.params.data.id;
            if (!selectedColorOrder.includes(value)) {
                selectedColorOrder.push(value);
            }
            updateColorOrder();
        });
        $('#color_id').on('select2:unselect', function (e) {
            let value = e.params.data.id;
            selectedColorOrder = selectedColorOrder.filter(v => v !== value);
            updateColorOrder();
        });
        function updateColorOrder() {
            let select = $('#color_id');
            selectedColorOrder.forEach(function(val){
                let option = select.find('option[value="'+val+'"]');
                select.append(option);
            });
            select.trigger('change.select2');
            $('#color_order').val(selectedColorOrder.join(','));
        }
        let selectedClarityOrder = $('#clarity_order').val() ? $('#clarity_order').val().split(',') : [];
        $('#clarity_id').on('select2:select', function (e) {
            let value = e.params.data.id;
            if (!selectedClarityOrder.includes(value)) {
                selectedClarityOrder.push(value);
            }
            updateClarityOrder();
        });
        $('#clarity_id').on('select2:unselect', function (e) {
            let value = e.params.data.id;
            selectedClarityOrder = selectedClarityOrder.filter(v => v !== value);
            updateClarityOrder();
        });
        function updateClarityOrder() {
            let select = $('#clarity_id');
            selectedClarityOrder.forEach(function(val){
                let option = select.find('option[value="'+val+'"]');
                select.append(option);
            });
            select.trigger('change.select2');
            $('#clarity_order').val(selectedClarityOrder.join(','));
        }
        $('#company').select2({
            templateResult: formatCompany,
            templateSelection: formatCompany
        });
        function formatCompany(state) {
            if (!state.id) return state.text;
            var company = $(state.element).data('company');
            var client = $(state.element).data('client');
            return $(
                '<span>' + company + 
                ' - <span style="font-style:italic;font-size:12px;">' + client + '</span></span>'
            );
        }
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
        $('#weight').on('input', function () {
            $('#total_weight').val($(this).val());
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
                total_weight: {
                    required: true,
                    number: true,
                    min: 0
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
                total_weight: {
                    required: "Please enter total weight."
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