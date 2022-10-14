<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $client = User::where('role_id',User::CLIENT)->count();
        $aprtner =User::where('role_id',user::PARTNER)->count();
    	return view('partner.dashboard',compact('client','aprtner'));
    }
}
