<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PartnerController extends Controller
{
  public function index()
  {
    $client= Auth::User();
    if( $client->role_id ==1){
      return redirect (session::get('prevoiusurl'));
    }
    if( $client->role_id ==2){
      return datatables()->of($client);
    }
  }
}
