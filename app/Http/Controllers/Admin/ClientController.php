<?php

namespace App\Http\Controllers\Admin;

use Auth;
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

class ClientController extends Controller
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
        $client = User::where('role_id', 1)->count();
        $all_clients = Client::all();
        $amount_paid = $all_clients->where('payment_status', '0')->sum('total_amount');
        $amount_paid_count = $all_clients->where('payment_status', '0')->count();
        $amount_not_paid = $all_clients->where('payment_status', '1')->sum('total_amount');
        $amount_not_paid_count = $all_clients->where('payment_status', '1')->count();
        $unpaid_client_count = $all_clients->where('payment_status', '2')->count();
        $unpaid_client_sum = $all_clients->where('payment_status', '2')->sum('total_amount');
        $business_categories = BusinessCategory::get();
        $countries = CountryState::getCountries();
        $partners = ChannelPartner::select('id','name')->get();
        $pad = ProductAndService::all();
        return view('admin.Members.list', compact('unpaid_client_sum','amount_not_paid_count','amount_paid_count','countries','business_categories','amount_paid','amount_not_paid','unpaid_client_count','client','partners','pad'));
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
        // dd(request()->all());
        $validate= Validator()->make(request()->all(), [
            'name' => 'required',
            // 'email' => 'email',
            'mobile' => 'required|string|unique:users,mobile',
        ]);
        if ($validate->fails()) {
           $message = $validate->getMessageBag();
            session()->flash('message','danger#'.$message->first());
            return back();
        }
        $user = User::where('email', $request->email)->where('email','<>',null)->where('role_id', 1)->count();
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
            $data->partner_id = request('partner_id');
            $data->designation = request('designation');
            $data->plan_type = request('plan_type');
            $data->plan_id = request('pad');
            $data->remarks = request('remarks');


            $flag = $data->save();

            $registeredUser = User::whereEmail($request->email)->first();

            if(request('pad'))
            {
                $plan = ProductAndService::where('id',request('pad'))->first();
                $plan_name =  $plan->plan_name." ".$plan->users." users ".$plan->pricing." per month";
            }
            else{
                $plan_name = "Not selected";
            }

            $partner_name = ChannelPartner::where('id',request('partner_id'))->first()->name;

            $botToken = "5455796089:AAFE6beeleWa1iTKhzLGDKrMwJxd30F1o3U";
           
            $data =[
                'chat_id' => '-614845338',
                'text'=> "Hey,
        New Lead Received Via Partner Portal !!!
        ------------------------------------
        Partner => ".$partner_name."
        Name => ".request('company_name').", 
        Email => ".$request->email.",
        Plan => ".$plan_name.",
        Mobile => ".$request->mobile."",
                ];
            $response = file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?" .http_build_query($data) );

            // $result  = Mail::to($registeredUser)->send(new RegistrationMail($registeredUser,$randomString));
            DB::commit();
            session()->flash('message','Success#Client Added Succesfully');
            return redirect('admin/client');
        } catch (Exception $e) {
            DB::rollback();
            session()->flash('message','danger#Something Went Wrong, Try Again');
            return back();
        }
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
        // $data = Client::with(['User', 'BusinessCategory'])->get();

        $data = User::with(['client'])->where('id', $id)->first();
        return response()->json(['result' => $data]);
        // return view('admin.Members.add', compact('data','countries'));
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
        $this->validate($request, [
            'edit_name' => 'required',
            // 'edit_email' => 'required',
            'edit_mobile' => 'required',
        ]);
        $status = request('status') ? true : false;
        $data = User::find(request('update_user_id'));

        $data->name = request('edit_name');
        $data->email = request('edit_email');
        $data->mobile = request('edit_mobile');
        $data->status = 1;
        $data->update();

        $clientData = Client::find(request('update_client_id'));
        $clientData->company_name = request('edit_company_name');
        $clientData->business_category_id = request('edit_business_category_id');
        $clientData->country = request('edit_country');
        $clientData->state = request('edit_state');
        $clientData->area = request('edit_area');
        $clientData->pincode = request('edit_pincode');
        $clientData->address = request('edit_address');
        $clientData->remarks = request('edit_remarks');
        $clientData->designation = request('edit_designation');
        $clientData->partner_id = request('edit_partner');
        $clientData->plan_type = request('edit_plan_type');
        $clientData->plan_id = request('edit_pad');
        $clientData->update();

        session()->flash('message','success#Lead Updated Succesfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function showLeads()
    {
        return view('partner.list_client');
    }

    public function list(Request $request)
    {
        $users = User::with(['Client'])->where('role_id', 1);

            if(request('status_filter') != null)
                $users->whereHas('Client',function($q){
                    $q->where('payment_status',request('status_filter'));
                });

            if(request('date') != null){
                $users->whereHas('date',function($q){
                    $q->where('created_at',request('date'));
                });
            }

        $users = $users->get();
        return datatables()->of($users)
            ->addColumn('status',function($users){
                if($users->client->payment_status == 0)
                {
                  return   '<a   href="#" data-id="'.$users->id.'" class="statusBtn"><span class="badge badge-success">Paid</span></a>';
                }
                elseif($users->client->payment_status == 1){
                    return   '<a  href="#" data-id="'.$users->id.'" class="statusBtn"><span class="badge badge-danger">Not Paid</span></a>';
                }
                elseif($users->client->payment_status == 2){
                    return   '<a  href="#" data-id="'.$users->id.'" class="statusBtn"><span class="badge badge-warning">Pending</span></a>';
                }
            })
            ->editColumn('created_at', function ($users) {
                return date('d/m/Y H:i', strtotime($users->created_at));
            })
            ->editColumn('updated_at', function ($users) {
                return date('d/m/Y H:i', strtotime($users->updated_at));
            })
            ->addColumn('plan',function($users){
                return ProductAndService::where('id',$users->client->plan_id)->pluck('plan_name')->first();
            })
            ->addColumn('partner',function($users){
                return ChannelPartner::where('id',$users->client->partner_id)->pluck('name')->first();
            })
            ->addColumn('commission',function($users){
                $commission =  Client::where('id',$users->id)->pluck('commission_amount')->first() ?? 'No Commission';

                return  $commission;
            })
            ->addColumn('amount',function($users){
                $amount =  Client::where('user_id',$users->id)->pluck('total_amount')->first() ?? "No Payment Yet";

                return '<a href="#" class="amountBtn" data-id="'.$users->id.'">'.$amount.'</a>';
            })
            ->addColumn('remarks',function($users){
                $remarks = Client::where('user_id',$users->id)->pluck('remarks')->first()?? 'No Comments';
                return '<a href="#" class="remarksBtn" data-id="'.$users->id.'">'.$remarks.'</a>';
            })
            ->addColumn('actions', function ($users){
                return '<a  href="#" class="btn btn-sm btn-clean bg-primary editBtn" data-id="'.$users->id.'" title="Edit Details">
                <i class="la la-edit text-white">Edit</i>
                </a>';
            })
            ->rawColumns(['actions','status','amount','remarks','partner'])
            ->addIndexColumn()
            ->make(true);
    }

    public function planAndServiceList($type)
    {
        $list = ProductAndService::where('type',$type)->get();
        $arr = [];
        $opt='';
        $select_code = '';
        foreach ($list as $key => $value)
        {
            $str = '';
            $str.=$value->plan_name." ".$value->users." users ".$value->pricing." per month";
            $opt.= '<option value='.$value->id.'>'.$str.'</option>';
            $arr[$value->id] = $str;

        }
        $select_code = $select_code.$opt;
        return response()->json(['result'=>$select_code]);
    }
    public function updateData()
    {
        $message = '';
        if(request()->has('client_id') && request()->has('change_status'))
        {
            $clients = Client::find(request('client_id'))->update(['payment_status' => request('change_status')]);
            $message = 'Payment Status';
        }elseif (request()->has('payment_client_id') && request()->has('paid_amount')) {
            $clients = Client::find(request('payment_client_id'))->update(['total_amount' => request('paid_amount')]);
            $message = 'Paid Amount';
        }elseif (request()->has('remarks_client_id') && request()->has('add_remarks')) {
            $clients = Client::find(request('remarks_client_id'))->update(['remarks' => request('add_remarks')]);
            $message = 'Remark';
        }
        session()->flash('message','success#'.$message.' Updated Successfully!');
        return back();
    }

    public function getPartner()
    {
        // dd(request()->all());

        if (request('q')) {
           $partner = ChannelPartner::where('name', 'like', '%' . request('q') . '%')->select('id','name')->get();
        }else{
            $partner = ChannelPartner::all();
        }

        return response()->json(['data'=>$partner]);
    }
}
