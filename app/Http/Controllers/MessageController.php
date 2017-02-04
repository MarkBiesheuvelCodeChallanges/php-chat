<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class MessageController extends BaseController
{
    public function index($userId)
    {
        return response()->json([$userId]);
    }
}