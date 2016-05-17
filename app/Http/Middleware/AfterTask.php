<?php

namespace App\Http\Middleware;

use Cache;
use Closure;

class AfterTask
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
      $response = $next($request);

      Cache::pull("user:{$request->user()->id}:tasks");

      return $response;
    }
}
