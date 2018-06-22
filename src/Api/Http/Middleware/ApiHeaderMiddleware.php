<?php

namespace Rndwiga\Authentication\Api\Http\Middleware;

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
        $this->headerName = env('AUTHENTICATION_API_HEADER') ? env('AUTHENTICATION_API_HEADER') : 'AUTHENTICATION-API-HEADER';

        if ($request->header($this->headerName)) {
            /*$key = $request->header('Musoni-Kenya-Framework');
            $this->frameworkKey = $key;

            // return response()->json(['status'=> 'failed', 'message'=> $this->tenantKey], 401);

            try{
                $user = User::where('api_token', $this->frameworkKey)->firstOrFail();

            }catch (ModelNotFoundException $exception){
                return response()->json(['status'=> 'failed', 'message'=> 'Unauthorized'], 401);
            }*/
            return $next($request);
        }
        return response()->json([
            'status'=> 'failed',
            'data' => [
                'message'=> 'Improper headers set',
                'developerMessage' => "The header " . $this->headerName . " needs to be set"
            ]
        ], 401);

    }
}
