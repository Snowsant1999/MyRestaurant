<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'time',
        'status',
        'contact',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function meals()
    {
        return $this->hasMany(ReservationMeal::class, 'reservation_id');
    }
}
