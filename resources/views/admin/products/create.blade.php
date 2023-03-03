@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">Add New Product</li>
                    </ol>
                </div>
                <h5 class="page-title">Add New Product</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Add New Product</h4>
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
                        
                        <form name="product-create" id="product-create" method="POST" action="{{ route('products.store') }}" class="form-validate" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                            <div class="form-group">
                                <label for="product_name" class="col-form-label">Product Name:</label>
                                <input class="form-control" type="text" name="name" value="" id="product_name" required />
                            </div>

                            @if(!empty($categories))
                                <div class="form-group">
                                    <label for="category_id" class="col-form-label">Select Parent Category:</label>
                                    <select name="category_id" id="category_id" class="form-control" onchange="return getSubcategories(this);" required>
                                        <option value="">Select Parent Category</option>
                                        @foreach($categories as $maincategory)
                                            <option value="{{ $maincategory['id'] }}">{{ $maincategory['name'] }}</option>
                                        @endforeach
                                    </select>    
                                </div>
                            @endif
                            
                            <div class="form-group">
                                    <label for="subcategory_id" class="col-form-label">Select Sub Category:</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                                        <option value="">Select Sub Category</option>
                                    </select>    
                                </div>

                            <div class="form-group">
                                <label for="description" class="col-form-label">Description:</label>
                                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                            </div>
                             
                            <div class="form-group">
                                <label for="product_price" class="col-form-label">Product Price:</label>
                                <input class="form-control" type="number" min="0" name="price" value="" id="product_price" required />
                            </div> 

                            <div class="form-group">
                                <label for="image" class="col-form-label">Upload Multiple Images:</label>
                                <input class="form-control" type="file" name="image[]" value="" id="image" multiple required />
                            </div>

                            <!--<div class="form-group">
                                <label for="product_height" class="col-form-label">Product Height:</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="product_height[]" value="" id="product_height" placeholder="Height" />
                                    <input class="form-control" type="number" name="product_height_unit[]" value="" id="product_height_unit" placeholder="Unit" />
                                    <span class="input-group-btn input-group-append">
                                        <button name="add_more_height" id="add_more_height" type="button" class="btn btn-primary bootstrap-touchspin-up">+</button>
                                    </span>
                                </div>
                            </div>-->

                            {{--<div class="input-group control-group after-add-more-height">
                                <label for="product_height" class="col-form-label">Product Height:</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="product_height[]" value="" id="product_height" placeholder="Height" />
                                    <input class="form-control" type="text" name="product_height_unit[]" value="" id="product_height_unit" placeholder="Unit" /> 
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-success add-more-height" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                    </span>
                                </div>                              
                            </div>
                            <!-- Copy Height Fields -->
                            <div class="height-copy invisible">
                              <div class="height-control-group input-group pt-2">
                                    <input class="form-control" type="number" name="product_height[]" value="" id="product_height" placeholder="Height" />
                                    <input class="form-control" type="text" name="product_height_unit[]" value="" id="product_height_unit" placeholder="Unit" /> 
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-danger remove-height" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </span>
                              </div>
                            </div>--}}

                            <div class="input-group control-group after-add-more-width">
                                <label for="product_width" class="col-form-label">Product Width:</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="product_width[]" value="" id="product_width" placeholder="Width" />
                                    <input class="form-control" type="text" name="product_width_unit[]" value="" id="product_width_unit" placeholder="Unit" /> 
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-success add-more-width" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                    </span>
                                </div>                              
                            </div>
                            <!-- Copy Width Fields -->
                            <div class="width-copy invisible">
                              <div class="width-control-group input-group pt-2">
                                    <input class="form-control" type="number" name="product_width[]" value="" id="product_width" placeholder="Width" />
                                    <input class="form-control" type="text" name="product_width_unit[]" value="" id="product_width_unit" placeholder="Unit" /> 
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-danger remove-width" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </span>
                              </div>
                            </div>

                            <div class="input-group control-group after-add-more-length">
                                <label for="product_length" class="col-form-label">Product Length:</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="product_length[]" value="" id="product_length" placeholder="Length" />
                                    <input class="form-control" type="text" name="product_length_unit[]" value="" id="product_length_unit" placeholder="Unit" /> 
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-success add-more-length" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                    </span>
                                </div>                              
                            </div>
                            <!-- Copy length Fields -->
                            <div class="length-copy invisible">
                              <div class="length-control-group input-group pt-2">
                                    <input class="form-control" type="number" name="product_length[]" value="" id="product_length" placeholder="Length" />
                                    <input class="form-control" type="text" name="product_length_unit[]" value="" id="product_length_unit" placeholder="Unit" />  
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-danger remove-length" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </span>
                              </div>
                            </div>

                            <div class="input-group control-group after-add-more-thickness">
                                <label for="product_thickness" class="col-form-label">Product Thickness:</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" name="product_thickness[]" value="" id="product_thickness" placeholder="Thickness" />
                                    <input class="form-control" type="text" name="product_thickness_unit[]" value="" id="product_thickness_unit" placeholder="Unit" /> 
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-success add-more-thickness" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                    </span>
                                </div>                              
                            </div>
                            <!-- Copy thickness Fields -->
                            <div class="thickness-copy invisible">
                              <div class="thickness-control-group input-group pt-2">
                                   <input class="form-control" type="number" name="product_thickness[]" value="" id="product_thickness" placeholder="Thickness" />
                                    <input class="form-control" type="text" name="product_thickness_unit[]" value="" id="product_thickness_unit" placeholder="Unit" />  
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-danger remove-thickness" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </span>
                              </div>
                            </div>

                            <div class="input-group control-group after-add-more-size">
                                <label for="product_size" class="col-form-label">Product Size:</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="product_size[]" value="" id="product_size" placeholder="Size" />
                                    <input class="form-control" type="text" name="product_size_unit[]" value="" id="product_size_unit" placeholder="Unit" /> 
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-success add-more-size" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                    </span>
                                </div>                              
                            </div>
                            <!-- Copy size Fields -->
                            <div class="size-copy invisible">
                              <div class="size-control-group input-group pt-2">
                                   <input class="form-control" type="text" name="product_size[]" value="" id="product_size" placeholder="Size" />
                                    <input class="form-control" type="text" name="product_size_unit[]" value="" id="product_size_unit" placeholder="Unit" />  
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-danger remove-size" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </span>
                              </div>
                            </div>

                            <div class="input-group control-group after-add-more-color">
                                <label for="product_color" class="col-form-label">Product Color:</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="product_color[]" value="" id="product_color" placeholder="Color" />
                                    <!--<input class="form-control" type="text" name="product_color_unit[]" value="" id="product_color_unit" placeholder="Unit" />--> 
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-success add-more-color" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                    </span>
                                </div>                              
                            </div>
                            <!-- Copy size Fields -->
                            <div class="color-copy invisible">
                              <div class="color-control-group input-group pt-2">
                                   <input class="form-control" type="text" name="product_color[]" value="" id="product_color" placeholder="Color" />
                                    <!--<input class="form-control" type="text" name="product_color_unit[]" value="" id="product_color_unit" placeholder="Unit" />--> 
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-danger remove-color" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </span>
                              </div>
                            </div>

                            <div class="form-group">
                                <label>Profile Drawing</label>
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="profile_drawing" id="customCheck2" value="1" />
                                        <label class="custom-control-label" for="customCheck2">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="profile_drawing_image" class="col-form-label">Upload Profile Drawing:</label>
                                <input class="form-control" type="file" name="profile_drawing_image" value="" id="profile_drawing_image" />
                            </div>

                            <div class="form-group">
                                <label>Order Drawing</label>
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="order_drawing" id="customCheck3" value="1" />
                                        <label class="custom-control-label" for="customCheck3">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="order_drawing_image" class="col-form-label">Upload Order Drawing:</label>
                                <input class="form-control" type="file" name="order_drawing_image" value="" id="order_drawing_image" />
                            </div>

                            <div class="form-group">
                                <label>Show in Application</label>
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="show_in_application" id="customCheck4" value="1" checked="checked" />
                                        <label class="custom-control-label" for="customCheck4">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="status" id="customCheck1" value="1" checked="checked" />
                                        <label class="custom-control-label" for="customCheck1">Active</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary waves-effect m-l-5">
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
       $(document).ready(function () {
            if($("#description").length > 0){
                tinymce.init({
                    selector: "textarea#description",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        }); 
        
      $(document).ready(function(){
        $("#product-create").validate({
          //rules
            
          submitHandler: function(form) {
            form.submit();
          }
        });        
      });  
      

      function getSubcategories(data){
        var category_id = data.value;
        var baseUrl = "{{ route('products.index') }}";
        //alert(category_id);

        // Empty the dropdown
         $('#subcategory_id').find('option').not(':first').remove();

        // AJAX request
         $.ajax({
           url: baseUrl+'/getsubcategories/'+category_id,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var id = response['data'][i].id;
                 var name = response['data'][i].name;

                 var option = "<option value='"+id+"'>"+name+"</option>"; 

                 $("#subcategory_id").append(option); 
               }
             }

           }
        });
      }
    </script>
@endsection
