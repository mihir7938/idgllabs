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
                    <form method="POST" action="{{route('certificates.add.save')}}" class="form" id="add-certificates-form" enctype="multipart/form-data">
                        @csrf
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
                                <h3 class="card-title">Add Certificate</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="certificate_date">Date*</label>
                                            <input type="text" class="form-control" id="certificate_date" name="certificate_date" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="summary_no">Summary No*</label>
                                            <input type="text" class="form-control" id="summary_no" name="summary_no" placeholder="Summary No" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="company">Company Name*</label>
                                            <select id="company" name="company" class="form-control select2">
                                                <option value="">Select Company</option>
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}" data-company="{{$company->company_name}}" data-client="{{$company->client_name}}">{{$company->company_name}} - {{$company->client_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="client_info"></div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="shape_id">Shape/Cut</label>
                                            <select id="shape_id" name="shape_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Shape/Cut">
                                                @foreach($shapes as $shape)
                                                    <option value="{{$shape->id}}">{{$shape->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="shape_order" id="shape_order">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="color_id">Color</label>
                                            <select id="color_id" name="color_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Color">
                                                <option value="">Select Color</option>
                                                @foreach($colors as $color)
                                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="color_order" id="color_order">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="clarity_id">Clarity</label>
                                            <select id="clarity_id" name="clarity_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Clarity">
                                                <option value="">Select Clarity</option>
                                                @foreach($clarities as $clarity)
                                                    <option value="{{$clarity->id}}">{{$clarity->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="clarity_order" id="clarity_order">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="weight">Total EST WT</label>
                                            <input type="text" class="form-control" id="weight" name="weight" placeholder="Total EST WT">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="refractive_index">Refractive Index</label>
                                            <input type="text" class="form-control" id="refractive_index" name="refractive_index" placeholder="Refractive Index">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="specific_gravity">Specific Gravity</label>
                                            <input type="text" class="form-control" id="specific_gravity" name="specific_gravity" placeholder="Specific Gravity">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="hardness">Hardness</label>
                                            <input type="text" class="form-control" id="hardness" name="hardness" placeholder="Hardness">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="origin">Origin</label>
                                            <input type="text" class="form-control" id="origin" name="origin" placeholder="Origin">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="measure">Measure</label>
                                            <input type="text" class="form-control" id="measure" name="measure" placeholder="Measure">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="4" cols="50" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="comment">Comments</label>
                                            <textarea class="form-control" id="comment" name="comment" rows="4" cols="50" placeholder="Comments">grading & identification of origin as mounting permits</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="identification">Identification</label>
                                            <textarea class="form-control" id="identification" name="identification" rows="4" cols="50" placeholder="Identification"></textarea>
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
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="active">Active</label>
                                            <div class="group">
                                                <input type="radio" id="yes" name="active" value="1" checked>
                                                <label for="yes">Yes</label>
                                                <span class="mx-2"></span>
                                                <input type="radio" id="no" name="active" value="0">
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
        let selectedShapeOrder = [];
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
        let selectedColorOrder = [];
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
        let selectedClarityOrder = [];
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
        bsCustomFileInput.init();
        function generateSummary() {
            var selectedValue = $('#certificate_date').val();
            if (!selectedValue) return;
            var parts = selectedValue.split('/');
            var dd = parts[0];
            var mm = parts[1];
            var yy = parts[2].slice(-2);
            var now  = new Date();
            var hh   = String(now.getHours()).padStart(2, '0');
            var min  = String(now.getMinutes()).padStart(2, '0');
            var ss   = String(now.getSeconds()).padStart(2, '0');
            var branch = '001';
            var summaryNo = dd + mm + yy + hh + min + ss + branch;
            $('#summary_no').val(summaryNo);
        }
        $("#certificate_date").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        }).on('changeDate', function () {
            generateSummary();
        }).datepicker('setDate', new Date());
        $('#certificate_date').on('change', function () {
            generateSummary();
        });
        $('#certificate_date').on('keydown', function(e){
            e.preventDefault();
        });
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
        $('#add-certificates-form').validate({
            rules:{
                certificate_date: {
                    required: true
                },
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
                certificate_date: {
                    required: "Please enter date."
                },
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