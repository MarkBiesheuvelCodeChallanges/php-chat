<?php

namespace App\Http\Middleware;

use App\User;
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
            $id = $session->get('userId');
            $user = User::find($id);
        } else {
            $user = null;
        }

        if ($user === null) {
            $id = random_int(10000, 99999);

            $user = new User();
            $user->id = $id;

            $session->put('userId', $id);
        }

        // Update user
        $user->last_request = time();
        $user->save();

        //Add user to request and continue on
        $request->user = $user;

        return $next($request);
    }
}
