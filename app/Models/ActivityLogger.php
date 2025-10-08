<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLogger extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'role',
        'ip_address',
        'user_agent',
        'url',
        'model',
        'model_id',
        'action',
        'all_values',
        'new_values',
    ];
}
