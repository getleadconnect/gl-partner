<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\SiteSetting;
use App\Http\Requests\StoreSiteSetting;
class SiteSettingController extends Controller
{
   public function __construct()
  {
    $this->middleware('auth:admin'); 
  }
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{

}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    //
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(StoreSiteSetting $request)
{
  
 $exist=SiteSetting::first();
 if(!empty ($exist->id)){
   $exist=SiteSetting::first()->delete();
   $data= new SiteSetting();
   $data->logo_text = $request->logo_text;
   $data->project_name = $request->project_name;
   $data->project_title = $request->project_title;
   $data->project_description = $request->project_description;
   $data->copy_right       = $request->copy_right;
   $data->email      = $request->email;
   $data->mobile     = $request->mobile;

   $data->domain = $request->domain;
   if ($request->has('favicon_avatar')) {
    $imageName = time() . '.' . request()->favicon_avatar->getClientOriginalExtension();
    request()->favicon_avatar->move(public_path('images/site'), $imageName);
    $data->favicon_avatar = $imageName;
  }
  if ($request->has('logo_avatar')) {
    $imageName = time() . '.' . request()->logo_avatar->getClientOriginalExtension();
    request()->logo_avatar->move(public_path('images/site'), $imageName);
    $data->logo_avatar = $imageName;
  }
  $flag = $data->save();
  $data= SiteSetting::first();
  return redirect()->back()->with('data');
}
$data= new SiteSetting();
$data->logo_text = $request->logo_text;
$data->project_name = $request->project_name;
$data->project_title = $request->project_title;
$data->project_description = $request->project_description;
$data->copy_right       = $request->copy_right;
$data->email      = $request->email;
$data->mobile     = $request->mobile;

$data->domain = $request->domain;
if ($request->has('favicon_avatar')) {
  $imageName = time() . '.' . request()->favicon_avatar->getClientOriginalExtension();
  request()->favicon_avatar->move(public_path('images/site'), $imageName);
  $data->favicon_avatar = $imageName;
}
if ($request->has('logo_avatar')) {
  $imageName = time() . '.' . request()->logo_avatar->getClientOriginalExtension();
  request()->logo_avatar->move(public_path('images/site'), $imageName);
  $data->logo_avatar = $imageName;
}
$flag = $data->save();
$data= SiteSetting::first();
return redirect()->back()->with('data');

}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    //
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
    //
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
