<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProjectOwner;
use App\Models\Admin\ProjectStatus;
use App\Models\Admin\ProjectType;
use DB;

class ProjectController extends Controller
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
        $project_types = ProjectType::get();
        $project_owners = ProjectOwner::get();
        $project_statuses = ProjectStatus::get();
        return view('admin.Project.index', compact('project_types', 'project_owners', 'project_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Project.create');
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
            'project_name' => 'required',
            'description' => 'required',
            'project_type' => 'required',
            'project_value' => 'required',
            'project_owners' => 'required',
            'project_statuses' => 'required',

        ]);

        $data = new Project();
        $data->project_name = $request->project_name;
        $data->description = $request->description;
        $data->project_type = $request->project_type;
        $data->project_value = $request->project_value;
        $data->project_owner = $request->project_owners;
        $data->project_status = $request->project_statuses;
        $flag = $data->save();
        session()->flash('message', 'success#Project Added Successfully');
        return redirect('admin/project');
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


        $data = Project::findOrFail($id);

        // return  $project_ownerssing =  DB::table('projects')->where('project_owner', '=',$data->project_owner)->get();
        return view('admin.Project.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'project_name' => 'required',
            'description' => 'required',
            'project_type' => 'required',
            'project_value' => 'required',
            'project_owners' => 'required',
            'project_statuses' => 'required',

        ]);

        $data = Project::whereId($id)
            ->update(['project_name' => $request->project_name, 'description' => $request->description, 'project_type' => $request->project_type, 'project_value' => $request->project_value, 'project_owner' => $request->project_owners, 'project_status' => $request->project_statuses]);

        session()->flash('message','Success#Project Updated Successfully');
        return redirect('admin/project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Project::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Project  deleted successfully";
        } else {
            $success = true;
            $message = "Project not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function list(Request $request)
    {
        $projecttype = Project::with(['ProjectOwner', 'ProjectStatus', 'ProjectType'])->get();

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
