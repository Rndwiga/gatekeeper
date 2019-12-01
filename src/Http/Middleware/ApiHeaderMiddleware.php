<?php

namespace Rndwiga\Gatekeeper\Http\Middleware;

use Closure;
use Rndwiga\Authentication\Models\User;

class ApiHeaderMiddleware
{
    public $frameworkKey;
    public $headerName;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** Types of headers
        {
        "connection": [
        "keep-alive"
        ],
        "content-length": [
        "0"
        ],
        "accept-encoding": [
        "gzip, deflate"
        ],
        "host": [
        "myaccount.musoni"
        ],
        "accept": [
        "*" //should be /* and /
        ],
        "user-agent": [
            "PostmanRuntime/7.1.1"
        ],
        "postman-token": [
            "d203e48b-868a-40db-a1c6-e879d5bb9365"
        ],
        "cache-control": [
            "no-cache"
        ],
        "authentication-api-header": [
            "onlineBanking"
        ],
        "content-type": [
            ""
        ]
            }
         *
         */


        $this->headerName = env('AUTHENTICATION_API_HEADER_NAME') ? env('AUTHENTICATION_API_HEADER_NAME') : 'AUTHENTICATION_API_HEADER_NAME';
        $headerNameKey = $request->header($this->headerName);
        if ($headerNameKey) {
            $this->frameworkKey = env('AUTHENTICATION_API_HEADER_VALUE') ? env('AUTHENTICATION_API_HEADER_VALUE') : false;
            if ($this->frameworkKey == $headerNameKey){
                //TODO:: DEVELOPER :: this can be enhanced further
                if (!$request->isJson()){
                    return response()->json([
                        'status' => 'failed',
                        'data' => [
                            'message' => 'The data needs to be in Json format',
                        ]
                    ], 401);
                }

                return $next($request);
            }elseif ($this->frameworkKey === false){
                return response()->json([
                    'status' => 'failed',
                    'data' => [
                        'message' => 'Header value not set',
                        'developerMessage' => "The header value is not set in the system. It need to be."
                    ]
                ], 401);
            }
            else{
                return response()->json([
                    'status' => 'failed',
                    'data' => [
                        'message' => 'Improper header value set',
                        'developerMessage' => "The header value for ". $this->headerName ." needs to be set to:  " . $this->frameworkKey
                    ]
                ], 401);
            }

            /*$key = $request->header('Musoni-Kenya-Framework');
            $this->frameworkKey = $key;

            // return response()->json(['status'=> 'failed', 'message'=> $this->tenantKey], 401);

            try{
                $user = User::where('api_token', $this->frameworkKey)->firstOrFail();

            }catch (ModelNotFoundException $exception){
                return response()->json(['status'=> 'failed', 'message'=> 'Unauthorized'], 401);
            }*/

        }else {
            return response()->json([
                'status' => 'failed',
                'data' => [
                    'message' => 'Improper headers set',
                    'developerMessage' => "The header " . $this->headerName . " needs to be set"
                ]
            ], 401);
        }

    }
}
