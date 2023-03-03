<?php

namespace App\Http\Controllers\Front;

use App\Models\Inquiry;
use App\Http\Controllers\Controller;
use App\Helpers\CommonHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        //compact(['application'])
        $url = route("front.slider");
        $listSlider = CommonHelper::curlCall($url, 'get', $postfields = null);
        $homeSlider = json_decode($listSlider);
        $homeSlider = $homeSlider->data;
        //var_dump($homeSlider);
        return view('front.home',compact(['homeSlider']));
    }

    public function getCategoryProductsList($catid){
        $catid = base64_decode($catid);
        $url = route("front.getcategoryproducts",$catid);
        $productList = CommonHelper::curlCall($url, 'get', $postfields = null);
        $productList = json_decode($productList);
        $productList = $productList->data;

        $categoryName = "";
        $subcategoryName = "";
        if(!empty($productList)) {
            //echo "<pre>";print_r($productList[0]);exit;
            $categoryName = $productList[0]->category_info->name;
            $subcategoryName = $productList[0]->subcategory_info->name;
        }else{
            $url = route("front.getcategoryinfo",$catid);
            $categoryInfo = CommonHelper::curlCall($url, 'get', $postfields = null);
            $categoryInfo = json_decode($categoryInfo);
            $categoryInfo = $categoryInfo->data;

            $categoryName = $categoryInfo[0]->name;
            $subcategoryName = $categoryInfo[0]->parent_name;
        }

        //echo "<pre>";print_r($categoryInfo);print_r($productList);exit;
        return view('front.productlist',compact(['productList','categoryName','subcategoryName']));
    }

    public function getProductDetails($pid){
        $pid = base64_decode($pid);
        $url = route("front.getproductinfo",$pid);
        $productInfo = CommonHelper::curlCall($url, 'get', $postfields = null);
        $productInfo = json_decode($productInfo);
        $productInfo = $productInfo->data;
        //echo "<pre>";print_r($productInfo);exit;

        return view('front.productdetails',compact(['productInfo']));
    }

    public function contactus(){
        $url = route("front.getproductlist");
        $listProducts = CommonHelper::curlCall($url, 'get', $postfields = null);
        $listProducts = json_decode($listProducts);
        $listProducts = $listProducts->data;
        //echo "<pre>";print_r($listProducts);exit;
        return view('front.contactus',compact(['listProducts']));
    }

    public function inquiryStore(Request $request){
        //echo "<pre>";print_r($request);exit;
        
        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'product_id' => 'required',
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $newInquiryData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'product_id' => $request->product_id,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'description' => $request->description,
            ];
        $newInquiry = Inquiry::create($newInquiryData); 
        
        if (! empty($newInquiry)) {
            return redirect('contact-us')->with('success',"Your inquiry has been submitted successfully.");
        } else {
            return redirect()->back()->withErrors("Something want wrong");
        }
       

        /*$url = route("front.inquirystore");
        $postfields = $request;
        $inquiryStore = CommonHelper::curlCall($url, 'post', $postfields);
        //var_dump($inquirystore->data);
        $inquiryStoreData = $inquirystore->data;
        if($inquiryStoreData['success']==true){
            return redirect('contact-us')->with('success',$inquiryStoreData['message']);
        }else{
            return redirect()->back()->withErrors($inquiryStoreData['message']);
        }*/
        
    }
    
    public function aboutus()
    {
        $url = route("front.getproductlist");
        $listProducts = CommonHelper::curlCall($url, 'get', $postfields = null);
        $listProducts = json_decode($listProducts);
        $listProducts = $listProducts->data;
        //echo "<pre>";print_r($listProducts);exit;
        return view('front.aboutus',compact(['listProducts']));

        //return view('front.aboutus');
    }

    public function gallery(){
        $url = route("front.gallery");
        $getgallery = CommonHelper::curlCall($url, 'get', $postfields = null);
        $galleryinfo = json_decode($getgallery);
        $gallery = $galleryinfo->data;
        //echo "<pre>";var_dump($gallery);
        return view('front.gallery', compact(['gallery']));
    }

    public function termsandcondition()
    {
        return view('front.termsandcondition');
    }

    public function privacypolicy(){
        return view('front.privacypolicy');
    }
}
