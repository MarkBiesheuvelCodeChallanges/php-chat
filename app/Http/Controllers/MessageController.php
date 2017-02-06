<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MessageController extends BaseController
{
    public function receive(Request $request)
    {
        $messages = Message::where('to_user_id', $request->user->id)
            ->where('is_received', false)
            ->get(['id', 'from_user_id', 'content', 'created_at']);

        // TODO: wait with updating until client acknowledges they received it
        if ($messages->count() > 0) {

            $ids = $messages->map(function (Message $message) {
                return $message->id;
            });

            $messageTable = $messages->first()->getTable();
            DB::table($messageTable)
                ->whereIn('id', $ids)
                ->update(['is_received' => true]);
        }

        return response()->json($messages);
    }

    public function send(Request $request, $toUserId)
    {
        $message = new Message();
        $message->from_user_id = $request->user->id;
        $message->to_user_id = $toUserId;
        $message->content = Input::get('content');
        $message->is_received = false;
        $message->save();

        return response()->json([
            'ack' => true,
        ]);
    }
}