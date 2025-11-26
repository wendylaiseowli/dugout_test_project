<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql';

    protected $fillable=[
        'name',
        'photo_path',
        'promotion_startDate',
        'promotion_endDate',
        'description',
        'status', //active and deactive
        'userID',
    ];

    protected $casts=[
        'promotion_startDate'=> 'datetime',
        'promotion_endDate' => 'datetime',
    ];

    function getFormattedDate(){
        return(
            $this->promotion_startDate->format('j F, Y') //j is full date without leading zero and F is full month
            .' to '.
            $this->promotion_endDate->format('j F, Y')
        );
    }
}
