<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Booking;


class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'role', 'password', 'email_verified_at', 'remember_token'
    ];

    public static function getAll()
    {
        return self::all();
    }


    public function services()
    {
        return $this->hasMany(Service::class, 'freelancer_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'client_id');
    }
}
