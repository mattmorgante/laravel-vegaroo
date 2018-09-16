<?php

namespace App\Http\Middleware;

use Closure;

class cacheheaders
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
        $currentUrl = url()->current();
        if (strpos($currentUrl, 'onboarding-quiz') !== false) {
            $response = $next($request);
            return $response;
        } elseif (strpos($currentUrl, 'home') !== false) {
            $response = $next($request);
            return $response;
        } elseif (strpos($currentUrl, 'weekly') !== false) {
            $response = $next($request);
            return $response;
        } else {
            $response = $next($request);
            $response->header('Cache-Control', 'max-age=36000, public');
            return $response;
        }
    }
}
