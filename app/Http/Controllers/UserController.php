<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\User;

class UserController extends BaseController
{
    const ONLINE_THRESHOLD = 60;

    public function index(Request $request)
    {
        // A user is online when they made a request a minute ago (now - 60s)
        $onlineCutOff = time() - self::ONLINE_THRESHOLD;

        $users = User::all()
            ->map(function (User $user) use ($request, $onlineCutOff) {
                return [
                    'id'       => $user->id,
                    'isOnline' => ($user->last_request > $onlineCutOff),
                    'isYou'    => ($user->id === $request->user->id),
                ];
            });

        return response()->json($users);
    }
}