<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Expected usage: ->middleware('role:admin,teacher')
     */
    public function handle(Request $request, Closure $next, string $roles)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated.'], Response::HTTP_UNAUTHORIZED);
        }
        $allowedRoles = explode(',', $roles);
        if (!in_array($user->role, $allowedRoles)) {
            return response()->json(['message' => 'Forbidden.'], Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
?>
