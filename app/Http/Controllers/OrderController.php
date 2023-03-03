<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrdersDetail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.index');
    }

    public function getOrders(){
        $orders = $this->listOrders();
        return Datatables::of($orders)
                         ->addColumn('action',function($selected)
                         {
                             $orders='<a href="'.route("orders.view",$selected->order_id).'" class="btn btn-sm btn-outline-info" title="View" ><i class="fa fa-eye"></i></a> <a href="javascript:void(0);" onclick="return deleteorders('.$selected->order_id.')" class="btn btn-sm btn-outline-info" title="Delete" ><i class="fa fa-trash"></i></a>';
                             return $orders;
                         })

                         ->editColumn('order_id',function($data){
                             return "#ABK-".$data->order_id; 
                         })

                         ->editColumn('email',function($data){
                             if($data['userInfo']['email']!=""){
                                return $data['userInfo']['email'];   
                             }else{
                                return "";
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
                         ->rawColumns(['action','order_id','email','status'])
                         ->addIndexColumn()
                         ->make(true);
    }

    public function listOrders(){
        $orders = Order::with('orderDetails','userInfo')->orderBy('order_id', 'DESC')->get();
        return $orders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function view($order_id)
    {
        $order_info = Order::with('orderDetails','userInfo')->where('order_id','=',$order_id)->first();
        //echo "<pre>";print_r($order_info['orderDetails'][0]['product_attributes']);
		//$aa = $order_info['orderDetails'][0]['product_attributes'];
		//print_r(json_decode($aa));
		return view('admin.orders.view', compact('order_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {
        $deleteOrder = Order::where('order_id','=',$order_id)->delete();
        if($deleteOrder){
            $deleteOrderDetails = OrdersDetail::where('order_id','=',$order_id)->delete();
            return redirect('orders')->with('success',"Order was deleted successfully.");
        }else{
            return redirect()->back()->withErrors("Something want wrong! please try again.");
        }
    }
}
