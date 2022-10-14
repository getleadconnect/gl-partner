<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\ProjectType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProjectTypeController extends Controller
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
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= ProjectType::get();
        return view('admin.pages.settings.projecttype.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.settings.projecttype.create');
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
     'name'=>'required',


   ]);



         $data= new ProjectType();
        $data->project_type = $request->name;

        $flag = $data->save();
        session()->flash('message','success#Product & Service Added Succesfully');
         return redirect('admin/projecttype');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = ProjectType::findOrFail($id);
         return response()->json(['result'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $type = ProjectType::findOrFail(request()->type_id);
        $this->validate($request,[
        'name'=>'required',
        ]);

        $data = ProjectType::whereId($type->id)->update(['project_type'=>request()->name]);
        session()->flash('message','success#Product & Services Updated Succesfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $delete=ProjectType::where('id',$id)->delete();

         if ($delete == 1) {
            $success = true;
            $message = "Sales Person deleted successfully";
        } else {
            $success = true;
            $message = "Type not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


      public function list(Request $request)
    {
                    $projecttype = ProjectType::all();

            return datatables()->of($projecttype)
                ->editColumn('created_at', function ($projecttype) {
                    return date('d/m/Y H:i', strtotime($projecttype->created_at));
                })
                ->editColumn('updated_at', function ($projecttype) {
                    return date('d/m/Y H:i', strtotime($projecttype->updated_at));
                })
                ->make(true);

    }
}
