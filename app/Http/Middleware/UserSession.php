<?php

namespace App\Http\Middleware;

use Closure;

class UserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session = $request->session();

        if ($session->has('userId')) {
            $userId = $session->get('userId');
        } else {
            $userId = random_int(10000, 99999);
            $session->put('userId', $userId);
        }

        $request->userId = $userId;

        return $next($request);
    }
}
