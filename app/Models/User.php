<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'role'
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'freelancer_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'client_id');
    }
}
