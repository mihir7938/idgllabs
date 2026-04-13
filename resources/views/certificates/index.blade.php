@extends('layouts.admin-app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h1 class="m-0">Certificates</h1>
                        <a href="{{route('certificates.add')}}" class="btn btn-primary">Add New Certificate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="" class="form" id="fetch-certificate" enctype="multipart/form-data">
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select id="company" name="company" class="form-control select2">
                                                <option value="">Select Company</option>
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->company_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="summary_no" name="summary_no" placeholder=" Summary No">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-0">
                                            <select id="shape" name="shape" class="form-control select2">
                                                <option value="">Select Shape</option>
                                                @foreach($shapes as $shape)
                                                    <option value="{{$shape->id}}">{{$shape->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-0">
                                            <select id="color" name="color" class="form-control select2">
                                                <option value="">Select Color</option>
                                                @foreach($colors as $color)
                                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-0">
                                            <select id="clarity" name="clarity" class="form-control select2">
                                                <option value="">Select Clarity</option>
                                                @foreach($clarities as $clarity)
                                                    <option value="{{$clarity->id}}">{{$clarity->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary w-100" id="btnsubmit" name="btnsubmit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableCertificate" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="140">Action</th>
                                            <th>Name</th>
                                            <th>Summary No.</th>
                                            <th>Date</th>
                                            <th>Company</th>
                                            <th>Client</th>
                                            <th>Total EST WT</th>
                                            <th>Refractive Index</th>
                                            <th>Origin</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6" style="text-align: right;">Total :</th>
                                            <th id="footer_total_weight"></th>
                                            <th colspan="3"></th>
                                        </tr>
                                    </tfoot>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $("#start_date").datepicker({
            'format': 'dd/mm/yyyy',
            'autoclose': true
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_date').datepicker('setStartDate', minDate);
            $(this).valid();
        });
        $("#end_date").datepicker({
            'format': 'dd/mm/yyyy',
            'autoclose': true
        }).on('changeDate', function (selected) {
            var maxDate = new Date(selected.date.valueOf());
            $('#start_date').datepicker('setEndDate', maxDate);
            $(this).valid();
        });
        $(document).on('change', '.print_checkbox', function() {
            let checked = $('.print_checkbox:checked');
            if (checked.length > 2) {
                this.checked = false;
                alert('You can select only 2 certificates');
            }
        });
        $(document).on('click', '#print_selected', function() {
            let ids = [];
            $('.print_checkbox:checked').each(function() {
                ids.push($(this).val());
            });
            if (ids.length === 0) {
                alert('Please select at least 1 certificate');
                return;
            }
            if (ids.length > 2) {
                alert('You can select only 2 certificates');
                return;
            }
            let url = '{{ route("certificates.print") }}' + '?ids=' + ids.join(',');
            window.open(url, '_blank', 'width=900,height=700');
        });
        var table = $('#dataTableCertificate').DataTable({
           serverSide: true,
           ajax: {
                url: '{{route("certificates")}}',
                data: function (d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                    d.company = $('#company').val();
                    d.summary_no = $('#summary_no').val();
                    d.shape = $('#shape').val();
                    d.color = $('#color').val();
                    d.clarity = $('#clarity').val();
                },
                beforeSend: function() {
                    $('.loader').show();
                },
                complete: function() {
                    $('.loader').hide();
                },
                dataSrc: function(json){
                    $('#footer_total_weight').html(parseFloat(parseFloat(json.total_weight).toFixed(3)));
                    return json.data;
                }
           },
           dom: '<"row"<"col-md-6 d-flex align-items-center"lB<"print-btn-container">><"col-md-6 text-end"f>>rtip',
           buttons: [
                {
                    text: 'CSV',
                    action: function (e, dt, node, config) {
                        var params = $.param({
                            start_date: $('#start_date').val(),
                            end_date: $('#end_date').val(),
                            company: $('#company').val(),
                            summary_no: $('#summary_no').val(),
                            shape: $('#shape').val(),
                            color: $('#color').val(),
                            clarity: $('#clarity').val(),
                        });
                        window.location = "{{ route('certificates.export.csv') }}?" + params;
                    }
                },
                {
                    text: 'Excel',
                    action: function (e, dt, node, config) {
                        var params = $.param({
                            start_date: $('#start_date').val(),
                            end_date: $('#end_date').val(),
                            company: $('#company').val(),
                            summary_no: $('#summary_no').val(),
                            shape: $('#shape').val(),
                            color: $('#color').val(),
                            clarity: $('#clarity').val(),
                        });
                        window.location = "{{ route('certificates.export.excel') }}?" + params;
                    }
                }
           ],
           initComplete: function () {
                $('.print-btn-container').html(
                    '<button id="print_selected" class="btn btn-primary ms-2">Print</button>'
                );
           },
           order: [[9, 'desc']],
           columns: [
                { data: 'action', orderable:false, searchable:false },
                { data: 'user_name', name:'user_name' },
                { data: 'summary_no', name:'summary_no' },
                { data: 'certificate_date', name:'certificate_date' },
                { data: 'company_name', name:'company_name' },
                { data: 'name', name:'name' },
                { data: 'weight', name:'weight' },
                { data: 'refractive_index', name:'refractive_index' },
                { data: 'origin', name:'origin' },
                { data: 'status', name:'status', orderable:false, searchable:false },
                { data: 'created_at', name:'created_at', visible:false }
            ]
        });
        $('#fetch-certificate').validate({
            rules:{
                start_date:{
                    required:function(){
                        if($('#end_date').val()!='') {
                            return true;
                        }
                        return false;
                    },
                },
                end_date:{
                    required:function(){
                        if($('#start_date').val()!='') {
                            return true;
                        }
                        return false;
                    },
                }
            },
            messages:{
                start_date:{
                    required: "Please select start date."
                },
                end_date:{
                    required: "Please select end date."
                }
            },
            submitHandler: function (form) {
                table.draw();
            }
        });
        /*$(document).on('click', '.print-card', function() {
           var certificateId = $(this).data('certificate-id');
           var certificateUrl = '{{ route("certificates.print") }}' + 
               '?certificate_id=' + certificateId;
           window.open(certificateUrl, '_blank', 'width=800,height=600,scrollbars=yes,resizable=yes');
        });*/
    });
</script>
@endsection