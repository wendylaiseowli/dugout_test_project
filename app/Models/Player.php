<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $fillable =[
        'name', 
        'email',
        'phoneNumber',
        'tableNumber',
        'branchID',
        'matchID',
        'homeTeamPrediction',
        'awayTeamPrediction',
        'cookieID',
        'isWinner',
        'message',
    ];

    public function match()
    {
        return $this->belongsTo(Matches::class, 'matchID');
    }
}
