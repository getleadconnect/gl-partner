<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\ProjectOwner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectOwnerController extends Controller
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
        $data = ProjectOwner::get();
        return view('admin.pages.settings.projectowner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.settings.projectowner.create');
    }

    /**
     * Store a newly  created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',


        ]);



        $data = new ProjectOwner();
        $data->name = $request->name;

        $flag = $data->save();
        session()->flash('message', 'success#Sales Person Added Succesfully');
        return back();
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
        $data = ProjectOwner::findOrFail($id);
        return response()->json(['result' => $data]);
        // return view('admin.pages.settings.projectowner.create',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param         \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = request('owner_id');
        $this->validate($request, [
            'name' => 'required',


        ]);

        $data = ProjectOwner::whereId($id)
            ->update(['name' => request('name')]);

        session()->flash('message', 'success#Sales Person Updated Succesfully');
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
        $delete = ProjectOwner::where('id', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Sales Person Deleted successfully";
        } else {
            $success = true;
            $message = "Sales Person Not Found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function list(Request $request)
    {
        $projectowner = ProjectOwner::all();

        return datatables()->of($projectowner)
            ->editColumn('created_at', function ($projectowner) {
                return date('d/m/Y H:i', strtotime($projectowner->created_at));
            })
            ->editColumn('updated_at', function ($projectowner) {
                return date('d/m/Y H:i', strtotime($projectowner->updated_at));
            })
            ->make(true);
    }
}
