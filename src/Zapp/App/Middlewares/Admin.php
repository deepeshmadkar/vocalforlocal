<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08-01-2021
 * Time: 09:19 AM
 */

namespace Zapp\App\Middlewares;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        $user = auth()->user();
        if(!$user) {
            if (! $request->expectsJson()) {
                return route('login');
            }

            return response()->json(['error' => true, 'message' => 'Unauthenticated', 'code' => 403],403);
        }

        if($user->userIsOfType() != 'admin'){
            abort(403);
        }

        if(!$user->details()->isVerified()){
            abort(403);
        }

        if(!$user->details()->progress->status()){
            dd('routing to appropriate progression, ',$user->details()->progress->name() );
        }

        if(!$user->details()->isAdmin()){
            abort(403);
        }

        return $next($request);
    }
}