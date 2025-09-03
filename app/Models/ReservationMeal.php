<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationMeal extends Model
{
    protected $fillable = [
        'reservation_id',
        'meal_menu'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
