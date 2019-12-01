<?php

namespace Rndwiga\Gatekeeper\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

class AdminAuthenticationMiddleware
{
    /**
     * The authentication factory instance.
     *
     * @var Auth
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param Auth $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next)
    {
        /*if ($this->auth->guard('gatekeeper')->check()) {
            $this->auth->shouldUse('gatekeeper');
        } else {
            throw new AuthenticationException(
                'Unauthenticated.', ['gatekeeper'], route(config('gatekeeper.routes.login_form'))
            );
        }*/

        return $next($request);
    }
}
