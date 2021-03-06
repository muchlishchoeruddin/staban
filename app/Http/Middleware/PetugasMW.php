<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PetugasMW
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
        if (Auth::user()->id_level!='2') {
            return abort('403');
        }
        return $next($request);
    }
}
