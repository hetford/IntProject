<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Auth;
use Closure;

class SystemAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = DB::table('users')->where('id', Auth::user()->id)->first();

        if ($user->role != 'System Admin') {
            return redirect('home')->with('error', 'You don\'t have permission to view this page.');
        } else {
            return $next($request);
        }

    }
}
