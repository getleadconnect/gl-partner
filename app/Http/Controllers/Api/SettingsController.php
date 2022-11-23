<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Admin\ChannelPartner;

class SettingsController extends Controller
{
    public function delete_leads(Request $request)
    {
        if($request->has('partner_id'))
        {
           $clients = Client::where('partner_id',$request->partner_id)->get();
           foreach ($clients as $key => $value) 
           {
                $value->delete();
           }
           $user_ids = $clients->pluck('user_id');
           User::whereIn('id',$user_ids)->delete();
        }

        return response()->json(['success'=>true,'msg'=>'Deleted successfully !!!']);
    }

    public function getPartnerId(Request $request)
    {
        $partner = ChannelPartner::where('name',$request->partner_name)->first();
        if($partner)
        {
            return response()->json(['success'=>true,'msg'=>'Data Retrieved successfully !!!','partner_id'=>$partner->id]);
        }
        else{
            return response()->json(['success'=>false,'msg'=>'Data Not Found !!!','partner_id'=>0]);
        }
    }

    public function searchLead(Request $request)
    {
        $client = User::where('name', 'like', '%' . request('search') . '%')->with('Client')->get();
        return response()->json(['success'=>true,'msg'=>'Data Retrieved successfully !!!','client'=>$client]);
    }
}