<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sliders.index');
    }

    public function getSlider(){
        $result = $this->listSlider();
        return Datatables::of($result)
                         ->addColumn('action',function($data)
                         {
                             $result='<a href="'.route("slider.edit",$data->id).'" class="btn btn-sm btn-outline-info" title="Edit" ><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onclick="return deletecat('.$data->id.')" class="btn btn-sm btn-outline-info" title="Delete" ><i class="fa fa-trash"></i></a>';
                             return $result;
                         })

                         ->editColumn('image',function($data){
                             if($data->image){
                                 return '<img src="'.$data->image_url.'" height="100px" width="100px">';
                             }else{
                                 return '';
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
                         ->rawColumns(['action','image','status'])
                         ->addIndexColumn()
                         ->make(true);
    }

    public function listSlider(){
        $slider = Slider::all();
        return $slider;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:15360',//2048
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $status = (isset($request->status)) ? $request->status : 0;

        $imageName = '';
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/slider'), $imageName); 
        }

        $newSliderData = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'button1' => $request->button1,
            'button1_link' => $request->button1_link,
            'button2' => $request->button2,
            'button2_link' => $request->button2_link,
            'status' => $status,
        ];
        
        $newSlider = Slider::create($newSliderData);

        if (! empty($newSlider)) {
            return redirect('slider')->with('success',"New Slide has been created successfully.");
        } else {
            return redirect()->back()->withErrors("Something want wrong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::where('id', $id)->first();
        return view('admin.sliders.edit', compact('slider')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:15360',//2048
            ]);      
        }else{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
        }    
            
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $status = (isset($request->status)) ? $request->status : 0;
        
        $imageName = $request->edit_image;
        //echo basename($imageName);exit;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            //$filename = $image->getClientOriginalName();
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/slider'), $imageName); 
        }
        

        $updateSliderData = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'button1' => $request->button1,
            'button1_link' => $request->button1_link,
            'button2' => $request->button2,
            'button2_link' => $request->button2_link,
            'status' => $status,
        ];
        
        $updateSlider = Slider::where('id',$request->id)->update($updateSliderData);

        if ($updateSlider) {
            return redirect('slider')->with('success',"Slide has been updated successfully.");
        } else {
            return redirect()->back()->withErrors("Something want wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteSlider = Slider::where('id','=',$id)->delete();
        if($deleteSlider){
            return redirect('slider')->with('success',"Slide Deleted successfully.");
        }else{
            return redirect()->back()->withErrors("Something want wrong! please try again.");
        }
    }
}
