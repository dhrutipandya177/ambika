<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FrontUserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete');
    }
    //
    public function index()
    {
        return view('front_user');
    }

    /* Amenities Type Yajra getdata */
    public function getuserdata(){
        $topic_data = User::orderBy('id','Desc')->get();
        return Datatables::of($topic_data)
                         ->addColumn('action',function($selected)
                         {
                             $topic_data='';
                             if(\Auth::user()->hasPermissionTo('user-edit') && $selected->is_celt_pro == 0){
                                 $topic_data = '<a href="javascript:void(0)" class="btn btn-sm btn-outline-info" title="Edit" onclick="editFrontUser('.$selected->id.')"><i class="fa fa-pencil"></i></a>';
                             }
                             if(\Auth::user()->hasPermissionTo('user-delete')){
                                 $topic_data.='<a href="javascript:void(0)" class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteFrontuser('.$selected->id.')"><i class="fa fa-trash"></i></a>';
                             }
                             return $topic_data;
                         })
                         ->editColumn('profile_pic',function($selected){
                             if($selected->profile_pic){
                                 return '<img src="'.$selected->profile_pic.'" height="100px" width="100px">';
                             }else{
                                 return '';
                             }
                         })
                         ->addColumn('country_name',function($selected){
                             return (isset($selected->CountryDetail->country_name))?$selected->CountryDetail->country_name:'-';
                         })
                         ->editColumn('is_celt_pro',function($selected){
                             if($selected->is_celt_pro){
                                 return '<a href="javascript:void(0)" class="btn btn-sm btn-outline-success" title="No" ><i class="fa fa-check"></i></a>';
                             }else{
                                 return '<a href="javascript:void(0)" class="btn btn-sm btn-outline-danger" title="No" ><i class="ion ion-close"></i></a>';
                             }
                         })
                         ->rawColumns(['action','profile_pic','country_name','is_celt_pro'])
                         ->make(true);
    }

    public function changeStatus(Request $request){
        $user=User::find($request->id);
        $user->is_celt_pro=1;
        $user->save();
        $result = array(
            'status' => 1,
            'msg' => "Status change Successfully"
        );
        return response()->json($result)->setStatusCode(200);
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();
        $result = array(
            'status' => 1,
            'msg' => "User deleted Successfully"
        );
        return response()->json($result)->setStatusCode(200);
    }
}
