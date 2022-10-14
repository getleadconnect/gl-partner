<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\ProjectStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectStatusController extends Controller
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
        $data = ProjectStatus::get();
        return view('admin.pages.settings.projectstatus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.settings.projectstatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',


        ]);



        $data = new ProjectStatus();
        $data->status = $request->status;

        $flag = $data->save();
        session()->flash('message','success#Lead Status Added Succesfully');
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
        $data = ProjectStatus::findOrFail($id);
        return response()->json(['result'=>$data]);
        // return view('admin.pages.settings.projectstatus.create', compact('data'));
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
        $id=request('status_id');
        $this->validate($request, [
            'status' => 'required',


        ]);

        $data = ProjectStatus::whereId($id)
            ->update(['status' => $request->status]);

        session()->flash('message','success#Lead Status Updated Succesfully');
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
        $delete = ProjectStatus::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Lead status deleted successfully";
        } else {
            $success = true;
            $message = "Lead status not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function list(Request $request)
    {
        $ProjectStatus = ProjectStatus::all();

        return datatables()->of($ProjectStatus)
            ->editColumn('created_at', function ($ProjectStatus) {
                return date('d/m/Y H:i', strtotime($ProjectStatus->created_at));
            })
            ->editColumn('updated_at', function ($ProjectStatus) {
                return date('d/m/Y H:i', strtotime($ProjectStatus->updated_at));
            })
            ->make(true);
    }
}
