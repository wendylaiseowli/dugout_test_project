<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    #public
    public function reserve(ReservationRequest $request)
    {
        $validated = $request->validated();

        // Convert date and time to proper DB format
        if (!empty($validated['reservation_date']) && !empty($validated['reservation_time'])) {
                // Combine date and time into one datetime
                $datetime = Carbon::createFromFormat(
                    'd/m/Y H:i',
                    $validated['reservation_date'] . ' ' . $validated['reservation_time']
                );

                $validated['reservation_date'] = $datetime->format('Y-m-d H:i:s');
                $validated['reservation_time'] = $datetime->format('Y-m-d H:i:s');
            }

        $validated['userID'] = $validated['userID'] ?? 1;
        
        Reservation::create($validated);

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        
    }

    #Admin
    public function index(){
        $reservations = Reservation::latest()->get();
        return view('reservation.reservation', compact('reservations'));        
    }

    public function store(ReservationRequest $request){
        $validated = $request->validated();

        // Convert date and time to proper DB format
        if (!empty($validated['reservation_date']) && !empty($validated['reservation_time'])) {
            // Combine date and time into one datetime
            $datetime = Carbon::createFromFormat(
                'd/m/Y H:i',
                $validated['reservation_date'] . ' ' . $validated['reservation_time']
            );

            $validated['reservation_date'] = $datetime->format('Y-m-d H:i:s');
            $validated['reservation_time'] = $datetime->format('Y-m-d H:i:s');
        }

        // $validated['userID'] = $validated['userID'] ?? 1;
        $validated['userID'] = Auth::id();

        Reservation::create($validated);
        // return redirect('/reservations')->with('success', 'Reservation has been successfully added');
        return response()->json(['success' => true]);
    }

    public function update(ReservationRequest $request, Reservation $reservation){        
        $validated = $request->validated();

        // Convert date and time to proper DB format
        if (!empty($validated['reservation_date']) && !empty($validated['reservation_time'])) {
            // Combine date and time into one datetime
            $datetime = Carbon::createFromFormat(
                'd/m/Y H:i',
                $validated['reservation_date'] . ' ' . $validated['reservation_time']
            );

            $validated['reservation_date'] = $datetime->format('Y-m-d H:i:s');
            $validated['reservation_time'] = $datetime->format('Y-m-d H:i:s');
        }
        $reservation->update($validated);
        
        return redirect('/reservations')->with('success', 'Reservation has been successfully updated');
    }

    public function destroy(Reservation $reservation){
        $reservation->delete();
        return redirect('/reservations')->with('success', 'Reservation has been successfully deleted');
    }

    public function active(Reservation $reservation){
        $reservation->update(['status'=> true]);
        return redirect('/reservations')->with('success', 'Status has change to active');
    }

    public function deactive(Reservation $reservation){
        $reservation->update(['status'=> false]);
        return redirect('/reservations')->with('success', 'Status has change to deactive');
    }
}