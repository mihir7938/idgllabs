@extends('layouts.admin-app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clients</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('clients.update.save')}}" class="form" id="edit-clients-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$client->id}}" />
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
                                <h3 class="card-title">Edit Client</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="company_name">Company Name*</label>
                                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="{{$client->company_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gst_no">GST No.</label>
                                            <input type="text" class="form-control" id="gst_no" name="gst_no" placeholder="GST No." value="{{$client->gst_no}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_name">Client Name*</label>
                                            <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Client Name" value="{{$client->client_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_no">Contact No.</label>
                                            <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Contact No." value="{{$client->phone_no}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile_no">Mobile No.</label>
                                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile No." value="{{$client->mobile_no}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email_id">Email</label>
                                            <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email" value="{{$client->email_id}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="4" cols="50" placeholder="Address">{{$client->address}}</textarea>
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
        $('#edit-clients-form').validate({
            rules:{
                company_name: {
                    required: true
                },
                client_name: {
                    required: true
                },
                phone_no: {
                    digits: true
                },
                mobile_no: {
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                email_id: {
                    alphanumeric: true
                }
            },
            messages:{
                company_name:{
                    required: "Please enter company name."
                },
                client_name:{
                    required: "Please enter client name."
                },
                email_id:{
                    email: "Please provide a valid email."
                }
            }
        });
    });
</script>
@endsection