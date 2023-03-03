@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">Edit Slide</li>
                    </ol>
                </div>
                <h5 class="page-title">Edit Slide</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Edit Slide</h4>
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
                        
                        <form name="slider-edit" id="slider-edit" method="POST" action="{{ route('slider.update') }}" class="form-validate" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <input type="hidden" name="id" id="slide-id" value="{{ $slider['id'] }}" />

                            <div class="form-group">
                                <label for="slider_name" class="col-form-label">Title:</label>
                                <input class="form-control" type="text" name="name" value="{{ $slider['name'] }}" id="slider_name" required />
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-form-label">Description:</label>
                                <textarea name="description" id="description" class="form-control" rows="5">{{ $slider['description'] }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-form-label">Upload Image:</label>
                                <input type="hidden" name="edit_image" value="{{ $slider['image'] }}" />
                                <input class="form-control" type="file" name="image" value="" id="image" />
                                @if($slider['image']!="")
                                    <img src="{{ $slider['image_url'] }}" height="100px" width="100px" />
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="button1" class="col-form-label">Button1:</label>
                                <input class="form-control" type="text" name="button1" value="{{ $slider['button1'] }}" id="button1" />
                            </div>

                            <div class="form-group">
                                <label for="button1_link" class="col-form-label">URL1:</label>
                                <input class="form-control" type="url" name="button1_link" value="{{ $slider['button1_link'] }}" id="button1_link" />
                            </div>

                            <div class="form-group">
                                <label for="button2" class="col-form-label">Button2:</label>
                                <input class="form-control" type="text" name="button2" value="{{ $slider['button2'] }}" id="button2" />
                            </div>
                            
                            <div class="form-group">
                                <label for="button2_link" class="col-form-label">URL2:</label>
                                <input class="form-control" type="url" name="button2_link" value="{{ $slider['button2_link'] }}" id="button2_link" />
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="status" id="customCheck1" value="1" {{ ($slider['status']==1) ? 'checked': '' }} />
                                        <label class="custom-control-label" for="customCheck1">Active</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <a href="{{ route('slider.index') }}" class="btn btn-secondary waves-effect m-l-5">
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
        $("#slider-edit").validate({
          submitHandler: function(form) {
            form.submit();
          }
        });        
      });  
    </script>
@endsection
