<?php

namespace Rndwiga\Authentication\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Rndwiga\Authentication\Helpers\UserActivationLibrary;
use Rndwiga\Authentication\Http\Controllers\Controller;
use Rndwiga\Authentication\Models\EmailLogin;
use Rndwiga\Authentication\Notifications\newUserLogin;

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
    protected $redirectTo = '/home';
    protected $userActivationLibrary;

    /**
     * Create a new controller instance.
     *
     * @param UserActivationLibrary $userActivationLibrary
     */
    public function __construct(UserActivationLibrary $userActivationLibrary)
    {
        $this->middleware('guest')->except('logout');
        $this->userActivationLibrary = $userActivationLibrary;
    }

    private function loginType(){

        if (!is_null(env('AUTHENTICATION_PASSWORD_LESS_LOGIN'))){
            if (env('AUTHENTICATION_PASSWORD_LESS_LOGIN') == true){
                return config('authorization.views.pages.auth.passwordless.login');
            }else{

                return config('gentella.views.pages.auth.login');
            }
        }else{
            return config('gentella.views.pages.auth.login');
        }
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view($this->loginType());
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->activated) {
            $this->userActivationLibrary->sendActivationMail($user);
            auth()->logout();
            return back()->with('activationWarning', true);
        }
        if ($user->is_active == 0) {
            auth()->logout();
            return redirect($this->redirectPath());
        }
        $this->newLogin($request->ip(), $user);
        return back();
    }
    public function activateUser($token)
    {
        if ($user = $this->userActivationLibrary->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }
    private function newLogin($ip, $user)
    {
        $user->notify(new newUserLogin($ip));
    }

    public function login(Request $request)
    {
        if($request->has('password')){
            $this->validateLogin($request);

            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        }else{
            return $this->resolvePasswordLessLogin($request);
        }
    }

    public function resolvePasswordLessLogin(Request $request)
    {
        $this->validate($request, ['email'=>'required|email|exists:users']);

        $emalLogin = EmailLogin::createForEmail($request->input('email'));

        $url = route('auth.email.authentication',[  //building the url that we will send to the user.
            'token' => $emalLogin->token
        ]);

        /*Mail::send('templates.email-login',['url' => $url], function ($m) use ($request){
            $m->from('admin@staff.musoni.co.ke', 'Musoni Kenya');
            $m->to($request->input('email'))->subject('Musoni Kenya Tracker Login');
        });*/

        $content = $url;
        Mail::raw($content, function ($message)  use ($request){
            $message->to($request->input('email'));
            $message->subject(env('APP_NAME').' Login Token');
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
        });


        return redirect()->back()->with('message',"Hi, we have sent login email to: {$request->input('email')}. Click the link there to login");
    }

    /**
     * This function authenticates a user using email token
     * @param $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function authenticateEmail($token){
        $emailLogin = EmailLogin::validateFromToken($token);

        Auth::login($emailLogin->user);

        return redirect()->route(env('BASE_DASHBOARD_ROUTE'));
    }

}
