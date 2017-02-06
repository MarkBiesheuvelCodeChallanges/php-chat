<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    public $casts = [
        'id'           => 'integer',
        'last_request' => 'timestamp',
    ];
}
