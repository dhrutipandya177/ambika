<?php

namespace App\Http\Controllers;

use App\Models\CourseApplication;
use App\Models\Question;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    public function index(){
        return view('appication_form');
    }

    public function getapplicationdata(){
        $topic_data = CourseApplication::orderBy('id','Desc')->get();
        return Datatables::of($topic_data)
                         ->addColumn('action',function($selected)
                         {
                             $topic_data='<a href="'.route("application.detail",$selected->id).'" class="btn btn-sm btn-outline-info" title="View" ><i class="fa fa-eye"></i></a>';
                             return $topic_data;
                         })

                         ->editColumn('profile_image',function($selected){
                             if($selected->profile_image){
                                 return '<img src="'.$selected->profile_image.'" height="100px" width="100px">';
                             }else{
                                 return '';
                             }
                         })
                         ->rawColumns(['action','profile_image'])
                         ->make(true);
    }

    public function detail($id){
        $application=CourseApplication::find($id);
        return view('application_detail',compact(['application']));
    }
}
