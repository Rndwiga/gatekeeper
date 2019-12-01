<?php

namespace Rndwiga\Gatekeeper\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Rndwiga\Gatekeeper\Http\Requests\UserRequest;
use Rndwiga\Gatekeeper\Http\Requests\UserRequestUpdate;
use Rndwiga\Gatekeeper\Infrastructure\Services\PasswordLessAuthentication;
use Rndwiga\Gatekeeper\Model\User;

class AdminController extends Controller
{
  private $passwordLessAuthentication;

  public function __construct(PasswordLessAuthentication $authentication)
  {
      $this->middleware('auth');
      $this->passwordLessAuthentication = $authentication;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $model)
    {
        return view(config('gatekeeper.views.pages.users.index'), ['users' => $model->paginate(15)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('gatekeeper.views.pages.users.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if (Auth::user()->role_id == 0){
            $input = $request->all();
            $input['created_by'] = Auth::id();
            $input['password'] = bcrypt($request->input('password'));
            $input['name'] = $request->input('first_name') . ' '.$request->input('last_name');
            User::create($input);
            Session::flash('message', 'The user has been CREATED !!');

            $loginToken['email'] = $input['email'];

            $this->passwordLessAuthentication->sendLoginToken($loginToken);
        }
        return redirect('/admin/users');
    }
    private function randomPassword( $length = 8 )
    {
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
      $length = rand(10, 16);
      $password = substr( str_shuffle(sha1(rand() . time()) . $chars  ), 0, $length );
      return $password;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $user = User::findOrFail($id);
      return view('portal.users.changePassword', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //$roles = Role::pluck('name', 'id')->all();
     // $offices = Office::pluck('name', 'id')->all();
      return view(config('authorization.views.pages.users.edit'))->with([
          'user' => User::findOrFail($id)
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequestUpdate $request, $id)
    {
        if (Auth::user()->role_id == 0){
            $data = $request->all();
            $input = [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => isset($data['password']) ? $data['password'] :'',
                'role_id' => $data['role_id'],
                'user_status' => $data['user_status'],
            ];
            $pwd = trim($request->input('password'));
            if($pwd === '' || $pwd === null)
            {
                unset($input['password']);
            }else {
                $input['password'] = bcrypt($request->input('password'));
            }

            $user = User::findOrFail($id);

            if($input['email'] == $user->email)
            {
                unset($input['email']);
            }else{
                Validator::make($request->all(), [
                    'email' => 'required|email|max:255|unique:users',
                ])->validate();
            }
            $user->update($input);

            Session::flash('message', 'The user has been updated :-)');
        }

        return redirect('/admin/users');
    }
    public function changePassword(Request $request, $id)
    {

      Validator::make($request->all(), [
                      'password' => 'required|min:6|confirmed',
                  ])->validate();

      $input = $request->only('password');
      $input['password'] = bcrypt($request->password);
      $user = User::findOrFail($id);
      $user->update($input);
      Session::flash('message', 'Password Updated :-)');
      return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
      $user->delete();
      Session::flash('message', 'The user has been deleted :-(');
      return redirect('admin/users');
    }
}
