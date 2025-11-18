<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matches extends Model
{
    use HasFactory;
    
    protected $connection = 'mysql2';
    protected $table = 'matches';

    protected $fillable =[
       'startDateTime',
       'homeTeamID',
       'awayTeamID',
       'homeTeamResult',
       'leagueID',
       'status', 
    ];

    protected $casts =[
        'startDateTime'=> 'datetime',
    ];

    function homeTeam(){
        return $this->belongsTo(Team::class, 'homeTeamID');
    }

    function awayTeam(){
        return $this->belongsTo(Team::class, 'awayTeamID');
    }

    function getFormattedDate(){
        return($this->startDateTime->format('F j, Y '));
    }

    function getFormattedTime(){
        return($this->startDateTime->format('g:i A'));
    }

    // g -Hour (12-hour format, no leading zero)
    // i -Minutes (no leading zero)
    // A -AM or PM
}
