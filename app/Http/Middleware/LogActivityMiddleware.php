<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\ActivityHelper;

class LogActivityMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Log setiap pengunjung masuk ke halaman
        ActivityHelper::log('visit');\Log::info('LogActivityMiddleware jalan!');


        return $next($request);
    }
}
