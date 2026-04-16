<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        if ($user === null) {
            return redirect()->route('login');
        }

        if (! in_array($user->role, ['user', 'trainer', 'admin'], true)) {
            abort(403, 'User role is not configured.');
        }

        if ($user->role !== $role) {
            return redirect()->route($user->homeRouteName());
        }

        return $next($request);
    }
}
