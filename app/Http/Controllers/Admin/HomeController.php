<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use CountryState;

class HomeController extends Controller
{
    public function __construct()
	{
	    // $this->middleware('guest:admin');
	}
    public function index(){
		// return Auth::user();
		// dd('haii..');
        $client = User::where('role_id',1)->count();
        $aprtner = User::where('role_id',2)->count();
        $countries = CountryState::getCountries();
    	if(Auth::guard('admin')->check()){
    		return view('admin.pages.dashboard')
                        ->with('client',$client)
                        ->with('aprtner',$aprtner)
                        ->with('countries',$countries);
    	}else{
	        return view('admin.auth.login',[
	            'title' => 'Admin Login',
	            'loginRoute' => 'admin.login',
	            'forgotPasswordRoute' => 'admin.password.request',
	        ])->with('client',$client)
            ->with('aprtner',$aprtner)
            ->with('countries',$countries);

    	}
    }
}
