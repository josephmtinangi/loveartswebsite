<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class RouteViewBindings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = Route::current();
        $route_name = Route::currentRouteName();
        $route_action = Route::currentRouteAction();

        View::share('route', $route);
        View::share('route_name', $route_name);
        View::share('route_action', $route_action);
        View::share('route_title', trans('admin_home.title'));
        View::share('route_description', trans('admin_home.description'));
        View::share('instance', null);

        return $next($request);
    }
}
