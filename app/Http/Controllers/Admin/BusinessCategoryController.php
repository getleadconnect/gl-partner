<?php

namespace App\Http\Controllers\Admin;

use App\Models\BusinessCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class BusinessCategoryController extends Controller
{
   public function __construct()
  {
    $this->middleware('auth:admin'); 
  } /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data= BusinessCategory::get();
        return view('admin.businesscategory.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.businesscategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
     'business_category_name'=>'required',
     
     
   ]);
        
       
      
         $data= new BusinessCategory();
        $data->business_category_name = $request->business_category_name;
      
        $flag = $data->save();
        session()->flash('message','success#Business Category Added Succesfully');
         return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = BusinessCategory::findOrFail($id);
       return response()->json(['result'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
          $this->validate($request,[
     'business_category_name'=>'required',
     
     
   ]);
        
       
      
         $data=  BusinessCategory::find(request()->category_id);
        $data->business_category_name = $request->business_category_name;
      
        $flag = $data->save();
        session()->flash('message','success#Business Category updated Succesfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $delete=BusinessCategory::where('id',$id)->delete();
 if ($delete == 1) {
            $success = true;
            $message = "Business Category deleted successfully";
        } else {
            $success = true;
            $message = "Business Category not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
    

          public function list(Request $request)
    {
                    $BusinessCategory = BusinessCategory::all();

            return datatables()->of($BusinessCategory)
                ->editColumn('created_at', function ($BusinessCategory) {
                    return date('d/m/Y H:i', strtotime($BusinessCategory->created_at));
                })
                ->editColumn('updated_at', function ($BusinessCategory) {
                    return date('d/m/Y H:i', strtotime($BusinessCategory->updated_at));
                })
                ->make(true);
        
    }
}
