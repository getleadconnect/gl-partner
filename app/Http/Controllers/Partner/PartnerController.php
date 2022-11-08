<?php

namespace App\Http\Controllers\Partner;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Validator;
use App\Models\Admin\ChannelPartner;
use App\Models\Admin\ProductAndService;
use App\Models\BusinessCategory;
use CountryState;
use DataTables;
use Auth;

class PartnerController extends Controller
{
    public function index()
    {
        $client = User::where('role_id', 1)->count();
        $amount_paid = Client::sum('total_amount');
        $amount_not_paid = Client::where('payment_status', '1')->sum('total_amount');
        $unpaid_client = Client::where('payment_status', '1')->count();
        $business_categories = BusinessCategory::get();
        $countries = CountryState::getCountries();
        $partners = ChannelPartner::select('id','name')->get();
        $product = ProductAndService::where('type',1)->pluck('plan_name','id');
        $services = ProductAndService::where('type',2)->pluck('plan_name','id');
        return view('partner.list-lead', compact('product','services','countries','business_categories','amount_paid','amount_not_paid','unpaid_client','client','partners'));
    }

    public function showLeads(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::where('partner_id',Auth::guard('partner')->user()->id)->select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $btn = '<div class="btn-group btn-group-sm" role="group" aria-label="Table row actions">
                                    <button type="button" class="btn btn-white edit-lead-btn" data-id="'.$row->id.'">
                                    <i class="la la-edit bluish"></i>
                                    </button>
                                    <button type="button" class="btn btn-white">
                                    <i class="fa fa-trash bluish"></i>
                                    </button>
                                </div>';
    
                            return $btn;
                    })
                    ->rawColumns(['actions'])
                    ->addIndexColumn()
                    ->make(true);
        }
        // 
        return view('partner.list-deal');
    }
    

    public function createLead(Request $request)
    {
        $validate= Validator()->make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|string|unique:users,mobile',
        ]);
        if ($validate->fails()) {
           $message = $validate->getMessageBag();
            session()->flash('message','danger#'.$message->first());
            return back();
        }
        $user = User::where('email', $request->email)->where('role_id', 1)->count();
        if ($user != 0) {
           session()->flash('message','danger#Client already exist');
            return back();
        }
        $status = Request('status') ? true : false;
        DB::beginTransaction();
        try {

            $randomString = Str::random(8);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->location = $request->location;
            $user->password =  Hash::make($randomString);
            $user->status = $status;
            $user->save();

            $data = new Client();
            $data->email = request('email');
            $data->company_name = request('company_name');
            $data->business_category_id = request('business_category_id');
            $data->country = request('country');
            $data->state = request('state');
            $data->area = request('area');
            $data->pincode = request('pincode');
            $data->address = request('address');
            $data->user_id = $user->id;
            $data->partner_id = Auth::guard('partner')->user()->id;
            $data->designation = request('designation');
            $data->plan_type = request('plan_type');
            $data->plan_id = $request->plan_type == 1 ?request('plan_list') : request('services_list');
            $data->remarks = request('remarks');
            $flag = $data->save();

            $registeredUser = User::whereEmail($request->email)->first();
            $result  = Mail::to($registeredUser)->send(new RegistrationMail($registeredUser,$randomString));

            DB::commit();
            session()->flash('message','success#Lead Added Succesfully');
            return redirect()->route('list-leads');
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('message','danger#Something Went Wrong, Try Again');
            return back();
        }
    }

    public function editLead(Request $request)
    {
        $lead = Client::with('user')->where('clients.id',$request->id)->get();
        return response()->json(['lead'=>$lead]);
    }

    public function updateLead(Request $request)
    {
        // dd($request->all());
            $user = User::where('id',$request->user_id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            // $user->location = $request->location;
            // $user->status = $status;
            $user->save();

            $data = Client::where('id',$request->lead_id)->first();
            // $data->email = request('email');
            $data->company_name = request('company_name');
            // $data->business_category_id = request('business_category_id');
            $data->country = request('country');
            $data->state = request('state');
            $data->area = request('area');  
            $data->pincode = request('pincode');
            // $data->address = request('address');
            $data->designation = request('designation');
            $data->plan_type = request('plan_type');
            // $data->plan_id = request('pad');
            $data->remarks = request('remarks');
            $flag = $data->save();

            session()->flash('message','success#Lead updated succesfully');
            return redirect()->route('list-leads');
    }
}
