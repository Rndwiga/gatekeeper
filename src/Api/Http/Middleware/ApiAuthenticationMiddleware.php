<?php

namespace Rndwiga\Authentication\Api\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tyondo\Cirembo\Modules\Client\Models\Client;
use Tyondo\Cirembo\Modules\Permission\Models\User;

class ApiAuthenticationMiddleware
{
   // use ApiTrait;
    private $apiKey, $person;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('Authorization')) {

            $key = explode(' ', $request->header('Authorization'));
            $this->apiKey = $key[2];

            try{
                $this->person = User::where('api_key', $this->apiKey)->firstOrFail();
            }catch (ModelNotFoundException $exception){
                try{

                    $this->person = User::where('api_key', $this->apiKey)->firstOrFail();

                }catch (ModelNotFoundException $exception){
                    return response()->json(['status'=> 'failed', 'message'=> 'Unauthorized'], 401);
                }
            }
            return $next($request);
        }
        return response()->json([
            'status'=> 'failed',
            'data' => [
                'message'=> 'User Not Authorized'
            ]
        ], 401);

    }
}
