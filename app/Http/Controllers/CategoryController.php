<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //$categories = $this->listParentCategories();
       	//echo "<pre>"; print_r( $categories);die();
        //$this->setPageTitle('Categories', 'List of all categories');
        //return view('admin.categories.index', compact('categories'));
        return view('admin.categories.index');
    }

    public function subindex()
    {
        return view('admin.categories.sub_index');
    }

    public function getParentCategories(){
    	$categories = $this->listParentCategories();
    	return Datatables::of($categories)
                         ->addColumn('action',function($selected)
                         {
                             $categories='<a href="'.route("categories.edit",$selected->id).'" class="btn btn-sm btn-outline-info" title="Edit" ><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onclick="return deletecat('.$selected->id.')" class="btn btn-sm btn-outline-info" title="Delete" ><i class="fa fa-trash"></i></a>';
                             return $categories;
                         })

                         ->editColumn('image',function($data){
                             if($data->image){
                                 return '<img src="'.$data->image_url.'" height="100px" width="100px">';
                             }else{
                                 return '';
                             }
                         })
                         //->rawColumns(['action'])
                         ->rawColumns(['action','image'])
                         ->addIndexColumn()
                         ->make(true);
    }

    public function listParentCategories(){
    	$categories = Category::where('parent_id','=',0)->get();
    	return $categories;
    }

    public function getChildCategories(){
    	$subcategories = $this->listChildCategories();
    	return Datatables::of($subcategories)
                         ->addColumn('action',function($selected)
                         {
                             $subcategories='<a href="'.route("subcategories.edit",$selected->id).'" class="btn btn-sm btn-outline-info" title="Edit" ><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onclick="return deletesubcat('.$selected->id.')" class="btn btn-sm btn-outline-info" title="Delete" ><i class="fa fa-trash"></i></a>';
                             return $subcategories;
                         })

                         ->editColumn('image',function($data){
                             if($data->image){
                                 return '<img src="'.$data->image_url.'" height="100px" width="100px">';
                             }else{
                                 return '';
                             }
                         })

                         ->addColumn('parent_name',function($selected){
                            $parentCategory = Category::where('id','=',$selected->parent_id)->get();
                            if(!$parentCategory->isEmpty()){
                            	return $parentCategory[0]['name'];
                            }else{
                            	return '';
                            }
                            //return date("d-m-Y");
                         })
                         //->rawColumns(['action'])
                         ->rawColumns(['action','parent_name', 'image'])
                         ->addIndexColumn()
                         ->make(true);
    }

    public function listChildCategories(){
    	$categories = Category::where('parent_id','!=',0)->get();
    	return $categories;
    }

    public function getParentChildCategories($id){
    	$categories = Category::where('parent_id','=',$id)->get();
    	return $categories;
    }

    public function create(){
    	return view('admin.categories.create');
    }

    public function subcreate(){
    	$categories = Category::where('parent_id','=',0)->get();
    	return view('admin.categories.sub_create', compact('categories'));
    }

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
				'name' => 'required',
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
		if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $categoryName = $request->name;
        $categoryExist = $this->categoryExist($categoryName);
        
       if($categoryExist->isEmpty()){
        	$imageName = '';
	        if ($request->hasFile('image')) {
	            $imageName = time().'.'.$request->image->extension();  
	            $request->image->move(public_path('uploads/category'), $imageName); 
	        }
        	
        	$newCategoryData = [
				'name' => $request->name,
				'parent_id' => 0,
				'image' => $imageName
			];
			//print_r($newCategoryData);die();

			$newCategory = Category::create($newCategoryData);

			if (! empty($newCategory)) {
				return redirect('categories')->with('success',"New Category has been created successfully.");
			} else {
				return redirect()->back()->withErrors("Something want wrong");
			}
		}else{
        	return redirect()->back()->withErrors("Category already exist with this name! Please try with another name.");
        }
    }

    public function substore(Request $request){
    	$validator = Validator::make($request->all(), [
				'name' => 'required',
				'parent_id' => 'required',
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
		if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $categoryName = $request->name;
        $subcategoryExist = $this->subcategoryExist($categoryName);
        
       if($subcategoryExist->isEmpty()){
        	$imageName = '';
	        if ($request->hasFile('image')) {
	            $imageName = time().'.'.$request->image->extension();  
	            $request->image->move(public_path('uploads/category'), $imageName); 
	        }

        	$newCategoryData = [
				'name' => $request->name,
				'parent_id' => $request->parent_id,
				'image' => $imageName
			];

			$newCategory = Category::create($newCategoryData);

			if (! empty($newCategory)) {
				return redirect('subcategories')->with('success',"New Sub Category has been created successfully.");
			} else {
				return redirect()->back()->withErrors("Something want wrong");
			}
		}else{
        	return redirect()->back()->withErrors("Sub Category already exist with this name! Please try with another name.");
        }
    }

    public function categoryExist($categoryName,$id=NULL){
    	if($id==NULL){
    		$categories = Category::where('name', $categoryName)->where('parent_id','=', 0)->get();
    	}else{
    		$categories = Category::where('name', $categoryName)->where('parent_id','=', 0)->where('id','!=',$id)->get();
    	}
    	
    	return $categories;
    }

    public function subcategoryExist($categoryName,$id=NULL){
    	if($id==NULL){
    		$categories = Category::where('name', $categoryName)->where('parent_id','!=', 0)->get();
    	}else{
    		$categories = Category::where('name', $categoryName)->where('parent_id','!=', 0)->where('id','!=',$id)->get();
    	}
    	
    	return $categories;
    }

    public function edit($id){
		$category = Category::where('id', $id)->get();
    	//echo "<pre>";print_r($category);die();
    	return view('admin.categories.edit', compact('category'));	
    }

    public function subedit($id){
		$categories = Category::where('parent_id','=',0)->get();
		$category = Category::where('id', $id)->get();
    	//echo "<pre>";print_r($category);die();
    	return view('admin.categories.sub_edit', compact('categories','category'));	
    }

    public function update(Request $request){
    	if ($request->hasFile('image')) {
    		$validator = Validator::make($request->all(), [
				'name' => 'required',
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
    	}else{
    		$validator = Validator::make($request->all(), [
				'name' => 'required',
			]);
    	}
    	
		if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $categoryName = $request->name;
        $categoryId = $request->id;
        $categoryExist = $this->categoryExist($categoryName,$categoryId);
        
       if($categoryExist->isEmpty()){
        	
        	$imageName = $request->edit_image;
	        if ($request->hasFile('image')) {
	            $imageName = time().'.'.$request->image->extension();  
	            $request->image->move(public_path('uploads/category'), $imageName); 
	        }

        	$updateCategory = Category::where('id',$categoryId)->update(array('name'=>$categoryName, 'image'=>$imageName));

			if ($updateCategory) {
				return redirect('categories')->with('success',"Category has been updated successfully.");
			} else {
				return redirect()->back()->withErrors("Something want wrong");
			}
		}else{
        	return redirect()->back()->withErrors("Category already exist with this name! Please try with another name.");
        }
    }

    public function subupdate(Request $request){
    	if ($request->hasFile('image')) {
    		$validator = Validator::make($request->all(), [
				'name' => 'required',
				'parent_id' => 'required',
				'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
    	}else{
    		$validator = Validator::make($request->all(), [
				'name' => 'required',
				'parent_id' => 'required',
			]);
    	}

		if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $categoryName = $request->name;
        $categoryId = $request->id;
        $parent_id = $request->parent_id;
        $categoryExist = $this->categoryExist($categoryName,$categoryId);
        
       if($categoryExist->isEmpty()){
        	
        	$imageName = $request->edit_image;
	        if ($request->hasFile('image')) {
	            $imageName = time().'.'.$request->image->extension();  
	            $request->image->move(public_path('uploads/category'), $imageName); 
	        }

        	$updateCategory = Category::where('id',$categoryId)->update(array('name'=>$categoryName,'parent_id'=>$parent_id, 'image'=>$imageName));

			if ($updateCategory) {
				return redirect('subcategories')->with('success',"Sub Category has been updated successfully.");
			} else {
				return redirect()->back()->withErrors("Something want wrong");
			}
		}else{
        	return redirect()->back()->withErrors("Sub Category already exist with this name! Please try with another name.");
        }
    }

    public function delete($id){
    	$childCategories = $this->getParentChildCategories($id);
    	if(!$childCategories->isEmpty()){
    		return redirect()->back()->withErrors("This Category was assigned with some subcategories. Please first delete the all subcategories related to this category.");
    	}else{
    		$deleteCategory = Category::where('id','=',$id)->delete();
    		//$deleteCategory = Category::destroy($id);
    		if($deleteCategory){
    			return redirect('categories')->with('success',"Category Deleted successfully.");
    		}else{
    			return redirect()->back()->withErrors("Something want wrong! please try again.");
    		}
    	}
    }

    public function getCategoryProducts($id){
        $products = Product::where('subcategory_id', $id)->get();
        return $products;
    }

    public function subdelete($id){
    	$products = $this->getCategoryProducts($id);
        if(!$products->isEmpty()){
            return redirect()->back()->withErrors("This Category was assigned with some products. Please first delete the all products related to this category.");
        }else{
            $deleteCategory = Category::where('id','=',$id)->delete();
    		//$deleteCategory = Category::destroy($id);
    		if($deleteCategory){
    			return redirect('subcategories')->with('success',"Sub Category Deleted successfully.");
    		}else{
    			return redirect()->back()->withErrors("Something want wrong! please try again.");
    		}
        }    
    }
}
