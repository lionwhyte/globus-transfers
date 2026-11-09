<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'departure_location_name',
        'destination_location_name',
        'departure_location_lat',
        'departure_location_lng',
        'destination_location_lat',
        'destination_location_lng',
        'distance_km',
        'duration',
        'standardPrice',
        'minivanPrice',
        'minibusPrice'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
