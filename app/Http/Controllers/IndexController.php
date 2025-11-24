<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Models\Player;

class IndexController extends Controller
{
    #Public
    public function getMatches(){
        //get the last match
        $lastmatch = Matches::with(['homeTeam', 'awayTeam'])->orderBy('id', 'desc')->first();

        return view('index', compact('lastmatch'));
    }

    #Admin dashboard
    public function showDashBoard(){
        $startToday = Carbon::today()->startOfDay();
        $endToday = Carbon::today()->endOfDay();
        $todayReservations = Reservation::whereBetween('reservation_date', [$startToday, $endToday])->get();
        $todayReservationCount = $todayReservations->count();
        $lastTenWinners = Player::join('matches', 'players.matchID', '=', 'matches.id')->where('isWinner', true)->orderBy('players.updated_at', 'desc')->limit(10)->get();
        $lastTenReservations = Reservation::latest()->limit(10)->get();
        return view('dashboard.dashboard', compact('todayReservations', 'lastTenWinners', 'todayReservationCount', 'lastTenReservations'));
    } 
}