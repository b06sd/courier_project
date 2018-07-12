<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionClearanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->hasRole('Admin')){
            return $next($request);
        }
        if(Auth::user()->hasRole('User')){
            if($request->is('users')){
                if(Auth::user()->hasPermission('Add User')){
                    return $next($request);
                }
                else abort(401, 'Unauthorized Action');
            }

            if ($request->is('users/create')){
                if(Auth::user()->hasPermission('View User')){
                    return $next($request);
                }
                else abort(401, 'Unauthorized Action');
            }

            if ($request->is('users/*')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission(['Edit User', 'Delete User'])) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }

            if($request->is('roles')){
                if(!Auth::user()->hasPermissionTo('View Role')){
                    abort(401, 'Unauthorized action.');
                }
                else{
                    return $next($request);
                }
            }
            if($request->is('roles/create')){
                if (!Auth::user()->hasPermissionTo('Add Role')){
                    abort(401, 'Unauthorized action.');
                }
                else{
                    return $next($request);
                }
            }
            if ($request->is('roles/*')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission(['Edit Role', 'Delete Role'])) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }

            if ($request->is('permissions')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission('Edit Permission')) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }
            if($request->is('permissions/create')){
                if (!Auth::user()->hasPermissionTo('Add Permission')){
                    abort(401, 'Unauthorized action.');
                }
                else{
                    return $next($request);
                }
            }
            if ($request->is('permissions/*')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission(['Edit Permission', 'Delete Permission'])) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }

            //Add Consultant Permission here
            if ($request->is('consignee')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission('Edit Consignee')) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }
            if($request->is('consignee/create')){
                if (!Auth::user()->hasPermissionTo('Add Consignee')){
                    abort(401, 'Unauthorized action.');
                }
                else{
                    return $next($request);
                }
            }
            if ($request->is('consignee/*')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission(['Edit Consignee', 'Delete Consignee'])) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }

            //Add Allocation Permission here
            if ($request->is('courier')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission('Edit Courier')) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }
            if($request->is('courier/create')){
                if (!Auth::user()->hasPermissionTo('Add Courier')){
                    abort(401, 'Unauthorized action.');
                }
                else{
                    return $next($request);
                }
            }
            if ($request->is('courier/*')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission(['Edit Courier', 'Delete Courier'])) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }

//            Add Account CRM Permission here
            if ($request->is('accounts')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission('Edit Account')) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }
            if($request->is('accounts/create')){
                if (!Auth::user()->hasPermissionTo('Add Account')){
                    abort(401, 'Unauthorized action.');
                }
                else{
                    return $next($request);
                }
            }
            if ($request->is('accounts/*')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission(['Edit Account', 'Delete Account'])) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }

            //Sales CRM Permission here
            if ($request->is('sales')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission('Edit Sale')) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }
            if($request->is('sales/create')){
                if (!Auth::user()->hasPermissionTo('Add Sale')){
                    abort(401, 'Unauthorized action.');
                }
                else{
                    return $next($request);
                }
            }
            if ($request->is('sales/*')) //If user is editing a post
            {
                if (!Auth::user()->hasAnyPermission(['Edit Sale', 'Delete Sale'])) {
                    abort('401');
                } else {
                    return $next($request);
                }
            }
        }
        return $next($request);
    }
}
