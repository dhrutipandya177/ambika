<?php

namespace App\Http\Controllers;

use App\Jobs\SendAdminNotification;
use App\Models\AdminNotification;
use App\Models\Notification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use Yajra\DataTables\DataTables;

class NotificationController extends Controller
{
    function index(){
        $users = User::where('verification_at','=',1)->where('user_type',1)->get();
        return view('admin.notifications.list', compact('users'));
    }

    function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            //'image'=>'mimes:jpeg,jpg,png,gif|max:10000',
            //'notification_type'=>'required'
        ]);
        if ($validator->fails()) {
            $result = array(
                'status' => 0,
                'msg' => json_encode($validator->errors()->all())
            );
            return response()->json($result)->setStatusCode(200);
        }
       /* if($request->has('image') && $request->image != ''){
            $avatarMedia = $request->file('image');
            $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
            $photoName = time() .'_'. $strippedName;
            Storage::disk('local')->put('/uploads/adminnotification/' . $photoName, file_get_contents($avatarMedia));
        }else{
            $photoName=null;
        }*/
        
        //$userslist = $request->users;
        //echo "<pre>"; print_r($userslist); exit;  

        $notification=AdminNotification::create([
            'title'=>$request->title,
            'description'=>$request->description,
            //'notification_type'=>$request->notification_type,
            //'image'=>$photoName
        ]);
        //echo "<pre>"; print_r($notification); exit;  
       
        dispatch((new SendAdminNotification($notification)));
        
        $result = array(
            'status' => 1,
            'msg' => "Notification send Successfully"
        );
        return response()->json($result)->setStatusCode(200);

    }

    public function getallnotification(){
        $notification_data = AdminNotification::orderBy('id','Desc')->get();
        return Datatables::of($notification_data)
                         ->addColumn('action',function($selected)
                         {
                             $user_data='<a href="javascript:;" class="btn btn-danger btn-sm btnDelete" id="select" onclick="deleteNotification('.$selected->id.')" title="Delete"><i class="fa fa-trash-o"></i></a> ';

                             return $user_data;
                         })
                         ->editColumn('date',function($selected){
                             return Carbon::parse($selected->created_at)->format('d-m-Y');
                         })
                         ->rawColumns(['action'=>'action','date'=>'date'])
                         ->addIndexColumn()
                         ->make(true);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        AdminNotification::where('id',$id)->delete();
        $result = array(
            'status' => 1,
            'msg' => "Record deleted Successfully"
        );
        return response()->json($result)->setStatusCode(200);
    }


}
