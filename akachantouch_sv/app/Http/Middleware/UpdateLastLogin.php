<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UpdateLastLogin
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
        $user = Auth::user();
        Auth::user()->where('id', $user->id)->update(['last_login_at' => Carbon::now()]);
        return $next($request);
    }
}
