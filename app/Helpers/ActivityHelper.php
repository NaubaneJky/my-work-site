<?php

namespace App\Helpers;

use App\Models\ActivityLogger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActivityHelper
{
    public static function log($action, $model = null, $modelId = null, $allValues = null, $newValues = null)
    {
        $user = Auth::user();

        ActivityLogger::create([
            'user_id'    => $user ? $user->id : null,
            'role'       => $user ? $user->role : 'guest',
            'ip_address' => Request::ip(),
            'user_agent' => Request::header('User-Agent'),
            'url'        => Request::fullUrl(),
            'model'      => $model,
            'model_id'   => $modelId,
            'action'     => $action,
            'all_values' => $allValues ? json_encode($allValues) : null,
            'new_values' => $newValues ? json_encode($newValues) : null,
        ]);
    }
}
