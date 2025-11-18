<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventEnquiry extends Model
{
    use HasFactory;
    
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
