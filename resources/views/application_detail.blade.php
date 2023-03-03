@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Cel</a></li>
                        <li class="breadcrumb-item active">Application Detail</li>
                    </ol>
                </div>
                <h5 class="page-title">Application Detail</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Application Detail</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Profile Image</label><br>
                                        <img src="{{ $application->profile_image }}" height="100px" width="100px">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label>Name : {{ $application->name }}</label>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Parent Name : {{ $application->parent_name }}</label>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Address : <br>{{ $application->address }}</label>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Pincode : {{ $application->pincode }}</label>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Telephone : {{ $application->telephone }}</label>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Mobile No : {{ $application->mobileno }}</label>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Email Id : {{ $application->emailid }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Pursue Course Through : {{ ($application->pursue_course_through == 1)?'Distance Education':'Online Education' }}</label>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Date of Birth : {{ $application->date_of_birth }}</label>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Gender : {{ $application->gender }}</label>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Nationality : {{ $application->nationality }}</label>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Resume :</label><br>
                                        <a href="{{ $application->resume }}" target="_blank">Click to open</a>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Degree Certificate</label>
                                        <br>
                                        <a href="{{ $application->degree_certificate }}" target="_blank">Click to open</a>
                                    </div>
                                </div>
                                <div class="row  mt-2">
                                    <div class="col-md-12">
                                        <label>Provisional Certificate</label>
                                        <br>
                                        <a href="{{ $application->provisional_certificate }}" target="_blank">Click to open</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
