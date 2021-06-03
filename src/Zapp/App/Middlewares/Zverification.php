<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08-01-2021
 * Time: 09:19 AM
 */

namespace Zapp\App\Middlewares;

use Closure;
use Zapp\Domain\User\Events\UserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Zverification
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

        if(! $user->isVerified()){

            if($user->isBlocked()){
                abort(403);
            }

            if($user->isDeleted()){
                abort(403);
            }

            return redirect()->route('verify');
        }

        return $next($request);
    }
}