<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
// use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
	// use ThrottlesLogins;


	protected $guard = 'admin';

	protected $redirectTo = '/admin/dashboard';

	/**
	 * Max login attempts allowed.
	 */
	public $maxAttempts = 5;

	/**
	 * Number of minutes to lock the login.
	 */
	public $decayMinutes = 3;

	/**
	 * Only guests for "admin" guard are allowed except
	 * for logout.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    // $this->middleware('guest:admin')->except('logout');
	}


    public function showLoginForm()
    {
        return view('admin.auth.login',[
            'title' => 'Admin Login',
            'loginRoute' => 'admin.login',
            'forgotPasswordRoute' => 'admin.password.request',
        ]);
    }
    public function login(Request $request)
    {


         $this->validator($request);

        //check if the user has too many login attempts.
        // if ($this->hasTooManyLoginAttempts($request)){
        //     //Fire the lockout event.
        //     $this->fireLockoutEvent($request);

        //     //redirect the user back after lockout.
        //     return $this->sendLockoutResponse($request);
        // }

	    if(auth()->guard('admin')->attempt(request()->only('email','password'),request()->filled('remember'))){
	        //Authentication passed...
	        return redirect()
	            ->intended(route('admin.home'))
	            ->with('status','You are Logged in as Admin!');
	    }

	    //keep track of login attempts from the user.
	    // $this->incrementLoginAttempts($request);

	    //Authentication failed...
	    return $this->loginFailed();
    }
    public function logout()
    {
		// dd(Auth::guard('admin'));
		// $user= Auth::User();
		// if( $user->role_id ==2){
		// 	Auth::guard('admin')->logout();
		// 	return redirect('/login');
		// }
		// else{
			auth()->guard('admin')->logout();
			auth()->guard('partner')->logout();
			return redirect()
				->route('login')
				->with('status','Admin has been logged out!');
		// }
    }


    private function validator(Request $request)
    {
    	//validation rules.
	    $rules = [
	        'email'    => 'required|email|exists:admins|min:5|max:191',
	        'password' => 'required|string|min:4|max:255',
	    ];

	    //custom validation error messages.
	    $messages = [
	        'email.exists' => 'These credentials do not match our records.',
	    ];

	    //validate the request.
	    $request->validate($rules,$messages);
    }

    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */


    private function loginFailed()
    {
    	$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
    	return redirect()
        ->back()
        ->withInput()
        ->withErrors($errors);
    }

    public function username(){
        return 'email';
    }
}
