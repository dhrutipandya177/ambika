@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">Add New Dealer</li>
                    </ol>
                </div>
                <h5 class="page-title">Add New Dealer</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Add New Dealer</h4>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                    {{$errors->first()}}
                                </div>
                            @endif
                        @endif    

                        <br>
                        
                        <form name="user-create" id="user-create" method="POST" action="{{ route('home.storeuser') }}" class="form-validate" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <input type="hidden" name="verification_at" value="1" />
                            <input type="hidden" name="user_type" value="2" />

                            <div class="form-group">
                                <label for="user_name" class="col-form-label">Name:</label>
                                <input class="form-control" type="text" name="name" value="" id="user_name" required />
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-form-label">Email:</label>
                                <input class="form-control" type="email" name="email" value="" id="email" required />
                            </div>

                            <div class="form-group">
                                <label for="phone_no" class="col-form-label">Phone No.:</label>
                                <input class="form-control" type="text" name="phone_no" value="" id="phone_no" required />
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label">Password:</label>
                                <input class="form-control" type="password" name="password" value="" id="password" required />
                            </div>
                            
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <a href="{{ route('home.users') }}" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </a>
                                </div>
                            </div>

                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
      $(document).ready(function(){
        $("#user-create").validate({
          submitHandler: function(form) {
            form.submit();
          }
        });        
      });  
    </script>
@endsection
