<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $age = 17;
        // if($age<18){
        //     abort (403 , 'Age restrictions' );
        // }
        // return $next($request);
        /***************************************/
        $age = 17;
        $response = $next($request);
        if ($age < 18) {
            abort(403, 'Age restrictions');
        }
        return $response;

    }
}
