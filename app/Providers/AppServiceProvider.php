<?php

namespace App\Providers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //This is to load variables to the base layout
        view()->composer('layouts.template', function($view) {
            $roles = Role::get();
            $permissions = Permission::get();
            $getUsers = User::all();

            $users = [];

            foreach ($getUsers as $value){
                $users[$value->id] = $value->name;
            }

            $view->with(array('roles' => $roles, 'permissions' => $permissions, 'users' => $users));
        });

        view()->composer('roles.index', function($view) {
            $permissions = Permission::get();

            $view->with(array('permissions' => $permissions));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
