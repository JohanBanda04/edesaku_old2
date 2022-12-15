<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Role extends Middleware{
    public function handle($request, Closure $next, ... $roles){
        if (!Auth::check()) // most likely added as part of a route group.
            return redirect('/login');
        $current_user_role = auth()->user()->role->name;

        if ($current_user_role == "Developer"){
            return $next($request);
        }

        foreach($roles as $role) {
            // Check if user has the role This check will depend on how your roles are set up
            if($current_user_role == $role)
                return $next($request);
        }
    
        return redirect('/login');
    }
}
