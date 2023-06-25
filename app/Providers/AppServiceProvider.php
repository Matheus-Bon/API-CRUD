<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('create', function(User $user){
            
            return $user->role_id == 1;

        });

        Gate::define('read', function(User $user){
            
            return 
                $user->role_id == 1 || 
                $user->role_id == 2 || 
                $user->role_id == 3 || 
                $user->role_id == 4;

        });

        Gate::define('update', function(User $user){
            
            return $user->role_id == 1 || $user->role_id == 3;

        });

        Gate::define('delete', function(User $user){
            
            return $user->role_id == 1 || $user->role_id == 4;

        });
    }
}
