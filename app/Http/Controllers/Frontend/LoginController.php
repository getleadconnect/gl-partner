<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\PartnerRegister;
use App\Models\Frontend\BusinessAccount;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use CountryState;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class LoginController extends Controller
{
   public function index()
    {
        $countries = CountryState::getCountries();
      return view('frontend.login',compact('countries'));
    }

  public function login(Request $request)
    {
        Auth::guard('admin')->logout();
        Auth::guard('partner')->logout();
        // return response()->json(['data'=>request()->all()]);
        // dd(request()->all());
        $this->validate(request(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
        	        //Authentication passed...
        	        // return redirect()
        	        //     ->intended(route('admin.home'))
        	        //     ->with('status','You are Logged in as Admin!');
                    return response()->json(['user'=>1]);
        }elseif (auth()->guard('partner')->attempt(request()->only('email','password'),request()->filled('remember'))) {
            return response()->json(['user'=>2]);
        }


        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'status'=>1])) {
        //     //  return "hai";
        //     $user= Auth::User();
        //     if( $user->role_id ==1){
        //         return response()->json(['user'=>1]);
        //     }
        //     if( $user->role_id ==2){
        //         // return redirect('partner/');
        //         return response()->json(['user'=>2]);
        //     }
        //     //   }
        // }
        else {
            // return response()->json(['user'=>1]);
            session()->flash('message','danger#Username/password is Incorrect!');
            Session::flash('error', 'Username/password is Incorrect!');
            return back();

        }
    }
      /**
     * @author Amjith
     * For Signup Page
     */
    // public function signup()
    // {
    //     // $countries=DB::table('countries')->pluck('name','id');
    //     $countries = CountryState::getCountries();
    //     // dd($countries);
    //     return view('frontend.signup',compact('countries'));
    // }

    public function getState($country)
    {

        $states = CountryState::getStates($country);
        return response()->json(['states'=>$states]);
    }

    public function store()
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'company_name'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput(request()->all())
                ->withErrors($validator->errors());
        }
        $status =0;
        // DB::beginTransaction();
        // try {

        $randomString = random_int(1000, 9999);
        $emailcheck= BusinessAccount::whereEmail(request()->email)->count();
        if($emailcheck==0){
            $data= new BusinessAccount();
            $data->name = request('name');
            $data->email = request('email');
            $data->mobile = request('mobile');
            $data->company_name = request('company_name')?request('company_name'):null;
            $data->website = request('website');
            $data->team_size = request('team_size');
            $data->country = request('countrys');
            $data->state = request('state');
            $data->city = request('city');
            $data->otp = $randomString;
            $data->pin_code = request('pin_code');
            $data = $data->save();

            Session::put('otp',$randomString );

            $registeredUser = BusinessAccount::whereOtp($randomString)->first();
            $result  = Mail::to(request('email'))->send(new PartnerRegister($registeredUser));

            DB::commit();
            Alert::success('Thank You. Successfully Registered. Verify your Email to move on.')->persistent('Close');
            return response()->json(['otp'=>1]);
        }

        if($emailcheck!=0){
            $emailverfiedcheck= BusinessAccount::whereEmail(request('email'))->first();
            if($emailverfiedcheck->email_verified_at != null )
            {
                if($emailverfiedcheck->admin_approved == 0)
                    {
                    Alert::success('You are already Registered, You will be notified once admin approved')->persistent('Close');
                    return redirect('/');
                    }
                if($emailverfiedcheck->admin_approved == 1){
                    Alert::success('You are already Registered, Please Login')->persistent('Close');
                    return redirect('/');
                }
            }
            if($emailverfiedcheck->email_verified_at == null )
            {
                $data= BusinessAccount::where('email',request('email') )
                                       ->update([
                'otp'=>$randomString
                ]);
                Session::put('otp',$randomString );
                $registeredUser = BusinessAccount::whereOtp($randomString)->first();
                $result  = Mail::to(request('email'))->send(new PartnerRegister($registeredUser));
                Alert::success('Please verify your Email')->persistent('Close');
                return response()->json(['otp'=>1]);
            }
        }
    }

    public function otpPage()
    {
        return view('frontend.otp');
    }
}
