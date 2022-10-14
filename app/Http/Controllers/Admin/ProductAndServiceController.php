<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin\ProductAndService;
use App\Models\User;
use Illuminate\Http\Request;

class ProductAndServiceController extends Controller
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

        return view('admin.pages.settings.product_and_services.index');
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
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'plan_type' => 'required',
            'users' => 'required',
            'months' => 'required',
            'price' => 'required',
        ]);

        $store = new ProductAndService;
        $store->plan_name = request('name');
        $store->type = request('plan_type');
        $store->users = request('users');
        $store->month = request('months');
        $store->pricing = request('price');
        $store->added_by = auth()->user()->id;
        $store->save();

        session()->flash('message', 'success#Plan Added Successfully');
        return back();
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
        $pad = ProductAndService::find($id);
        return response()->json(['result' => $pad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = ProductAndService::find(request('type_id'));

        $data->plan_name = request('edit_name');
        $data->type = request('edit_plan_type');
        $data->month = request('edit_months');
        $data->users = request('edit_users');
        $data->pricing = request('edit_price');
        $data->update();

        session()->flash('message', 'success#Product & Services Updated Succesfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ProductAndService::find($id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Sales Person deleted successfully";
        } else {
            $success = true;
            $message = "Type not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function productServiceList()
    {
        $list = ProductAndService::with('user')->get();
        return datatables()->of($list)
            ->addColumn('type', function ($list) {
                // dd($list->type);
                if ($list->type == 1) {
                    $type = '<span class="badge badge-success">Product</span>';
                } elseif ($list->type == 2) {
                    $type = '<span class="badge badge-info">Service</span>';
                }
                return $type;
            })

            ->editColumn('added_by', function ($list){
                // dd($list);
                $user = User::where('id',$list->added_by)->first() ?? Admin::where('id',$list->added_by)->first();
                return $user->name;
            })
            ->editColumn('created_at', function ($list) {
                return date('d/m/Y H:i', strtotime($list->created_at));
            })
            ->editColumn('updated_at', function ($list) {
                return date('d/m/Y H:i', strtotime($list->updated_at));
            })
            ->addColumn('action', function ($list) {
                return $action = '<button type="submit"  id=" ' . $list->id . '" class="btn btn-info editBtn" style="margin-right :3%;"><i class="la la-edit"></i></button>
                <button type="button" class="btn btn-danger" onclick="deleteConfirmation(' . $list->id . ')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                ';
            })
            ->rawColumns(['type', 'action'])
            ->make(true);
    }
}
