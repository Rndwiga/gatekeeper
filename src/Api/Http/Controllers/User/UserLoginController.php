<?php

namespace Rndwiga\Authentication\Api\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Rndwiga\Authentication\Api\Http\Controllers\ApiController;

class UserLoginController extends ApiController
{


    public function authenticate(Request $request){

        $this->validate($request, [

            'email' => 'required',

            'password' => 'required'
        ]);


        $user = User::where('email', $request->input('email'))->first();


        if (!is_null($user)){
            if(Hash::check($request->input('password'), $user->password)){

                $apikey = base64_encode(str_random(40));

                User::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);;

                //return response()->json(['status' => 'success','api_key' => $apikey]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Successfully logged in',
                    'data' => new UserLoginResource($user),
                    'error' => (object)[],
                ],200);

            }else{

                return response()->json([
                    'status' => 'fail',
                    'message' => 'Bad credentials provided',
                    'data' => (object)[],
                    'error' => [
                        'code' => 101,
                        'userMessage' => 'User does not exist',
                        'developerMessage' => 'The user with credentials provided does not exist',
                        'moreInfo' => ''
                    ],
                ], 200);

            }
        }else{
            return response()->json([
                'status' => 'fail',
                'message' => 'Object does not exist',
                'data' => (object)[],
                'error' => [
                    'code' => 101,
                    'userMessage' => 'User does not exist',
                    'developerMessage' => 'Unable to retrieve the user from db',
                    'moreInfo' => ''
                ],
            ],404);
        }

    }

    public function checkApiKey(){

        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('Authorization')) {
                $key = explode(' ', $request->header('Authorization'));
                $user = Users::where('api_key', $key[1])->first();
                if (!empty($user)) {
                    $request->request->add(['userid' => $user->id]);

                }
                return $user;
            }
        });
    }

    protected $person;

    /***
     * This function checks whether the user is valid. If is, returns an API key, if not returns an error with code 401
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */

    public function authenticateUser(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        try{
            $this->person = User::where('email', $request->input('email'))->firstOrFail();
        }catch (ModelNotFoundException $exception){
            try{
                $this->person = Client::where('email', $request->input('email'))->firstOrFail();
            }catch (ModelNotFoundException $exception){
                return $this->error(['status'=> 'fail', 'message' => 'User does not exist'], 401);
            }
        }

        if(Hash::check($request->input('password'), $this->person->password)){
            $apiKey = base64_encode(str_random(40));
            $this->person->api_key = $apiKey; //attaching api key to the person
            $this->person->save();

            $data = [
                'status' => 'success',
                'message' => 'Successfully logged in',
                'apiKey' => $apiKey,
                'userFullName' => $this->person->first_name . ' ' . $this->person->last_name,
                'userFirstName' => $this->person->first_name,
                'userLastName' => $this->person->last_name,
                'userEmail' => $this->person->email,
                'userId' => $this->person->id,
                'userUid' => isset($this->person->user_uid)? $this->person->user_uid : $this->person->client_uid
            ];
            return $this->success($data);
        }else{
            $data = [
                'status' => 'fail',
                'message' => 'The user does not exist'
            ];
            return $this->error($data, 401);
        }
    }

}
