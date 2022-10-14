<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\FaqCategory;
use App\Http\Requests\StoreFaqscategory;
class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data= FaqCategory::get();  
      return view('admin.pages.faqs',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.faqscategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqscategory $request)
    {

        $status = Request('status') ? true : false;
        $data= new FaqCategory();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $status;
        $flag = $data->save();
         return redirect('admin/faqs-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=FaqCategory::where('id',$id)->first();
       return view('admin.pages.faqscategoryedit',compact('data'));
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
       
        $status = Request('status') ? true : false;
     $data = FaqCategory::find($id);
    $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $status;
        $flag = $data->save();
   

     return redirect('admin/faqs-category');
    }

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
