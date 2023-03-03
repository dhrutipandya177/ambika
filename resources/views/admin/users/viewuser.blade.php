@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">View User</li>
                    </ol>
                </div>
                <h5 class="page-title">View User</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Created on {{ date("d-m-Y",strtotime($userInfo['created_at'])) }}</h4>
                            </div>
                        </div>
                        @if(!empty($userInfo))
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Profie Photo :</td>
                                        <td><img src="{{ $userInfo['profile_pic'] }}" height="75" /></td>
                                    </tr>
                                    <tr>
                                        <td>User Type :</td>
                                        <td>{{ $userInfo['user_type'] }}</td>
                                    </tr>
									<tr>
                                        <td>Name :</td>
                                        <td>{{ $userInfo['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email :</td>
                                        <td>{{ $userInfo['email'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone No. :</td>
                                        <td>{{ $userInfo['phone_no'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Company Name :</td>
                                        <td>{{ $userInfo['company_name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Company Name :</td>
                                        <td>{{ $userInfo['company_address'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>GST No. :</td>
                                        <td>{{ $userInfo['gst_no'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Created On :</td>
                                        <td>{{ date("d-m-Y g:i A",strtotime($userInfo['created_at'])) }}</td>
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
