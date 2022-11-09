<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\AccountSetting;
use \App\Models\MapSetting;
use \App\Models\Admin;
use \App\Models\User;
use \App\Models\EmailSetting;
use \App\Models\FacebookLoginSetting;
use \App\Models\GoogleLoginSetting;
use \App\Models\GitLabLoginSetting;
use \App\Models\ComingSoon;
use \App\Models\Contact;
use \App\Models\PrivacyPolicy;
use \App\Models\TermsCondition;
use Illuminate\Support\Facades\Hash;
use \App\Models\SiteSetting;
use \App\Models\SMSSetting;
use \App\Models\SeoSetting;
use \App\Models\MobileApp;
use App\Models\Frontend\BusinessAccount;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;
use App\Mail\SendAccountDetails;
use App\Mail\SendCCMail;
use Illuminate\Support\Str;
use CountryState;
use DB;
use Session;
use \App\Models\Admin\ChannelPartner;

class SettingController extends Controller
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
        return view('admin.pages.settings');
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

    public function accountUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|',


        ]);

        $admin = Admin::find(auth()->user()->id);
        if ($admin) {
            $admin->name       = $request->name;
            $admin->email      = $request->email;
            $admin->mobile     = $request->mobile;
            if ($request->password) {
                $admin->password = Hash::make($request->password);
            }

            if ($request->has('image')) {
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('images/account'), $imageName);
                $admin->image = $imageName;
            }
            $flag = $admin->save();
            return redirect()->back();
            // return view('admin.pages.settings.account');
        }
    }


    public function accountCreate(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|',
            'mobile' => 'required|min:10|numeric',
            'password' => 'required'
        ]);
        $data = new Admin();
        $data->name       = $request->name;
        $data->email      = $request->email;
        $data->mobile     = $request->mobile;
        $data->password = Hash::make($request->password);


        if ($request->has('image')) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/account'), $imageName);
            $data->image = $imageName;
        }
        $flag = $data->save();
        return view('admin.pages.settings.account');
    }


    public function mapSetting(Request $request)
    {
        $this->validate($request, [
            'latitude' => 'required',
            'longitude' => 'required',
            'api_key' => 'required',

        ]);

        $exist = MapSetting::first();
        if (!empty($exist->id)) {
            $exist = MapSetting::first()->delete();

            $data             = new MapSetting();
            $data->latitude   = $request->latitude;
            $data->longitude  = $request->longitude;
            $data->api_key    = $request->api_key;
            $flag = $data->save();
            $data = MapSetting::first();

            return redirect()->back()->with('data');
        }

        $data             = new MapSetting();
        $data->latitude   = $request->latitude;
        $data->longitude  = $request->longitude;
        $data->api_key    = $request->api_key;
        $flag = $data->save();
        $data = MapSetting::first();

        return redirect()->back()->with('data');
    }
    public function seoSetting(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'site_name' => 'required',
            'description' => 'required',
            'url' => 'required'
        ]);
        $exist = SeoSetting::first();
        if (!empty($exist->id)) {
            $exist = SeoSetting::first()->delete();

            $data             = new SeoSetting();
            $data->title   = $request->title;
            $data->site_name  = $request->site_name;
            $data->description    = $request->description;
            $data->url    = $request->url;

            if ($request->has('image')) {
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('images/seo'), $imageName);
                $data->image = $imageName;
            }
            $flag = $data->save();
            $data = SeoSetting::first();

            return redirect()->back()->with('data');
        }

        $data             = new SeoSetting();
        $data->title   = $request->title;
        $data->site_name  = $request->site_name;
        $data->description    = $request->description;
        $data->url    = $request->url;

        if ($request->has('image')) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/account'), $imageName);
            $data->image = $imageName;
        }
        $flag = $data->save();
        $data = SeoSetting::first();

        return redirect()->back()->with('data');
    }
    public function emailSetting(Request $request)
    {
        $this->validate($request, [
            'sender_name' => 'required',
            'mail_driver' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_address' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_address' => 'required'
        ]);
        $key = 'EMAIL_ADDRESS';
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $key . '=' . env($key),
                $key . '=' . $request->mail_address,
                file_get_contents($path)
            ));
        }
        $key = 'EMAIL_USERNAME';
        $path = base_path('.env');
        if (file_exists($path)) {

            file_put_contents($path, str_replace(
                $key . '=' . env($key),
                $key . '=' . $request->mail_username,
                file_get_contents($path)
            ));
        }
        $key = 'EMAIL_PASSWORD';
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $key . '=' . env($key),
                $key . '=' . $request->mail_password,
                file_get_contents($path)
            ));
        }
        $exist = EmailSetting::first();
        if (!empty($exist->id)) {
            $exist = EmailSetting::first()->delete();
            $data             = new EmailSetting();
            $data->sender_name       = $request->sender_name;
            $data->mail_driver       = $request->mail_driver;
            $data->mail_host         = $request->mail_host;
            $data->mail_port         = $request->mail_port;
            // $data->mail_address      = $request->mail_address;
            // $data->mail_username     = $request->mail_username;
            // $data->mail_password     = $request->mail_password;
            $data->mail_encryption    = $request->mail_encryption;
            $flag = $data->save();
            $data = EmailSetting::first();
            return redirect()->back();
        }
        $data             = new EmailSetting();
        $data->sender_name       = $request->sender_name;
        $data->mail_driver       = $request->mail_driver;
        $data->mail_host         = $request->mail_host;
        $data->mail_port         = $request->mail_port;
        // $data->mail_address      = $request->mail_address;
        // $data->mail_username     = $request->mail_username;
        // $data->mail_password     = $request->mail_password;
        $data->mail_encryption    = $request->mail_encryption;
        $flag = $data->save();
        $data = EmailSetting::first();
        return redirect()->back()->with('data');
    }


    public function passwordReset(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
            'confirm_password' => 'required'
        ]);

        $user = Admin::find(Auth::id());

        if (!Hash::check($request->current, $user->password)) {
            return response()->json(['errors' =>
            ['current' => ['Current password does not match']]], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        return view('admin.pages.settings.account');
    }

    public function googleSetting(Request $request)
    {
        $this->validate(
            $request,
            [
                'cilent_id' => 'required',
                'cilent_secret_key' => 'required',
                'call_back_url' => 'required'
            ],
            [
                'cilent_id.required' => ' Google client id required',
                'cilent_secret_key.required' => 'Google client secret key  required',
                'call_back_url.required' => 'Google call back url required',

            ]
        );
        $key = 'GOOGLE_CLIENT_KEY';
        $path = base_path('.env');
        if (file_exists($path)) {

            file_put_contents($path, str_replace(
                $key . '=' . env($key),
                $key . '=' . $request->cilent_secret_key,
                file_get_contents($path)


            ));
        }


        $exist = GoogleLoginSetting::first();
        if (!empty($exist->id)) {
            $exist = GoogleLoginSetting::first()->delete();
            $status = Request('status') ? true : false;
            $data             = new GoogleLoginSetting();
            $data->cilent_id       = $request->cilent_id;
            $data->cilent_secret_key         = $request->cilent_secret_key;
            $data->call_back_url         = $request->call_back_url;
            $data->status = $status;
            $flag = $data->save();


            $datafacebook = FacebookLoginSetting::first();
            $datagoogle = GoogleLoginSetting::first();
            $datagit = GitLabLoginSetting::first();

            return redirect()->back()->with('datagoogle', 'datafacebook', 'datagit');
        }

        $data             = new GoogleLoginSetting();
        $status = Request('status') ? true : false;
        $data->cilent_id       = $request->cilent_id;
        $data->cilent_secret_key         = $request->cilent_secret_key;
        $data->call_back_url         = $request->call_back_url;
        $data->status = $status;
        $flag = $data->save();

        $datafacebook = FacebookLoginSetting::first();
        $datagoogle = GoogleLoginSetting::first();
        $datagit = GitLabLoginSetting::first();

        return redirect()->back()->with('datagoogle', 'datafacebook', 'datagit');;
    }
    public function facebookSetting(Request $request)
    {
        $this->validate(
            $request,
            [
                'cilent_id' => 'required',
                'cilent_secret_key' => 'required',
                'call_back_url' => 'required'
            ],
            [
                'cilent_id.required' => ' Facebook client id required',
                'cilent_secret_key.required' => 'Facebook client secret key  required',
                'call_back_url.required' => 'Facebook call back url required',

            ]
        );
        $key = 'FACEBOOK_CLIENT_KEY';
        $path = base_path('.env');
        if (file_exists($path)) {

            file_put_contents($path, str_replace(
                $key . '=' . env($key),
                $key . '=' . $request->cilent_secret_key,
                file_get_contents($path)


            ));
        }
        $exist = FacebookLoginSetting::first();
        if (!empty($exist->id)) {
            $exist = FacebookLoginSetting::first()->delete();

            $data             = new FacebookLoginSetting();
            $status = Request('status') ? true : false;
            $data->cilent_id       = $request->cilent_id;
            $data->cilent_secret_key         = $request->cilent_secret_key;
            $data->call_back_url         = $request->call_back_url;
            $data->status = $status;
            $flag = $data->save();

            $datafacebook = FacebookLoginSetting::first();
            $datagoogle = GoogleLoginSetting::first();
            $datagit = GitLabLoginSetting::first();

            return redirect()->back()->with('datagoogle', 'datafacebook', 'datagit');
        }

        $data             = new FacebookLoginSetting();
        $status = Request('status') ? true : false;
        $data->cilent_id       = $request->cilent_id;
        $data->cilent_secret_key         = $request->cilent_secret_key;
        $data->call_back_url         = $request->call_back_url;
        $data->status = $status;
        $flag = $data->save();

        $datafacebook = FacebookLoginSetting::first();
        $datagoogle = GoogleLoginSetting::first();
        $datagit = GitLabLoginSetting::first();

        return redirect()->back()->with('datagoogle', 'datafacebook', 'datagit');
    }
    public function gitSetting(Request $request)
    {
        $this->validate(
            $request,
            [
                'cilent_id' => 'required',
                'cilent_secret_key' => 'required',
                'call_back_url' => 'required'
            ],
            [
                'cilent_id.required' => ' GITHUB client id required',
                'cilent_secret_key.required' => 'GITHUB client secret key  required',
                'call_back_url.required' => 'GITHUB call back url required',

            ]
        );

        $key = 'GITHUB_CLIENT_KEY';
        $path = base_path('.env');
        if (file_exists($path)) {

            file_put_contents($path, str_replace(
                $key . '=' . env($key),
                $key . '=' . $request->cilent_secret_key,
                file_get_contents($path)


            ));
        }


        $exist = GitLabLoginSetting::first();
        if (!empty($exist->id)) {
            $exist = GitLabLoginSetting::first()->delete();

            $data             = new GitLabLoginSetting();
            $status = Request('status') ? true : false;
            $data->cilent_id       = $request->cilent_id;
            $data->cilent_secret_key         = $request->cilent_secret_key;
            $data->call_back_url         = $request->call_back_url;
            $flag = $data->save();

            $datafacebook = FacebookLoginSetting::first();
            $datagoogle = GoogleLoginSetting::first();
            $datagit = GitLabLoginSetting::first();

            return redirect()->back()->with('datagoogle', 'datafacebook', 'datagit');
        }


        $data             = new GitLabLoginSetting();
        $data->cilent_id       = $request->cilent_id;
        $data->cilent_secret_key         = $request->cilent_secret_key;
        $data->call_back_url         = $request->call_back_url;
        $flag = $data->save();

        $datafacebook = FacebookLoginSetting::first();
        $datagoogle = GoogleLoginSetting::first();
        $datagit = GitLabLoginSetting::first();

        return redirect()->back()->with('datagoogle', 'datafacebook', 'datagit');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function privacypolicySetting(Request $request)
    {
        $this->validate($request, [
            'privacy_policy' => 'required',

        ]);
        $status = Request('status') ? true : false;
        $exist = PrivacyPolicy::first();
        if (!empty($exist->id)) {


            $exist = PrivacyPolicy::first()->delete();
            $data             = new PrivacyPolicy();
            $data->privacy_policy   = $request->privacy_policy;
            $data->status = $status;
            $flag = $data->save();
            $data = PrivacyPolicy::first();

            return redirect()->back()->with('data');
        }

        $data             = new PrivacyPolicy();
        $data->privacy_policy   = $request->privacy_policy;
        $data->status = $status;
        $flag = $data->save();
        $data = PrivacyPolicy::first();

        return redirect()->back()->with('data');
    }
    public function termsconditionSetting(Request $request)
    {
        $this->validate($request, [
            'terms_condition' => 'required',

        ]);
        $status = Request('status') ? true : false;
        $exist = TermsCondition::first();
        if (!empty($exist->id)) {
            $exist = TermsCondition::first()->delete();


            $data             = new TermsCondition();
            $data->terms_condition   = $request->terms_condition;
            $data->status = $status;
            $flag = $data->save();
            $data = TermsCondition::first();

            return redirect()->back()->with('data');
        }
        $data             = new TermsCondition();
        $data->terms_condition   = $request->terms_condition;
        $data->status = $status;
        $flag = $data->save();
        $data = TermsCondition::first();

        return redirect()->back()->with('data');
    }
    public function commingsoonSetting(Request $request)
    {
        $this->validate($request, [
            'page_tile' => 'required',
            'button_text' => 'required',
            'one' => 'required',
            'one_text' => 'required',
            'two' => 'required',
            'two_text' => 'required',
            'three' => 'required',
            'three_text' => 'required',
            'four' => 'required',
            'four_text' => 'required',
        ]);
        $data = ComingSoon::firstOrNew(['page_tile' =>  request('page_tile')]);
        $status = Request('status') ? true : false;

        $data->page_tile  = $request->page_tile;
        $data->button_text  = $request->button_text;
        $data->one    = $request->one;
        $data->one_text   = $request->one_text;
        $data->two  = $request->two;
        $data->two_text    = $request->two_text;
        $data->three  = $request->three;
        $data->three_text    = $request->three_text;
        $data->four  = $request->four;
        $data->four_text    = $request->four_text;
        if ($request->has('background_image')) {
            $imageName = time() . '.' . request()->background_image->getClientOriginalExtension();
            request()->background_image->move(public_path('images/commingsoon'), $imageName);
            $data->background_image = $imageName;
        }
        $data->status = $status;
        $flag = $data->save();
        $data = ComingSoon::first();
        return redirect()->back()->with('data');
    }


    public function contactsetting(Request $request)
    {


        $data             = new Contact();
        $data->name   = $request->name;
        $data->email  = $request->email;
        $data->mobile    = $request->mobile;
        $data->message    = $request->message;

        $flag = $data->save();
        return view('admin.pages.settings.contact');
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        switch ($id) {
            case 'account':
                return view('admin.pages.settings.account');
                break;
            case 'social':
                $datafacebook = FacebookLoginSetting::first();
                $datagoogle = GoogleLoginSetting::first();
                $datagit = GitLabLoginSetting::first();
                return view('admin.pages.settings.social', compact('datagit', 'datafacebook', 'datagoogle'));
                break;


            case 'mobile-app':
                $data = MobileApp::first();
                return view('admin.pages.settings.mobileapp', compact('data'));
                break;

            case 'site':

                $data = SiteSetting::first();
                $map = MapSetting::first();
                $seo = SeoSetting::first();
                return view('admin.pages.settings.site', compact('data', 'map', 'seo'));
                break;

            case 'email':
                $data = EmailSetting::first();
                return view('admin.pages.settings.email', compact('data'));
                break;
            case 'sms':
                $data = SMSSetting::first();
                return view('admin.pages.settings.sms', compact('data'));
                break;
            case 'account':
                return view('admin.pages.settings');
                break;
            case 'privacy-policy':
                $data = PrivacyPolicy::first();

                return view('admin.pages.settings.privacy', compact('data'));
                break;
            case 'terms-and-condition':

                $data = TermsCondition::first();
                return view('admin.pages.settings.terms', compact('data'));
                break;

            case 'comming-soon':
                $data = ComingSoon::first();
                return view('admin.pages.settings.coming', compact('data'));
                break;

            case 'contact':
                $data = Contact::get();
                return view('admin.pages.settings.contact', compact('data'));
                break;
        }
    }
    public function smssetting(Request $request)
    {

        $this->validate($request, [
            'auth_key' => 'required',
            'senderId' => 'required',
            'url' => 'required',
            'route' => 'required',


        ]);
        $key = 'SMS_AUTH_KEY';
        $path = base_path('.env');
        if (file_exists($path)) {

            file_put_contents($path, str_replace(
                $key . '=' . env($key),
                $key . '=' . $request->auth_key,
                file_get_contents($path)


            ));
        }


        $key = 'SMS_SENDER_ID';
        $path = base_path('.env');
        if (file_exists($path)) {

            file_put_contents($path, str_replace(
                $key . '=' . env($key),
                $key . '=' . $request->senderId,
                file_get_contents($path)


            ));
        }

        $exist = SMSSetting::first();
        if (!empty($exist->id)) {
            $exist = SMSSetting::first()->delete();

            $data             = new SMSSetting();

            $data->auth_key       = $request->auth_key;
            $data->senderId         = $request->senderId;
            $data->url         = $request->url;
            $data->route         = $request->route;
            $flag = $data->save();
            $data = SMSSetting::first();
            return redirect()->back()->with('data');
        }


        $data             = new SMSSetting();
        $data->auth_key       = $request->auth_key;
        $data->senderId         = $request->senderId;
        $data->url         = $request->url;
        $data->route         = $request->route;
        $flag = $data->save();
        $data = SMSSetting::first();

        return redirect()->back()->with('data');
    }
    public function appSetting(Request $request)
    {

        $exist = MobileApp::first();
        if (!empty($exist->id)) {


            $exist = MobileApp::first()->delete();
            $data             = new MobileApp();
            $data->playstore_url   = $request->playstore_url;
            $data->apk_version   = $request->apk_version;
            $data->release_date   = $request->release_date;
            $data->Changelogs   = $request->Changelogs;
            $flag = $data->save();
            $data = MobileApp::first();

            return redirect()->back()->with('data');
        }

        $data             = new MobileApp();
        $data->playstore_url   = $request->playstore_url;
        $data->apk_version   = $request->apk_version;
        $data->release_date   = $request->release_date;
        $data->Changelogs   = $request->Changelogs;
        $flag = $data->save();
        $data = MobileApp::first();

        return redirect()->back()->with('data');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function businessaccountindex()
    {
        return view('admin.businessaccount.index');
    }

    public function channelPartner()
    {
        return view('admin.businessaccount.channelPartner');
    }
    public function channelpartenerlist()
    {
        $BusinessAccount = User::with(['ChannelPartner'])->where('role_id', 2)->get();

        return datatables()->of($BusinessAccount)
            ->editColumn('created_at', function ($BusinessAccount) {
                return date('d/m/Y H:i', strtotime($BusinessAccount->created_at));
            })
            ->addColumn('company_name',function($BusinessAccount){
                return $BusinessAccount->ChannelPartner->company_name ?? '';
            })
            ->editColumn('updated_at', function ($BusinessAccount) {
                return date('d/m/Y H:i', strtotime($BusinessAccount->updated_at));
            })
            ->rawColumns(['company_name','country'])
            ->make(true);
    }

    public function businessaccountlist()
    {
        $BusinessAccount = BusinessAccount::where('admin_approved', 0)->get();

        return datatables()->of($BusinessAccount)
            ->editColumn('created_at', function ($BusinessAccount) {
                return date('d/m/Y H:i', strtotime($BusinessAccount->created_at));
            })
            ->editColumn('updated_at', function ($BusinessAccount) {
                return date('d/m/Y H:i', strtotime($BusinessAccount->updated_at));
            })
            ->make(true);
    }

    public function addtoChannel($id)
    {
        $data = BusinessAccount::where('id', $id)->first();
        $user = User::where('email', $data->email)->where('role_id', 2)->count();
        if ($user != 0) {
            $success = false;
            $message = "User is already a partner";

            //  Return response
            return response()->json([
                'success' => $success,
                'message' => $message,
            ]);
        }
        $delete = BusinessAccount::where('id', $id)->update(['admin_approved' => 1]);
        $randomString = Str::random(8);

        Session::put('randomString', $randomString);
        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->mobile = $data->mobile;
        $user->location = $data->state;
        // $user->password =  Hash::make($randomString);
        $user->password = bcrypt($randomString);
        $user->status = 1;
        $user->role_id = 2;
        $user->save();


        $datas = new ChannelPartner();
        $datas->name = $data->name;
        $datas->email = $data->email;
        $datas->mobile = $data->mobile;
        $datas->company_name = $data->company_name;
        $datas->website = $data->website;
        $datas->team_size = $data->team_size;
        $datas->country = $data->country;
        $datas->state = $data->state;
        $datas->city = $data->city;
        $datas->pin_code = $data->pin_code;
        $datas->user_id = $user->id;
        $datas->save();

        // $registeredUser = User::whereEmail($data->email)->first();

        //send mail

        // $verifiedUser=User::whereEmail($data->email)->first();
        $verifiedUser = User::whereEmail($user->email)->first();
        $verifiedUser->password = $randomString;
        $verifiedUser->user_name = $verifiedUser->email;
        $result  = Mail::to($verifiedUser->email)->send(new SendAccountDetails($verifiedUser));
        Mail::to('sharon@getlead.co.uk')->send(new SendCCMail($verifiedUser));

        if ($delete == 1) {
            $success = true;
            $message = "User is Added to channel partner successfully";
        } else {
            $success = true;
            $message = "User not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
