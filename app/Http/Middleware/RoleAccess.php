<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Gate::allows('is-admin'))
        {
            return $next($request);
        }
        else
        {
            session()->flash('error', 'Priviledge reserved for System Admin');
            return redirect()->to('dashboard');
        }
      
    }
}
