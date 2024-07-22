<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Set waktu sesi menjadi 1 menit (60 detik)
        $timeout = 3600; // dalam detik

        if (Auth::check()) {
            $lastActivity = Session::get('lastActivityTime');
            $currentTime = time();

            if ($lastActivity && ($currentTime - $lastActivity) > $timeout) {
                Auth::logout();
                Session::flush();
                return redirect('/')->with('message', 'You have been logged out due to inactivity.');
            }

            Session::put('lastActivityTime', $currentTime);

            $user = Auth::user();
            if ($user->role !== $role) {
                // Redirect jika role tidak sesuai
                return response()->json('tidak dapat mengakses karena anda superadmin');
            }
        } else {
            return redirect('/');
        }

        return $next($request);
    }
}
