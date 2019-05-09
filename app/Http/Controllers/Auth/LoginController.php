<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->acceptedProviders = [
            'google',
            'facebook',
            'twitter',
            'linkedin'
        ];
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        if(in_array($provider, $this->acceptedProviders)) {
            return Socialite::driver($provider)->redirect();
        } else return redirect('/404', 404);
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $userExists = User::where('email', $user->email)->first();

        if(!$userExists){
            $userFullName = explode(' ', $user->name);
            $first_name = $userFullName[0];
            array_shift($userFullName);
            $last_name = join(' ', $userFullName);

            // return redirect('/register?email='.$user->email.'&first_name='.$first_name.'&last_name='.$last_name);
            return response()->json([
                'logged_in' => false,
                'user_info' => [
                    'firstname' => $first_name,
                    'lastname' => $last_name,
                    'email' => $email
                ]
            ]);
        }

        Auth::login($userExists);

        // return redirect()->intended('dashboard');
        return response()->json([
            'logged_in' => true,
            'redirect_url' => url('/dashboard')
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    // public function username()
    // {
    //     $identity  = request()->get('username');
    //     $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    //     request()->merge([$fieldName => $identity]);
    //     return $fieldName;
    // }

    /**
     * Validate the user login.
     * @param Request $request
     */
    // protected function validateLogin(Request $request)
    // {
    
    //     $this->validate($request,
    //         [
    //             'username' => 'required|string',
    //             'password' => 'required|string',
    //         ],
    //         [
    //             'username.required' => 'Username or email is required',
    //             'password.required' => 'Password is required',
    //         ]
    //     );
        
        
    // }
    /**
     * @param Request $request
     * @throws ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $request->session()->put('login_error', trans('auth.failed'));

        // throw ValidationException::withMessages(
        //     [
        //         'error' => [trans('auth.failed')],
        //     ]
        // );

        return response()->json([
            'status' => 'error',
            'errors' => [trans('auth.failed')]
        ]);
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $user_id = Auth::user()->id;
        $this->guard()->logout();
        $request->session()->invalidate();
        Cache::forget('user-is-online-' . $user_id);

        // return $this->loggedOut($request) ?: redirect('/');
        return response()->json([
            'logged_out' => true,
            'redirect_url' => url('/')
        ]);
    }

     /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        return response()->json([
            'logged_in' => true,
            'user' => $user,
            'redirect_url' => url('/dashboard')
        ]);
    }
}
