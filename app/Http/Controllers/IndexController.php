<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;

class IndexController extends Controller
{
    function getMatches(){
        //get the last match
        $lastmatch = Matches::with(['homeTeam', 'awayTeam'])->orderBy('id', 'desc')->first();

        return view('index', compact('lastmatch'));
    }
}