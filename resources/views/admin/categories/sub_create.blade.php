@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">Add New Sub Category</li>
                    </ol>
                </div>
                <h5 class="page-title">Add New Sub Category</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Add New Sub Category</h4>
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
                        
                        <form name="category-create" id="category-create" method="POST" action="{{ route('subcategories.store') }}" class="form-validate" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                            <div class="form-group">
                                <label for="category_name" class="col-form-label">Sub Category Name:</label>
                                <input class="form-control" type="text" name="name" value="" id="category_name" required />
                            </div>

                            @if(!empty($categories))
                                <div class="form-group">
                                    <label for="parent_id" class="col-form-label">Select Parent Category:</label>
                                    <select name="parent_id" class="form-control" required>
                                        @foreach($categories as $maincategory)
                                            <option value="{{ $maincategory['id'] }}">{{ $maincategory['name'] }}</option>
                                        @endforeach
                                    </select>    
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="image" class="col-form-label">Upload Image:</label>
                                <input class="form-control" type="file" name="image" value="" id="image" required />
                            </div>
                                
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <a href="{{ route('subcategories.index') }}" class="btn btn-secondary waves-effect m-l-5">
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
        $("#category-create").validate({
          submitHandler: function(form) {
            form.submit();
          }
        });        
      });  
    </script>
@endsection
