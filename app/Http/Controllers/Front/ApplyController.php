<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Models\CourseApplication;

class ApplyController extends Controller
{
    public function index($course=null){
        return view('front.apply_now',compact(['course']));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'course'=>'required',
            'name'=>'required',
            'parent_name'=>'required',
            'address'=>'required',
            'pincode'=>'required',
            'telephone'=>'required',
            'pursue_course_through'=>'required',
            'dob'=>'required',
            'nationality'=>'required',
            'gender'=>'required',
            'mobileno'=>'required|unique:course_applications,mobileno',
            'emailid'=>'required|email|unique:course_applications,emailid',
            'profile_images'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'resume'=>'required|mimes:doc,docx,pdf,txt',
            'degree_certificate'=>'required|mimes:doc,docx,pdf,txt',
            'provisional_certificate'=>'required|mimes:doc,docx,pdf,txt',
        ]);
        if ($validator->fails()) {
            $result = array(
                'status' => 0,
                'msg' => $validator->errors()->all()
            );
            return response()->json($result)->setStatusCode(200);
        }
        $data=[
            'name'=>$request->name,
            'course'=>$request->course,
            'parent_name'=>$request->parent_name,
            'address'=>$request->address,
            'pincode'=>$request->pincode,
            'telephone'=>$request->telephone,
            'mobileno'=>$request->mobileno,
            'emailid'=>$request->emailid,
            'pursue_course_through'=>$request->pursue_course_through,
            'date_of_birth'=>$request->dob,
            'gender'=>$request->gender,
            'nationality'=>$request->nationality
        ];
        if($request->has('profile_images') && $request->profile_images != ''){
            $avatarMedia = $request->profile_images;
            $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
            $photoName = time() .'_'.$strippedName;
            \Storage::disk('local')->put('/public/uploads/profile_images/'.$photoName, file_get_contents($avatarMedia));
            $data['profile_image']=$photoName;
        }
        if($request->has('resume') && $request->resume != ''){
            $avatarMedia = $request->resume;
            $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
            $photoName = time() .'_'.$strippedName;
            \Storage::disk('local')->put('/public/uploads/resume/'.$photoName, file_get_contents($avatarMedia));
            $data['resume']=$photoName;
        }
        if($request->has('degree_certificate') && $request->degree_certificate != ''){
            $avatarMedia = $request->degree_certificate;
            $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
            $photoName = time() .'_'.$strippedName;
            \Storage::disk('local')->put('/public/uploads/degree_certificate/'.$photoName, file_get_contents($avatarMedia));
            $data['degree_certificate']=$photoName;
        }
        if($request->has('provisional_certificate') && $request->provisional_certificate != ''){
            $avatarMedia = $request->provisional_certificate;
            $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
            $photoName = time() .'_'.$strippedName;
            \Storage::disk('local')->put('/public/uploads/provisional_certificate/'.$photoName, file_get_contents($avatarMedia));
            $data['provisional_certificate']=$photoName;
        }
        CourseApplication::create($data);
        /*$data = array('name'=>"Virat Gandhi");

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('paakashg@gmail.com', 'CEL')->subject
            ('Laravel Basic Testing Mail');
            $message->from('support@cel.com');
        });*/
        $result = array(
            'status' => 1,
            'msg' => "Applied to cource Successfully"
        );
        return response()->json($result)->setStatusCode(200);
    }

    public function thankyou(){
        return view('front.thankyou');
    }
}
