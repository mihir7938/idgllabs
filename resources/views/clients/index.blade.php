@extends('layouts.admin-app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h1 class="m-0">Clients</h1>
                        <a href="{{route('clients.add')}}" class="btn btn-primary">Add New Client</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('shared.alert')
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">All Clients</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50">Action</th>
                                            <th>Company Name</th>
                                            <th width="50">GST No</th>
                                            <th>Client Name</th>
                                            <th>Phone</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>Company Name</th>
                                            <th>GST No</th>
                                            <th>Client Name</th>
                                            <th>Phone</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($clients as $client)
                                            <tr>
                                                <td class="text-center">
                                                    <a href="{{route('clients.edit', ['id' => $client->id])}}" class="btn btn-outline-primary btn-circle">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </td>
                                                <td>{{$client->company_name}}</td>
                                                <td>{{$client->gst_no}}</td>
                                                <td>{{$client->client_name}}</td>
                                                <td>{{$client->phone_no}}</td>
                                                <td>{{$client->mobile_no}}</td>
                                                <td>{{$client->email_id}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection