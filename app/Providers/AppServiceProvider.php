<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        //
        Paginator::useBootstrap(); //agar template bootstrap

        Gate::define('admin', function(User $user){
            return $user->role === 'admin';
        });
        Gate::define('member', function(User $user){
            return $user->role === 'member';
        });
    }
}