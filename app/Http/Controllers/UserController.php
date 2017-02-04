<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index(Request $request)
    {
        return response()->json([
            [
                'id'    => $request->userId,
                'isYou' => true,
            ],
        ]);
    }
}