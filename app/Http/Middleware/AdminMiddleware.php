<?php

namespace App\Http\Middleware;

use Closure;
use App\Gebruiker as Gebruiker;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
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
      if(Auth::check())
      {
        $gebruiker = new Gebruiker();
        $isAdmin = $gebruiker->isAdmin(Auth::user()->id);
        if($isAdmin)
        {
          return $next($request);
        }else{
          return redirect('home');
        }
      }else{
        return redirect('home');
      }

    }
}
