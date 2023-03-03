@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Admin</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
                <h5 class="page-title">Edit Product</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Edit Product</h4>
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
                        
                        <form name="product-edit" id="product-edit" method="POST" action="{{ route('products.update') }}" class="form-validate" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <input type="hidden" name="id" id="product-id" value="{{ $product['id'] }}" />

                            <div class="form-group">
                                <label for="product_name" class="col-form-label">Product Name:</label>
                                <input class="form-control" type="text" name="name" value="{{ $product['name'] }}" id="product_name" required />
                            </div>

                            @if(!empty($categories))
                                <div class="form-group">
                                    <label for="category_id" class="col-form-label">Select Parent Category:</label>
                                    <select name="category_id" id="category_id" class="form-control" onchange="return getSubcategories(this);" required>
                                        <option value="">Select Parent Category</option>
                                        @foreach($categories as $maincategory)
                                            <option value="{{ $maincategory['id'] }}" {{ ($maincategory['id']==$product['category_id']) ? 'selected' : '' }}>{{ $maincategory['name'] }}</option>
                                        @endforeach
                                    </select>    
                                </div>
                            @endif
                            
                            @if(!empty($subcategories))
                                <div class="form-group">
                                    <label for="subcategory_id" class="col-form-label">Select Sub Category:</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                                        <option value="">Select Sub Category</option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{ $subcategory['id'] }}" {{ ($subcategory['id']==$product['subcategory_id']) ? 'selected' : '' }}>{{ $subcategory['name'] }}</option>
                                        @endforeach
                                    </select>    
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="subcategory_id" class="col-form-label">Select Sub Category:</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                                        <option value="">Select Sub Category</option>
                                    </select>    
                                </div>
                            @endif
                            

                            <div class="form-group">
                                <label for="description" class="col-form-label">Description:</label>
                                <textarea name="description" id="description" class="form-control" rows="5">{{ $product['description'] }}</textarea>
                            </div>
                             
                            <div class="form-group">
                                <label for="product_price" class="col-form-label">Product Price:</label>
                                <input class="form-control" type="number" min="0" name="price" value="{{ $product['price'] }}" id="product_price" required />
                            </div> 

                            <div class="form-group">
                                <label for="image" class="col-form-label">Upload Multiple Images:</label>
                                <input class="form-control" type="file" name="image[]" value="" id="image" multiple />

                                @if(!empty($product_images))
                                   <div class="input-group pt-2"> 
                                    @foreach($product_images as $productImage)
                                        <div  class="img-wraps remove-product-image-{{ $productImage['id'] }}">
                                            <span  class="closes" title="Delete" onclick="return remove_prduct_image({{ $productImage['id'] }});">&times;</span>
                                            <img src="{{ $productImage['image_url'] }}" class="img-responsive" height="100px" width="100px" />
                                        </div>
                                        <!--<li>
                                            <img src="{{ $productImage['image_url'] }}" height="100px" width="100px" />
                                            <button class="btn btn-danger edit-remove-height" type="button" onclick="return remove_prduct_image({{ $productImage['id'] }});"><i class="glyphicon glyphicon-remove"></i> Remove</button> 
                                        </li>-->
                                    @endforeach
                                    </div>
                                @endif

                            </div>

                            {{--
                            @if(!$product['productHeights']->isEmpty())
                                @php ($pi = 1)
                                <div class="input-group control-group after-add-more-height">
                                    <label for="edit_product_height" class="col-form-label">Product Height:</label>
                                    @foreach($product['productHeights'] as $key=>$heightinfo)
                                    <div class="input-group remove-heights-{{ $heightinfo['id'] }} {{ ($pi>1) ? 'height-control-group pt-2' : '' }}">
                                        <input class="form-control" type="hidden" name="edit_product_height_id[]" value="{{ $heightinfo['id'] }}" id="edit_product_height_id" placeholder="Height" />
                                        <input class="form-control" type="number" name="edit_product_height[]" value="{{ $heightinfo['height'] }}" id="edit_product_height" placeholder="Height" />
                                        <input class="form-control" type="text" name="edit_product_height_unit[]" value="{{ $heightinfo['unit'] }}" id="edit_product_height_unit" placeholder="Unit" /> 
                                        <span class="input-group-btn input-group-append">
                                            @if($pi==1)
                                            <button class="btn btn-success add-more-height" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>  
                                            <!--<button class="btn btn-success add-more-height" onclick="return addMoreAttribute('height');" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>--> 
                                            @else
                                               <button class="btn btn-danger edit-remove-height" type="button" onclick="return remove_prduct_attribute({{ $heightinfo['id'] }},'heights');"><i class="glyphicon glyphicon-remove"></i> Remove</button> 
                                            @endif
                                        </span>
                                    </div>
                                    @php ($pi++)
                                    @endforeach                              
                                </div>
                            @else
                                <div class="input-group control-group after-add-more-height">
                                    <label for="product_height" class="col-form-label">Product Height:</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="product_height[]" value="" id="product_height" placeholder="Height" />
                                        <input class="form-control" type="text" name="product_height_unit[]" value="" id="product_height_unit" placeholder="Unit" /> 
                                        <span class="input-group-btn input-group-append">
                                            <button class="btn btn-success add-more-height" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                        </span>
                                    </div>                              
                                </div>
                            @endif
                            <!-- Copy Height Fields -->
                            <div class="height-copy invisible">
                              <div class="height-control-group input-group pt-2">
                                    <input class="form-control" type="number" name="product_height[]" value="" id="product_height" placeholder="Height" />
                                    <input class="form-control" type="text" name="product_height_unit[]" value="" id="product_height_unit" placeholder="Unit" /> 
                                    <span class="input-group-btn input-group-append">
                                        <button class="btn btn-danger remove-height" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </span>
                              </div>
                            </div>
                            --}}


                            @if(!$product['productWidths']->isEmpty())
                                @php ($pi = 1)
                                <div class="input-group control-group after-add-more-width">
                                    <label for="edit_product_width" class="col-form-label">Product Width:</label>
                                    @foreach($product['productWidths'] as $key=>$widthinfo)
                                    <div class="input-group remove-widths-{{ $widthinfo['id'] }} {{ ($pi>1) ? 'width-control-group pt-2' : '' }}">
                                        <input class="form-control" type="hidden" name="edit_product_width_id[]" value="{{ $widthinfo['id'] }}" id="edit_product_width_id" placeholder="Width" />
                                        <input class="form-control" type="number" name="edit_product_width[]" value="{{ $widthinfo['width'] }}" id="edit_product_width" placeholder="Width" />
                                        <input class="form-control" type="text" name="edit_product_width_unit[]" value="{{ $widthinfo['unit'] }}" id="edit_product_width_unit" placeholder="Unit" /> 
                                        <span class="input-group-btn input-group-append">
                                            @if($pi==1)
                                            <button class="btn btn-success add-more-width" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                            @else
                                               <button class="btn btn-danger edit-remove-width" type="button" onclick="return remove_prduct_attribute({{ $widthinfo['id'] }},'widths');"><i class="glyphicon glyphicon-remove"></i> Remove</button> 
                                            @endif
                                        </span>
                                    </div>
                                    @php ($pi++)
                                    @endforeach                              
                                </div>
                            @else    
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
                            @endif
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

                            @if(!$product['productLengths']->isEmpty())
                                @php ($pi = 1)
                                <div class="input-group control-group after-add-more-length">
                                    <label for="edit_product_length" class="col-form-label">Product Length:</label>
                                    @foreach($product['productLengths'] as $key=>$lengthinfo)
                                    <div class="input-group remove-lengths-{{ $lengthinfo['id'] }} {{ ($pi>1) ? 'length-control-group pt-2' : '' }}">
                                        <input class="form-control" type="hidden" name="edit_product_length_id[]" value="{{ $lengthinfo['id'] }}" id="edit_product_length_id" placeholder="Length" />
                                        <input class="form-control" type="number" name="edit_product_length[]" value="{{ $lengthinfo['length'] }}" id="edit_product_length" placeholder="Length" />
                                        <input class="form-control" type="text" name="edit_product_length_unit[]" value="{{ $lengthinfo['unit'] }}" id="edit_product_length_unit" placeholder="Unit" /> 
                                        <span class="input-group-btn input-group-append">
                                            @if($pi==1)
                                            <button class="btn btn-success add-more-length" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                            @else
                                               <button class="btn btn-danger edit-remove-length" type="button" onclick="return remove_prduct_attribute({{ $lengthinfo['id'] }},'lengths');"><i class="glyphicon glyphicon-remove"></i> Remove</button> 
                                            @endif
                                        </span>
                                    </div>
                                    @php ($pi++)
                                    @endforeach                              
                                </div>
                            @else
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
                            @endif
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

                            @if(!$product['productThickness']->isEmpty())
                                @php ($pi = 1)
                                <div class="input-group control-group after-add-more-thickness">
                                    <label for="edit_product_thickness" class="col-form-label">Product Thickness:</label>
                                    @foreach($product['productThickness'] as $key=>$thicknessinfo)
                                    <div class="input-group remove-thickness-{{ $thicknessinfo['id'] }} {{ ($pi>1) ? 'thickness-control-group pt-2' : '' }}">
                                        <input class="form-control" type="hidden" name="edit_product_thickness_id[]" value="{{ $thicknessinfo['id'] }}" id="edit_product_thickness_id" placeholder="Thickness" />
                                        <input class="form-control" type="number" name="edit_product_thickness[]" value="{{ $thicknessinfo['thickness'] }}" id="edit_product_thickness" placeholder="Thickness" />
                                        <input class="form-control" type="text" name="edit_product_thickness_unit[]" value="{{ $thicknessinfo['unit'] }}" id="edit_product_thickness_unit" placeholder="Unit" /> 
                                        <span class="input-group-btn input-group-append">
                                            @if($pi==1)
                                            <button class="btn btn-success add-more-thickness" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                            @else
                                               <button class="btn btn-danger edit-remove-thickness" type="button" onclick="return remove_prduct_attribute({{ $thicknessinfo['id'] }},'thickness');"><i class="glyphicon glyphicon-remove"></i> Remove</button> 
                                            @endif
                                        </span>
                                    </div>
                                    @php ($pi++)
                                    @endforeach                              
                                </div>
                            @else
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
                            @endif
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

                            @if(!$product['productSizes']->isEmpty())
                                @php ($pi = 1)
                                <div class="input-group control-group after-add-more-size">
                                    <label for="edit_product_size" class="col-form-label">Product Size:</label>
                                    @foreach($product['productSizes'] as $key=>$sizeinfo)
                                    <div class="input-group remove-sizes-{{ $sizeinfo['id'] }} {{ ($pi>1) ? 'size-control-group pt-2' : '' }}">
                                        <input class="form-control" type="hidden" name="edit_product_size_id[]" value="{{ $sizeinfo['id'] }}" id="edit_product_size_id" placeholder="Size" />
                                        <input class="form-control" type="number" name="edit_product_size[]" value="{{ $sizeinfo['size'] }}" id="edit_product_size" placeholder="Size" />
                                        <input class="form-control" type="text" name="edit_product_size_unit[]" value="{{ $sizeinfo['unit'] }}" id="edit_product_size_unit" placeholder="Unit" /> 
                                        <span class="input-group-btn input-group-append">
                                            @if($pi==1)
                                            <button class="btn btn-success add-more-size" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                            @else
                                               <button class="btn btn-danger edit-remove-size" type="button" onclick="return remove_prduct_attribute({{ $sizeinfo['id'] }},'sizes');"><i class="glyphicon glyphicon-remove"></i> Remove</button> 
                                            @endif
                                        </span>
                                    </div>
                                    @php ($pi++)
                                    @endforeach                              
                                </div>
                            @else    
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
                            @endif
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

                            @if(!$product['productColors']->isEmpty())
                                @php ($pi = 1)
                                <div class="input-group control-group after-add-more-color">
                                    <label for="edit_product_color" class="col-form-label">Product Color:</label>
                                    @foreach($product['productColors'] as $key=>$colorinfo)
                                    <div class="input-group remove-colors-{{ $colorinfo['id'] }} {{ ($pi>1) ? 'color-control-group pt-2' : '' }}">
                                        <input class="form-control" type="hidden" name="edit_product_color_id[]" value="{{ $colorinfo['id'] }}" id="edit_product_color_id" placeholder="Color" />
                                        <input class="form-control" type="text" name="edit_product_color[]" value="{{ $colorinfo['color'] }}" id="edit_product_color" placeholder="Color" />
                                        <!--<input class="form-control" type="text" name="edit_product_color_unit[]" value="{{ $colorinfo['unit'] }}" id="edit_product_color_unit" placeholder="Unit" /> -->
                                        <span class="input-group-btn input-group-append">
                                            @if($pi==1)
                                            <button class="btn btn-success add-more-color" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>   
                                            @else
                                               <button class="btn btn-danger edit-remove-color" type="button" onclick="return remove_prduct_attribute({{ $colorinfo['id'] }},'colors');"><i class="glyphicon glyphicon-remove"></i> Remove</button> 
                                            @endif
                                        </span>
                                    </div>
                                    @php ($pi++)
                                    @endforeach                              
                                </div>
                            @else
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
                            @endif
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
                                        <input type="checkbox" class="custom-control-input" name="profile_drawing" id="customCheck2" value="1" {{ ($product['profile_drawing']==1) ? 'checked': '' }} />
                                        <label class="custom-control-label" for="customCheck2">Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profile_drawing_image" class="col-form-label">Update Profile Drawing:</label>
                                 <input type="hidden" name="edit_profile_drawing_image" value="{{ $product['profile_drawing_image'] }}" />
                                <input class="form-control" type="file" name="profile_drawing_image" value="" id="profile_drawing_image" />
                                @if($product['profile_drawing_image']!="")
                                    <div class="input-group pt-2"> 
                                        <img src="{{ $product['profile_drawing_image_url'] }}" height="100px" width="100px" />
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Order Drawing</label>
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="order_drawing" id="customCheck3" value="1" {{ ($product['order_drawing']==1) ? 'checked': '' }} />
                                        <label class="custom-control-label" for="customCheck3">Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="order_drawing_image" class="col-form-label">Update Order Drawing:</label>
                                <input type="hidden" name="edit_order_drawing_image" value="{{ $product['order_drawing_image'] }}" />
                                <input class="form-control" type="file" name="order_drawing_image" value="" id="order_drawing_image" />
                                 @if($product['order_drawing_image']!="")
                                    <div class="input-group pt-2"> 
                                        <img src="{{ $product['order_drawing_image_url'] }}" height="100px" width="100px" />
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Show in Application</label>
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="show_in_application" id="customCheck4" value="1" {{ ($product['show_in_application']==1) ? 'checked': '' }} />
                                        <label class="custom-control-label" for="customCheck4">Yes</label>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label>Status</label>
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="status" id="customCheck1" value="1" {{ ($product['status']==1) ? 'checked': '' }} />
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
            $("#product-edit").validate({
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
