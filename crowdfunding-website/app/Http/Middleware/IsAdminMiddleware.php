<?php

namespace App\Http\Middleware;

use Closure;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if( $user->role->name == 'admin'){
            return $next($request);
        }
        return response()->json([
            'message' => 'maaf anda bukan admin.'
        ]);
    }
}
