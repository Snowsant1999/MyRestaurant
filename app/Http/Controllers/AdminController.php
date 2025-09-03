<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = Reservation::query();

        if (request()->filled('status')){
            $query->where('status', $request->status);
        }
        
        if (request()->filled('date')){
            $query->whereDate('date', $request->date);
        }

        $reservations = $query->orderBy('created_at', 'desc')->get();

        if ($request->ajax()){
            if ($request->viewType === 'desktop'){
                return view('admin.partials', compact('reservations'))->render();
            }
            if ($request->viewType === 'mobile'){
                return view('admin.card', compact('reservations'))->render();
            }
        }

        return view('admin.dashboard', compact('reservations'));
    }
}