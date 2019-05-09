<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Business;

class WebsiteWidget
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
        if(Business::where('secret_key', $request->key)->count())
            return $next($request);
        else return response()->json([
            'status' => 'error',
            'message' => 'forbidden'
        ], 403);
    }
}
