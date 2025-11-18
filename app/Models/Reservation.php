<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql';

    protected $fillable=[
        'reservation_name',
        'reservation_date',
        'reservation_time',
        'number_of_people',
        'phone_number',
        'email',
        'status',
        'userID',
    ];

    protected $casts=[
        'reservation_date'=> 'datetime',
        'reservation_time'=> 'datetime',
    ];

}
