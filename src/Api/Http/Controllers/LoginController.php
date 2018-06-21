<?php

namespace Rndwiga\Authentication\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Rndwiga\Authentication\Api\Http\Requests\LoginRequest;
use Rndwiga\Authentication\Http\Requests\UserRequest;
use Rndwiga\Authentication\Http\Requests\UserRequestUpdate;
use Rndwiga\Authentication\Models\Office;
use Rndwiga\Authentication\Models\User;


class LoginController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email',$request->input('email'))->first();

        if (!is_null($user)){
            $user->generateToken();
            return response()->json([
                'status' => 'success',
                'data' => $user->toArray(),
            ]);
        }

        return $request->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = ''/*Role::pluck('name', 'id')->all()*/;
      $offices = '' /*Office::pluck('name', 'id')->all()*/;
      return view(config('authorization.views.pages.users.create'), compact('roles','offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();

        //  $password = $this->randomPassword();
       $input['password'] = bcrypt($request->input('password'));
       $input['user_uid'] = Uuid::uuid4();
        User::create($input);
        Session::flash('message', 'The user has been CREATED !!');
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
      $user = User::findOrFail($id);
      //$roles = Role::pluck('name', 'id')->all();
     // $offices = Office::pluck('name', 'id')->all();
      return view(config('authorization.views.pages.users.edit'), compact('user', 'roles', 'offices'));
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
      if(trim($request->input('password')) == '')
        {
          $input = $request->except('password');
        }else {
          $input = $request->all();
          $input['password'] = bcrypt($request->input('password'));
        }

      $user = User::findOrFail($id);

      if($request->input('email') == $user->email)
        {
          $input = $request->except('email');
        }else{
            Validator::make($request->all(), [
                            'email' => 'required|email|max:255|unique:users',
                        ])->validate();
        }
      $user->fill($input)->save();
      Session::flash('message', 'The user has been updated :-)');
      return redirect('/admin/users');
    }
    public function changePassword(Request $request, $id)
    {
    //  echo 'here';
    //  exit;
      Validator::make($request->all(), [
                      'password' => 'required|min:6|confirmed',
                  ])->validate();
    //  echo 'here agani';
    //  exit;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

      /// unlink(public_path($user->photo->file));
        $user->delete();
      Session::flash('message', 'The user has been deleted :-(');
      return redirect('admin/users');
    }
}
