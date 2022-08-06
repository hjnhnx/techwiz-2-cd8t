<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'pickup_address',
        'destination_address',
        'desired_pickup_time',
        'seats_occupy',
        'status',
        'ride_id',
        'pickup_time',
        'price',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ride(){
        return $this->belongsTo(Ride::class);
    }
}
