<?php

namespace App\Http\Controllers;

use App\Models\Gallary;
use App\Models\GallaryImages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class GallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gallaries.index');
    }

    public function getGallary(){
        $result = $this->listGallary();
        return Datatables::of($result)
                         ->addColumn('action',function($data)
                         {
                             $result='<a href="'.route("gallary.edit",$data->id).'" class="btn btn-sm btn-outline-info" title="Edit" ><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onclick="return deletegallary('.$data->id.')" class="btn btn-sm btn-outline-info" title="Delete" ><i class="fa fa-trash"></i></a>';
                             return $result;
                         })

                         ->addColumn('image',function($selected){
                           if(!empty($selected["gallaryImages"]) && isset($selected["gallaryImages"][0])){
                                return '<img src="'.$selected["gallaryImages"][0]['image_url'].'" height="100px" width="100px">';
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

    public function listGallary(){
        $gallary = Gallary::with('gallaryImages')->get();
        return $gallary;
    }

    public function removeGallaryImage($id){
        $deleteGallaryImage = GallaryImages::where('id','=',$id)->delete();
        if($deleteGallaryImage){
            $data = array('status'=> 'success','id'=>$id,'msg'=>"Gallary Image Deleted successfully.");
        }else{
            $data = array('status'=> 'fail','id'=>$id,'msg'=>"Something want wrong! please try again.");
        }
        echo json_encode($data);
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallaries.create');
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
                'image' => 'required',//'file' => 'max:5120', //5MB 
                //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first());
        }

        $status = (isset($request->status)) ? $request->status : 0;

        $newGallaryData = [
            'name' => $request->name,
            'status' => $status,
        ];
        
        $newGallary = Gallary::create($newGallaryData);

        if (! empty($newGallary)) {
            $gallary_id = $newGallary->id;

            if ($request->hasFile('image')) {
                $allowedfileExtension=['jpeg','png','jpg','gif'];
                foreach($request->file('image') as $gallary_image){
                    $filename = $gallary_image->getClientOriginalName();
                    $extension = $gallary_image->getClientOriginalExtension();
                    $check=in_array(strtolower($extension),$allowedfileExtension);
                    if($check){
                        $imageName = time()."-".rand(1,100).'.'.$gallary_image->extension();  
                        $gallary_image->move(public_path('uploads/gallary'), $imageName);

                        $newGallaryImageData = [
                            'image' => $imageName,
                            'gallary_id' => $gallary_id
                        ]; 

                        $newGallaryImage = GallaryImages::create($newGallaryImageData);
                    }    
                }
            }

            return redirect('gallary')->with('success',"New Gallary has been created successfully.");
        } else {
            return redirect()->back()->withErrors("Something want wrong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function show(Gallary $gallary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallary = Gallary::with('gallaryImages')->where('id', $id)->first();
        //echo "<pre>";print_r($gallary['gallaryImages']);
        return view('admin.gallaries.edit', compact('gallary')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallary $gallary)
    {
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'image' => 'required',
                //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        
        $updateGallaryData = [
            'name' => $request->name,
            'status' => $status,
        ];
        
        $updateGallary = Gallary::where('id',$request->id)->update($updateGallaryData);

        if ($updateGallary) {
            $gallary_id = $request->id;

            if ($request->hasFile('image')) {
                $allowedfileExtension=['jpeg','png','jpg','gif'];
                
                foreach($request->file('image') as $gallary_image){
                   $filename = $gallary_image->getClientOriginalName();
                    $extension = $gallary_image->getClientOriginalExtension();
                    $check=in_array(strtolower($extension),$allowedfileExtension);
                    if($check){
                        $imageName = time()."-".rand(1,100).'.'.$gallary_image->extension();  
                        $gallary_image->move(public_path('uploads/gallary'), $imageName);

                        $newGallaryImageData = [
                            'image' => $imageName,
                            'gallary_id' => $gallary_id
                        ]; 
                        //echo "<pre>";print_r($newGallaryImageData);

                        $newGallaryImage = GallaryImages::create($newGallaryImageData);
                    }    
                }
            }

            return redirect('gallary')->with('success',"Gallary has been updated successfully.");
        } else {
            return redirect()->back()->withErrors("Something want wrong");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallary $gallary)
    {
        $deleteGallary = Gallary::where('id','=',$id)->delete();
        if($deleteGallary){
            $deleteGallaryImages = GallaryImages::where('gallary_id','=',$id)->delete();
            return redirect('gallary')->with('success',"Gallary was deleted successfully.");
        }else{
            return redirect()->back()->withErrors("Something want wrong! please try again.");
        }
    }
}
