<?php

namespace App\Http\Controllers\Api;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends BaseApiController
{
    /*Notification list*/
    public function getNotification(Request $request){
        //dd($request->user());exit;
        //var_dump($request);
        $notification=Notification::with('receiver')->where('type','!=',99)->where('receiver_id',$request->user()->id)->orderBy('id','Desc')->get()->map(function($notification){
           return  [
               'id'=>$notification->id,
               'message'=>$notification->message,
               'parameter'=>json_decode($notification->parameter),
               'type'=>$notification->type,
               'created_at'=>$notification->created_at
           ];
        });
        return Self::sendResponse($notification,'Notification list');
    }
    /** Mark Notification read */
    public function readNotification(Request $request){
       // dd($request->user()->id);
        $notification=Notification::where('receiver_id',$request->user()->id)
            ->where('read',0);
        //dd($notification);exit;    

        if($request->has('id') && $request->id != '' && $request->id != 0){
            $notification=$notification->where('id',$request->id);
        }
        $notification=$notification->update(['read'=>1]);
        return Self::sendResponse([],'Notification Mark Read Successfully');
    }

    /*public function readNotification_new(Request $request){
        //dd($request->user()->id);
        //$notification=Notification::where('receiver_id',$request->user()->id)->where('read',0);
        if($request->has('id') && $request->id != '' && $request->id != 0){
            $notification=Notification::where('receiver_id',$request->user()->id)->where('reads',0)->where('id',$request->id);
            var_dump($notification);
            //$notification=$notification->where('id',$request->id);
            if(!empty($notification)){
                $notification=$notification->update(['read'=>1]);
                return Self::sendResponse([],'Notification Mark Read Successfully');
            }else{
                return Self::sendResponse([],'Something went wrong. please try again.');
            }
        }else{
            return Self::sendResponse([],'please send notification id first and try again.');
        }
    }*/
    

    /* Delete Notification */
    public function deleteNotification(Request $request){
        $notification=new Notification();
        $ids=explode(',',$request->ids);
        if(is_array($ids)){
            $notification=$notification->whereIn('id',$ids);
        }else{
            $notification=$notification->where('id',$ids);
        }
        $notification=$notification->delete();
        return Self::sendResponse([],'Notification Deleted Successfully');
    }
}
