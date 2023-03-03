<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Order;
use App\Models\OrdersDetail;
use App\Models\Inquiry;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('parent_id','=',0)->count();
        $subcategories = Category::where('parent_id','!=',0)->count();
        $products = Product::where('status','=',1)->count();
        $orders = Order::with('orderDetails','userInfo')->orderBy('order_id', 'DESC')->limit(10)->get();
        //with('orderDetails')->->orderBy('order_id', 'DESC')
        $users = User::where('verification_at','=',1)->orderBy('id', 'DESC')->limit(10)->get();
        //echo "<pre>";print_r( $users);
        return view('home',compact('categories','subcategories','products','orders','users'));
    }

    public function getUsers(){
        $users = $this->getUserslist();
        return Datatables::of($users)
                        ->addColumn('action',function($user)
                         {
                             $inquiries='<a href="'.route("home.viewuser",$user->id).'" class="btn btn-sm btn-outline-info" title="View" ><i class="fa fa-eye"></i></a> <a href="javascript:void(0);" onclick="return deleteuser('.$user->id.')" class="btn btn-sm btn-outline-info" title="Delete" ><i class="fa fa-trash"></i></a>';
                             return $inquiries;
                         })
                        /*->editColumn('user_type',function($users){
                           if($users["user_type"]==1){
                                return "User";
                            }else{
                                 return "Dealer";   
                            }
                         })*/
                         ->rawColumns(['action'])
                         ->addIndexColumn()
                         ->make(true);
    }

    public function getUserslist(){
        $users = User::where('verification_at','=',1)->orderBy('id', 'DESC')->get();
        return $users;
    }

    public function users(){
        $users = $this->getUserslist();
        return view('admin.users.index', compact('users'));
    }

    public function viewUser($id){
        $userInfo = User::where('id','=',$id)->first();
        return view('admin.users.viewuser', compact('userInfo'));
    }

    public function createUser(){
        return view('admin.users.create');
    }

    public function storeUser(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }  

        $user=User::where('user_type',2)->where(function ($query) use ($request) {
                          $query->where('phone_no',$request->phone_no)->orwhere('email',$request->email);
                    })->first();

        if(!empty($user) && $user->verification_at == 0){
            return redirect()->back()->withErrors("You are already register please verify your acount.");
        }elseif(!empty($user) &&  $user->verification_at == 1){
           return redirect()->back()->withErrors("You are already register,please login to countine.");
        }else{
            $otp = rand(1000, 9999);
            $user=new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->verification_code = $request->otp;
            $user->password = bcrypt($request->password);
            $user->phone_no = $request->phone_no;
            $user->user_type = $request->user_type;
            $user->verification_at = $request->verification_at;
            $user->save();
            return redirect('home/users')->with('success',"New User was added successfully.");
        }   
    }

    public function deleteUser($id){
        $deleteUser = User::where('id','=',$id)->delete();
        if($deleteUser){
            return redirect('home/users')->with('success',"User was deleted successfully.");
        }else{
            return redirect()->back()->withErrors("Something want wrong! please try again.");
        }
    }

    public function inquiryList(){
        return view('admin.inquiries.index');
    }

    public function getInquiries(){
        $inquiries = Inquiry::with('productInfo')->orderBy('id', 'DESC')->get();

        return Datatables::of($inquiries)
                         ->addColumn('action',function($selected)
                         {
                             $inquiries='<a href="'.route("inquiry.viewinquiry",$selected->id).'" class="btn btn-sm btn-outline-info" title="View" ><i class="fa fa-eye"></i></a> <a href="javascript:void(0);" onclick="return deleteinquiry('.$selected->id.')" class="btn btn-sm btn-outline-info" title="Delete" ><i class="fa fa-trash"></i></a>';
                             return $inquiries;
                         })

                         ->addColumn('product_name',function($selected){
                           if(!empty($selected["productInfo"])){
                                return $selected["productInfo"]["name"];
                            }else{
                                 return '';   
                            }
                         })

                         ->editColumn('created_at',function($selected){
                           if(!empty($selected["created_at"])){
                                return date("d-m-Y g:i A",strtotime($selected['created_at']));
                            }else{
                                 return '';   
                            }
                         })
                         ->rawColumns(['action','product_name'])
                         ->addIndexColumn()
                         ->make(true);
    }

    public function viewInquiry($id){
        $inquiry = Inquiry::with('productInfo')->where('id','=',$id)->first();
        //echo "<pre>";print_r($inquiry);
        return view('admin.inquiries.view', compact('inquiry'));
    }
    
    public function deleteInquiry($id){
        $deleteInquiry = Inquiry::where('id','=',$id)->delete();
        if($deleteInquiry){
            return redirect('inquiry')->with('success',"Inquiry was deleted successfully.");
        }else{
            return redirect()->back()->withErrors("Something want wrong! please try again.");
        }
    }

}
