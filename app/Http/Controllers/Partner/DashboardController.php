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
        $clients = Client::where('partner_id',Auth::guard('partner')->user()->id)->get();
        $total_business = $clients->sum('total_amount');
        $total_commision = $clients->sum('commission_amount');
        $pending_payments =  $clients->where('payment_status','<>',0)->take(10);
        $latest_leads =  Client::latest()->get()->take(10);
    	return view('partner.dashboard',compact('clients','total_business','total_commision','pending_payments','latest_leads'));
    }
}
