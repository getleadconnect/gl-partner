<?php

namespace App\Http\Controllers\Partner;

use App\Models\PaymentList;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Auth;
use App\Models\Admin\ChannelPartner;
class ClientController extends Controller
{
     public function __construct()
  {
    // $this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Client::with(['User','BusinessCategory'])->get();
        return view('partner.list_client');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //    return view('partner.add_client');
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
      'email'=>'required|email',
      'mobile'=>'required|string|unique:users,mobile',
      ]);

      $user=User::where('email',$request->email)->where('role_id',1)->count();
      if($user !=0){
        return redirect('partner/add_client')->with('message', 'Client already exist Succesfully');
      }
      $status = Request('status')?true:false;
      DB::beginTransaction();
          try {
              $randomString = Str::random(8);
              Session::put('randomString', $randomString);

              $user= new User();
              $user->name = $request->name;
              $user->email = $request->email;
              $user->mobile = $request->mobile;
              $user->location = $request->location;
              $user->password =  Hash::make($randomString);
              $user->status=$status;
              $user->save();

              $data= new Client();
              $data->name = $request->name;
              $data->mobile = $request->mobile;
              $data->payment_status=$status;
              $data->email = $request->email;
              $data->company_name = $request->company_name;
              $data->business_category_id = $request->business_category_id;
              $data->country = $request->country;
              $data->state = $request->state;
              $data->area = $request->area;
              $data->pincode = $request->pincode;
              $data->address = $request->address;
              $data->user_id = $user->id;
              $data->duration = 0;
              $data->partner_id = Auth::user()->id;

              //store total_amount and commission in clients table
              $partner = ChannelPartner::where('user_id',Auth::user()->id)->first();
              $data->total_amount=$request->total_amount;
              if($data->total_amount){
                $data->commission_amount =($data->total_amount)/10;
                $partner->commission = $partner->commission+(($data->total_amount)/10);
                $partner->save();
              }
              $data->save();

              //store commission for partner in payment_lists table
              $payment_list=new PaymentList();
              $payment_list->partner_id = $data->partner_id;
              $payment_list->client_id = $data->id;
              $payment_list->amount_paid = $data->commission_amount;
              $payment_list->save();

              $registeredUser = User::whereEmail($request->email)->first();
              $result  = Mail::to($registeredUser)->send(new RegistrationMail($registeredUser));
              DB::commit();
              return redirect('partner/client')->with('message', 'Client Added Succesfully');
            }
            catch (Exception $e) {
            DB::rollback();
                  Flash::error('Something Went Wrong Try Again');
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
        $data = Client::where('id',$id)->first();
        return view('partner.add_client',compact('data'));
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
      $this->validate($request,[
      'name'=>'required',
      'email'=>'required',
      'mobile'=>'required',
      ]);

      $status = Request('status')?true:false;

      $UserData = array(
          'name'          => Request('name'),
          'email'         => Request('email'),
          'mobile'        => Request('mobile'),
          'status'        => $status
        );

      $clientData = array(
          'company_name'          => Request('company_name'),
          'business_category_id'  => Request('business_category_id'),
          'country'               => Request('country'),
          'state'                 => Request('state'),
          'area'                  => Request('area'),
          'pincode'               => Request('pincode'),
          'address'               => Request('address'),
          'name'                  => Request('name'),
          'email'                 => Request('email'),
          'mobile'                => Request('mobile'),
          'total_amount'          => Request('total_amount'),
          'payment_status'        => $status

        );


        $user = Client::where('id',$id)->first();
        $data = User::where('id',$user->user_id)->update($UserData);
        $data = Client::where('id',$id)->update($clientData);
        return redirect('partner/client')->with('message', 'Client Updated Succesfully');;
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

      public function list(Request $request)
    {
            // $users = User::with(['Client'])->where('role_id',1)->get();

            $users = Client::where('partner_id',Auth::User()->id)->get();
            return datatables()->of($users)
                ->editColumn('created_at', function ($users) {
                    return date('d/m/Y H:i', strtotime($users->created_at));
                })
                ->editColumn('updated_at', function ($users) {
                    return date('d/m/Y H:i', strtotime($users->updated_at));
                })
                ->make(true);

    }


}
