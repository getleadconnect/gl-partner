<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\FaqCategory;
use \App\Models\Faq;
class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data= Faq::with('FaqCategory')->get();  
     return view('admin.pages.faq',compact('data'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $faqcategory=FaqCategory::all();
     return view('admin.pages.faqscreate',compact('faqcategory'));
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
       'title'=>'required',
       'description'=>'required',
       'category_id'=> 'required',
       'image'=> 'required',
   ]);

      $status           = Request('status') ? true : false;
      $is_featured       = Request('is_featured') ? true : false;
      $data              = new Faq();
      $data->title       = $request->title;
      $data->description = $request->description;
      $data->faq_category_id = $request->category_id;
      $data->status      = $status;
      $data->is_featured = $is_featured;
      $data->order       = $request->order;

      if ($request->has('image')) {
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/faq'), $imageName);
        $data->image = $imageName;
    }
    $flag = $data->save();
    return redirect('admin/faqs');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faqcategory=FaqCategory::all();
        $data=Faq::with('FaqCategory')->where('faqs.id',$id)->first();
        return view('admin.pages.faqedit',compact('data','faqcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
      $this->validate($request,[
       'title'=>'required',
       'description'=>'required',
       'category_id'=> 'required',
       
   ]);
      
      $status           = Request('status') ? true : false;
      $is_featured       = Request('is_featured') ? true : false;
      $data = Faq::find($id);
      $data->title       = $request->title;
      $data->description = $request->description;
      $data->faq_category_id = $request->category_id;
      $data->status      = $status;
      $data->is_featured = $is_featured;
      $data->order       = $request->order;

      if ($request->has('image')) {
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/faq'), $imageName);
        $data->image = $imageName;
    }
    $flag = $data->save();
    return redirect('admin/faqs');
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
