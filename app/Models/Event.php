<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $connection = 'mysql';

    protected $fillable=[
        'event_name',
        'description',
        'photo_path',
        'event_date',
        'event_time',
        'status',
        'userID',
        'event_location',
    ];

    protected $casts=[
        'event_date'=>'datetime',
        'event_time'=>'datetime',        
    ];
}
