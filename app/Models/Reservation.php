<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id','route_id', 'total_price', 'round_trip', 'vehicle', 'passengers', 'pick_up_address',
        'destination_address', 'departure_date', 'pickup_time', 'payment_option', 'invoice_id',
        'stripe_order_id', 'paypal_order_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
