<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class SupervisorController extends Controller
{
    public function dashboard()
    {
        $reservations = User::where('role', 'guest')->orderBy('name', 'asc')->get();

        return view('supervisor.dashboard', compact('reservations'));
    }

    public function listReservations($id)
    {
        $reservations = Reservation::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('supervisor.list', compact('reservations'));
    }

    public function detailReservation(Reservation $reservation)
    {
        $details = Reservation::with('user')->find($reservation->id);

        return view('supervisor.detail', compact('details'));
    }

    public function statusReservation(Request $request, Reservation $reservation)   
    {

        $validated = $request->validate([
            'status' => 'required|in:open,reserve,cancel,complete'
        ]);

        $reservation->status = $validated['status'];
        $reservation->save();

        return response()->json([
            'message' => 'Reservation status updated successfully.',
            'status' => ucfirst($reservation->status),
        ]);
    }
}
