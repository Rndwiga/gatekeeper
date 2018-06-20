<?php

namespace Rndwiga\Authentication\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Rndwiga\Authentication\Models\EmailLogin;
use Rndwiga\Authentication\Models\User;

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

    public function showRegistrationForm()
    {
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
        /*return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);*/

        $envMessage = env('AUTHENTICATION_AUTHORIZATION_MESSAGE');

        $messages = [
            'email.email_domain_allowed' => isset($envMessage)? env('AUTHENTICATION_AUTHORIZATION_MESSAGE') : 'The :attribute should be the company email.', //setting custom message
        ];
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|email_domain_allowed|unique:users',
            //'password' => 'required|string|min:6|confirmed',
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
            'password' => bcrypt($data['email']),
        ]);
    }

    public function register(Request $request)
    {
      // return $request->all();

       // $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->logout();

        $request->session()->invalidate();


        //$this->guard()->login($user); //disabling automatic login

        return $this->resolvePasswordLessLogin($request);

       // $request->session()->flash('message', 'Registered successfully, enter your registered email to receive login link');

       // return redirect()-> route('login');

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
            $message->subject(env('APP_NAME') . ' Login Token');
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
        });


        return redirect()->route('login')->with('message',"Hi, we have sent login email to: {$request->input('email')}. Click the link there to login");
    }
}
