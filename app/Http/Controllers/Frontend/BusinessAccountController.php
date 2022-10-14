<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Frontend\BusinessAccount;
use App\Models\User;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnerRegister;
use CountryState;
use Illuminate\Support\Str;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Carbon\Carbon;
use App\Models\Admin\ChannelPartner;
class BusinessAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $countries['countries'] = CountryState::getCountries();
      return view('frontend.index',$countries);
    }
    public function country(Request $request)
    {
            $states = CountryState::getStates($request->country);
        return response()->json($states);
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
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'company_name'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator->errors());
        }
        $status =0;
        // DB::beginTransaction();
        // try {

        $randomString = random_int(1000, 9999);
        $emailcheck= BusinessAccount::whereEmail($request->email)->count();
        if($emailcheck==0){
            $data= new BusinessAccount();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->mobile = $request->mobile;
            $data->company_name = $request->company_name?$request->company_name:null;
            $data->website = $request->website;
            $data->team_size = $request->team_size;
            $data->country = $request->countrys;
            $data->state = $request->state;
            $data->city = $request->city;
            $data->otp = $randomString;
            $data->pin_code = $request->pin_code;
            $data = $data->save();

            Session::put('otp',$randomString );

            $registeredUser = BusinessAccount::whereOtp($randomString)->first();
            $result  = Mail::to($request->email)->send(new PartnerRegister($registeredUser));

            DB::commit();
            Alert::success('Thank you. Successfully Registered. Verify your Email to move on.')->persistent('Close');
            return view('frontend.otp');
        }

        if($emailcheck!=0){
            $emailverfiedcheck= BusinessAccount::whereEmail($request->email)->first();
            if($emailverfiedcheck->email_verified_at != null )
            {
                if($emailverfiedcheck->admin_approved == 0)
                    {
                    Alert::success('You Are Already Registered You Will be Notified Once Admin Approved')->persistent('Close');
                    return redirect('/');
                    }
                if($emailverfiedcheck->admin_approved == 1){
                    Alert::success('You are Already Registered, Please Login')->persistent('Close');
                    return redirect('/');
                }
            }
            if($emailverfiedcheck->email_verified_at == null )
            {
                $data= BusinessAccount::where('email',$request->email )
                                       ->update([
                'otp'=>$randomString
                ]);
                Session::put('otp',$randomString );
                $registeredUser = BusinessAccount::whereOtp($randomString)->first();
                $result  = Mail::to($request->email)->send(new PartnerRegister($registeredUser));
                Alert::success('Please Verify Your Email')->persistent('Close');
                return view('frontend.otp');
            }
        }
    }

    public function otp(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'otp'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
            ->withInput($request->all())
            ->withErrors($validator->errors());
        }
        BusinessAccount::whereOtp($request->otp)->first();

        if($request->otp == session::get('otp')){
            $data= BusinessAccount::where('otp',$request->otp )
                    ->update([
                    'email_verified_at' => Carbon::now(),
                    'otp'=>null
            ]);
            Session::forget('otp');
            Alert::success('Your Email is Verified, We will contact you soon')->persistent('Close');
            return redirect('/');
        }
        else{
            Alert::warning('Otp Verification is Failed, Please try again')->persistent('Close');
            return view('frontend.otp');
        }
    }

    protected function validatorLogin(array $data)
    {
        return Validator::make($data, [

            'email' => 'required',
            'password' => 'required',

        ]);
    }

    public function authenticate(Request $request)
    {
        $input = $request->all();
        $validator = $this->validatorLogin($input);
        if ($validator->fails()) {
            $message ='Validation error';
            Flash::error('Validation error');
            return redirect()->back()->withErrors($validator)->withInput(['validation_message'=>$message]);
        }
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' =>1])) {
            return redirect()->intended('/');
        }else{
            $errors='Invalid Credentials';
            return redirect()->back()->withInput(['invalid_message'=>$errors]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frontend\BusinessAccount  $businessAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessAccount $businessAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frontend\BusinessAccount  $businessAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessAccount $businessAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frontend\BusinessAccount  $businessAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessAccount $businessAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frontend\BusinessAccount  $businessAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessAccount $businessAccount)
    {
        //
    }
}
