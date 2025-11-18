<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Carbon\Carbon;
class ReservationController extends Controller
{
    public function reserve(ReservationRequest $request)
    {
        $validated = $request->validated();

        // Convert date and time to proper DB format
        if (!empty($validated['reservation_date']) && !empty($validated['reservation_time'])) {
                // Combine date and time into one datetime
                $datetime = Carbon::createFromFormat(
                    'd/m/Y H:i',
                    $validated['reservation_date'] . ' ' . $validated['reservation_time'] // note the space
                );

                $validated['reservation_date'] = $datetime->format('Y-m-d H:i:s');
                $validated['reservation_time'] = $datetime->format('Y-m-d H:i:s');
            }

        $validated['userID'] = $validated['userID'] ?? 1;

        Reservation::create($validated);

        return view('thankyou');
    }
}