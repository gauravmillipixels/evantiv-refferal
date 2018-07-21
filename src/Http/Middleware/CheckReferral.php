<?php

namespace millipixels\evantivreferral\Http\Middleware;

use Closure;

class CheckReferral {

    public function handle($request, Closure $next) {
        if ($request->hasCookie('referral')) {
            return $next($request);
        }

        if (($ref = $request->query('ref')) && app(config('referral.user_model', 'App\User'))->referralExists($ref)) {
            return redirect($request->fullUrl())->withCookie(cookie()->forever('referral', $ref));
        }

        return $next($request);
    }

}
