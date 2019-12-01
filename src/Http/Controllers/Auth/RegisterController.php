<?php

namespace Rndwiga\Gatekeeper\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Rndwiga\Gatekeeper\Model\EmailLogin;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    private function registrationType(){

        if (!is_null(env('AUTHENTICATION_PASSWORD_LESS_REGISTRATION'))){
            if (env('AUTHENTICATION_PASSWORD_LESS_REGISTRATION') == true){
                return config('authorization.views.pages.auth.passwordless.register');
            }else{

                return config('authorization.views.pages.auth.register');
            }
        }else{
            return config('authorization.views.pages.auth.login');
        }
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        //return view('auth.register');
        return view($this->registrationType());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $envMessage = env('AUTHENTICATION_AUTHORIZATION_MESSAGE');
        $messages = [
            'email.email_domain_allowed' => isset($envMessage)? env('AUTHENTICATION_AUTHORIZATION_MESSAGE') : 'The :attribute should be the company email.', //setting custom message
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','email_domain_allowed:'.$data['email'], 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], //TODO:: check if method is set to passwordless to skip this validation
        ],$messages);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     * Introduced checker for passwordless
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if (env('AUTHENTICATION_PASSWORD_LESS_REGISTRATION') == true){
            $this->guard()->logout();
            $request->session()->invalidate();

            return $this->resolvePasswordLessLogin($request);
        }else{
            $this->guard()->login($user);

            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        }

    }

    public function resolvePasswordLessLogin(Request $request)
    {
        $this->validate($request, ['email'=>'required|email|exists:users']);

        $emalLogin = EmailLogin::createForEmail($request->input('email'));

        $url = route('auth.email.authentication',[  //building the url that we will send to the user.
            'token' => $emalLogin->token
        ]);

        $content = $url;
        Mail::raw($content, function ($message)  use ($request){
            $message->to($request->input('email'));
            $message->subject(env('APP_NAME') . ' Login Token');
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
        });


        return redirect()->route('login')->with('message',"Hi, we have sent login email to: {$request->input('email')}. Click the link there to login");
    }
}
