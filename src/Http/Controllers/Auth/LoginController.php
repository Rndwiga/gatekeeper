<?php

namespace Rndwiga\Gatekeeper\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Rndwiga\Gatekeeper\Infrastructure\Services\UserActivationLibrary;
use Rndwiga\Gatekeeper\Model\EmailLogin;

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
    protected $redirectTo = '/gatekeeper/dashboard';
    protected  $userActivationLibrary;

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

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/authentication/login');
    }

    private function loginType(){

        if (!is_null(env('AUTHENTICATION_USE_CUSTOM_LOGIN_CLASS_FOR_WEB')) && !empty(env('AUTHENTICATION_USE_CUSTOM_LOGIN_CLASS_FOR_WEB'))){
            return env('AUTHENTICATION_USE_CUSTOM_LOGIN_VIEW');
        }elseif (!is_null(env('AUTHENTICATION_PASSWORD_LESS_LOGIN'))){
            if (env('AUTHENTICATION_PASSWORD_LESS_LOGIN') == true){
                return config('authorization.views.pages.auth.passwordless.login');
            }else{

                return config('gatekeeper.views.pages.auth.login');
            }
        }else{
            return config('gatekeeper.views.pages.auth.login');
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

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        if($request->has('password')){
            $this->validateLogin($request);

            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if (method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)) {
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

    /** This is a complex class that allows for use of a custom login class that has to have at-least
     * one public method bootstrapLogin() for login logic
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function resolvePasswordLessLogin(Request $request)
    {
        if (!is_null(env('AUTHENTICATION_USE_CUSTOM_LOGIN_CLASS_FOR_WEB'))  && !empty(env('AUTHENTICATION_USE_CUSTOM_LOGIN_CLASS_FOR_WEB'))){
            $customeClassPath = env('AUTHENTICATION_CUSTOM_LOGIN_CLASS_WEB');
            return (new $customeClassPath($request->all()))->bootstrapLogin();
        }else {

            $this->validate($request, ['email' => 'required|email|exists:users']);
            $this->passwordLessValidator($request->all())->validate();

            $emalLogin = EmailLogin::createForEmail($request->input('email'));

            $url = route('auth.email.authentication', [  //building the url that we will send to the user.
                'token' => $emalLogin->token
            ]);

            $content = $url;
            Mail::raw($content, function ($message) use ($request) {
                $message->to($request->input('email'));
                $message->subject(env('APP_NAME') . ' Login Token');
                $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
            });
            return redirect()->back()->with('message',"Hi, we have sent login email to: {$request->input('email')}. Click the link there to login");
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function passwordLessValidator(array $data)
    {
        $envMessage = env('AUTHENTICATION_AUTHORIZATION_MESSAGE');

        $messages = [
            'email.email_domain_allowed' => isset($envMessage)? env('AUTHENTICATION_AUTHORIZATION_MESSAGE') : 'The :attribute should be the company email.', //setting custom message
        ];
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|email_domain_allowed:'.$data['email'].'|exists:users',
        ],$messages);

    }

    /**
     * This function authenticates a user using email token
     * @param $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function authenticateEmail(Request $request,$token){
        $emailLogin = EmailLogin::validateFromToken($token);

        Auth::login($emailLogin->user);

        $emailLogin->user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);

        return redirect()->route(env('BASE_DASHBOARD_ROUTE'));
    }
}
