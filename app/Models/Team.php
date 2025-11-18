<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    // protected $connection = 'mysql2';

    protected $fillable =[
        'name',
        'logoURL',
        'description',
    ];

    function matches(){
        return $this->hasMany(Matches::class);
    }
}
