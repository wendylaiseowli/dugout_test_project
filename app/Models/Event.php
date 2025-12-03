<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

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
