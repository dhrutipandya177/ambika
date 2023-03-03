@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">View Inquiry</li>
                    </ol>
                </div>
                <h5 class="page-title">View Inquiry</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Created on {{ date("d-m-Y",strtotime($inquiry['created_at'])) }}</h4>
                            </div>
                        </div>
                        @if(!empty($inquiry))
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Name :</td>
                                        <td>{{ $inquiry['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email :</td>
                                        <td>{{ $inquiry['email'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone No. :</td>
                                        <td>{{ $inquiry['phone'] }}</td>
                                    </tr>
                                    <!--<tr>
                                        <td>Product Name :</td>
                                        <td>{{ $inquiry['productInfo']['name'] }}</td>
                                    </tr>-->
                                    <tr>
                                        <td>City :</td>
                                        <td>{{ $inquiry['city'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>State :</td>
                                        <td>{{ $inquiry['state'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Country :</td>
                                        <td>{{ $inquiry['country'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description :</td>
                                        <td>{{ $inquiry['description'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Created On :</td>
                                        <td>{{ date("d-m-Y g:i A",strtotime($inquiry['created_at'])) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
