<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $casts = [
        'from_user_id' => 'integer',
        'to_user_id'   => 'integer',
        'is_received'  => 'boolean',
    ];
}
