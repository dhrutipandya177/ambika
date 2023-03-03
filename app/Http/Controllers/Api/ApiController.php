<?php 

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductAttributeHeight;
use App\Models\ProductAttributeWidth;
use App\Models\ProductAttributeLength;
use App\Models\ProductAttributeThickness;
use App\Models\ProductAttributeSize;
use App\Models\ProductAttributeColor;
use App\Models\Order;
use App\Models\OrdersDetail;
use App\Models\Slider;
use App\Models\Inquiry;
use App\Models\Gallary;
use App\Models\GallaryImages;
use App\Models\Setting;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class ApiController extends BaseApiController
{

	public function getHomeSlider(){
		$slider = Slider::where('status','=',1)->get();
		return Self::sendResponse($slider,"Home Slider");
	}

	public function getGallery(){
		$gallery = Gallary::with('gallaryImages')->where('status','=',1)->get();
        return Self::sendResponse($gallery,"gallery");
	}

	public function getCategories(){
		//$user=User::where('id',$request->user()->id)->first();
        $categories = Category::where('parent_id','=',0)->get();
        if(!$categories->isEmpty()){
        	return Self::sendResponse($categories,"Category List");
        }else{
        	return Self::sendResponse($categories,"Category List Not Found");
        }

        //return Self::sendResponse($categories,"Category List");
	}

	public function getSubCategories(Request $request){
		$categories = Category::where('parent_id','=',$request->id)->get();
		 if(!$categories->isEmpty()){
		 	return Self::sendResponse($categories,"SubCategory List");
		 }else{
		 	return Self::sendResponse($categories,"SubCategory List Not Found");
		 }

		//return Self::sendResponse($categories,"SubCategory List");
	}

	public function getCategoryInfo($catid){
		$category = Category::where('id','=',$catid)->get();
		//print_r($category);
		if(!$category->isEmpty()){
		 	return Self::sendResponse($category,"Category Info");
		 }else{
		 	return Self::sendResponse($category,"Category Info Not Found");
		 }
	}

	public function getCategoryProducts(Request $request){
		//$products = Product::with('ProductImages')->get();
		//$products = Product::with('productImages','categoryInfo','subcategoryInfo')->where('subcategory_id', $request->id)->get();
		
		$products = Product::with('categoryInfo','subcategoryInfo','productImages','productHeights','productWidths','productLengths','productThickness','productSizes','productColors')->where('subcategory_id', $request->id)->where('status','=',1)->where('show_in_application','=',1)->get();
		return Self::sendResponse($products,"Category Product List");
	}

	public function getproductList(Request $request){
		 $products = Product::with('categoryInfo','subcategoryInfo','productImages','productHeights','productWidths','productLengths','productThickness','productSizes','productColors')->where('status','=',1)->where('show_in_application','=',1)->get();
        return Self::sendResponse($products,"All Product List");
	}

	public function getProductInfo(Request $request){ 
		//$product = Product::with('productImages','categoryInfo','subcategoryInfo')->where('id', $request->id)->first();
		$product = Product::with('categoryInfo','subcategoryInfo','productImages','productHeights','productWidths','productLengths','productThickness','productSizes','productColors')->where('id', $request->id)->where('status','=',1)->where('show_in_application','=',1)->first();
		return Self::sendResponse($product,"Product Info");
	}	

	public function getProductWithCatMenu(Request $request){
		$categories = Category::with('children')->where('parent_id','=',0)->get();
		return Self::sendResponse($categories,"All Categories With SubCategory List");
	}

	public function inquiryStore(Request $request){
		$validator = Validator::make($request->all(), [
				'name' => 'required',
				'email' => 'required',
				'phone' => 'required',
				'product_id' => 'required',
			]);
		if ($validator->fails()) {
            return Self::sendError($validator->errors()->first(),"Validation failure.");
        }

        $newInquiryData = [
				'name' => $request->name,
				'email' => $request->email,
				'phone' => $request->phone,
				'product_id' => $request->product_id,
				'description' => $request->description,
			];
		$newInquiry = Inquiry::create($newInquiryData);	
		
		if (! empty($newInquiry)) {
			return Self::sendResponse(['newInquiry'=>$newInquiry],"Inquiry successfully submitted.");
		} else {
			return Self::sendError($validator->errors()->first(),"Something want wrong.");
		}
		//return Self::sendResponse(['email'=>$request->email],"Inquiry submitted successfully!");
	}
	
	public function getSettingsInfo(Request $request){
		$settings = Setting::where('status','=',1)->get();
		
		$settingsInfo = array();
		if(!empty($settings)){
			foreach($settings as $setting){
				$settingsInfo[$setting->setting_name] = explode("," , $setting->setting_value);
			}
		}
		return Self::sendResponse($settingsInfo,"Order Settings Info");
	}

	public function storeOrder(Request $request){
		//echo "<pre>";print_r($request->all());exit;
			/*$product_attributes = array(
				"width"=>"100","thickness"=>"500","lenght"=>"150","size"=>"45","color"=>"red"
			);
			$productdata = array(
						"product_id"=>"1",
						"product_unit"=>"1",
						"price"=>"50.00",
						"total_price"=>"50.00",
						"quantity"=>"1",
						"product_attributes"=>json_encode($product_attributes),
						"product_info"=>"story of jungle animals. Our airfreight staff atta.",	
						);
			$product_info[] = $productdata;
			$product_info[] = $productdata;
			$product_info[] = $productdata;

			$products = json_encode($product_info);
			echo $products;
			

			$product_info = $request->product_info;
			//echo $product_info;
			$product_info = json_decode($product_info, true);
			echo "<pre>";print_r($product_info);
			exit;	*/	

		$validator = Validator::make($request->all(), [
				'user_id' => 'required',
				'phone_no' => 'required',
				'sub_total' => 'required',
				'total_amount' => 'required',
				'order_status' => 'required',
				'payment_status' => 'required',
				'payment_type' => 'required',
				'product_info' => 'required',
			]);
		
		if ($validator->fails()) {
            return Self::sendError($validator->errors()->first(), 'Validation failure.', 422);
        }
        $invoice_no = "#ABK-".rand(1,99)."-".time();
        $newOrderData = [
				'invoice_no'=> $invoice_no,
				'user_id' => $request->user_id,
				'company_address' => $request->company_address,
				'shipping_address' => $request->shipping_address,
				'phone_no' => $request->phone_no,
				'gst_number' => $request->gst_number,
				'sub_total' => $request->sub_total,
				'gst_price' => $request->gst_price,
				'total_amount' => $request->total_amount,
				'order_status' => $request->order_status,
				'payment_status' => $request->payment_status,
				'payment_type' => $request->payment_type,
				'payment_info' => $request->payment_info,
				'notes' => $request->notes,
			];
		$newOrder = Order::create($newOrderData);	
		
		if (! empty($newOrder)) {
			$order_id = $newOrder->id;
			
			$product_info = $request->product_info;
			//echo $product_info;
			$product_info = json_decode($product_info, true);
			//echo "<pre>";print_r($product_info);
			//exit;

			if(!empty($product_info)){
				foreach($product_info as $product){
					$newOrderDetailsData = [
						"order_id"=>$order_id,
						"product_id"=>$product['product_id'],
						"product_name"=>$product['product_name'],
						"product_unit"=>$product['product_unit'],
						"price"=>$product['price'],
						"total_price"=>$product['total_price'],
						"quantity"=>$product['product_unit'],
						"product_attributes"=>$product['product_attributes'],
						"product_info"=>$product['product_info']
					];
					$newOrderDetails = OrdersDetail::create($newOrderDetailsData);	
				}
			}
			$order_info = $this->getOrderInfo($order_id);
			return Self::sendResponse(['order_id'=>$order_id,'invoice_no'=>$invoice_no,'order_info'=>$order_info],"New order was successfully created.");
		} else {
			return Self::sendError($validator->errors()->first(), 'Something want wrong.', 422);
		}
	}

	public function getOrderInfo($order_id){
		$order = Order::with('orderDetails','userInfo')->where('order_id','=',$order_id)->first();
        return $order;
	}

	public function getUserOrderList(Request $request){
		$orders = Order::with('orderDetails','userInfo')->where('user_id','=',$request->user()->id)->get();
        //return $orders;
        return Self::sendResponse(['user_id'=>$request->user()->id,'order_list'=>$orders],"User Orders List.");
	}	
}	

