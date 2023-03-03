<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductAttributeHeight;
use App\Models\ProductAttributeWidth;
use App\Models\ProductAttributeLength;
use App\Models\ProductAttributeThickness;
use App\Models\ProductAttributeSize;
use App\Models\ProductAttributeColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    public function getProducts()
    {
        $products = $this->listProducts();
        return Datatables::of($products)
                         ->addColumn('action',function($selected)
                         {
                             $products='<a href="'.route("products.edit",$selected->id).'" class="btn btn-sm btn-outline-info" title="Edit" ><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onclick="return deletecat('.$selected->id.')" class="btn btn-sm btn-outline-info" title="Delete" ><i class="fa fa-trash"></i></a>';
                             return $products;
                         })

                         ->addColumn('image',function($selected){
                           if(!empty($selected["productImages"]) && isset($selected["productImages"][0])){
                                //return '<img src="'.asset('uploads/product/'.$selected["productImages"][0]['image']).'" height="100px" width="100px">';
                                return '<img src="'.$selected["productImages"][0]['image_url'].'" height="100px" width="100px">';
                            }else{
                                 return '';   
                            }
                            /*$productImages = ProductImage::where('product_id','=',$selected->id)->get();
                            if(!$productImages->isEmpty()){
                                //return $productImages[0]['name'];
                                return '<img src="'.asset('uploads/product/'.$productImages[0]['name']).'" height="100px" width="100px">';
                            }else{
                                return '';
                            }*/
                            //var_dump($selected["productImages"][0]);
                            //return $selected["productImages"][0]['image'];
                         })

                         ->addColumn('parent_cat_name',function($selected){
                            //echo $selected->caegory_id;die();
                            /*$parentCategory = Category::where('id','=',$selected->caegory_id)->get();
                            if(!$parentCategory->isEmpty()){
                                return $parentCategory[0]['name'];
                            }else{
                                return '';
                            }*/
                            //var_dump($selected);
                            return $selected["categoryInfo"]['name'];
                         })

                         ->addColumn('cat_name',function($selected){
                            /*$subCategory = Category::where('id','=',$selected->subcaegory_id)->get();
                            if(!$subCategory->isEmpty()){
                                return $subCategory[0]['name'];
                            }else{
                                return '';
                            }*/
                            //var_dump($selected["categoryInfo"]);
                            return $selected["subcategoryInfo"]['name'];
                         })

                         ->editColumn('show_in_application',function($data){
                             if($data->show_in_application==1){
                                 return 'Yes';
                             }else{
                                 return 'No';
                             }
                         })

                         ->editColumn('status',function($data){
                             if($data->status==1){
                                 return 'Active';
                             }else{
                                 return 'Inactive';
                             }
                         })

                         //->rawColumns(['action'])
                         ->rawColumns(['action','image','parent_cat_name','cat_name','status'])
                         ->addIndexColumn()
                         ->make(true);
    }

    public function listProducts(){
        $products = Product::with('categoryInfo','subcategoryInfo','productImages','productHeights','productWidths','productLengths','productThickness','productSizes','productColors')->get();
        return $products;
    }

    public function addProductttributes($product_id,$attribute_table,$attributeName,$attributeArray,$attributeUnit){
        //Add Product Attributes heights, widths, lengths, thickness, sizes, colors
        if(!empty($attributeArray)){
            foreach($attributeArray as $key=>$attributeValue){
                if($attributeValue!=""){
                    $attibuteUnitValue = (!empty($attributeUnit)) ? $attributeUnit[$key] : '0';
                    $dateToday = date("Y-m-d H:i:s");
                    $newAttributeData = [
                        $attributeName => $attributeValue,
                        'unit' => $attibuteUnitValue,
                        'product_id' => $product_id,
                        'created_at' => $dateToday,
                        'updated_at' => $dateToday
                    ];
                    //$newAttribute = $attributeModel::create($newAttributeData);
                    $newAttribute = DB::table($attribute_table)->insert($newAttributeData);

                    /*
                        DB::table('users')
                            ->updateOrInsert(
                                ['email' => 'john@example.com', 'name' => 'John'],
                                ['id' => '1']
                            );
                    */

                }
            }
            return true; 
        }else{
            return false;
        }
    }

    public function updateProductttributes($idArray,$product_id,$attribute_table,$attributeName,$attributeArray,$attributeUnit){
        //Add Product Attributes heights, widths, lengths, thickness, sizes, colors
        if(!empty($attributeArray)){
            foreach($attributeArray as $key=>$attributeValue){
                if($attributeValue!=""){
                    //echo $attributeName;//print_r($attributeUnit);
                    $attibuteUnitValue = (!empty($attributeUnit)) ? $attributeUnit[$key] : '0';
                    $id = $idArray[$key];
                    $dateToday = date("Y-m-d H:i:s");
                    
                    $updateAttributeData = [
                        $attributeName => $attributeValue,
                        'unit' => $attibuteUnitValue,
                        'product_id' => $product_id,
                        'updated_at' => $dateToday
                    ];
                    $updateAttribute = DB::table($attribute_table)->where('id','=',$id)->update($updateAttributeData);
                }
            }
            return true; 
        }else{
            return false;
        }
    }

    public function removeProductAttr($id,$attr){
        $dateToday = date("Y-m-d H:i:s");
        $tableName = "product_attribute_".$attr;
        $delteAttr = DB::table($tableName)->where('id', '=', $id)->update(array('deleted_at'=>$dateToday));
        //DB::table($tableName)->where('id', '=', $id)->delete();

        if($delteAttr){
            $attribute = array('status'=> 'success','id'=>$id,'attributeName'=>$attr,'msg'=>'Product Attribute '.$attr.' deleted successfully.');
            echo json_encode($attribute);
            exit;
        }else{
            $attribute = array('status'=> 'fail','id'=>$id,'attributeName'=>$attr,'msg'=>"Something want wrong! please try again.");
            echo json_encode($attribute);
            exit;
        }
    }

    public function removeProductImage($id){
        $deleteProductImage = ProductImage::where('id','=',$id)->delete();
        if($deleteProductImage){
            $data = array('status'=> 'success','id'=>$id,'msg'=>"Product Image Deleted successfully.");
        }else{
            $data = array('status'=> 'fail','id'=>$id,'msg'=>"Something want wrong! please try again.");
        }
        echo json_encode($data);
        exit;
    }

    public function getSubcategories($id){
        $options = '<option value="">Select Sub Category</option>';
        $subcategories = Category::where('parent_id','=',$id)->get();
        $subcategory['data'] = $subcategories;
        echo json_encode($subcategory);
        exit;
        /*if(!$subcategories->isEmpty()){
            foreach ($subcategories as $subcategory) {
                 $options.= ""; 
            }
        }
        return $options;*/
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id','=',0)->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image' => 'required',
                'category_id' => 'required',
                'subcategory_id' => 'required',
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $status = (isset($request->status)) ? $request->status : 0;
        $show_in_application = (isset($request->show_in_application)) ? $request->show_in_application : 0;
        $profile_drawing = (isset($request->profile_drawing)) ? $request->profile_drawing : 0;
        $order_drawing = (isset($request->order_drawing)) ? $request->order_drawing : 0;

        $profile_drawing_imageName = '';
        if ($request->hasFile('profile_drawing_image')) {
            $profile_drawing_imageName = time().'.'.$request->profile_drawing_image->extension();  
            $request->profile_drawing_image->move(public_path('uploads/product_profile'), $profile_drawing_imageName); 
        }

        $order_drawing_imageName = '';
        if ($request->hasFile('order_drawing_image')) {
            $order_drawing_imageName = time().'.'.$request->order_drawing_image->extension();  
            $request->order_drawing_image->move(public_path('uploads/product_order'), $order_drawing_imageName); 
        }

        $newProductData = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'profile_drawing' => $profile_drawing,
            'profile_drawing_image' => $profile_drawing_imageName, 
            'order_drawing' => $order_drawing,
            'order_drawing_image' => $order_drawing_imageName,
            'show_in_application' => $show_in_application,
            'status' => $status,
        ];
        //echo "<pre>";print_r($newProductData);exit;

        $newProduct = Product::create($newProductData);

        if (! empty($newProduct)) {
            $product_id = $newProduct->id;
            
            if ($request->hasFile('image')) {
                $allowedfileExtension=['jpeg','png','jpg','gif'];
                foreach($request->file('image') as $product_image){
                    /*$name=$product_image->getClientOriginalName();
                    $product_image->move(public_path().'/uploads/product/', $name);  
                    $data[] = $name; */     
                    
                    $filename = $product_image->getClientOriginalName();
                    $extension = $product_image->getClientOriginalExtension();
                    $check=in_array(strtolower($extension),$allowedfileExtension);
                    if($check){
                        $imageName = time()."-".rand(1,100).'.'.$product_image->extension();  
                        $product_image->move(public_path('uploads/product'), $imageName);

                        $newProductImageData = [
                            'image' => $imageName,
                            'product_id' => $product_id
                        ]; 

                        $newProductImage = ProductImage::create($newProductImageData);
                    }    
                }
            }

            //Add Product Attributes heights, widths, lengths, thickness, sizes, colors
            if(isset($request->product_height_unit)){
                $this->addProductttributes($product_id,'product_attribute_heights','height',$request->product_height,$request->product_height_unit);
            }
            
            if(isset($request->product_width_unit)){
                $this->addProductttributes($product_id,'product_attribute_widths','width',$request->product_width,$request->product_width_unit);
            }
            
            if(isset($request->product_length_unit)){
                $this->addProductttributes($product_id,'product_attribute_lengths','length',$request->product_length,$request->product_length_unit);
            }
            
            if(isset($request->product_thickness_unit)){
                $this->addProductttributes($product_id,'product_attribute_thickness','thickness',$request->product_thickness,$request->product_thickness_unit);
            }
            
            if(isset($request->product_size_unit)){
                $this->addProductttributes($product_id,'product_attribute_sizes','size',$request->product_size,$request->product_size_unit);
            }
            
            if(isset($request->product_color)){
                $this->addProductttributes($product_id,'product_attribute_colors','color',$request->product_color,array());
            }
            

            /*if(!empty($request->product_height)){
                $productHeight = $request->product_height;
                $productHeightUnit = $request->product_height_unit;
                
                foreach($productHeight as $key=>$height){
                    if($height!=""){
                        $newProductHeightData = [
                            'height' => $height,
                            'unit' => $productHeightUnit[$key],
                            'product_id' => $product_id
                        ];
                        $newProductHeight = ProductAttributeHeight::create($newProductHeightData);
                    }
                } 
            }

            if(!empty($request->product_width)){
                $productWidth = $request->product_width;
                $productWidthUnit = $request->product_width_unit;
                
                foreach($productWidth as $key=>$width){
                    if($width!=""){
                        $newProductWidthData = [
                            'width' => $width,
                            'unit' => $productWidthUnit[$key],
                            'product_id' => $product_id
                        ];
                        $newProductWidth = ProductAttributeWidth::create($newProductWidthData);
                    }
                } 
            }

            if(!empty($request->product_length)){
                $productLength = $request->product_length;
                $productLengthUnit = $request->product_length_unit;
                
                foreach($productLength as $key=>$length){
                    if($length!=""){
                        $newProductLengthData = [
                            'length' => $length,
                            'unit' => $productLengthUnit[$key],
                            'product_id' => $product_id
                        ];
                        $newProductLenght = ProductAttributeLength::create($newProductLengthData);
                    }
                } 
            }

            if(!empty($request->product_thickness)){
                $productThickness = $request->product_thickness;
                $productThicknessUnit = $request->product_thickness_unit;
                
                foreach($productThickness as $key=>$thickness){
                    if($thickness!=""){
                        $newProductThicknessData = [
                            'thickness' => $thickness,
                            'unit' => $productThicknessUnit[$key],
                            'product_id' => $product_id
                        ];
                        $newProductThickness = ProductAttributeThickness::create($newProductThicknessData);
                    }
                } 
            }

            if(!empty($request->product_size)){
                $productSize = $request->product_size;
                $productSizeUnit = $request->product_size_unit;
                
                foreach($productSize as $key=>$size){
                    if($size!=""){
                        $newProductSizeData = [
                            'size' => $size,
                            'unit' => $productSizeUnit[$key],
                            'product_id' => $product_id
                        ];
                        $newProductSize = ProductAttributeSize::create($newProductSizeData);
                    }
                } 
            }

            if(!empty($request->product_color)){
                $productColor = $request->product_color;
                //$productColorUnit = $request->product_color_unit;
                
                foreach($productColor as $key=>$color){
                    if($color!=""){
                        $newProductColorData = [
                            'color' => $color,
                            'unit' => '0',//$productColorUnit[$key],
                            'product_id' => $product_id
                        ];
                        $newProductColor = ProductAttributeColor::create($newProductColorData);
                    }
                } 
            }*/

            return redirect('products')->with('success',"New Product has been created successfully.");
        } else {
            return redirect()->back()->withErrors("Something want wrong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$product = Product::where('id', $id)->first();
        $product = Product::with('categoryInfo','subcategoryInfo','productImages','productHeights','productWidths','productLengths','productThickness','productSizes','productColors')->where('id', $id)->first();
        //echo "<pre>";print_r($product["productLengths"]);exit;
        $product_images = ProductImage::where('product_id', $id)->get();
        $categories = Category::where('parent_id','=',0)->get();
        $subcategories = Category::where('parent_id','=',$product->category_id)->get();
        return view('admin.products.edit', compact('product','categories','subcategories','product_images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                //'image' => 'required_if:old_image'
                'image' => 'required',
                'price' => 'required',
                'category_id' => 'required',
                'subcategory_id' => 'required',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'category_id' => 'required',
                'subcategory_id' => 'required',
            ]);
        }    
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $status = (isset($request->status)) ? $request->status : 0;
        $show_in_application = (isset($request->show_in_application)) ? $request->show_in_application : 0;
        $profile_drawing = (isset($request->profile_drawing)) ? $request->profile_drawing : 0;
        $order_drawing = (isset($request->order_drawing)) ? $request->order_drawing : 0;

        $profile_drawing_imageName = $request->edit_profile_drawing_image;
        if ($request->hasFile('profile_drawing_image')) {
            $profile_drawing_imageName = time().'.'.$request->profile_drawing_image->extension();  
            $request->profile_drawing_image->move(public_path('uploads/product_profile'), $profile_drawing_imageName); 
        }

        $order_drawing_imageName = $request->edit_order_drawing_image;
        if ($request->hasFile('order_drawing_image')) {
            $order_drawing_imageName = time().'.'.$request->order_drawing_image->extension();  
            $request->order_drawing_image->move(public_path('uploads/product_order'), $order_drawing_imageName); 
        }

        $updateProductData = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'profile_drawing' => $profile_drawing,
            'profile_drawing_image' => $profile_drawing_imageName, 
            'order_drawing' => $order_drawing,
            'order_drawing_image' => $order_drawing_imageName,
            'show_in_application' => $show_in_application,
            'status' => $status,
        ];
        
        $updateProduct = Product::where('id',$request->id)->update($updateProductData);

        if (! empty($updateProduct)) {
            $product_id = $request->id;
            
            if ($request->hasFile('image')) {
                $allowedfileExtension=['jpeg','png','jpg','gif'];
                foreach($request->file('image') as $product_image){
                    /*$name=$product_image->getClientOriginalName();
                    $product_image->move(public_path().'/uploads/product/', $name);  
                    $data[] = $name; */     
                    
                    $filename = $product_image->getClientOriginalName();
                    $extension = $product_image->getClientOriginalExtension();
                    $check=in_array(strtolower($extension),$allowedfileExtension);
                    if($check){
                        $imageName = time()."-".rand(1,100).'.'.$product_image->extension();  
                        $product_image->move(public_path('uploads/product'), $imageName);

                        $newProductImageData = [
                            'image' => $imageName,
                            'product_id' => $product_id
                        ]; 

                        $newProductImage = ProductImage::create($newProductImageData);
                    }    
                }
            }

            //Add Product Attributes heights, widths, lengths, thickness, sizes, colors
            if(isset($request->product_height_unit)){
                $this->addProductttributes($product_id,'product_attribute_heights','height',$request->product_height,$request->product_height_unit);
            }
            
            if(isset($request->product_width_unit)){
                $this->addProductttributes($product_id,'product_attribute_widths','width',$request->product_width,$request->product_width_unit);
            }
            
            if(isset($request->product_length_unit)){
                $this->addProductttributes($product_id,'product_attribute_lengths','length',$request->product_length,$request->product_length_unit);
            }
            
            if(isset($request->product_thickness_unit)){
                $this->addProductttributes($product_id,'product_attribute_thickness','thickness',$request->product_thickness,$request->product_thickness_unit);
            }
            
            if(isset($request->product_size_unit)){
                $this->addProductttributes($product_id,'product_attribute_sizes','size',$request->product_size,$request->product_size_unit);
            }
            
            if(isset($request->product_color)){
                $this->addProductttributes($product_id,'product_attribute_colors','color',$request->product_color,array());
            }

            
            //Update Product Attributes heights, widths, lengths, thickness, sizes, colors
            if(isset($request->edit_product_height)){
               $this->updateProductttributes($request->edit_product_height_id,$product_id,'product_attribute_heights','height',$request->edit_product_height,$request->edit_product_height_unit); 
            }
            
            if(isset($request->edit_product_width)){
                 $this->updateProductttributes($request->edit_product_width_id,$product_id,'product_attribute_widths','width',$request->edit_product_width,$request->edit_product_width_unit);
            }
           
            if(isset($request->edit_product_length)){
                $this->updateProductttributes($request->edit_product_length_id,$product_id,'product_attribute_lengths','length',$request->edit_product_length,$request->edit_product_length_unit);
            }
            
            if(isset($request->edit_product_thickness)){
                $this->updateProductttributes($request->edit_product_thickness_id,$product_id,'product_attribute_thickness','thickness',$request->edit_product_thickness,$request->edit_product_thickness_unit);
            }

            if(isset($request->edit_product_size)){
               $this->updateProductttributes($request->edit_product_size_id,$product_id,'product_attribute_sizes','size',$request->edit_product_size,$request->edit_product_size_unit);
            }

            if(isset($request->edit_product_color)){
               $this->updateProductttributes($request->edit_product_color_id,$product_id,'product_attribute_colors','color',$request->edit_product_color,array()); 
            }
            

            return redirect('products')->with('success',"Product has been updated successfully.");
        } else {
            return redirect()->back()->withErrors("Something want wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteProduct = Product::where('id','=',$id)->delete();
        if($deleteProduct){
            $deleteProductImage = ProductImage::where('product_id','=',$id)->delete();
            return redirect('products')->with('success',"Product was deleted successfully.");
        }else{
            return redirect()->back()->withErrors("Something want wrong! please try again.");
        }
    }
}
