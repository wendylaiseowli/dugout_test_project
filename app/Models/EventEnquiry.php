<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventEnquiry extends Model
{
    protected $connection = 'mysql';
    protected $table = 'events_enquiries';

    protected $fillable =[
        'name',
        'email',
        'phone',
        'message',
    ];

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = ltrim($value, '+');
    }
}
