<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function dashboard()
    {
        $reservations = Reservation::where('user_id', Auth::id())->whereIn('status', ['open', 'reserve'])->orderBy('date', 'asc')->get();

        return view('guest.dashboard', compact('reservations'));
    }

    public function history()
    {
        $history = Reservation::where('user_id', Auth::id())->whereIn('status', ['cancel', 'complete'])->orderBy('date', 'desc')->get();

        return view('guest.history', compact('history'));
    }

    public function showReservation(Reservation $reservation)
    {
        $reservation = Reservation::with('meals')->findOrFail($reservation->id);
    
        return view('guest.show', compact('reservation'));
    }
    
    public function createReservation()
    {
        return view('guest.create');
    }

    public function storeReservation(Request $request)
    {
        $validate = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'contact' => 'required|string|max:255',
            'note' => 'nullable|string|max:500',
            'meal_menu' => 'nullable|array',
            'meal_menu.*' => 'nullable|string',
        ]);

        $meals = array_filter($validate['meal_menu'] ?? []);

        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'date' => $validate['date'],
            'time' => $validate['time'],
            'contact' => $validate['contact'] ?? null,
            'note' => $validate['note'] ?? null,
        ]);

        foreach ($meals as $meal) {
            $reservation->meals()->create([
                'meal_menu' => $meal,
            ]);
        }

        return redirect()->route('guestDashboard')->with('success', 'Reservation created successfully.');
    }
}
